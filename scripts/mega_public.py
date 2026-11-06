#!/usr/bin/env python3
"""Download the FINAL images of a public MEGA folder link — pure Python (no MEGAcmd), runs on the shared server.

usage: mega_public.py <https://mega.nz/folder/HANDLE#KEY> <out_dir> [--list]
Same rules and output layout as fetch_finals.sh:
  - images/videos inside folders whose path contains final|finais|publicar|publish (else: everything)
  - numbered stage folders ("1 - ai", … "5 - final export"): per shot only the highest-numbered stage
  - saved as <out>/<shot>/<file>   (shot = folder above the stage folder, spaces/slashes → "_")
Files already present with the same size are skipped (resumable cache).
"""
import base64, json, os, re, struct, sys, collections, urllib.request
from Crypto.Cipher import AES
from Crypto.Util import Counter

API = "https://g.api.mega.co.nz/cs"
EXT = re.compile(r"\.(png|jpe?g|tiff?|webp|exr|mp4|mov)$", re.I)
PATTERN = re.compile(os.environ.get("FINALS_PATTERN", "final|finais|publicar|publish"), re.I)


def b64d(s):
    s = s.replace("-", "+").replace("_", "/").replace(",", "")
    return base64.b64decode(s + "=" * (-len(s) % 4))


def a32(b):
    b += b"\0" * (-len(b) % 4)
    return list(struct.unpack(">%dI" % (len(b) // 4), b))


def to_bytes(a):
    return struct.pack(">%dI" % len(a), *a)


def api(req, folder):
    data = json.dumps([req]).encode()
    r = urllib.request.Request(f"{API}?id=1&n={folder}", data=data, headers={"Content-Type": "application/json"})
    with urllib.request.urlopen(r, timeout=120) as f:
        res = json.load(f)
    if isinstance(res, int) or (isinstance(res, list) and isinstance(res[0], int)):
        raise RuntimeError(f"MEGA API error {res}")
    return res[0]


def dec_key(enc, master):
    c = AES.new(master, AES.MODE_ECB)
    return c.decrypt(enc)


def attrs(a_b64, key16):
    raw = AES.new(key16, AES.MODE_CBC, b"\0" * 16).decrypt(b64d(a_b64))
    raw = raw.rstrip(b"\0")
    if not raw.startswith(b"MEGA"):
        return {}
    try:
        return json.loads(raw[4:].decode("utf-8", "ignore"))
    except ValueError:
        return {}


def listing(link):
    m = re.search(r"folder/([^#?/]+)#([^/?]+)", link) or re.search(r"#F!([^!]+)!([^/?]+)", link)
    if not m:
        raise SystemExit("not a MEGA folder link")
    handle, key = m.group(1), b64d(m.group(2))
    res = api({"a": "f", "c": 1, "ca": 1, "r": 1}, handle)
    nodes = {}
    for n in res["f"]:
        k = n.get("k", "")
        if ":" not in k:
            continue
        enc = b64d(k.split(":", 1)[1])
        raw = dec_key(enc, key)
        if n["t"] == 0:                                    # file: 32-byte key
            w = a32(raw)
            fkey = to_bytes([w[0] ^ w[4], w[1] ^ w[5], w[2] ^ w[6], w[3] ^ w[7]])
            iv = to_bytes([w[4], w[5]])
            name = attrs(n["a"], fkey).get("n", n["h"])
            nodes[n["h"]] = dict(h=n["h"], p=n["p"], t=0, name=name, key=fkey, iv=iv, size=n.get("s", 0))
        else:
            name = attrs(n["a"], raw[:16]).get("n", n["h"])
            nodes[n["h"]] = dict(h=n["h"], p=n["p"], t=n["t"], name=name)
    def path(h):
        parts = []
        while h in nodes:
            parts.append(nodes[h]["name"]); h = nodes[h]["p"]
        return "/" + "/".join(reversed(parts))
    files = [(path(n["h"]), n) for n in nodes.values() if n["t"] == 0]
    return handle, files


def pick(files):
    imgs = [(p, n) for p, n in files if EXT.search(p)]
    fin = [(p, n) for p, n in imgs if PATTERN.search("/".join(p.split("/")[2:-1]))]
    if not fin:
        fin = imgs
    groups = collections.defaultdict(list)
    for p, n in fin:
        parts = p.split("/")
        stage = parts[-2] if len(parts) > 2 else ""
        m = re.match(r"\s*(\d+)\s*-", stage)
        groups["/".join(parts[:-2])].append((int(m.group(1)) if m else None, p, n))
    out = []
    for items in groups.values():
        nums = [x for x, _, _ in items if x is not None]
        if nums and len(set(nums)) > 1:
            top = max(nums); out += [(p, n) for x, p, n in items if x == top]
        else:
            out += [(p, n) for _, p, n in items]
    return out


def download(handle, n, dest):
    if os.path.exists(dest) and os.path.getsize(dest) == n["size"]:
        return "cached"
    url = api({"a": "g", "g": 1, "n": n["h"]}, handle)["g"]
    ctr = Counter.new(128, initial_value=int.from_bytes(n["iv"] + b"\0" * 8, "big"))
    c = AES.new(n["key"], AES.MODE_CTR, counter=ctr)
    tmp = dest + ".part"
    os.makedirs(os.path.dirname(dest), exist_ok=True)
    with urllib.request.urlopen(url, timeout=300) as r, open(tmp, "wb") as f:
        while True:
            b = r.read(1 << 20)
            if not b:
                break
            f.write(c.decrypt(b))
    os.replace(tmp, dest)
    return "ok"


def main():
    link, out = sys.argv[1], sys.argv[2]
    handle, files = listing(link)
    sel = pick(files)
    print(f"Folder contains {len(files)} files · finals: {len(sel)}")
    if "--list" in sys.argv:
        for p, _ in sel: print(" ", p)
        return
    fail = 0
    for p, n in sel:
        parts = p.split("/")
        shot = (parts[-3] if len(parts) > 3 else "").replace(" ", "_").replace("/", "_") or "root"
        try:
            st = download(handle, n, os.path.join(out, shot, parts[-1]))
            print(f"  {st:6} {p}")
        except Exception as e:
            fail += 1; print(f"  FAILED {p}: {e}")
    print(f"Downloaded: {len(sel) - fail}  failed: {fail}")


if __name__ == "__main__":
    main()
