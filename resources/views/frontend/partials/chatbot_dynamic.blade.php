{{-- ═══════════════════════════════════════════════════════════════
     CHATBOT — Repair + Buy (Dynamic from DB)
     categories → device_types → modals → prices/product_specs
═══════════════════════════════════════════════════════════════ --}}

@php
use Illuminate\Support\Facades\DB;
use App\Models\SiteSetting;

$chatSetting      = SiteSetting::first();
$chatBusinessName = $chatSetting->buisness_name ?? 'QuickFix';
$chatWaRaw        = $chatSetting->whatsapp_number ?? '';
$chatWaNum        = preg_replace('/\D+/', '', $chatWaRaw);
$chatSiteUrl      = rtrim($chatSetting->website_url ?? url('/'), '/');

// Repair Categories
$chatRepairCatIcons = [4 => '📱', 10 => '💻', 11 => '📲', 12 => '🎮'];
$repairCats = DB::table('categories')
    ->whereIn('id', [4, 10, 11, 12])
    ->where('status', 'Publish')
    ->whereNull('deleted_at')
    ->select('id', 'name', 'slug')
    ->orderBy('sort_order')
    ->get();

$chatRepairCats = [];
foreach ($repairCats as $c) {
    $chatRepairCats[] = [
        'id'   => $c->id,
        'name' => $c->name,
        'slug' => $c->slug,
        'icon' => $chatRepairCatIcons[$c->id] ?? '🔧',
    ];
}
@endphp

<style>
:root{--hr-primary:#00c6ff;--hr-bg:#141820;--hr-surface:#232b3e;--hr-surface2:#2a3349;--hr-border:rgba(255,255,255,0.08);--hr-text:#e8edf5;--hr-text-muted:#7a8aaa;--hr-green:#22c55e;--hr-radius:16px;--hr-shadow:0 24px 64px rgba(0,0,0,0.55)}
.hr-fab{position:fixed;bottom:85px;right:20px;width:55px;height:55px;border-radius:50%;background:linear-gradient(135deg,#00c6ff,#0070f3);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;color:white;font-size:22px;box-shadow:0 6px 24px rgba(0,198,255,0.5);transition:transform 0.3s cubic-bezier(0.34,1.56,0.64,1),box-shadow 0.3s;z-index:1001}
.hr-fab:hover{transform:scale(1.1);box-shadow:0 10px 32px rgba(0,198,255,0.65)}
.hr-fab .ic-open{transition:opacity 0.2s,transform 0.2s}
.hr-fab .ic-close{position:absolute;opacity:0;transform:rotate(-90deg);transition:opacity 0.2s,transform 0.2s;font-size:17px}
.hr-fab.active .ic-open{opacity:0;transform:rotate(90deg)}
.hr-fab.active .ic-close{opacity:1;transform:rotate(0)}
.hr-fab-badge{position:absolute;top:-4px;right:-4px;width:18px;height:18px;background:#ff4757;border-radius:50%;border:2px solid #fff;font-size:10px;font-weight:700;color:white;display:flex;align-items:center;justify-content:center;animation:hr-badge-pulse 2s infinite}
@keyframes hr-badge-pulse{0%,100%{transform:scale(1)}50%{transform:scale(1.25)}}

/* ── MAIN FIX: Window positioning ── */
.hr-win{
    position:fixed;
    bottom:90px;
    right:20px;
    width:370px;
    height:min(540px, calc(100dvh - 160px));
    max-height:calc(100dvh - 160px);
    background:var(--hr-bg);
    border-radius:var(--hr-radius);
    border:1px solid var(--hr-border);
    box-shadow:var(--hr-shadow);
    display:flex;
    flex-direction:column;
    overflow:hidden;
    z-index:1002;
    opacity:0;
    transform:translateY(18px) scale(0.95);
    pointer-events:none;
    transition:opacity 0.3s ease,transform 0.35s cubic-bezier(0.34,1.56,0.64,1);
    transform-origin:bottom right;
    font-family:'DM Sans',sans-serif
}
.hr-win.open{opacity:1;transform:translateY(0) scale(1);pointer-events:all}
.hr-win-head{background:linear-gradient(135deg,#0d1a3a,#0f2040);padding:14px 16px;display:flex;align-items:center;gap:11px;border-bottom:1px solid var(--hr-border);flex-shrink:0}
.hr-avatar{width:38px;height:38px;background:linear-gradient(135deg,#00c6ff,#0070f3);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:15px;color:white;flex-shrink:0}
.hr-head-info{flex:1}
.hr-head-name{font-family:'Syne',sans-serif;font-weight:700;font-size:13.5px;color:var(--hr-text);line-height:1.2}
.hr-head-status{font-size:11px;color:var(--hr-green);display:flex;align-items:center;gap:4px;margin-top:2px}
.hr-online-dot{width:6px;height:6px;background:var(--hr-green);border-radius:50%;animation:hr-blink 2s infinite}
@keyframes hr-blink{0%,100%{opacity:1}50%{opacity:0.35}}
.hr-head-btns{display:flex;gap:5px}
.hr-head-btn{width:28px;height:28px;background:rgba(255,255,255,0.06);border:1px solid var(--hr-border);border-radius:7px;color:var(--hr-text-muted);cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:11px;transition:background 0.2s,color 0.2s}
.hr-head-btn:hover{background:rgba(255,255,255,0.13);color:var(--hr-text)}
.hr-msgs{flex:1;overflow-y:auto;padding:14px;display:flex;flex-direction:column;gap:9px;scroll-behavior:smooth}
.hr-msgs::-webkit-scrollbar{width:3px}
.hr-msgs::-webkit-scrollbar-thumb{background:var(--hr-surface2);border-radius:3px}
.hr-msg{max-width:88%;animation:hr-min 0.22s cubic-bezier(0.34,1.56,0.64,1)}
@keyframes hr-min{from{opacity:0;transform:translateY(7px) scale(0.95)}to{opacity:1;transform:none}}
.hr-msg.bot{align-self:flex-start}
.hr-msg.user{align-self:flex-end}
.hr-bubble{padding:9px 13px;border-radius:13px;font-size:13px;line-height:1.5}
.hr-msg.bot .hr-bubble{background:var(--hr-surface);color:var(--hr-text);border-radius:3px 13px 13px 13px}
.hr-msg.user .hr-bubble{background:linear-gradient(135deg,#00c6ff,#0070f3);color:#fff;border-radius:13px 3px 13px 13px}
.hr-bubble a{color:var(--hr-primary)}
.hr-typing{align-self:flex-start;display:flex;align-items:center;gap:4px;padding:9px 13px;background:var(--hr-surface);border-radius:3px 13px 13px 13px;margin:0 14px 6px}
.hr-typing span{width:6px;height:6px;background:var(--hr-text-muted);border-radius:50%;animation:hr-tdot 1.2s infinite}
.hr-typing span:nth-child(2){animation-delay:.2s}
.hr-typing span:nth-child(3){animation-delay:.4s}
@keyframes hr-tdot{0%,80%,100%{transform:scale(1);opacity:.45}40%{transform:scale(1.3);opacity:1}}
.hr-qr{padding:6px 12px 4px;display:flex;flex-wrap:wrap;gap:6px;flex-shrink:0}
.hr-qr-btn{padding:6px 12px;background:var(--hr-surface);border:1px solid var(--hr-border);border-radius:100px;color:var(--hr-primary);font-size:12px;font-weight:500;cursor:pointer;transition:background .2s,border-color .2s,transform .15s;white-space:nowrap;font-family:'DM Sans',sans-serif}
.hr-qr-btn:hover{background:var(--hr-surface2);border-color:var(--hr-primary);transform:translateY(-1px)}
.hr-grid{display:grid;grid-template-columns:1fr 1fr;gap:7px;margin-top:7px}
.hr-grid.c1{grid-template-columns:1fr}
.hr-grid.c3{grid-template-columns:1fr 1fr 1fr}
.hr-step-card{background:var(--hr-surface2);border:1px solid var(--hr-border);border-radius:9px;padding:11px;cursor:pointer;text-align:center;transition:border-color .2s,background .2s,transform .15s;color:var(--hr-text);font-size:12px;font-weight:500;font-family:'DM Sans',sans-serif}
.hr-step-card:hover{border-color:var(--hr-primary);background:rgba(0,198,255,0.07);transform:translateY(-2px)}
.hr-step-card.buy-card:hover{border-color:#a78bfa;background:rgba(167,139,250,0.07)}
.hr-step-card .si{font-size:20px;margin-bottom:5px;display:block}
.hr-loader{grid-column:1/-1;text-align:center;padding:16px;color:var(--hr-text-muted);font-size:12px}
.hr-loader i{animation:hr-spin 1s linear infinite;display:inline-block;margin-right:6px}
@keyframes hr-spin{to{transform:rotate(360deg)}}

/* ── Buy Product Card ─────────────────────────────────────── */
.hr-product-card{background:var(--hr-surface);border:1px solid var(--hr-border);border-radius:11px;overflow:hidden;margin-bottom:8px;transition:border-color .2s}
.hr-product-card:hover{border-color:#a78bfa}
.hr-product-img{width:100%;height:110px;object-fit:cover;display:block;background:var(--hr-surface2)}
.hr-product-img-placeholder{width:100%;height:80px;background:var(--hr-surface2);display:flex;align-items:center;justify-content:center;font-size:30px}
.hr-product-info{padding:10px 12px}
.hr-product-name{font-size:11px;color:var(--hr-text-muted);margin-bottom:3px}
.hr-product-price{font-family:'Syne',sans-serif;font-size:24px;font-weight:800;color:#a78bfa;margin-bottom:6px}
.hr-product-badges{display:flex;flex-wrap:wrap;gap:4px;margin-bottom:8px}
.hr-badge{padding:2px 7px;border-radius:100px;font-size:10px;font-weight:600}
.hr-badge.memory{background:rgba(0,198,255,0.15);color:var(--hr-primary)}
.hr-badge.condition{background:rgba(34,197,94,0.15);color:var(--hr-green)}
.hr-badge.color{background:rgba(167,139,250,0.15);color:#a78bfa}
.hr-badge.unlocked{background:rgba(251,191,36,0.15);color:#fbbf24}
.hr-badge.grade{background:rgba(249,115,22,0.15);color:#f97316}

/* ── Quote/Booking Card ───────────────────────────────────── */
.hr-card{background:var(--hr-surface);border:1px solid var(--hr-border);border-radius:11px;overflow:hidden;font-size:13px;width:100%}
.hr-card-head{background:linear-gradient(135deg,#0d1a3a,#0a1628);padding:9px 13px;font-family:'Syne',sans-serif;font-size:11px;font-weight:700;color:var(--hr-primary);letter-spacing:.5px;text-transform:uppercase}
.hr-card-head.buy{color:#a78bfa}
.hr-card-body{padding:11px 13px}
.hr-card-row{display:flex;justify-content:space-between;align-items:center;padding:5px 0;border-bottom:1px solid var(--hr-border);font-size:12.5px;color:var(--hr-text-muted)}
.hr-card-row:last-child{border-bottom:none}
.hr-card-row strong{color:var(--hr-text)}
.hr-price{font-family:'Syne',sans-serif;font-size:26px;font-weight:800;color:var(--hr-primary)}
.hr-price.buy{color:#a78bfa}
.hr-card-acts{display:flex;flex-direction:column;gap:7px;margin-top:11px}
.hr-btn{display:flex;align-items:center;justify-content:center;gap:7px;padding:9px;border-radius:9px;font-size:12.5px;font-weight:600;cursor:pointer;text-decoration:none;border:none;transition:opacity .2s,transform .15s;font-family:'DM Sans',sans-serif}
.hr-btn:hover{opacity:.86;transform:translateY(-1px)}
.hr-btn.p{background:linear-gradient(135deg,#00c6ff,#0070f3);color:#fff}
.hr-btn.buy-p{background:linear-gradient(135deg,#a78bfa,#7c3aed);color:#fff}
.hr-btn.wa{background:rgba(34,197,94,.14);border:1px solid rgba(34,197,94,.3);color:#22c55e}
.hr-btn.g{background:var(--hr-surface2);color:var(--hr-text)}
.hr-input-area{padding:9px 13px 13px;flex-shrink:0;border-top:1px solid var(--hr-border)}
.hr-input-row{display:flex;gap:7px;align-items:center}
.hr-inp{flex:1;background:var(--hr-surface);border:1px solid var(--hr-border);border-radius:100px;padding:9px 15px;color:var(--hr-text);font-size:13px;font-family:'DM Sans',sans-serif;outline:none;transition:border-color .2s}
.hr-inp:focus{border-color:var(--hr-primary)}
.hr-inp::placeholder{color:var(--hr-text-muted)}
.hr-send{width:36px;height:36px;background:linear-gradient(135deg,#00c6ff,#0070f3);border:none;border-radius:50%;color:#fff;cursor:pointer;display:flex;align-items:center;justify-content:center;font-size:12px;flex-shrink:0;transition:transform .2s,box-shadow .2s}
.hr-send:hover{transform:scale(1.1);box-shadow:0 4px 14px rgba(0,198,255,.45)}

/* ── Responsive ───────────────────────────────────────────── */
@media(max-width:420px){
    .hr-win{width:calc(100vw - 16px);right:8px;bottom:80px;max-height:calc(100vh - 100px)}
    .hr-fab{right:12px;bottom:75px}
}
@media(min-width:421px){
    .hr-win{right:20px;bottom:90px}
}
</style>

<!-- FAB Button -->
<button class="hr-fab" id="hrFab" onclick="hrToggle()">
    <div class="hr-fab-badge" id="hrBadge">1</div>
    <i class="fa fa-comment-dots ic-open"></i>
    <i class="fa fa-times ic-close"></i>
</button>

<!-- Chat Window -->
<div class="hr-win" id="hrWin">
    <div class="hr-win-head">
        <div class="hr-avatar"><i class="fa fa-bolt"></i></div>
        <div class="hr-head-info">
            <div class="hr-head-name">{{ $chatBusinessName }} Assistant</div>
            <div class="hr-head-status"><span class="hr-online-dot"></span> Online — Replies instantly</div>
        </div>
        <div class="hr-head-btns">
            <button class="hr-head-btn" onclick="hrReset()" title="Restart"><i class="fa fa-rotate-right"></i></button>
            <button class="hr-head-btn" onclick="hrToggle()" title="Close"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="hr-msgs" id="hrMsgs"></div>
    <div class="hr-typing" id="hrTyping" style="display:none"><span></span><span></span><span></span></div>
    <div class="hr-qr" id="hrQR"></div>
    <div class="hr-input-area">
        <div class="hr-input-row">
            <input type="text" class="hr-inp" id="hrInp" placeholder="Type a message..." autocomplete="off">
            <button class="hr-send" id="hrSendBtn"><i class="fa fa-paper-plane"></i></button>
        </div>
    </div>
</div>

<!-- PHP → JS -->
<script>
var HR_WA_NUM    = '{{ $chatWaNum }}';
var HR_BUSINESS  = '{{ $chatBusinessName }}';
var HR_SITE_URL  = '{{ $chatSiteUrl }}';
var HR_REPAIR_CATS = @json($chatRepairCats);
</script>

<script>
// ── State ─────────────────────────────────────────────────────
var S = {
    mode: null,
    step: 'menu',
    cat: null,
    brand: null,
    model: null,
    buySpecs: [],
    selectedMemory: null,
    selectedCondition: null,
    selectedColor: null
};

function $m()  { return document.getElementById('hrMsgs');   }
function $ty() { return document.getElementById('hrTyping'); }
function $qr() { return document.getElementById('hrQR');     }

// ── Init ──────────────────────────────────────────────────────
(function init(){
    var inp = document.getElementById('hrInp');
    var btn = document.getElementById('hrSendBtn');
    if (inp && btn) {
        btn.addEventListener('click', hrSend);
        inp.addEventListener('keydown', function(e){ if(e.key==='Enter') hrSend(); });
        setTimeout(hrGreeting, 700);
    } else {
        setTimeout(init, 100);
    }
})();

// ── Toggle ────────────────────────────────────────────────────
function hrToggle(){
    var fab = document.getElementById('hrFab');
    var win = document.getElementById('hrWin');
    if(!fab||!win) return;
    fab.classList.toggle('active');
    win.classList.toggle('open');
    document.getElementById('hrBadge').style.display = 'none';
}

// ── Reset ─────────────────────────────────────────────────────
function hrReset(){
    S = { mode:null, step:'menu', cat:null, brand:null, model:null, buySpecs:[], selectedMemory:null, selectedCondition:null, selectedColor:null };
    $m().innerHTML = '';
    $qr().innerHTML = '';
    setTimeout(hrGreeting, 250);
}

// ── AJAX helper ───────────────────────────────────────────────
function ajax(url, cb){
    fetch(url, { headers:{'X-Requested-With':'XMLHttpRequest','Accept':'application/json'} })
        .then(function(r){ return r.json(); })
        .then(cb)
        .catch(function(){ botMsg('⚠️ Connection error. <a href="'+HR_SITE_URL+'" target="_blank">Visit our website</a>.'); });
}

// ── FAQ ───────────────────────────────────────────────────────
var HR_FAQS = [
    { q:'🕒 Opening hours?',    a:"We're open <strong>Mon–Sat 9:00–17:30</strong> and <strong>Sunday 11:00–16:00</strong>. Walk-ins welcome!" },
    { q:'📍 Where are you?',    a:'Find our stores at <a href="'+HR_SITE_URL+'/stores" target="_blank">View Our Stores →</a>' },
    { q:'🛡️ Repair warranty?', a:'All repairs come with a <strong>90-day warranty</strong>. Something wrong? We fix it free!' },
    { q:'⏱️ How long?',         a:'Most repairs take <strong>under 1 hour</strong> while you wait. Complex ones may take longer.' },
    { q:'💳 Payment methods?',  a:'We accept <strong>Cash, Card (Visa/Mastercard), and Contactless</strong>. Payment after repair.' },
    { q:'🔒 Will I lose data?', a:'We protect your data. We recommend <strong>backing up your device</strong> before any repair.' },
];

// ── GREETING ──────────────────────────────────────────────────
function hrGreeting(){
    botMsg("Hi there! 👋 I'm the <strong>" + HR_BUSINESS + "</strong> assistant.");
    setTimeout(function(){
        botMsg("How can I help you today?");
        setTimeout(showMainMenu, 400);
    }, 800);
}

// ── MAIN MENU ─────────────────────────────────────────────────
function showMainMenu(){
    var wrap = mkWrap('bot');
    var grid = document.createElement('div');
    grid.style.cssText = 'display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;margin-top:7px;';

    var btnR = mkMenuCard('🔧', 'Book a Repair', 'Get instant quote');
    btnR.onclick = function(){
        clearQR(); userMsg('🔧 Book a Repair');
        S.mode = 'repair'; S.step = 'cat';
        typing(function(){
            botMsg("Great! What type of device needs repair?");
            setTimeout(showRepairCatGrid, 300);
        });
    };

    var btnB = mkMenuCard('🛍️', 'Buy a Device', 'Browse our stock', true);
    btnB.onclick = function(){
        clearQR(); userMsg('🛍️ Buy a Device');
        S.mode = 'buy'; S.step = 'cat';
        typing(function(){
            botMsg("Great! What type of device are you looking for?");
            setTimeout(loadBuyCategories, 300);
        });
    };

    var btnQ = mkMenuCard('💬', 'Ask a Question', 'Common queries');
    btnQ.onclick = function(){
        clearQR(); userMsg('💬 Ask a Question');
        typing(function(){
            botMsg("Sure! Select a question or type your own:");
            setTimeout(showFaqList, 300);
        });
    };

    grid.appendChild(btnR);
    grid.appendChild(btnB);
    grid.appendChild(btnQ);
    wrap.appendChild(grid);
    $m().appendChild(wrap);
    scr();
}

function mkMenuCard(icon, title, sub, isBuy){
    var b = document.createElement('button');
    b.className = 'hr-step-card' + (isBuy ? ' buy-card' : '');
    b.innerHTML =
        '<span style="font-size:22px;display:block;margin-bottom:5px;">' + icon + '</span>' +
        '<span style="font-size:11px;font-weight:700;line-height:1.3;display:block;">' + title + '</span>' +
        '<span style="font-size:10px;color:var(--hr-text-muted);display:block;margin-top:2px;">' + sub + '</span>';
    return b;
}

// ═══════════════════════════════════════════════════════════════
//  REPAIR FLOW
// ═══════════════════════════════════════════════════════════════

function showRepairCatGrid(){
    var wrap = mkWrap('bot'), grid = mkGrid();
    HR_REPAIR_CATS.forEach(function(cat){
        var btn = mkCard(cat.icon, cat.name);
        btn.onclick = function(){ pickRepairCat(cat); };
        grid.appendChild(btn);
    });
    wrap.appendChild(grid); $m().appendChild(wrap); scr();
}

function pickRepairCat(cat){
    S.cat = cat; S.step = 'brand'; clearQR();
    userMsg(cat.icon + ' ' + cat.name);
    typing(function(){
        botMsg('Which <strong>brand</strong> is your device?');
        loadRepairBrands(cat.id);
    });
}

function loadRepairBrands(catId){
    var wrap = mkWrap('bot'), grid = mkGrid();
    grid.innerHTML = '<div class="hr-loader"><i class="fa fa-circle-notch"></i> Loading brands...</div>';
    wrap.appendChild(grid); $m().appendChild(wrap); scr();
    ajax('/chatbot/brands?category_id=' + catId, function(brands){
        grid.innerHTML = '';
        if(!brands.length){ grid.innerHTML = '<div class="hr-loader">No brands found</div>'; return; }
        brands.forEach(function(b){
            var btn = mkCard(b.icon || '📱', b.name, true);
            btn.onclick = function(){ pickRepairBrand(b); };
            grid.appendChild(btn);
        });
        scr();
    });
}

function pickRepairBrand(b){
    S.brand = b; S.step = 'model'; clearQR();
    userMsg(b.name);
    typing(function(){
        botMsg('Which <strong>' + b.name + '</strong> model do you have?');
        loadRepairModels(b.id);
    });
}

function loadRepairModels(brandId){
    var wrap = mkWrap('bot'), grid = mkGrid('c1');
    grid.innerHTML = '<div class="hr-loader"><i class="fa fa-circle-notch"></i> Loading models...</div>';
    wrap.appendChild(grid); $m().appendChild(wrap); scr();
    ajax('/chatbot/models?brand_id=' + brandId, function(models){
        grid.innerHTML = '';
        if(!models.length){ grid.innerHTML = '<div class="hr-loader">No models found</div>'; return; }
        models.forEach(function(m){
            var btn = document.createElement('button');
            btn.className = 'hr-step-card';
            btn.style.cssText = 'text-align:left;padding:9px 13px;font-size:12px;';
            btn.innerHTML = '<i class="fa fa-chevron-right" style="font-size:9px;color:var(--hr-primary);margin-right:7px;"></i>' + m.name;
            btn.onclick = function(){ pickRepairModel(m); };
            grid.appendChild(btn);
        });
        scr();
    });
}

function pickRepairModel(m){
    S.model = m; S.step = 'repair'; clearQR();
    userMsg(m.name);
    typing(function(){
        botMsg("What's the issue with your <strong>" + m.name + "</strong>?");
        loadRepairs(m.id);
    });
}

function loadRepairs(modelId){
    var wrap = mkWrap('bot'), grid = mkGrid();
    grid.innerHTML = '<div class="hr-loader" style="grid-column:1/-1"><i class="fa fa-circle-notch"></i> Loading repairs...</div>';
    wrap.appendChild(grid); $m().appendChild(wrap); scr();
    ajax('/chatbot/repairs?model_id=' + modelId, function(repairs){
        grid.innerHTML = '';
        if(!repairs.length){
            grid.innerHTML = '<div class="hr-loader" style="grid-column:1/-1">No repairs found. <a href="https://api.whatsapp.com/send?phone='+HR_WA_NUM+'" target="_blank" style="color:var(--hr-primary)">WhatsApp us</a>.</div>';
            scr(); return;
        }
        repairs.forEach(function(r){
            var btn = document.createElement('button');
            btn.className = 'hr-step-card';
            var priceHtml = '';
            if(r.price_type === 'quotation'){
                priceHtml = '<span style="font-size:11px;font-weight:700;color:#f59e0b;">Ask a Quote</span>';
            } else if(r.price_type === 'free_booking'){
                priceHtml = '<span style="font-size:11px;font-weight:700;color:var(--hr-green);">Free Booking</span>';
            } else {
                priceHtml = '<span style="font-size:13px;font-weight:700;color:var(--hr-primary);">£' + parseFloat(r.price).toFixed(0) + '</span>';
            }
            btn.innerHTML =
                '<span style="font-size:11px;font-weight:600;color:var(--hr-text);display:block;margin-bottom:4px;">' + r.repair_name + '</span>' +
                priceHtml;
            btn.onclick = function(){ pickRepair(r); };
            grid.appendChild(btn);
        });
        scr();
    });
}

function pickRepair(r){
    S.step = 'done'; clearQR(); userMsg(r.repair_name);
    var waMsg = encodeURIComponent('Hi! I\'d like to book a repair for my ' + S.brand.name + ' ' + S.model.name + ' — ' + r.repair_name + (r.price ? ' (£' + parseFloat(r.price).toFixed(0) + ')' : ''));
    typing(function(){
        var wrap = mkWrap('bot');
        wrap.style.cssText = 'max-width:100%;width:100%;';
        var devInfo =
            '<div class="hr-card-row"><span>Device</span><strong>' + S.brand.name + ' ' + S.model.name + '</strong></div>' +
            '<div class="hr-card-row"><span>Repair</span><strong>' + r.repair_name + '</strong></div>';
        var acts = '', head = '';

        if(r.price_type === 'quotation'){
            head = '📋 Get a Quote';
            acts = '<p style="margin:8px 0 6px;font-size:12px;color:var(--hr-text-muted);">Price varies — get a free quote!</p>' +
                '<a href="' + r.url + '" target="_blank" class="hr-btn p"><i class="fa fa-file-lines"></i> Ask a Quotation</a>' +
                '<a href="https://api.whatsapp.com/send?phone=' + HR_WA_NUM + '&text=' + waMsg + '" target="_blank" class="hr-btn wa"><i class="fab fa-whatsapp"></i> WhatsApp for Quote</a>';
        } else if(r.price_type === 'free_booking'){
            head = '🎁 Free Repair Booking';
            acts = '<p style="margin:8px 0 6px;font-size:12px;color:var(--hr-green);">This repair qualifies for a FREE booking!</p>' +
                '<a href="' + r.url + '" target="_blank" class="hr-btn p" style="background:linear-gradient(135deg,#22c55e,#16a34a);"><i class="fa fa-calendar-check"></i> Book Free Repair</a>' +
                '<a href="https://api.whatsapp.com/send?phone=' + HR_WA_NUM + '&text=' + waMsg + '" target="_blank" class="hr-btn wa"><i class="fab fa-whatsapp"></i> WhatsApp Us</a>';
        } else {
            head = '✅ Instant Quote';
            acts = '<div class="hr-card-row"><span>Warranty</span><strong>🛡️ 90 days</strong></div>' +
                '<div style="margin:11px 0 3px;"><div style="font-size:11px;color:var(--hr-text-muted);margin-bottom:1px;">Repair Price</div><div class="hr-price">£' + parseFloat(r.price).toFixed(0) + '</div></div>' +
                '<a href="' + r.url + '" target="_blank" class="hr-btn p"><i class="fa fa-calendar-check"></i> Book This Repair</a>' +
                '<a href="https://api.whatsapp.com/send?phone=' + HR_WA_NUM + '&text=' + waMsg + '" target="_blank" class="hr-btn wa"><i class="fab fa-whatsapp"></i> WhatsApp Us</a>' +
                '<button class="hr-btn g" onclick="hrReset()"><i class="fa fa-rotate-right"></i> Check Another Device</button>';
        }

        wrap.innerHTML = '<div class="hr-card"><div class="hr-card-head">' + head + '</div><div class="hr-card-body">' + devInfo + acts + '</div></div>';
        $m().appendChild(wrap); scr();
        setTimeout(function(){ botMsg('Tap the button above to proceed. Walk-ins also welcome! 🚶'); }, 500);
    });
}

// ═══════════════════════════════════════════════════════════════
//  BUY FLOW
// ═══════════════════════════════════════════════════════════════

function loadBuyCategories(){
    var wrap = mkWrap('bot'), grid = mkGrid();
    grid.innerHTML = '<div class="hr-loader"><i class="fa fa-circle-notch"></i> Loading categories...</div>';
    wrap.appendChild(grid); $m().appendChild(wrap); scr();
    ajax('/chatbot/buy-categories', function(cats){
        grid.innerHTML = '';
        if(!cats.length){ grid.innerHTML = '<div class="hr-loader">No categories found</div>'; return; }
        cats.forEach(function(cat){
            var btn = mkCard(cat.icon || '📦', cat.name);
            btn.classList.add('buy-card');
            btn.onclick = function(){ pickBuyCat(cat); };
            grid.appendChild(btn);
        });
        scr();
    });
}

function pickBuyCat(cat){
    S.cat = cat; S.step = 'brand'; clearQR();
    userMsg(cat.icon + ' ' + cat.name);
    typing(function(){
        botMsg('Which <strong>brand</strong> are you looking for?');
        loadBuyBrands(cat.id);
    });
}

function loadBuyBrands(catId){
    var wrap = mkWrap('bot'), grid = mkGrid();
    grid.innerHTML = '<div class="hr-loader"><i class="fa fa-circle-notch"></i> Loading brands...</div>';
    wrap.appendChild(grid); $m().appendChild(wrap); scr();
    ajax('/chatbot/buy-brands?category_id=' + catId, function(brands){
        grid.innerHTML = '';
        if(!brands.length){ grid.innerHTML = '<div class="hr-loader">No brands found</div>'; return; }
        brands.forEach(function(b){
            var btn = mkCard(b.icon || '📱', b.name, true);
            btn.classList.add('buy-card');
            btn.onclick = function(){ pickBuyBrand(b); };
            grid.appendChild(btn);
        });
        scr();
    });
}

function pickBuyBrand(b){
    S.brand = b; S.step = 'model'; clearQR();
    userMsg(b.name);
    typing(function(){
        botMsg('Which <strong>' + b.name + '</strong> model are you interested in?');
        loadBuyModels(b.id);
    });
}

function loadBuyModels(brandId){
    var wrap = mkWrap('bot'), grid = mkGrid('c1');
    grid.innerHTML = '<div class="hr-loader"><i class="fa fa-circle-notch"></i> Loading models...</div>';
    wrap.appendChild(grid); $m().appendChild(wrap); scr();
    ajax('/chatbot/buy-models?brand_id=' + brandId, function(models){
        grid.innerHTML = '';
        if(!models.length){
            grid.innerHTML = '<div class="hr-loader">No stock available. <a href="'+HR_SITE_URL+'/guest-buy-products" target="_blank" style="color:var(--hr-primary)">View all devices →</a></div>';
            scr(); return;
        }
        models.forEach(function(m){
            var btn = document.createElement('button');
            btn.className = 'hr-step-card buy-card';
            btn.style.cssText = 'text-align:left;padding:9px 13px;font-size:12px;';
            btn.innerHTML = '<i class="fa fa-chevron-right" style="font-size:9px;color:#a78bfa;margin-right:7px;"></i>' + m.name;
            btn.onclick = function(){ pickBuyModel(m); };
            grid.appendChild(btn);
        });
        scr();
    });
}

function pickBuyModel(m){
    S.model = m; S.step = 'memory'; clearQR();
    userMsg(m.name);
    typing(function(){
        botMsg('Let me check available variants for <strong>' + m.name + '</strong>...');
        loadBuySpecs(m.id);
    });
}

function loadBuySpecs(modelId){
    ajax('/chatbot/buy-specs?model_id=' + modelId, function(specs){
        if(!specs.length){
            botMsg('Sorry, <strong>' + S.model.name + '</strong> is currently out of stock.');
            setTimeout(function(){
                var wrap = mkWrap('bot');
                wrap.style.cssText = 'max-width:100%;width:100%;';
                wrap.innerHTML =
                    '<div style="display:flex;flex-direction:column;gap:7px;">' +
                    '<a href="' + HR_SITE_URL + '/guest-buy-products" target="_blank" class="hr-btn buy-p"><i class="fa fa-store"></i> Browse All Devices</a>' +
                    '<button class="hr-btn g" onclick="hrReset()"><i class="fa fa-rotate-right"></i> Go Back</button>' +
                    '</div>';
                $m().appendChild(wrap); scr();
            }, 400);
            return;
        }

        S.buySpecs = specs;

        var memories = [];
        specs.forEach(function(s){
            if(s.memory_size && s.memory_size !== 'N/A' && memories.indexOf(s.memory_size) === -1){
                memories.push(s.memory_size);
            }
        });

        if(memories.length > 1){
            typing(function(){
                botMsg('Select <strong>storage size</strong>:');
                var wrap = mkWrap('bot'), grid = mkGrid();
                memories.forEach(function(mem){
                    var btn = mkCard('💾', mem, false);
                    btn.classList.add('buy-card');
                    btn.onclick = function(){ pickBuyMemory(mem); };
                    grid.appendChild(btn);
                });
                wrap.appendChild(grid); $m().appendChild(wrap); scr();
            });
        } else {
            pickBuyMemory(memories[0] || 'N/A');
        }
    });
}

function pickBuyMemory(mem){
    S.selectedMemory = mem;
    if(S.buySpecs.filter(function(s){ return s.memory_size !== 'N/A'; }).length > 1){
        userMsg('💾 ' + mem);
    }
    clearQR();

    var filtered = S.buySpecs.filter(function(s){
        return s.memory_size === mem || mem === 'N/A';
    });

    var conditions = [];
    filtered.forEach(function(s){
        if(s.condition && conditions.indexOf(s.condition) === -1){
            conditions.push(s.condition);
        }
    });

    if(conditions.length > 1){
        typing(function(){
            botMsg('Select <strong>condition</strong>:');
            var wrap = mkWrap('bot'), grid = mkGrid();
            var condIcons = {
                'Excellent' : '⭐',
                'Good'      : '👍',
                'Fair'      : '👌',
                'Refurbished': '🔧',
                'New'       : '✨',
                'Like New'  : '💎'
            };
            conditions.forEach(function(cond){
                var icon = condIcons[cond] || '📱';
                var btn = mkCard(icon, cond, false);
                btn.classList.add('buy-card');
                btn.onclick = function(){ pickBuyCondition(cond, filtered); };
                grid.appendChild(btn);
            });
            wrap.appendChild(grid); $m().appendChild(wrap); scr();
        });
    } else {
        pickBuyCondition(conditions[0] || '', filtered);
    }
}

function pickBuyCondition(cond, filtered){
    S.selectedCondition = cond;
    if(filtered.map(function(s){ return s.condition; }).filter(function(c,i,a){ return a.indexOf(c)===i; }).length > 1){
        userMsg('✅ ' + cond);
    }
    clearQR();

    var byCondition = filtered.filter(function(s){ return s.condition === cond; });
    if(!byCondition.length) byCondition = filtered;

    var colors = [];
    byCondition.forEach(function(s){
        if(s.color && s.color !== '' && colors.indexOf(s.color) === -1){
            colors.push(s.color);
        }
    });

    if(colors.length > 1){
        typing(function(){
            botMsg('Select <strong>color</strong>:');
            var wrap = mkWrap('bot'), grid = mkGrid();
            colors.forEach(function(color){
                var btn = mkCard('🎨', color, false);
                btn.classList.add('buy-card');
                btn.onclick = function(){ pickBuyColor(color, byCondition); };
                grid.appendChild(btn);
            });
            wrap.appendChild(grid); $m().appendChild(wrap); scr();
        });
    } else {
        pickBuyColor(colors[0] || '', byCondition);
    }
}

function pickBuyColor(color, byCondition){
    S.selectedColor = color;
    if(byCondition.map(function(s){ return s.color; }).filter(function(c,i,a){ return a.indexOf(c)===i; }).length > 1 && color){
        userMsg('🎨 ' + color);
    }
    clearQR();

    var match = null;
    if(color){
        match = byCondition.find(function(s){ return s.color === color; });
    }
    if(!match) match = byCondition[0];

    typing(function(){
        showBuyProductCard(match);
    });
}

function showBuyProductCard(spec){
    var wrap = mkWrap('bot');
    wrap.style.cssText = 'max-width:100%;width:100%;';

    var badges = '';
    if(spec.memory_size && spec.memory_size !== 'N/A') badges += '<span class="hr-badge memory">' + spec.memory_size + '</span>';
    if(spec.condition)     badges += '<span class="hr-badge condition">' + spec.condition + '</span>';
    if(spec.color)         badges += '<span class="hr-badge color">' + spec.color + '</span>';
    if(spec.grade)         badges += '<span class="hr-badge grade">Grade ' + spec.grade + '</span>';
    if(spec.network_unlocked === 'Yes') badges += '<span class="hr-badge unlocked">🔓 Unlocked</span>';

    var extraRows = '';
    if(spec.ram)         extraRows += '<div class="hr-card-row"><span>RAM</span><strong>' + spec.ram + '</strong></div>';
    if(spec.generation)  extraRows += '<div class="hr-card-row"><span>Generation</span><strong>' + spec.generation + '</strong></div>';
    if(spec.screen_size) extraRows += '<div class="hr-card-row"><span>Screen</span><strong>' + spec.screen_size + '</strong></div>';
    if(spec.warranty)    extraRows += '<div class="hr-card-row"><span>Warranty</span><strong>' + spec.warranty + '</strong></div>';
    if(spec.account_cleared === 'Yes') extraRows += '<div class="hr-card-row"><span>Account</span><strong>✅ Cleared</strong></div>';
    extraRows += '<div class="hr-card-row"><span>Stock</span><strong>' + spec.quantity + ' available</strong></div>';

    var imgHtml = spec.image
        ? '<img src="' + spec.image + '" class="hr-product-img" alt="' + spec.model_name + '" onerror="this.parentNode.innerHTML=\'<div class=hr-product-img-placeholder>📱</div>\'">'
        : '<div class="hr-product-img-placeholder">📱</div>';

    var waMsg = encodeURIComponent(
        'Hi! I\'m interested in buying ' + spec.model_name +
        (spec.memory_size && spec.memory_size !== 'N/A' ? ' ' + spec.memory_size : '') +
        (spec.condition ? ', ' + spec.condition : '') +
        (spec.color ? ', ' + spec.color : '') +
        ' for £' + parseFloat(spec.price).toFixed(0)
    );

    wrap.innerHTML =
        '<div class="hr-product-card">' +
            imgHtml +
            '<div class="hr-product-info">' +
                '<div class="hr-product-name">' + spec.model_name + '</div>' +
                '<div class="hr-product-price">£' + parseFloat(spec.price).toFixed(0) + '</div>' +
                '<div class="hr-product-badges">' + badges + '</div>' +
                (extraRows ? '<div style="margin-bottom:10px;">' + extraRows + '</div>' : '') +
                '<div class="hr-card-acts">' +
                    '<a href="' + spec.url + '" target="_blank" class="hr-btn buy-p">' +
                        '<i class="fa fa-cart-shopping"></i> View &amp; Buy — £' + parseFloat(spec.price).toFixed(0) +
                    '</a>' +
                    '<a href="https://api.whatsapp.com/send?phone=' + HR_WA_NUM + '&text=' + waMsg + '" target="_blank" class="hr-btn wa">' +
                        '<i class="fab fa-whatsapp"></i> Ask on WhatsApp' +
                    '</a>' +
                    '<button class="hr-btn g" onclick="hrReset()">' +
                        '<i class="fa fa-rotate-right"></i> Browse Again' +
                    '</button>' +
                '</div>' +
            '</div>' +
        '</div>';

    $m().appendChild(wrap);
    scr();

    setTimeout(function(){
        botMsg('✅ Tap <strong>View &amp; Buy</strong> to go to the product page. Walk-ins also welcome! 🚶');
    }, 400);
}

// ═══════════════════════════════════════════════════════════════
//  FAQ FLOW
// ═══════════════════════════════════════════════════════════════

function showFaqList(){
    var wrap = mkWrap('bot');
    var list = document.createElement('div');
    list.style.cssText = 'display:flex;flex-direction:column;gap:6px;margin-top:6px;';
    HR_FAQS.forEach(function(faq){
        var btn = document.createElement('button');
        btn.className = 'hr-qr-btn';
        btn.style.cssText = 'text-align:left;white-space:normal;padding:8px 12px;border-radius:9px;width:100%;';
        btn.textContent = faq.q;
        btn.onclick = function(){
            clearQR(); userMsg(faq.q);
            typing(function(){ botMsg(faq.a); setTimeout(showBackButtons, 400); });
        };
        list.appendChild(btn);
    });
    wrap.appendChild(list); $m().appendChild(wrap); scr();
}

function showBackButtons(){
    var wrap = mkWrap('bot');
    wrap.style.cssText = 'max-width:100%;width:100%;';
    wrap.innerHTML =
        '<div style="display:flex;gap:8px;flex-wrap:wrap;margin-top:4px;">' +
        '<button class="hr-qr-btn" onclick="clearQR();userMsg(\'❓ Ask another\');typing(function(){botMsg(\'Sure! Select a question:\');setTimeout(showFaqList,300);});">❓ Ask another</button>' +
        '<button class="hr-qr-btn" style="background:rgba(0,198,255,0.1);border-color:var(--hr-primary);" onclick="clearQR();userMsg(\'🔧 Book Repair\');S.mode=\'repair\';typing(function(){botMsg(\'What type of device?\');setTimeout(showRepairCatGrid,300);});">🔧 Book Repair</button>' +
        '<button class="hr-qr-btn" style="background:rgba(167,139,250,0.1);border-color:#a78bfa;" onclick="clearQR();userMsg(\'🛍️ Buy Device\');S.mode=\'buy\';typing(function(){botMsg(\'What type of device?\');setTimeout(loadBuyCategories,300);});">🛍️ Buy Device</button>' +
        '</div>';
    $m().appendChild(wrap); scr();
}

// ═══════════════════════════════════════════════════════════════
//  FREE TEXT INPUT
// ═══════════════════════════════════════════════════════════════

function hrSend(){
    var val = document.getElementById('hrInp').value.trim();
    if(!val) return;
    document.getElementById('hrInp').value = '';
    userMsg(val); clearQR();
    var t = val.toLowerCase();

    if(t.includes('buy') || t.includes('purchase') || t.includes('second hand') || t.includes('used')){
        S.mode='buy'; typing(function(){ botMsg("Let's find you a device! What type are you looking for?"); setTimeout(loadBuyCategories, 300); }); return;
    }
    if(t.includes('repair') || t.includes('fix') || t.includes('broken') || t.includes('screen') || t.includes('battery')){
        S.mode='repair'; typing(function(){ botMsg("Let's get your device fixed! What type?"); setTimeout(showRepairCatGrid, 300); }); return;
    }
    if(t.includes('hour') || t.includes('open')){ botMsg("🕒 <strong>Mon–Sat</strong> 9:00–17:30 · <strong>Sunday</strong> 11:00–16:00"); return; }
    if(t.includes('where') || t.includes('location') || t.includes('address')){ botMsg('📍 <a href="'+HR_SITE_URL+'/stores" target="_blank">View our store locations →</a>'); return; }
    if(t.includes('warranty') || t.includes('guarantee')){ botMsg('🛡️ All repairs include a <strong>90-day warranty</strong>!'); return; }
    if(t.includes('price') || t.includes('cost') || t.includes('how much')){ typing(function(){ botMsg("What would you like to know the price for?"); setTimeout(showMainMenu, 300); }); return; }

    typing(function(){
        botMsg("I can help you book a repair, buy a device, or answer questions!");
        setTimeout(showMainMenu, 300);
    });
}

// ═══════════════════════════════════════════════════════════════
//  HELPERS
// ═══════════════════════════════════════════════════════════════

function mkWrap(cls){ var d=document.createElement('div'); d.className='hr-msg '+cls; return d; }
function mkGrid(ex){ var g=document.createElement('div'); g.className='hr-grid'+(ex?' '+ex:''); return g; }
function mkCard(icon,label,small){
    var b=document.createElement('button'); b.className='hr-step-card';
    b.innerHTML='<span class="si" style="font-size:'+(small?'15px':'20px')+'">' + icon + '</span><span style="font-size:11px;line-height:1.3">' + label + '</span>';
    return b;
}
function botMsg(html){ var w=mkWrap('bot'),b=document.createElement('div'); b.className='hr-bubble'; b.innerHTML=html; w.appendChild(b); $m().appendChild(w); scr(); }
function userMsg(text){ var w=mkWrap('user'),b=document.createElement('div'); b.className='hr-bubble'; b.textContent=text; w.appendChild(b); $m().appendChild(w); scr(); }
function typing(cb){ $ty().style.display='flex'; scr(); setTimeout(function(){ $ty().style.display='none'; cb(); }, 700+Math.random()*300); }
function clearQR(){ $qr().innerHTML=''; }
function scr(){ var m=$m(); m.scrollTop=m.scrollHeight; }
</script>