<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

@php
  // ✅ Prefer the new singleton table
  try {
      $gr = \App\Models\GoogleReviewsSetting::getSingleton();
      $ratingVal  = isset($gr->rating)        ? (float) $gr->rating        : null;
      $count      = isset($gr->reviews_count) ? (int)   $gr->reviews_count : null;
      $reviewUrl  = !empty($gr->review_url)   ?          $gr->review_url    : null;
  } catch (\Throwable $e) {
      $ratingVal = $count = $reviewUrl = null;
  }

  // 🔙 Fallback to site_settings if needed
  if ($ratingVal === null || $count === null || $reviewUrl === null) {
      $ss        = \App\Models\SiteSetting::first();
      $ratingVal = $ratingVal ?? (isset($ss->google_rating)        ? (float) $ss->google_rating        : 5.0);
      $count     = $count     ?? (
                      isset($ss->google_reviews_count) ? (int) $ss->google_reviews_count
                      : (isset($ss->google_review_count) ? (int) $ss->google_review_count : 0)
                  );
      $reviewUrl = $reviewUrl ?? (!empty($ss->google_review_url)   ? $ss->google_review_url : '#');
  }

  // ✨ Star math (0.5 steps)
  $clamped = max(0, min(5, $ratingVal));
  $rounded = round($clamped * 2) / 2.0;
  $full    = (int) floor($rounded);
  $half    = (($rounded - $full) >= 0.5) ? 1 : 0;
  $empty   = 5 - $full - $half;
@endphp

<div>
  <livewire:components.top-bar />
  <livewire:components.mega-nav />

  <style>
    .device-type-head{display:block;float:left;width:100%;padding:0 15px;background:#000 !important;color:var(--color-text);}
    a{color:var(--color-text);text-decoration:none;}

    .cust-container{max-width:1140px;margin:0 auto;}

    .device-type-heading{
      padding:28px 15px;
      border-bottom:1px solid color-mix(in srgb, var(--color-text) 18%, transparent);
    }
    .device-type-heading p{
      text-align:center;font-size:20px;line-height:27.32px;font-weight:600;
      font-family:"Manrope",sans-serif;margin:0!important;color:var(--color-text);
    }

    .progress{height:10px!important;border-radius:4px;overflow:hidden;background:color-mix(in srgb, var(--color-text) 8%, transparent);}
    .progress-bar{
      background:var(--color-primary)!important;border-radius:0;width:30%;
      box-shadow:0 0 0 1px color-mix(in srgb, var(--color-primary) 50%, transparent) inset;
    }
    .progress-end-dot{
      width:20px;height:20px;border-radius:50%;background:var(--color-primary);
      position:absolute;left:29%;top:-5px;border:2px solid var(--color-bg);
      box-shadow:0 2px 6px rgba(0,0,0,.2);
    }

    .custom-deviceType-page{display:block;float:left;width:100%;padding:72px 15px;background:#000 !important;color:var(--color-text);}

    .device-type-items{display:flex;gap:30px;justify-content:center;flex-wrap:wrap;}

    .device-type-section small{
      font-size:18px;line-height:24.59px;display:block;text-align:center;
      color:var(--color-primary);font-weight:800;font-family:"Manrope",sans-serif;
    }
    .device-type-section h3{
      font-size:32px;text-align:center;line-height:60px;font-weight:700;
      color:var(--color-text);font-family:"Manrope",sans-serif;margin:0!important;padding-bottom:50px;
    }

    .deviceType-box{
      flex:0 0 400px;width:400px;display:flex;padding:40px;flex-direction:column;align-items:center;
      border-radius:20px;
      background:#000 !important; /* ✅ changed */
      border:1px solid var(--color-primary) !important; /* ✅ added */
      box-shadow:0 0 4px 0 color-mix(in srgb, var(--color-text) 20%, transparent);
      transition:.25s ease;
    }
    .deviceType-box:hover{
      box-shadow:0 0 40px color-mix(in srgb, var(--color-primary) 45%, transparent);
      transform:translateY(-2px);
    }
    .deviceType-box figure{width:100%;height:250px;margin-bottom:20px;}
    .deviceType-box figure img{margin:auto;display:block;object-fit:contain;height:100%;width:100%;}

    .deviceType-box a{
      width:234px;height:54px;font-size:20px;line-height:27.32px;text-decoration:none;font-weight:500;
      display:flex;align-items:center;justify-content:center;border-radius:10px;transition:.25s ease;
      font-family:"Manrope",sans-serif;border:1px solid var(--color-primary);color:var(--color-primary)!important;cursor:pointer!important;
      background:transparent;
    }
    .deviceType-box:hover a{background:var(--color-primary);color:color-mix(in srgb, var(--color-bg) 92%, white)!important;}

    /* Toggle form */
    .ToggleOtherOptionForm{padding-top:50px;}
    .ToggleOtherOptionForm .from-sec{
      background:var(--color-surface);border-radius:20px;padding:50px;
      box-shadow:0 0 4px 0 color-mix(in srgb, var(--color-text) 20%, transparent);
    }
    .ToggleOtherOptionForm .from-sec label{
      color:var(--color-text);font-size:16px;line-height:27.32px;font-weight:600;font-family:"Manrope",sans-serif;margin:0!important;
    }
    .ToggleOtherOptionForm .from-sec label.form-label{padding-bottom:10px;}
    .ToggleOtherOptionForm .from-sec input[type="text"],
    .ToggleOtherOptionForm .from-sec input[type="email"]{height:52px;background:var(--color-bg);color:var(--color-text);border:1px solid color-mix(in srgb, var(--color-text) 20%, transparent);}
    .from-sec textarea{background:var(--color-bg);color:var(--color-text);border:1px solid color-mix(in srgb, var(--color-text) 20%, transparent);}
    .from-sec input:focus,.from-sec textarea:focus{
      outline:none;box-shadow:0 0 0 4px color-mix(in srgb, var(--color-primary) 25%, transparent)!important;
      border:1px solid var(--color-primary);
    }
    .from-sec input[type=radio]{border-radius:2px!important;height:20px!important;accent-color:var(--color-primary);}
    .from-sec .submit-btn{
      font-family:"Manrope",sans-serif;color:color-mix(in srgb, var(--color-bg) 92%, white);
      background:var(--color-primary);padding:15px 30px;border-radius:10px;font-size:18px;font-weight:700;border:1px solid var(--color-primary);
    }
    .from-sec .submit-btn:hover{color:var(--color-primary);border:1px solid var(--color-primary);background:transparent;transition:.3s ease;}

    /* Review button */
    .myreviewbtn{
      color:white !important;
      border:1px solid var(--color-text);
      background:#000 !important;
      display:flex;align-items:center;font-family:"Manrope",sans-serif;padding:15px 30px;border-radius:10px;font-size:18px;font-weight:700;
    }
    .myreviewbtn:hover{
      background-color: #C0C7D1 !important;
      color: black !important;
    }
    .myreviewbtn:hover .fw-bold{
        color: black !important;
    }
    .myreviewbtn .fa-star{color:#FFD700;font-size:16px;margin-right:5px;}
    .myreviewbtn:hover .fa-star{color:#FFD700 !important;}
    .myreviewbtn .fw-bold{color:var(--color-text);}
    
    .google-imgsource img{
        margin-right: 5px;
    }
    }

    /* Responsive */
    @media(max-width:1200px){
      .deviceType-box{padding:30px 15px!important;}
    }
    @media(max-width:991px){
      .custom-deviceType-page{padding:40px 15px;}
      .device-type-items{gap:15px;}
      .deviceType-box{padding:30px 15px!important;flex:0 0 320px;width:320px;}
      .deviceType-box a{width:168px;height:40px;font-size:16px;line-height:21.86px;border-radius:10px;}
      .deviceType-box figure{height:235px;margin-bottom:20px;}
      .from-sec .row{row-gap:30px;}
    }
    @media(max-width:768px){
      .device-type-heading p{font-size:16px;line-height:22.32px;}
      .breadcrumb li a{font-size:14px;color:#C0C7D1;}
      .device-type-section h3{font-size:25px;line-height:32px;padding-bottom:40px;}
      .ToggleOtherOptionForm .from-sec{border-radius:5px;padding:30px;}
      .from-sec .submit-btn{padding:9px 22px;border-radius:5px;font-size:15px;margin-bottom:30px;}
      .myreviewbtn{padding:9px 22px;border-radius:5px;font-size:14px;}
      .myreviewbtn .fa-star{font-size:13px;}
    }
    @media(max-width:576px){
      .ToggleOtherOptionForm .from-sec{padding:20px;}
      .device-type-items{gap:15px;}
      .deviceType-box{padding:25px 15px!important;width:220px;flex:0 0 220px;margin:0 auto;}
      .deviceType-box a{height:35px;font-size:14px;line-height:13.66px;border-radius:5px;}
      .deviceType-box figure{height:150px;margin-bottom:20px;}
    }
  </style>

  <section class="device-type-head">
    <div class="cust-container">
      <div class="device-type-heading">
        <p>
          {!! $webContent->repair_page_heading_1 !!}
          {!! $webContent->repair_page_heading_2 !!}
        </p>
      </div>
      <nav aria-label="breadcrumb" class="py-3 py-md-4">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="https://houseofgadgets.co.uk/">Home</a></li>
          <li class="breadcrumb-item"><a href="https://houseofgadgets.co.uk/categories">Device Type</a></li>
        </ol>
      </nav>
    </div>
  </section>

  <div class="custom-deviceType-page">
    <div class="cust-container">
      <div class="device-type-section">
        <h3>{!! $webContent->repair_page_heading_3 !!}</h3>

        <div class="device-type-items">
          @forelse($categories as $category)
            @if ($category->name != 'Apple iPad')
              <div class="deviceType-box" style="cursor:pointer;" onclick="window.location='{{ route('device-types', $category->slug) }}'">
                <figure>
                  <img src="{{ $category->file ?? '' }}" alt="feature image">
                </figure>
                <a>{{ $category['name'] }}</a>
              </div>
            @endif
          @empty
            <span>Not Found</span>
          @endforelse
        </div>

        <div class="ToggleOtherOptionForm">
          <small>Ask For Qoute Below</small>
          <h3>Can't Find Your Model?</h3>
          <div class="from-sec">
            <div>
              <form wire:submit.prevent="sendCustomerEmail">
                <!-- your existing form stays same -->
              </form>

              @if (session()->has('emailSent'))
                <div><p>Thank you! The information has been sent to your email.</p></div>
              @endif
            </div>
          </div>
        </div>
        <!-- end -->
      </div>
    </div>

    <section class="cust-container px-3 pb-md-4 review-section">
      <div class="row">
        <div class="col-md-12 mb-5 d-flex justify-content-center">
          <a href="{{ $reviewUrl }}" target="_blank" rel="noopener">
            <button type="button" class="btn myreviewbtn">
              Review us  &nbsp;
              <strong class="me-1">{{ number_format($rounded, 1) }}</strong>

              {{-- ⭐ dynamic star icons --}}
              @for($i=0; $i<$full; $i++)
                <i class="fa-solid fa-star"></i>
              @endfor
              @if($half)
                <i class="fa-solid fa-star-half-stroke"></i>
              @endif
              @for($i=0; $i<$empty; $i++)
                <i class="fa-regular fa-star"></i>
              @endfor
             
              @if($count>0)
                <span class="ms-2">({{ $count }})</span>
              @endif
                <span class="google-imgsource"><img src="https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png" height="48px" width="48px"  alt="Google"></span>
            </button>
          </a>
        </div>
      </div>
    </section>
  </div>

  <style>
    .review-section { margin-top: 48px; }
    @media (min-width: 992px){ .review-section { margin-top: 80px; } }

    .myreviewbtn{
      color: var(--color-text);
      border: 1px solid var(--color-text);
      background: var(--color-surface);
      display:flex;align-items:center;
      font-family:"Manrope",sans-serif;font-style:normal;
      padding:15px 30px;border-radius:10px;font-size:18px;font-weight:700;
      transition:.25s ease;
    }
    .myreviewbtn:hover{ background: var(--color-bg); border: 1px solid var(--color-primary); }
    .myreviewbtn .fa-star{ color:#FFD700; font-size:16px; margin-right:5px; transition:.2s ease; }
    .myreviewbtn:hover .fa-star{ color: var(--color-primary); }
    .myreviewbtn .fw-bold{ color: var(--color-text); }
    @media (max-width:768px){
      .myreviewbtn{padding:9px 7px;border-radius:5px;font-size:14px;}
      .myreviewbtn .fa-star{font-size:13px;}
    }
  </style>

  <script>
    function toggleVisibility() {
      const contentDiv = document.querySelector('.ToggleOtherOptionForm');
      if (contentDiv) {
        contentDiv.style.display = contentDiv.style.display === 'none' ? 'block' : 'none';
        if (contentDiv.style.display === 'block') {
          contentDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
    }
    document.addEventListener('DOMContentLoaded', () => {
      const contentDiv = document.querySelector('.ToggleOtherOptionForm');
      if (contentDiv) { contentDiv.style.display = 'none'; }
    });
  </script>
</div>
