<div>
 
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

@php
  // GOOGLE REVIEWS (same as your original)
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

  $C = collect($device_types ?? []);
@endphp


  <livewire:components.top-bar />
  <livewire:components.mega-nav />

  <style>
    .progress,.progressBrand-bar,.progress-end-dot{display:none!important;}

    .device-type-head{display:block;float:left;width:100%;padding:0 15px;}
    a{text-decoration:none;color:#000;}
    .cust-container{max-width:1140px;margin:0 auto;}
    .device-type-heading{padding:28px 15px;border-bottom:1px solid rgba(0,0,0,.27);}
    .device-type-heading p{margin:0;text-align:center;font:600 20px/27px "Manrope",sans-serif;color:#000;}
    .custom-deviceType-page{display:block;float:left;width:100%;padding: 15px;}
    .device-type-section small{display:block;text-align:center;color:#EA1555;font:600 18px/24px "Manrope",sans-serif;}
    .device-type-section h3{margin:0 0 20px!important;text-align:center;color:#fff;font:700 32px/60px "Manrope",sans-serif; margin-top:-30px !important;}

    .deviceBrand-box{width:320px;max-width:320px;height:220px;display:flex;flex-direction:column;justify-content:center;align-items:center;border-radius:20px; border-color:  1px solid  var(--color-primary) !important; background:transparent;color:#e8edf2;border:1px solid rgba(255,255,255,.06);box-shadow:0 8px 22px rgba(0,0,0,.35);padding:24px;transition:.2s ease;}
    .deviceBrand-box:hover{box-shadow:0 0 40px  var(--color-primary)!important; transition:.3s ease }
    }
    .deviceBrand-box figure{width:180px;height:120px;margin:0 auto}
    .deviceBrand-box figure img{width:100%;height:100%;object-fit:contain;display:block}
    .deviceBrand-box span{font-weight:700}
    .device-brands{display:flex;flex-wrap:wrap;gap:30px;justify-content:center}

    body,.device-type-head,.custom-deviceType-page,.device-type-section{background:#000!important;color:var(--color-text)!important}
    .device-type-heading p,.device-type-section h3,.device-type-section small{color:var(--color-text)!important}
    .device-type-section small{color:var(--color-primary)!important}
    .breadcrumb a{color:var(--color-text)!important;opacity:.85}.breadcrumb a:hover{opacity:1;color:var(--color-primary)!important}
    .btn,.submit-btn{background:var(--color-primary)!important;border-color:var(--color-primary)!important;color:var(--color-bg)!important}
    .btn:hover,.submit-btn:hover{filter:brightness(1.05)}
    .device-type-heading{border-bottom:1px solid color-mix(in srgb, var(--color-text) 15%, transparent)!important}
    

    @media(max-width:576px){
      .deviceBrand-box{width:100%!important;max-width:none!important;height:250px !important; margin-right: 120px;}
      .deviceBrand-box figure{width:170px;height:130px;}
    }

    /* labels visible on brand grid */
    #brandGrid .deviceBrand-box span{
      display:block!important;visibility:visible!important;margin-top:6px;font-weight:800;color:var(--color-text);
    }
    .deviceBrand-box {
  width: 320px;
  max-width: 320px;
  height: 220px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  border-radius: 20px;
  background: transparent;
  color: #e8edf2;
  border: 1px solid rgba(255, 255, 255, .06);
  box-shadow: 0 8px 22px rgba(0, 0, 0, .35);
  padding: 24px;
  transition: .2s ease;
  text-align: center; /* Ensures text is centered below the image */
  font-size:15px !important;
}

.deviceBrand-box figure {
  width: 180px;
  height: 120px;
  margin: 0 auto;
}

.deviceBrand-box figure img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  display: block;
}

/* Styles for brand name text */
.deviceBrand-box span.brand-name {
  font-weight: 500;
  margin-top: 10px; /* Adds space between the image and the text */
  color: var(--color-text); /* Adjust based on your site's text color */
}

.device-brands {
  display: flex;
  flex-wrap: wrap;
  gap: 30px;
  justify-content: center;
}

@media(max-width:576px) {
  .deviceBrand-box {
    width: 100%!important;
    max-width: none!important;
    height: 180px;
    margin-right: 120px;
  }
  .deviceBrand-box figure {
    width: 170px;
    height: 130px;
  }
  .deviceBrand-box span.brand-name {
    font-size: 10px; /* Adjusts text size on mobile */
  }
}

/* To ensure brand text is visible */
#brandGrid .deviceBrand-box span {
  display: block!important;
  visibility: visible!important;
  margin-top: 6px;
  font-weight: 500;
  color: var(--color-text);
  font-size:20px !important;
      padding-top: 7px;
}
.deviceBrand-box span {
  border: 1px solid  var(--color-primary) !important ;  /* Grey border */}
 .deviceBrand-box span:hover{
      background: #c0c7d1 !important;
      border-color: var(--color-primary);
      color: var(--color-bg) !important;
     }
     .deviceBrand-box span{
      width:160px; height:55px; font-size:20px; line-height:27.32px;
      text-decoration:none; font-weight:500; display:flex; align-items:center; justify-content:center;
      border-radius:10px; transition:.25s ease; font-family:"Manrope",sans-serif; font-style:normal;
      border:1px solid var(--color-primary);
      color:var(--color-primary) !important;
      background:transparent;
     }
  </style>

  {{-- HEADER --}}
  <section class="device-type-head">
    <div class="cust-container">
      <div class="device-type-heading"><p>Need a Repair? Tell Us Which Device You Have…</p></div>
      <nav aria-label="breadcrumb" class="py-3 py-md-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('categories') }}">Device Type</a></li>
          <li class="breadcrumb-item active">Brands</li>
        </ol>
      </nav>
    </div>
  </section>

  <div class="custom-deviceType-page">
    <div class="cust-container">
      <div class="device-type-section">
        <h3>Select Brand</h3>

        {{-- BRAND GRID --}}
   <div class="device-brands" id="brandGrid">
  @foreach($C as $device_type)
   <a class="brand-link" href="{{ route('modals', ['category' => $category->slug, 'device' => $device_type->slug]) }}">
      <div class="deviceBrand-box">
        <figure>
          <img src="{{ $device_type->file ?? '' }}" alt="{{ $device_type->name }}">
        </figure>
        <!-- Brand name below the image -->
        <span class="brand-name">{{ $device_type->name }}</span>
      </div>
    </a>
  @endforeach
</div>


        {{-- Ask for quote section stays exactly as before --}}
        {{-- (keeping your existing HTML & Livewire form) --}}
        {{-- ... you can paste your original "ask-quote" block here if you were using it on this page ... --}}

      </div>
    </div>
  </div>

  {{-- BACK BUTTON – same style as models page --}}
  <section class="cust-container px-3 pb-4">
    <button type="button" id="globalBackBtn" class="back-cta">
      <i class="fa fa-arrow-left"></i> Back
    </button>
  </section>

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

    .back-cta{
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding:10px 16px;
      border-radius:1px;
      background:#e9ecef;
      border:1px solid #cfd4da;
      color:#111;
      font:700 15px/20px "Manrope",sans-serif;
      cursor:pointer;
      box-shadow:0 1px 2px rgba(0,0,0,.05);
      transition:background .2s ease,border-color .2s ease,box-shadow .2s ease;
    }
    
    .back-cta i{font-size:14px;}
    .back-cta:hover{
      background:#dde2e7;
      border-color:#c3c9d0;
      box-shadow:0 2px 6px rgba(0,0,0,.08);
    }
  </style>

  {{-- GOOGLE REVIEW BUTTON (same as before) --}}
  <style>
    .myreviewbtn{color:#003d34;border:1px solid:#003d34;display:flex;align-items:center;font-family:"Manrope",sans-serif;padding:15px 30px;border-radius:10px;font-size:18px;font-weight:700;}
    .myreviewbtn:hover{background:#fff;border:1px solid #EA1555}
    .myreviewbtn:hover .fa-star{color:#FFD700}
    .myreviewbtn .fa-star{color:#FFD700;font-size:16px;margin-right:5px}
    .myreviewbtn .fw-bold{color:#003d34}
    .myreviewbtn{
        background-color: #000 !important;
        color: white !important;
    }
    .myreviewbtn:hover{
        background-color: #C0C7D1 !important;
        color: #000 !important;
    }
    .myreviewbtn:hover .fw-bold{
        color: black !important;
    }
    .google-imgsource img{margin-right:5px;}
    @media(max-width:768px){.myreviewbtn{padding:9px 7px;border-radius:5px;font-size:14px}.myreviewbtn .fa-star{font-size:13px}}
  </style>

  <section class="cust-container px-3 pb-md-4">
    <div class="row">
      <div class="col-md-12 mb-5 d-flex justify-content-center">
        <a href="{{ $reviewUrl }}" target="_blank" rel="noopener">
          <button type="button" class="btn myreviewbtn">
            Review us  &nbsp;
            <strong class="me-1">{{ number_format($rounded, 1) }}</strong>

            @for($i=0; $i<$full; $i++)
              <i class="fa-solid fa-star"></i>
            @endfor
            @if($half)
              <i class="fa-solid fa-star-half-stroke"></i>
            @endif
            @for($i=0; $i<$empty; $i++)
              <i class="fa-regular fa-star"></i>
            @endfor

      
        
            @if($reviewCnt>0)
              <span class="ms-2">({{ $reviewCnt }})</span>
            @endif
            
            <span class="google-imgsource">
              <img src="https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png" height="48" width="48"  alt="Google">
            </span>
          </button>
        </a>
      </div>
    </div>
  </section>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function(){
    document.getElementById('globalBackBtn')?.addEventListener('click', function(e){
      e.preventDefault();
      if (document.referrer && document.referrer.startsWith(location.origin)) {
        history.back();
      } else {
        window.location.href = "{{ route('categories') }}";
      }
    });
  });
</script>
