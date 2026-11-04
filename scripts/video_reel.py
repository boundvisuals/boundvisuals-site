#!/usr/bin/env python3
"""Assemble one Instagram reel (1080x1920, 30 fps, H.264 high, AAC) from Vítor's OWN video clips
(LTX / Seedance / Kling exports found in a "video" or "anim" subfolder).

usage: video_reel.py <clips_dir> <out_dir> <project_id> "<Title>" [--fit auto|cover|blur] [--audio pad|keep|mix]
                     [--max-clip 8] [--max-total 60] [--xfade 0.6]

- ORDER: natural file order ("01 …", "02 …", "shot_10" after "shot_9"); rename the files in MEGA to change it.
- FRAMING (--fit): auto = vertical clips fill the screen; horizontal/square clips are shown WHOLE on a blurred copy of
  themselves (never cropped - composition stays Vítor's). cover = always fill (centre crop). blur = always whole.
- AUDIO (--audio): pad = generated ambient pad (no licensing question, default); keep = the clips' own sound
  (crossfaded; silent clips get silence); mix = clips' sound + pad underneath.
- TITLE on the first clip (fades in/out), signature end card "Vítor Hugo • Bound Visuals / boundvisuals.com".
- Each clip is trimmed to --max-clip seconds; the reel stops adding clips at --max-total seconds.
Outputs <out_dir>/<project_id>-video-reel.mp4 + -cover.jpg + -video-reel.txt (what went in, for the Painel/log).
"""
import argparse, json, pathlib, re, subprocess, sys, shutil
import numpy as np
from PIL import Image, ImageDraw

sys.path.insert(0, str(pathlib.Path(__file__).resolve().parent))
from reel_styles import W, H, FPS, BLACK, GREY, LIGHT, font, pad, write_wav, end_card  # noqa: E402

VEXT = {".mp4", ".mov", ".m4v", ".webm", ".mkv"}
END_S = 2.5


def nat_key(p):
    return [int(t) if t.isdigit() else t.lower() for t in re.split(r"(\d+)", str(p))]


def probe(p):
    j = json.loads(subprocess.run(["ffprobe", "-v", "error", "-print_format", "json", "-show_streams", "-show_format", str(p)],
                                  capture_output=True, text=True, check=True).stdout)
    v = next((s for s in j["streams"] if s["codec_type"] == "video"), None)
    if not v:
        return None
    w, h = int(v["width"]), int(v["height"])
    rot = 0
    for sd in v.get("side_data_list", []) or []:
        rot = int(sd.get("rotation", 0) or 0)
    rot = rot or int((v.get("tags") or {}).get("rotate", 0) or 0)
    if abs(rot) in (90, 270):
        w, h = h, w
    dur = float(j["format"].get("duration") or v.get("duration") or 0)
    has_a = any(s["codec_type"] == "audio" for s in j["streams"])
    return {"w": w, "h": h, "dur": dur, "audio": has_a}


def title_png(title, path):
    ov = Image.new("RGBA", (W, H), (0, 0, 0, 0))
    grad = Image.new("L", (1, 520))
    for y in range(520):
        grad.putpixel((0, y), int(160 * (y / 519) ** 1.4))
    ov.paste(Image.new("RGBA", (W, 520), BLACK + (255,)), (0, H - 520), grad.resize((W, 520)))
    d = ImageDraw.Draw(ov)
    d.text((W // 2, H - 360), title, font=font("Poppins-Medium.ttf", 54), fill=LIGHT + (255,), anchor="mm")
    d.text((W // 2, H - 296), "Vítor Hugo  •  Bound Visuals", font=font("Poppins-Light.ttf", 30), fill=GREY + (255,), anchor="mm")
    ov.save(path)


def run(cmd):
    r = subprocess.run(cmd, capture_output=True, text=True)
    if r.returncode != 0:
        sys.stderr.write(r.stderr[-3000:])
        raise SystemExit("ffmpeg failed: " + " ".join(cmd[:6]) + " …")


def normalise(src, info, dst, fit, seconds, keep_audio, title=None, title_path=None):
    """One clip -> 1080x1920/30fps/yuv420p (+ stereo 44.1k audio track, real or silent)."""
    vertical = info["h"] / info["w"] >= 1.5
    mode = fit if fit != "auto" else ("cover" if vertical else "blur")
    cover = f"scale={W}:{H}:force_original_aspect_ratio=increase:flags=lanczos,crop={W}:{H}"
    if mode == "cover":
        vf = f"[0:v]{cover},setsar=1,fps={FPS}[base]"
    else:
        vf = (f"[0:v]split[a][b];[a]{cover},boxblur=40:2,eq=brightness=-0.10:saturation=0.85[bg];"
              f"[b]scale={W}:{H}:force_original_aspect_ratio=decrease:flags=lanczos[fg];"
              f"[bg][fg]overlay=(W-w)/2:(H-h)/2,setsar=1,fps={FPS}[base]")
    inputs = ["-i", str(src)]
    if title:
        inputs += ["-loop", "1", "-t", f"{seconds:.3f}", "-i", str(title_path)]
        t_out = min(3.2, seconds - 0.6)
        vf += (f";[1:v]format=rgba,fade=t=in:st=0.4:d=0.8:alpha=1,fade=t=out:st={t_out:.2f}:d=0.6:alpha=1[t];"
               f"[base][t]overlay=0:0[base]")
    vf += ";[base]format=yuv420p[v]"
    if keep_audio and info["audio"]:
        af = f";[0:a]aformat=sample_rates=44100:channel_layouts=stereo,apad,atrim=0:{seconds:.3f}[a]"
        amap = ["-map", "[a]"]
    else:
        inputs += ["-f", "lavfi", "-t", f"{seconds:.3f}", "-i", "anullsrc=r=44100:cl=stereo"]
        af, amap = "", ["-map", f"{2 if title else 1}:a"]
    run(["ffmpeg", "-y", "-loglevel", "error", *inputs, "-filter_complex", vf + af, "-map", "[v]", *amap,
         "-t", f"{seconds:.3f}", "-c:v", "libx264", "-preset", "medium", "-crf", "12", "-c:a", "pcm_s16le", str(dst)])
    return mode


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument("clips"); ap.add_argument("out"); ap.add_argument("pid"); ap.add_argument("title")
    ap.add_argument("--fit", default="auto", choices=["auto", "cover", "blur"])
    ap.add_argument("--audio", default="pad", choices=["pad", "keep", "mix"])
    ap.add_argument("--max-clip", type=float, default=8.0)
    ap.add_argument("--max-total", type=float, default=60.0)
    ap.add_argument("--xfade", type=float, default=0.6)
    a = ap.parse_args()

    src, out = pathlib.Path(a.clips), pathlib.Path(a.out)
    files = sorted([p for p in src.rglob("*") if p.suffix.lower() in VEXT and not p.name.startswith(".")], key=nat_key)
    if not files:
        raise SystemExit(f"no video clips in {src}")
    out.mkdir(parents=True, exist_ok=True)
    tmp = out / "_vtmp"; shutil.rmtree(tmp, ignore_errors=True); tmp.mkdir()
    title_png(a.title, tmp / "title.png")
    end_card(a.title).save(tmp / "end.png")

    keep = a.audio in ("keep", "mix")
    parts, log, total = [], [], 0.0
    for i, f in enumerate(files):
        info = probe(f)
        if not info or info["dur"] < 1.0:
            log.append(f"skip {f.name} (no video / shorter than 1 s)"); continue
        secs = min(info["dur"], a.max_clip)
        if total + secs > a.max_total and parts:
            log.append(f"stop at {f.name}: reel would pass {a.max_total:.0f} s"); break
        dst = tmp / f"c{len(parts):02d}.mov"
        mode = normalise(f, info, dst, a.fit, secs, keep, a.title if not parts else None, tmp / "title.png")
        parts.append((dst, secs)); total += secs - (a.xfade if len(parts) > 1 else 0)
        log.append(f"{len(parts):02d}  {f.relative_to(src)}  {info['w']}x{info['h']}  {secs:.1f}s  {mode}"
                   f"{'  +sound' if keep and info['audio'] else ''}")
    if not parts:
        raise SystemExit("no usable clips")
    # end card as a clip
    endv = tmp / "end.mov"
    run(["ffmpeg", "-y", "-loglevel", "error", "-loop", "1", "-t", f"{END_S}", "-i", str(tmp / "end.png"),
         "-f", "lavfi", "-t", f"{END_S}", "-i", "anullsrc=r=44100:cl=stereo", "-vf", f"fps={FPS},format=yuv420p,setsar=1",
         "-c:v", "libx264", "-crf", "12", "-c:a", "pcm_s16le", str(endv)])
    parts.append((endv, END_S))

    # xfade / acrossfade chain
    xf = a.xfade
    ins, fc, off = [], [], 0.0
    for p, _ in parts:
        ins += ["-i", str(p)]
    vlast, alast = "0:v", "0:a"
    off = parts[0][1]
    for k in range(1, len(parts)):
        off -= xf
        fc.append(f"[{vlast}][{k}:v]xfade=transition=fade:duration={xf}:offset={off:.3f}[v{k}]")
        fc.append(f"[{alast}][{k}:a]acrossfade=d={xf}:c1=tri:c2=tri[a{k}]")
        vlast, alast = f"v{k}", f"a{k}"
        off += parts[k][1]
    length = off
    joined = tmp / "joined.mov"
    run(["ffmpeg", "-y", "-loglevel", "error", *ins, "-filter_complex", ";".join(fc), "-map", f"[{vlast}]", "-map", f"[{alast}]",
         "-c:v", "libx264", "-preset", "medium", "-crf", "12", "-pix_fmt", "yuv420p", "-c:a", "pcm_s16le", str(joined)])

    # final audio
    mp4 = out / f"{a.pid}-video-reel.mp4"
    enc = ["-c:v", "libx264", "-preset", "slow", "-crf", "15", "-pix_fmt", "yuv420p", "-profile:v", "high",
           "-movflags", "+faststart", "-c:a", "aac", "-b:a", "192k"]
    if a.audio == "keep":
        run(["ffmpeg", "-y", "-loglevel", "error", "-i", str(joined), *enc, str(mp4)])
    else:
        L, R = pad(length + 0.5)
        write_wav(tmp / "pad.wav", L, R)
        if a.audio == "pad":
            run(["ffmpeg", "-y", "-loglevel", "error", "-i", str(joined), "-i", str(tmp / "pad.wav"), "-map", "0:v", "-map", "1:a",
                 "-shortest", *enc, str(mp4)])
        else:  # mix: clip sound on top, pad at -10 dB underneath
            run(["ffmpeg", "-y", "-loglevel", "error", "-i", str(joined), "-i", str(tmp / "pad.wav"), "-filter_complex",
                 "[1:a]volume=0.32[p];[0:a][p]amix=inputs=2:duration=first:normalize=0[a]", "-map", "0:v", "-map", "[a]",
                 *enc, str(mp4)])
    cover_t = min(2.5, max(0.5, parts[0][1] / 2))
    run(["ffmpeg", "-y", "-loglevel", "error", "-ss", f"{cover_t}", "-i", str(mp4), "-frames:v", "1", "-q:v", "2",
         str(out / f"{a.pid}-video-reel-cover.jpg")])
    log.append(f"reel {mp4.name}: {length:.1f} s, {len(parts) - 1} clips, fit={a.fit}, audio={a.audio}")
    (out / f"{a.pid}-video-reel.txt").write_text("\n".join(log) + "\n")
    shutil.rmtree(tmp)
    print("\n".join(log))


if __name__ == "__main__":
    main()
