<div>
    <div>
        <!-- --------------------------top bar----------------- -->
        <livewire:components.top-bar />
        <!-- --------------------navbar--------------------- -->
        <livewire:components.mega-nav />

        <div>
        <div class="container ">
             <a href="{{ route('home') }}">
                <button class="btn btn-danger btn-sm mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                    </svg>
                </button>
            </a>

            {{-- search filter --}}
            <div class="row">
            <!--    <div class="d-flex my-3 align-items-center justify-content-center">-->
            <!--        <div class="col-lg-6 col-md-4">-->
            <!--            <form class="d-flex" role="search">-->
            <!--                <div class="wrapper">-->
            <!--                    <div class="search_box khuram">-->
            <!--                        <div class="d-flex gap-2">-->
            <!--                            <div class="dropdown">-->
            <!--                                <select class="form-control categories-k rounded-pill" wire:model="selectedCategoryId">-->
            <!--                                    <option class="text-center font-weight-bold kh" value="All">All</option>-->
            <!--                                    @forelse($categories as $key => $category)-->
            <!--                                        <option value="{{ $category->id }}">{{ $category->name }}</option>-->
            <!--                                    @empty-->
            <!--                                        <option value="">Not Found!</option>-->
            <!--                                    @endforelse-->
            <!--                                </select>-->
            <!--                            </div>-->
            <!--                            <div class="search_field">-->
            <!--                                <input type="text" class="form-control rounded-pill" placeholder="Search" wire:model.debounce.500="search">-->
            <!--                                <img class="bi" src="{{ asset('assets/kimges/icon.webp') }}" alt="">-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </form>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="d-flex my-3 align-items-center justify-content-center">
  <!-- was: col-lg-6 col-md-4 -->
  <!--<div class="col-12 col-md-10 col-lg-10">-->
  <!--  <form class="d-flex" role="search">-->
      <!-- add search-center class -->
  <!--    <div class="wrapper search-center">-->
  <!--      <div class="search_box khuram">-->
  <!--        <div class="d-flex gap-2">-->
  <!--          <div class="dropdown">-->
  <!--            <select class="form-control categories-k rounded-pill" wire:model="selectedCategoryId">-->
  <!--              <option class="text-center font-weight-bold kh" value="All">All</option>-->
  <!--              @forelse($categories as $key => $category)-->
  <!--                <option value="{{ $category->id }}">{{ $category->name }}</option>-->
  <!--              @empty-->
  <!--                <option value="">Not Found!</option>-->
  <!--              @endforelse-->
  <!--            </select>-->
  <!--          </div>-->
  <!--          <div class="search_field">-->
  <!--            <input type="text" class="form-control rounded-pill" placeholder="Search" wire:model.debounce.500="search">-->
  <!--            <img class="bi" src="{{ asset('assets/kimges/icon.webp') }}" alt="">-->
  <!--          </div>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->
  <!--  </form>-->
  <!--</div>-->
  <div class="col-12 col-md-10 col-lg-10">
  <form class="d-flex" role="search">
    <div class="search-bar-wrap">
      <div class="search-combo">
        <select class="combo-select" wire:model="selectedCategoryId">
          <option class="text-center font-weight-bold kh" value="All">All</option>
          @forelse($categories as $key => $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @empty
            <option value="">Not Found!</option>
          @endforelse
        </select>

        <input type="text"
               class="combo-input"
               placeholder="Search"
               wire:model.debounce.500="search">

        <!--<button type="button" class="combo-btn" tabindex="-1">-->
          <!--<img src="{{ asset('assets/kimges/icon.webp') }}" alt="search">-->
        <!--</button>-->
      </div>
    </div>
  </form>
</div>

</div>
<style>
    /* Center the whole search control and let it breathe */
.search-center { 
  max-width: 1080px;            /* sweet spot; bump to 1200 if you want */
  margin: 0 auto;
}

/* Make the container truly fill available width */
.wrapper, .search_box.khuram { width: 100%; }
.search_box.khuram .d-flex { width: 100%; }

/* Make "All" wide, search even wider */
.search_box.khuram .dropdown { 
  flex: 0 0 320px;              /* 280–360 works; this is nice */
  max-width: 100%;
}
.search_box.khuram .search_field { 
  flex: 1 1 auto; 
  min-width: 0; 
}
.search_field .form-control { width: 100%; }

/* Taller inputs so it looks luxe */
.categories-k,
.search_field .form-control {
  height: 56px;                 /* was default ~38–44 */
  padding-left: 16px;
  padding-right: 16px;
  font-size: 16px;
}

/* Keep the search icon aligned inside the input row */
.search_field { position: relative; }
.search_field .bi {
  position: absolute;
  right: 10px; top: 50%;
  transform: translateY(-50%);
  width: 26px; height: 26px;
  pointer-events: none;
}

/* Extra-wide on big desktops */
@media (min-width: 1400px) {
  .search-center { max-width: 1200px; }
  .search_box.khuram .dropdown { flex-basis: 360px; }
}

</style>
<style>
  /* ✅ Filter sidebar boxes (device/models/memory/grade/color/price) */
  .box.card{
    background: #0E1113 !important;
    border: 1px solid var(--color-primary) !important;
  }

  /* Optional: keep text readable on dark bg (doesn't change layout) */
  .box.card .form-check-label,
  .box.card label,
  .box.card span{
    color: inherit;
  }
</style>

        </div>

        {{-- devices --}}
        <div class="d-flex flex-wrap justify-content-center mb-4">
            @if ($selectedCategoryId != 'All')
                @forelse ($devices as $device)
                    <div class="bubble logo1 bg-light cursor-pointer mb-2 {{ $selectedDevice && $selectedDevice->id == $device->id ? 'border border-success border-2 ' : '' }}" wire:click="selectDevice('{{ $device->id }}')">
                        <img src="{{ $device->file ?? '#' }}" alt="" class="img-fluid">
                    </div>
                @empty
                    <div>Not Found !</div>
                @endforelse
            @endif
        </div>

        {{-- left card filter with right models data --}}
        <section class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end">
                        <a class="text-primary cursor-pointer" wire:click="clearFilter">Clear Filter</a>
                    </div>

                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> device</h3>
                        <div class="p-2">
                            <div class="form-check">
                                <input {{ $selectedCategoryId == 'All' ? 'checked' : '' }} class="form-check-input" type="radio" name="category" value="{{ 'All' }}" wire:model="selectedCategoryId">
                                <label class="form-check-label">All</label>
                            </div>
                            @foreach ($categories as $key => $category)
                                <div class="form-check">
                                    <input {{ $selectedCategoryId == $category->id ? 'checked' : '' }} class="form-check-input" type="radio" name="category" value="{{ $category->id }}" wire:model="selectedCategoryId">
                                    <label class="form-check-label">{{ $category->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    @if ($selectedCategoryId != 'All')
                        <div class="box card my-2">
                            <h3 class="bg-danger text-white p-2"> Models</h3>
                            @forelse ($devices as $device)
                                <div class="p-2">
                                    <div class="form-check">
                                        <input {{ $selectedDevice && $selectedDevice->id  == $device->id ? 'checked' : '' }} class="form-check-input" type="radio" name="device" value="{{ $device->id }}" wire:click="selectDevice('{{ $device->id }}')">
                                        <label class="form-check-label">{{ $device->name }}</label>
                                    </div>
                                </div>
                            @empty
                                <div>Not Found !</div>
                            @endforelse
                        </div>
                    @endif

                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> Memory Sizes</h3>
                        <div class="p-2">
                            @foreach ($memory_sizes as $memory_size)
                                <div class="form-check">
                                    <input {{ $selectedMemorySize == $memory_size ? 'checked' : '' }} class="form-check-input" type="radio" name="memory_size" value="{{ $memory_size }}" wire:click="filterByMemorySize('{{ $memory_size }}')">
                                    <label class="form-check-label">{{ $memory_size }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> Grade</h3>
                        <div class="p-2">
                            @foreach ($grades as $key => $g)
                                <div class="form-check">
                                    <input {{ $selectedGrade == $g ? 'checked' : '' }} class="form-check-input" type="radio" name="grade" value="{{ $g }}" wire:click="filterByGrade('{{ $g }}')">
                                    <label class="form-check-label">{{ $g }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- ---------------Color-------- -->
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> Color</h3>
                        <div class="p-2">
                            @foreach ($colors as $color)
                                <div class="form-check">
                                    <input {{ $selectedColor == $color ? 'checked' : '' }} class="form-check-input" type="radio" name="color" value="{{ $color }}" wire:click="filterByColor('{{ $color }}')">
                                    <label class="form-check-label">{{ $color }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- -------------------------price----------- -->
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white p-2"> PRICE</h3>
                        <div class="p-2">
                            <label for="customRange1" class="form-label">£0</label>
                            <input type="range" class="form-range" id="customRange1" min="0" max="12000" wire:model="price">
                            <span style="float:right;">£ {{ $price ?? '12000' }}</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row row-cols-2 row-cols-md-4 g-3 justify-content-center">
                        @forelse($models as $model)
                            <div class="col">
                                <a href="{{ route('guest-buy-product-specs', $model['id']) }}">
                                    <div class="card pt-1 text-center">
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ $model['file'] ?? '#' }}" class="img-fluid" style="width: 140px;height: 140px;" />
                                        </div>
                                        <div class="card-body">
                                            <h6 style="font-size:13px;" class="card-text ">{{ $model['name'] }}</h6>
                                            <span style="font-size:12px;" class="btn btn-danger d-grid w-100">View Details</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col">
                                <span>Not Found!</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

    </div>
    </div>
</div>

<style>
/* ===== Black / Grey / Silver Theme ===== */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

:root{
  --hog-bg:#0b0b0d;           /* deep black */
  --hog-surface:#131317;      /* dark grey card */
  --hog-surface-2:#1a1b21;    /* slightly lighter */
  --hog-text:#f2f3f5;         /* near-white */
  --hog-text-dim:#aeb2b8;     /* muted grey */
  --hog-silver:#c0c0c0;       /* silver */
  --hog-silver-700:#9ea1a6;   /* darker silver */
  --hog-silver-800:#8b8f96;   /* deep silver */
  --hog-ring:rgba(192,192,192,.35);
  --hog-accent:#d7d7d7;       /* subtle highlight */
  --hog-success:#9ad0b1;      /* soft green for states */
  --hog-radius:18px;
  --hog-shadow:0 8px 24px rgba(0,0,0,.35);
}

html,body{
  background: radial-gradient(1100px 780px at 20% -10%, #131318 0%, #0e0e11 40%, var(--hog-bg) 100%);
  color:var(--hog-text);
  font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,"Helvetica Neue",Arial;
  letter-spacing:.1px;
}

/* Top bar / nav */
.navbar,.topbar{
  background:rgba(12,12,14,.7) !important;
  backdrop-filter:blur(8px);
  border-bottom:1px solid rgba(255,255,255,.06);
}

/* Silver buttons (override Bootstrap danger/primary to silver) */
.btn{
  border-radius:calc(var(--hog-radius) - 6px);
  border:0;
  transition:transform .12s ease, box-shadow .2s ease, background .2s ease, color .2s ease;
}
.btn-danger,.btn-primary{
  background:linear-gradient(180deg,var(--hog-silver) 0%, var(--hog-silver-700) 100%) !important;
  color:#0b0b0d !important;            /* dark text on silver */
  box-shadow:0 6px 16px rgba(192,192,192,.25);
}
.btn:hover{ transform:translateY(-1px); }
.btn:active{ transform:translateY(0); }

/* Cards & filter boxes */
.card,.box{
  background:linear-gradient(180deg,var(--hog-surface) 0%,var(--hog-surface-2) 100%);
  border:1px solid rgba(255,255,255,.06);
  border-radius:var(--hog-radius);
  box-shadow:var(--hog-shadow);
  color:var(--hog-text);
}
.card .card-body{ color:var(--hog-text); }

/* Turn all .bg-danger headers into silver bars */
.bg-danger{
  background:linear-gradient(180deg,var(--hog-silver) 0%, var(--hog-silver-800) 100%) !important;
  color:#0b0b0d !important;
}

/* Clear filter */
a.text-primary.cursor-pointer{
  color:var(--hog-accent) !important;
  font-weight:600;
}
a.text-primary.cursor-pointer:hover{ text-decoration:underline; }

/* Search UI */
.search_box.khuram{
  background:linear-gradient(180deg,#121218 0%,#171821 100%);
  border:1px solid rgba(255,255,255,.08);
  border-radius:999px;
  padding:10px 14px;
  box-shadow:var(--hog-shadow);
}
.categories-k,.search_field .form-control{
  background:#0f1015 !important;
  color:var(--hog-text) !important;
  border:1px solid rgba(255,255,255,.1) !important;
  border-radius:999px !important;
}
.search_field .form-control:focus,.categories-k:focus{
  outline:0 !important;
  box-shadow:0 0 0 6px var(--hog-ring) !important;
  border-color:var(--hog-silver-700) !important;
}

/* Radios / checks */
.form-check-input{
  width:18px;height:18px;margin-top:2px;
  background-color:#0f1015;border-color:rgba(255,255,255,.25);
}
.form-check-input:checked{
  background:var(--hog-silver-700);
  border-color:var(--hog-silver-700);
  box-shadow:0 0 0 4px var(--hog-ring);
}
.form-check-label{ color:var(--hog-text-dim); font-weight:500; }

/* Range */
input[type="range"]{ accent-color:var(--hog-silver); }
.box .form-label,.box span{ color:var(--hog-text-dim); }

/* Device bubbles */
.bubble.logo1{
  width:74px;height:74px;border-radius:999px;
  display:grid;place-items:center;margin:6px;
  background:linear-gradient(180deg,#f2f2f3 0%, #cfd1d4 100%) !important; /* light silver */
  border:2px solid transparent;
  transition:transform .12s ease, border .2s ease, box-shadow .2s ease;
}
.bubble.logo1 img{ max-width:66%; max-height:66%; }
.bubble.logo1:hover{ transform:translateY(-2px); box-shadow:0 8px 18px rgba(0,0,0,.25); }
.border-success{ border-color:var(--hog-success) !important; }

/* Product cards */
.card.pt-1.text-center{
  transition:transform .14s ease, box-shadow .2s ease, border-color .2s ease;
  border:1px solid rgba(255,255,255,.06);
}
.card.pt-1.text-center:hover{
  transform:translateY(-3px);
  box-shadow:0 14px 28px rgba(0,0,0,.35);
  border-color:rgba(192,192,192,.45);
}
.card .card-text{ color:var(--hog-text); }
.card img{ object-fit:contain; }

/* Empty state text */
span,.col span{ color:var(--hog-text-dim); }

/* Tiny util */
.kh{ font-weight:900 !important; }

/* Responsive */
@media (max-width:991px){
  .box{ border-radius:16px; }
  .row.g-3{ row-gap:1.1rem; }
}
</style>
<style>
    /* center + max width */
.search-bar-wrap{
  max-width: 1100px;   /* bump to 1200 if you want even wider */
  width: 100%;
  margin: 0 auto;
  padding: 0 12px;
}

/* reset old box so it doesn't fight styles */
.search_box.khuram{ background: transparent; border: 0; padding: 0; box-shadow: none; }

/* unified pill */
.search-combo{
  display: flex;
  align-items: center;
  gap: 0;
  background: #0f1015;
  border: 1px solid rgba(255,255,255,.12);
  border-radius: 999px;
  box-shadow: 0 8px 20px rgba(0,0,0,.35);
  overflow: hidden; /* clean edges */
}

/* "All" select */
.combo-select{
  flex: 0 0 170px;          /* width of the All dropdown */
  max-width: 100%;
  height: 56px;
  padding: 0 18px;
  
  
  background: transparent;
  color: var(--hog-text);
  border: 0;
  border-right: 1px solid rgba(255,255,255,.08);
  appearance: none;
  font-size: 16px;
}
.combo-select:focus{ outline: none; }

/* Search input (nice and wide) */
.combo-input{
  flex: 1 1 auto;
  min-width: 0;
  height: 56px;
  padding: 0 16px;
  background: transparent;
  color: var(--hog-text);
  border: 0;
  font-size: 16px;
}
.combo-input::placeholder{ color: var(--hog-text-dim); }
.combo-input:focus{ outline: none; }

/* Silver search button on the right */
.combo-btn{
  flex: 0 0 auto;
  width: 44px;
  height: 44px;
  margin-right: 8px;
  border: 0;
  border-radius: 999px;
  display: grid;
  place-items: center;
  background: linear-gradient(180deg, var(--hog-silver) 0%, var(--hog-silver-700) 100%);
  box-shadow: 0 6px 16px rgba(192,192,192,.25);
  cursor: pointer;
}
.combo-btn img{ width: 18px; height: 18px; pointer-events: none; }

/* extra-wide on big desktops */
@media (min-width: 1400px){
  .search-bar-wrap{ max-width: 1200px; }
  .combo-select{ flex-basis: 200px; }
}
</style>
<style>
    /* Unified pill: smooth sides, no weird inner corners */
.search-combo{
  display:flex; align-items:center; gap:0;
  background:#0f1015; border:1px solid rgba(255,255,255,.12);
  border-radius:999px; box-shadow:0 8px 20px rgba(0,0,0,.35);
  overflow:hidden;                 /* key: trims inner corners */
}

/* remove inner rounding so only parent rounds */
.combo-select,.combo-input,.combo-btn{ border-radius:0 !important; }

/* slim divider between select & input */
.combo-select{ border-right:1px solid rgba(255,255,255,.08); }

/* make the right button sit flush with the pill,
   but still feel clickable */
.combo-btn{
  width:56px; height:56px;        /* same height as inputs */
  background:linear-gradient(180deg,var(--hog-silver) 0%,var(--hog-silver-700) 100%);
  border-left:1px solid rgba(255,255,255,.08);   /* subtle divider */
  box-shadow:none;
}
.combo-btn img{ width:18px; height:18px; }
.combo-select,
.combo-input{
  height:56px; line-height:56px;  /* consistent vertical rhythm */
  font-size:16px;
}

.combo-select{ flex:0 0 170px; padding:0 18px; background:transparent; color:var(--hog-text); border:0; appearance:none; }
.combo-input { flex:1 1 auto; min-width:0; padding:0 16px; background:transparent; color:var(--hog-text); border:0; }
.combo-input::placeholder{ color:var(--hog-text-dim); }
.combo-select:focus,.combo-input:focus{ outline:none; box-shadow:none; }
/* brand chips — consistent circle with soft silver */
:root{ --chip-size: 76px; }

.bubble.logo1{
  width:var(--chip-size); height:var(--chip-size);
  border-radius:50%;
  background:linear-gradient(180deg,#f4f5f6 0%, #d7d9dd 100%) !important; /* silver */
  border:1px solid rgba(255,255,255,.14);
  display:grid; place-items:center; margin:10px;
  box-shadow:0 6px 16px rgba(0,0,0,.28);
  transition:transform .12s ease, box-shadow .2s ease, border-color .2s ease, filter .2s ease;
}

/* icon inside — same size for all brands */
.bubble.logo1 img{
  width:56%; height:56%;
  object-fit:contain;
  filter:drop-shadow(0 1px 1px rgba(0,0,0,.15));
}

/* hover / active ring */
.bubble.logo1:hover{ transform:translateY(-2px); box-shadow:0 10px 22px rgba(0,0,0,.34); }
.bubble.logo1.border-success{ border-color:var(--hog-success) !important; box-shadow:0 0 0 4px rgba(61,220,151,.18), 0 10px 22px rgba(0,0,0,.34); }

</style>
<style>
    /* --- Brand chips: bigger logos + no color (ever) --- */
:root { --chip-size: 84px; }          /* was 76px — bump size */

.bubble.logo1 { width: var(--chip-size); height: var(--chip-size); }

.bubble.logo1 img{
  /* bigger logo inside the circle */
  width: 72% !important;
  height: 72% !important;
  object-fit: contain;

  /* remove color completely */
  filter: grayscale(100%) saturate(0) brightness(0.96) contrast(1.05) drop-shadow(0 1px 1px rgba(0,0,0,.15)) !important;
  -webkit-filter: grayscale(100%) saturate(0) brightness(0.96) contrast(1.05) drop-shadow(0 1px 1px rgba(0,0,0,.15)) !important;

  transition: transform .12s ease, filter .2s ease;
}

/* keep it grayscale on hover/active too */
.bubble.logo1:hover img,
.bubble.logo1.border-success img {
  filter: grayscale(100%) saturate(0) brightness(0.96) contrast(1.05) drop-shadow(0 1px 1px rgba(0,0,0,.15)) !important;
  -webkit-filter: grayscale(100%) saturate(0) brightness(0.96) contrast(1.05) drop-shadow(0 1px 1px rgba(0,0,0,.15)) !important;
}

/* optional: tiny lift on hover without color */
.bubble.logo1:hover { transform: translateY(-2px); }

/* --- Search button icon also grayscale --- */
.combo-btn img{
  filter: grayscale(100%) saturate(0) brightness(0.96) contrast(1.05) !important;
  -webkit-filter: grayscale(100%) saturate(0) brightness(0.96) contrast(1.05) !important;
}

</style>
<style>
    /* search button: no silver, blend with pill */
.combo-btn{
  width:56px; height:56px;
  background:#0f1015 !important;          /* same as pill bg */
  border-left:1px solid rgba(255,255,255,.08);
  box-shadow:none !important;
}
.combo-btn img{
  filter:none !important;                  /* no grayscale/boost */
  opacity:.85;
}
.combo-btn:hover{ background:#14151b !important; }

</style>
<style>
  /* shrink the search pill on larger screens */
  @media (min-width: 992px) {
    .search-bar-wrap{
      max-width: 600px;  /* tweak this number until it looks perfect */
    }
  }
</style>
<style>
  .combo-select{
    background: #d9d9d9 !important; /* grey */
    color: #000000 !important;      /* black text */
  }
</style>
<style>
  .combo-input{
    background: #d9d9d9 !important;  /* grey */
    color: #000000 !important;       /* black text */
  }

  .combo-input::placeholder{
    color: #000000 !important;       /* placeholder text also black */
  }
</style>

