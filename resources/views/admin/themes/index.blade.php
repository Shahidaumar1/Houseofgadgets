@extends('layouts.app')
@section('content')

<div class="container py-4">

  <!-- Top bar -->
  <div class="d-flex align-items-center justify-content-between mb-4">
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary rounded-3">
      <i class="fa fa-arrow-left me-1"></i> Back
    </a>
    <h2 class="m-0 fw-bold rainbow-text">Themes</h2>
    <span></span>
  </div>

  <!-- Search -->
  <div class="row g-3 align-items-center mb-3">
    <div class="col-lg-6">
      <div class="input-group input-group-lg shadow-sm rounded-4 overflow-hidden">
        <span class="input-group-text bg-white border-0"><i class="fa fa-search"></i></span>
        <input id="themeSearch" type="text" class="form-control border-0"
               placeholder="Search themes… name, tag, or a single color (e.g. #343434, rgb(52,52,52), black, silver)">
      </div>
    </div>
  </div>

  <!-- Themes grid -->
  <div id="themeGrid" class="theme-grid">
    @php
      $themes = [
        ['name'=>'Dark Nebula','tags'=>'dark black night','colors'=>['#0F0F10','#1C1C22','#2B2B33','#00D084','#7A00FF']],
        ['name'=>'Mono Noir','tags'=>'black gray minimal dark','colors'=>['#000000','#121212','#2A2A2A','#BDBDBD','#FFFFFF']],
        ['name'=>'Charcoal Gray','tags'=>'grey gray graphite neutral','colors'=>['#0E1113','#1F2428','#31363B','#8C939A','#DCE3EA']],
        ['name'=>'Graphite','tags'=>'grey gray graphite pro','colors'=>['#1B1B1D','#2A2A2E','#3C3C41','#6F6F77','#C7C7CF']],
        ['name'=>'Slate Grey','tags'=>'slate gray cool neutral','colors'=>['#111827','#1F2937','#374151','#9CA3AF','#E5E7EB']],
        ['name'=>'Black & Silver','tags'=>'black silver premium metal','colors'=>['#0A0A0A','#202020','#7F8C8D','#BDC3C7','#ECF0F1']],
        ['name'=>'Steel Silver','tags'=>'silver steel metal grey','colors'=>['#2C3E50','#4D5966','#95A5A6','#C0C9CF','#EEF2F5']],
        ['name'=>'Liquid Chrome','tags'=>'silver chrome glossy','colors'=>['#101214','#2B2F33','#7D838A','#B7BDC5','#F3F4F6']],
        ['name'=>'Minimal Light','tags'=>'light white clean minimal','colors'=>['#FFFFFF','#F5F7FB','#E9EDF5','#343A40','#0D6EFD']],
        ['name'=>'Ice Frost','tags'=>'white silver ice frosty','colors'=>['#FFFFFF','#F2F6FF','#E5ECF6','#A8B3C7','#6C7A91']],
        ['name'=>'Crimson Pop','tags'=>'red bold vibrant','colors'=>['#FF1744','#FF5252','#FFE57F','#263238','#FFFFFF']],
        ['name'=>'Ocean Breeze','tags'=>'blue aqua teal fresh','colors'=>['#00B0FF','#00E5FF','#64FFDA','#004D40','#FFFFFF']],
        ['name'=>'Forest Glow','tags'=>'green nature calm','colors'=>['#2E7D32','#66BB6A','#A5D6A7','#263238','#F1F8E9']],
        ['name'=>'Sunset Candy','tags'=>'orange pink gradient','colors'=>['#FF8A00','#FF5252','#FF00C8','#212121','#FFFFFF']],
        ['name'=>'Coral Reef','tags'=>'coral peach teal tropical','colors'=>['#FF6F61','#FFA177','#2EC4B6','#1B9AAA','#F7FFF7']],
        ['name'=>'Midnight Blue','tags'=>'blue navy night elegant','colors'=>['#0D1B2A','#1B263B','#415A77','#E0E1DD','#F7F9FC']],
        ['name'=>'Aurora','tags'=>'neon cyan magenta glow','colors'=>['#00F5D4','#00BBF9','#9B5DE5','#F15BB5','#FEE440']],
        ['name'=>'Cyber Neon','tags'=>'neon dark tech cyberpunk','colors'=>['#0B0E14','#1E2230','#00E5FF','#FF00E5','#FFE600']],
        ['name'=>'Pastel Dream','tags'=>'pastel soft cute','colors'=>['#FAD4D8','#FBE7C6','#CDEAC0','#BEE1E6','#C6DEF1']],
        ['name'=>'Lavender Bloom','tags'=>'purple lilac soft pastel','colors'=>['#3E206D','#6D28D9','#A78BFA','#E9D5FF','#FAF5FF']],
        ['name'=>'Rose Gold','tags'=>'pink gold luxury warm','colors'=>['#5A3E36','#8E5A55','#B76E79','#E6B8B8','#FFF5F5']],
        ['name'=>'Emerald Mint','tags'=>'mint green fresh clean','colors'=>['#064E3B','#10B981','#34D399','#A7F3D0','#ECFDF5']],
        ['name'=>'Vintage Sepia','tags'=>'brown sepia retro warm','colors'=>['#3B2F2F','#6B4F4F','#A68A64','#DDB892','#FFF3E2']],
        ['name'=>'Desert Sand','tags'=>'sand beige tan warm','colors'=>['#5E503F','#6C584C','#B08968','#E6CCB2','#FAEDCD']],
      ];
    @endphp

    @foreach($themes as $t)
      <div class="theme-card" data-name="{{ strtolower($t['name']) }}"
           data-tags="{{ strtolower($t['tags']) }}"
           data-colors='@json($t["colors"])'>
        <div class="theme-card-inner">
          <div class="theme-title">
            <h5 class="mb-1">{{ $t['name'] }}</h5>
            <small class="text-muted">{{ $t['tags'] }}</small>
          </div>
          <div class="swatch-row">
            @foreach($t['colors'] as $c)
              <button class="swatch" title="Copy {{ $c }}" style="--c: {{ $c }}"></button>
            @endforeach
          </div>
          <button class="btn btn-apply apply-theme" data-theme='@json($t)'>
            <i class="fa fa-check me-2"></i>Use Theme
          </button>
        </div>
      </div>
    @endforeach
  </div>
</div>

<!-- Styles -->
<style>
  .rainbow-text{
    background:linear-gradient(90deg,#ff0055,#ff8a00,#ffee00,#00d084,#00b0ff,#7a00ff,#ff00c8,#ff0055);
    background-size:400% 100%;
    -webkit-background-clip:text;background-clip:text;color:transparent;
    animation:rg 8s linear infinite
  }
  @keyframes rg{0%{background-position:0% 50%}100%{background-position:100% 50%}}

  .theme-grid{ display:grid; grid-template-columns:repeat(auto-fill,minmax(260px,1fr)); gap:22px }
  .theme-card{ border-radius:18px; background:#fff; box-shadow:0 10px 30px rgba(0,0,0,.08); transition:.2s ease; }
  .theme-card:hover{ transform:translateY(-2px); box-shadow:0 16px 40px rgba(0,0,0,.12) }
  .theme-card-inner{ padding:18px }
  .theme-title h5{ font-weight:700 }
  .swatch-row{ display:flex;flex-wrap:wrap;gap:10px;margin:14px 0 18px }
  .swatch{
    width:44px;height:44px;border-radius:12px;background:var(--c);
    border:1px solid rgba(0,0,0,.06);cursor:pointer;
    box-shadow:inset 0 0 0 1px rgba(255,255,255,.3);
    transition:transform .15s ease, box-shadow .15s ease
  }
  .swatch:hover{ transform:translateY(-2px); box-shadow:0 8px 18px rgba(0,0,0,.15) }
  .btn-apply{ width:100%; border:none; background:#111827;color:#fff; padding:10px 14px;border-radius:12px;font-weight:700 }
  .btn-apply:hover{ filter:brightness(1.1) }
</style>

{{-- Expose CSRF token even if layout has no <meta> --}}
<script>window.Laravel = { csrfToken: @json(csrf_token()) };</script>

<script>
(function(){
  // --- helpers ---
  const q = document.getElementById('themeSearch');
  const cards = [...document.querySelectorAll('.theme-card')];

  const NAME2HEX = {
    black:'#000000', white:'#ffffff', gray:'#808080', grey:'#808080',
    silver:'#c0c0c0', charcoal:'#333333', graphite:'#3c3c41',
    red:'#ff0000', green:'#00ff00', blue:'#0000ff',
    navy:'#001f3f', teal:'#008080', cyan:'#00ffff',
    pink:'#ff66cc', purple:'#800080', orange:'#ffa500',
    gold:'#d4af37', brown:'#8b4513', beige:'#f5f5dc'
  };

  function hexFromInput(str){
    if(!str) return null;
    str = str.trim().toLowerCase();
    if(NAME2HEX[str]) return NAME2HEX[str];
    const rgb = str.match(/^rgba?\((\d+)\s*,\s*(\d+)\s*,\s*(\d+)/i);
    if(rgb){
      const [r,g,b] = rgb.slice(1,4).map(n=>Math.max(0,Math.min(255,parseInt(n,10))));
      return '#'+[r,g,b].map(v=>v.toString(16).padStart(2,'0')).join('');
    }
    const hx = str.match(/^#?([0-9a-f]{3}|[0-9a-f]{6})$/i);
    if(hx){
      let h = hx[1];
      if(h.length===3){ h = h[0]+h[0]+h[1]+h[1]+h[2]+h[2]; }
      return '#'+h.toLowerCase();
    }
    return null;
  }

  function hexToRgb(hex){
    const m = (hex||'').toLowerCase().match(/^#([0-9a-f]{6})$/);
    if(!m) return null;
    const n = parseInt(m[1],16);
    return { r:(n>>16)&255, g:(n>>8)&255, b:n&255 };
  }

  function colorDist(h1,h2){
    const a = hexToRgb(h1), b = hexToRgb(h2);
    if(!a||!b) return Infinity;
    const dr=a.r-b.r,dg=a.g-b.g,db=a.b-b.b;
    return Math.sqrt(dr*dr+dg*dg+db*db);
  }

  q?.addEventListener('input', () => {
    const term = q.value.trim().toLowerCase();
    const singleHex = hexFromInput(term);
    cards.forEach(card => {
      const hay = (card.dataset.name + ' ' + card.dataset.tags);
      if(singleHex){
        const colors = JSON.parse(card.dataset.colors || '[]');
        const match = colors.some(c => colorDist(singleHex, c) < 60);
        card.style.display = match ? '' : 'none';
      } else {
        card.style.display = hay.includes(term) ? '' : 'none';
      }
    });
  });

  // copy swatch
  document.querySelectorAll('.swatch').forEach(s=>{
    s.addEventListener('click', async () => {
      const hex = getComputedStyle(s).getPropertyValue('--c').trim();
      try{ await navigator.clipboard.writeText(hex); }catch(e){}
      toast('Copied ' + hex);
    });
  });

  // live preview
  function applyCssVars(colors){
    const root = document.documentElement;
    for(let i=0;i<8;i++){
      const v = colors[i] || colors[0] || '#111827';
      root.style.setProperty(`--theme-c${i}`, v);
    }
    root.style.setProperty('--color-bg', 'var(--theme-c0)');
    root.style.setProperty('--color-surface', 'var(--theme-c1)');
    root.style.setProperty('--color-muted', 'var(--theme-c2)');
    root.style.setProperty('--color-text', 'var(--theme-c3)');
    root.style.setProperty('--color-primary', 'var(--theme-c4)');
    root.style.setProperty('--color-accent', 'var(--theme-c5)');

    const s = document.getElementById('active-theme');
    if (s) {
      const vars = Array.from({length:8}).map((_,i)=>`--theme-c${i}:${colors[i]||colors[0]||'#111827'}`).join(';');
      s.textContent = `:root{${vars};
        --color-bg:var(--theme-c0);--color-surface:var(--theme-c1);--color-muted:var(--theme-c2);
        --color-text:var(--theme-c3);--color-primary:var(--theme-c4);--color-accent:var(--theme-c5)}
        body{background:var(--color-bg);color:var(--color-text)}
        .btn-primary,.btn-apply{background:var(--color-primary)!important;border-color:var(--color-primary)!important}
        .card,.theme-card{background:var(--color-surface)} a{color:var(--color-accent)}`;
    }
  }

  // saver (with cookies + csrf)
  const SAVE_URL = "{{ route('admin.themes.apply') }}";
  async function saveTheme(theme){
    const metaToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    const token = metaToken || (window.Laravel && window.Laravel.csrfToken) || '';

    const res = await fetch(SAVE_URL, {
      method: 'POST',
      headers: {
        'Content-Type':'application/json',
        'Accept':'application/json',
        'X-Requested-With':'XMLHttpRequest',
        'X-CSRF-TOKEN': token
      },
      credentials: 'include',   // ⚠️ send session cookie
      body: JSON.stringify(theme)
    });

    const text = await res.text();
    let json;
    try { json = JSON.parse(text); } catch(e) {}

    if(!res.ok) {
      const msg = json?.hint || json?.error || `HTTP ${res.status}`;
      throw new Error(msg);
    }
    return json || { ok:true };
  }

  document.querySelectorAll('.apply-theme').forEach(btn=>{
    btn.addEventListener('click', async () => {
      const data = JSON.parse(btn.dataset.theme);
      // preview
      applyCssVars(data.colors || []);
      // persist
      btn.disabled = true;
      const old = btn.innerHTML;
      btn.innerHTML = '<i class="fa fa-spinner fa-spin me-2"></i>Saving…';
      try {
        localStorage.setItem('active_theme', JSON.stringify(data));
        await saveTheme(data);
        toast(`Theme “${data.name}” applied site-wide`);
      } catch (e) {
        toast(`Could not save theme: ${e.message}`);
      } finally {
        btn.disabled = false;
        btn.innerHTML = old;
      }
    });
  });

  function toast(msg){
    const el = document.createElement('div');
    el.textContent = msg;
    Object.assign(el.style,{
      position:'fixed', right:'16px', bottom:'16px', zIndex:9999,
      padding:'10px 14px', color:'#fff', borderRadius:'10px',
      background:'linear-gradient(90deg,#ff0055,#ff8a00,#ffee00,#00d084,#00b0ff,#7a00ff,#ff00c8,#ff0055)',
      backgroundSize:'400% 100%',
      boxShadow:'0 10px 24px rgba(0,0,0,.25)', fontWeight:'700'
    });
    document.body.appendChild(el);
    setTimeout(()=> el.remove(), 1800);
  }
})();
</script>

@endsection
