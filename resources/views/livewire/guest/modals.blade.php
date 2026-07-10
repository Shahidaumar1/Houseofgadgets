<div>

<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

@php
  try {
      $gr = \App\Models\GoogleReviewsSetting::getSingleton();
      $ratingVal  = isset($gr->rating)        ? (float) $gr->rating        : null;
      $reviewCnt  = isset($gr->reviews_count) ? (int)   $gr->reviews_count : null;
      $reviewUrl  = !empty($gr->review_url)   ?          $gr->review_url    : null;
  } catch (\Throwable $e) {
      $ratingVal = $reviewCnt = $reviewUrl = null;
  }

  if ($ratingVal === null || $reviewCnt === null || $reviewUrl === null) {
      $ss        = \App\Models\SiteSetting::first();
      $ratingVal = $ratingVal ?? (isset($ss->google_rating)        ? (float) $ss->google_rating        : 5.0);
      $reviewCnt = $reviewCnt ?? (
          isset($ss->google_reviews_count) ? (int) $ss->google_reviews_count
          : (isset($ss->google_review_count) ? (int) $ss->google_review_count : 0)
      );
      $reviewUrl = $reviewUrl ?? (!empty($ss->google_review_url) ? $ss->google_review_url : '#');
  }

  $clamped = max(0, min(5, $ratingVal));
  $rounded = round($clamped * 2) / 2.0;
  $full    = (int) floor($rounded);
  $half    = (($rounded - $full) >= 0.5) ? 1 : 0;
  $empty   = 5 - $full - $half;

  $__showForm = false;
@endphp

<livewire:components.top-bar />
<livewire:components.mega-nav />

@php
  $hasModels = !empty($modals) && count($modals) > 0;

  $isLaptopModels  = (bool) preg_match('/\b(dell|hp|lenovo|asus|acer|msi|surface|mac\s*book|laptop)\b/i', $device->name ?? '');
  $__showForm = $isLaptopModels && !$hasModels;

  $selectedSubBrand = null;
  if (!empty($subBrands) && $selectedSubBrandId) {
      $selectedSubBrand = collect($subBrands)->firstWhere('id', $selectedSubBrandId);
  }
@endphp

<style>
  .device-type-head{display:block;float:left;width:100%;padding:0 15px;}
  a{text-decoration:none;color:#000;}
  .cust-container{max-width:1140px;margin:0 auto;}
  .device-type-heading{padding:28px 15px;border-bottom:1px solid rgba(0,0,0,.27);}
  .device-type-heading p{margin:0!important;text-align:center;font:400 15px/20px "Manrope",sans-serif;color:rgba(0,0,0,.44)}
  .device-type-heading h5{margin:0!important;text-align:center;font:700 22px/30px "Manrope",sans-serif;color:#000}

  .custom-deviceType-page{display:block;float:left;width:100%;padding: 15px}

  .device-brands{display:flex;gap:20px;justify-content:center;flex-wrap:wrap}
  .deviceBrand-box{display:flex;flex-direction:column;align-items:center;justify-content:center;background:transparent !important; border-color:  1px solid  var(--color-primary) !important; border-radius:20px;box-shadow:0 0 4px rgba(0,0,0,.25);max-width:250px;width:250px;height:250px;padding:40px}
  .deviceBrand-box:hover{box-shadow:0 0 40px #dc3545!important; transition:.3s ease }
  .deviceBrand-box figure{width:100%}
  .deviceBrand-box figure img{display:block;margin:0 auto;object-fit:contain;height:100px;width:150px; }
  .deviceBrand-box h6{margin:0!important;font:500 15px/15px "Manrope",sans-serif;color:#000;text-align:center; line-height:20px; font-size: 15px !important;
}
  .deviceBrand-box h6{
    border: 1px solid  var(--color-primary) !important ;  /* Grey border */}
     .deviceBrand-box h6:hover{
      background: #c0c7d1 !important;
      border-color: var(--color-primary);
      color: var(--color-bg) !important;
     }
     .deviceBrand-box h6{
      width:130px; height:55px; font-size:20px; line-height:27.32px;
      text-decoration:none; font-weight:500; display:flex; align-items:center; justify-content:center;
      border-radius:10px; transition:.25s ease; font-family:"Manrope",sans-serif; font-style:normal;
      border:1px solid var(--color-primary);
      color:var(--color-primary) !important;
      background:transparent;
     }
  .device-type-section small{display:block;text-align:center;color:#EA1555;font:800 18px/24.59px "Manrope",sans-serif}
  .device-type-section h3{margin:0!important;padding-bottom:20px;text-align:center;color:#000;font:700 28px/40px "Manrope",sans-serif}

  .device-type-section .search-modal{max-width:355px;margin:0 auto;display:block}
  .device-type-section .search-modal input{max-width:423px;border-radius:28px!important;font-size:14px;width:100%;height:42px}
  .device-type-section .search-modal input:focus{box-shadow:none;border:1px solid #000}
  .device-type-section .search-modal button{position:absolute;top:0;right:0;height:42px;display:flex;justify-content:center;align-items:center;color:#fff;background:#EA1555;font-size:15px;border-top-right-radius:28px;border-bottom-right-radius:28px;z-index:300}

  .back-mini{position:relative;margin:0 0 14px 15px;display:none;align-items:center;gap:8px;padding:6px 12px;border:1px solid #ddd;border-radius:999px;font-weight:700;cursor:pointer;background:#fff}
  .back-mini:hover{border-color:#EA1555;color:#EA1555}
  .back-mini i{font-size:14px}
  /* Prevent horizontal scrolling on mobile */
body {
    overflow-x: hidden; /* Hide horizontal overflow */
}

.cust-container {
    overflow-x: hidden; /* Ensure content within the container does not overflow */
}

/* Optional: This can be added to specific sections if needed */
.device-type-section {
    overflow-x: hidden;
}

</style>

<style>
  body{background:#000 !important;color:var(--color-text);}
  .deviceBrand-box{background:var(--color-surface);border:1px solid rgba(255,255,255,.06);box-shadow:0 0 4px rgba(0,0,0,.25);transition:box-shadow .25s ease,transform .25s ease,background .25s ease,border-color .25s ease;}
  .deviceBrand-box:hover{background:color-mix(in srgb, var(--color-surface) 88%, #ffffff 12%);border-color:rgba(255,255,255,.12); border-radius:20px;box-shadow:0 14px 34px rgba(0,0,0,.35);transform:translateY(-4px);}
  .deviceBrand-box h6,.deviceBrand-box span{color:var(--color-text);}
  .device-type-section .search-modal button,.btn-primary{background:var(--color-primary);border-color:var(--color-primary);color:var(--color-bg);}
  .device-type-section .search-modal button:hover,.btn-primary:hover{filter:brightness(1.08);}
  .breadcrumb,.breadcrumb a,.device-type-heading p,.device-type-section small{color:#9aa3ab!important;}
  .myreviewbtn{background:var(--color-surface)!important;color:var(--color-text)!important;border:1px solid #C0C7D1 !important;box-shadow:0 10px 28px rgba(0,0,0,.35)!important;}
  .myreviewbtn:hover{background:#C0C7D1 !important;border-color:rgba(255,255,255,.18)!important;box-shadow:0 16px 36px rgba(0,0,0,.45)!important; color: black !important;}
  .myreviewbtn .fa-star{color:#FFD700!important;}
  .google-imgsource img{margin-right:5px;}
  .myreviewbtn:hover .fw-bold{color: black !important;}
  .form-control{
      background-color:#000 !important;
  }
</style>

<section class="device-type-head">
  <div class="cust-container">
    <div class="device-type-heading">
      <h5>Broken <span class="text-danger">{{ $device->name ?? 'Apple iPhone' }}?</span></h5>
      <p>Whether you've got a broken screen or back glass, a battery problem, water damage, a charging problem, faulty camera, or however else you've broken it, we should be able to repair it for you… But first, we need to know which {{ $device->name ?? '' }} you're fixing!</p>
    </div>
    <nav aria-label="breadcrumb" class="py-3 py-md-4">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('categories') }}">Device Type</a></li>
        <li class="breadcrumb-item"><a href="{{ route('device-types', $category->slug) }}">Brands</a></li>
        <li class="breadcrumb-item active">Models</li>
      </ol>
    </nav>
  </div>
</section>

<div class="custom-deviceType-page">
  <div class="cust-container">
    <div class="device-type-section">

      {{-- STEP 1: SUB BRANDS --}}
      @if($step === 'sub_brands')
        <h3>Select {{ $device->name }} Sub Brand</h3>

        <div class="device-brands">
          @foreach($subBrands as $sb)
            @php
              $img = $sb->file ? asset($sb->file) : '';
            @endphp
           <a href="{{ route('modals', ['category' => $category->slug, 'device' => $device->slug]) }}?sub_brand={{ $sb->slug }}">
              <div class="deviceBrand-box">
                <figure>
                  @if($img)
                    <img src="{{ $img }}" alt="{{ $sb->name }}">
                  @endif
                </figure>
                <!--<h6 class="mt-3">{{ $sb->name }}</h6>-->
              </div>
            </a>
          @endforeach
        </div>

      {{-- STEP 2: SERIES --}}
      @elseif($step === 'series')
        <h3>
          Select
          @if($selectedSubBrand)
            {{ $selectedSubBrand->name }}
          @else
            {{ $device->name }}
          @endif
          Series
        </h3>

        <div class="device-brands">
          @foreach($seriesList as $series)
            @php
              $img = $series->file ? asset($series->file) : '';
            @endphp
           <a href="{{ route('modals', ['category' => $category->slug, 'device' => $device->slug]) }}?sub_brand={{ $selectedSubBrand->slug ?? '' }}&series={{ $series->slug }}">
              <div class="deviceBrand-box">
                <figure>
                  @if($img)
                    <img src="{{ $img }}" alt="{{ $series->name }}">
                  @endif
                </figure>
                <h6 class="mt-3">{{ $series->name }}</h6>
              </div>
            </a>
          @endforeach
        </div>

      {{-- STEP 3: MODELS --}}
      @else
        @unless($__showForm)
          <h3>Search By Model Name</h3>
          <div class="search-modal input-group mb-3 mb-md-5" style="max-width:430px; background-color:#000 !important;">
            <input type="text" id="modalSearch" class="form-control" placeholder="Search by Model Name">
            <button type="button" onclick="searchModals()"><i class="fa fa-search pe-2"></i></button>
          </div>

          <h3>{{ $device->name ?? 'Apple iPhone' }}</h3>

          <div class="device-brands">
            @forelse($modals as $modal)
              @php
                $img = $modal->file ? asset($modal->file) : '';
              @endphp
             <a href="{{ route('repair-types', ['category' => $category->slug, 'device' => $device->slug, 'modal' => $modal->slug]) }}">
                <div class="deviceBrand-box">
                  <figure>
                    @if($img)
                      <img src="{{ $img }}" alt="{{ $modal->name }}" class="img-fluid">
                    @endif
                  </figure>
                  <h6 class="card-title text-center text-lg-sm mt-3">{{ $modal->name }}</h6>
                </div>
              </a>
            @empty
              <span>Not Found</span>
            @endforelse
          </div>
        @endunless

        {{-- laptop case -> quote form --}}
        @if($__showForm)
          {{-- yahan tumhara original form hoga, same rehne do --}}
        @endif
      @endif

    </div>
  </div>
</div>

{{-- BACK BUTTON --}}
<section class="cust-container px-3 pb-5">
  <button type="button" id="globalBackBtn" class="back-cta">
    <i class="fa fa-arrow-left"></i> Back
  </button>
</section>

<script>
  function searchModals(){
    var input=document.getElementById('modalSearch');
    var filter=(input?.value||'').toUpperCase();
    var boxes=document.querySelectorAll('.deviceBrand-box');
    boxes.forEach(function(box){
      var h=box.querySelector('h6'); if(!h) return;
      box.style.display = h.innerText.toUpperCase().indexOf(filter)>-1 ? '' : 'none';
    });
  }
  document.getElementById('modalSearch')?.addEventListener('input',searchModals);
</script>

<script>
  (function(){
    const brandsUrl = "{{ route('device-types', $category->slug) }}";
const deviceTypesUrl = "{{ route('categories') }}";
const modalsBase = "{{ route('modals', ['category' => $category->slug, 'device' => $device->slug]) }}";
    const params = new URLSearchParams(location.search);

    function sameOriginReferrer(){
      try{ return !!document.referrer && new URL(document.referrer).origin === location.origin; }
      catch(e){ return false; }
    }

    function goBackSmart(){
      if (sameOriginReferrer() && history.length > 1){ history.back(); return; }
      if (params.has('series') || params.has('sub_brand')){ location.href = modalsBase; return; }
      if (location.pathname.startsWith('/device-types/4')){ location.href = deviceTypesUrl; return; }
      location.href = brandsUrl;
    }

    document.addEventListener('DOMContentLoaded', () => {
      document.getElementById('globalBackBtn')?.addEventListener('click', function(e){
        e.preventDefault(); goBackSmart();
      });
    });
  })();
</script>

<style>
/* Center the back button */
#globalBackBtn {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;  /* Make the button fill the width of its container */
    padding: 10px 16px;
    border-radius: 1px;
    background: #e9ecef;
    border: 1px solid #cfd4da;
    color: #111;
    font: 700 15px/20px "Manrope", sans-serif;
    cursor: pointer;
    box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
    transition: background .2s ease, border-color .2s ease, box-shadow .2s ease;
    text-align: center;  /* Center text inside the button */
}

#globalBackBtn i {
    font-size: 14px;
}

/* Add responsiveness to make sure it's centered on all screens */
@media (max-width: 576px) {
    #globalBackBtn {
        width: auto; /* Allow the button to auto-size on small screens */
        margin: 0 auto; /* Center the button horizontally */
    }
}

@media (min-width: 577px) {
    /* On larger screens, ensure the button is still centered */
    #globalBackBtn {
        margin: 0 auto;
        width: auto;
    }
}

  .device-type-heading h5,
  .device-type-heading p,
  .device-type-section small,
  .device-type-section h3,
  .deviceBrand-box h6,
  .breadcrumb,
  .breadcrumb a{
    color:#ffffff !important;
  }
  .deviceBrand-box:hover {
    box-shadow: 0 0 40px rgba(192, 192, 192, 0.85) !important;
    border-color: rgba(192, 192, 192, 0.55) !important;
    transform: translateY(-4px);
  }
@media (max-width: 576px) {
    /* make list vertical + centered */
    .device-brands {
        flex-direction: column;
        align-items: center;
    }

    /* 1 card per row */
    .deviceBrand-box {
        width: 200% !important;
        max-width: 340px !important; /* adjust if you want it wider/narrower */
        height: auto !important;
        margin: 0 auto 16px !important; /* spacing between cards */
        padding: 24px !important;
        margin-right:130px !important;
    }
}

</style>

</div>
