#!/usr/bin/env python3
"""Strict-rotation rebuild of the NOT-YET-PUBLISHED calendar from FROM (feed + reels). Wipes future stories (make_teasers regenerates them). Run from repo root, then bump queue/approvals_reset.txt."""
import yaml,glob,os,datetime,collections,re
FROM='2026-11-10'
def load(f):
    t=open(f,encoding='utf-8').read(); head=[l for l in t.splitlines() if l.startswith('#')]
    return head, yaml.safe_load(t) or []
def dump(f,head,items):
    body=yaml.dump(items,allow_unicode=True,sort_keys=False,width=100000,default_flow_style=False) if items else '[]\n'
    open(f,'w',encoding='utf-8').write('\n'.join(head)+('\n' if head else '')+body)
# ---- feed
files={f:load(f) for f in sorted(glob.glob('queue/week-*.yml'))}
slots=[];pool=collections.defaultdict(list)
for f,(h,its) in files.items():
    for it in its:
        if str(it['date'])>=FROM: slots.append((str(it['date']),it['time'])); pool[it['project']].append(it)
slots.sort()
for p in pool: pool[p].sort(key=lambda i:(str(i['date']),i['time']))   # keep each project's own order (best image first)
n=len(slots); order=[]; last=[]
cnt={p:len(v) for p,v in pool.items()}
CYC=[p for p in ['school-building','apartamentos-gondomar-2','vivendas-duas-igrejas','gold-village','vivendas-cete'] if p in cnt]
ptr=0
for d in range(n):
    for _ in range(len(CYC)):
        p=CYC[ptr%len(CYC)]; ptr+=1
        if cnt[p]>0 and (not last or p!=last[-1]): break
    else:
        p=max(cnt,key=lambda q:cnt[q])
    order.append(p); cnt[p]-=1; last.append(p)
idx={p:0 for p in pool}; new={}
for (d,t),p in zip(slots,order):
    it=pool[p][idx[p]]; idx[p]+=1; new[(d,t)]=(it,p)
for f,(h,its) in files.items():
    out=[]
    for it in its:
        k=(str(it['date']),it['time'])
        if str(it['date'])>=FROM:
            src=new[k][0]; src=dict(src); src['date']=it['date']; src['time']=it['time']; src['approved']=False; out.append(src)
        else: out.append(it)
    dump(f,h,out)
print('feed:',' '.join(f"{d[5:]}:{p[:3]}" for (d,t),p in zip(slots,order)))
# ---- social: drop future stories/reels, rebuild reels
cap={};rl=[]
for f in sorted(glob.glob('queue/social-week-*.yml')):
    h,its=load(f); keep=[]
    for x in its:
        if x.get('type')=='reel': cap[x['file']]=x
        if str(x['date'])>=FROM: continue
        keep.append(x)
    dump(f,h,keep)
done={'vivendas-duas-igrejas-reel.mp4','vivendas-cete-reel.mp4'}   # already published
reels=[x for k,x in sorted(cap.items()) if k not in done]
byp=collections.defaultdict(list)
for x in reels: byp[x['project']].append(x)
for p in byp: byp[p].sort(key=lambda x:x['file'])
day_proj={d:p for (d,t),p in zip(slots,order)}
d0=datetime.date(2026,11,11); res=[]; lastp=[]
while any(byp.values()):
    ds=d0.isoformat(); post=day_proj.get(ds)
    cand=[p for p in byp if byp[p]]
    ok=[p for p in cand if p not in lastp[-2:] and p!=post] or [p for p in cand if p not in lastp[-1:]] or cand
    pick=max(ok,key=lambda p:(len(byp[p]), -(max([i for i,x in enumerate(lastp) if x==p],default=-99))))
    x=dict(byp[pick].pop(0)); x['date']=ds; x['time']='12:30'; x['approved']=False; res.append(x); lastp.append(pick); d0+=datetime.timedelta(days=2)
f='queue/social-week-90-reels.yml'; h,_=load(f); dump(f,h,res)
print('reels:',' '.join(f"{x['date'][5:]}:{x['project'][:3]}" for x in res))
