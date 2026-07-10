<div>
    @php
        use App\Models\FormStatus;
        use App\Models\Branch;

        $formStatuses = FormStatus::where('name', 'services')->first();
        $head_branch  = Branch::orderBy('created_at', 'ASC')->first();

        // always prefer dynamic site name
        $brand = $siteSettings->buisness_name ?? 'House Of Gadgets';
    @endphp
@php
use App\Models\SiteSetting;
$setting = SiteSetting::first();
@endphp

    <style>
      @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');

      footer{
        display:block;width:100%;float:left;padding:72px 15px 0;
        background:var(--color-primary);
        font-family:"Manrope",serif;
      }
      a{ color:var(--color-text); text-decoration:none; }

      .custom-container{max-width:1283px;margin:0 auto;}

      .footer-logo-box h4{
        font-size:28px;line-height:34.13px;margin:0;padding-bottom:20px;
        color:color-mix(in srgb, var(--color-bg) 92%, white);
        font-weight:700;
      }
      .footer-logo-box p{
        font-size:14px;line-height:24px;letter-spacing:-.28px;margin:0;padding-bottom:40px;max-width:242px;
        color:color-mix(in srgb, var(--color-bg) 85%, white);
        text-transform:capitalize;font-weight:500;
      }

      .footer-social-icons a{
        color:color-mix(in srgb, var(--color-bg) 92%, white) !important;
        font-size:20px;
      }

      .footer-box h5{
        font-size:21px;line-height:24px;font-weight:700;text-transform:capitalize;margin:0;padding-bottom:28px;
        color:color-mix(in srgb, var(--color-bg) 92%, white);
      }

      .footer-box .newsLetter-input{position:relative;max-width:420px;margin-bottom:13px;}
      .footer-box .newsLetter-input input{
        max-width:420px;width:100%;height:60px;padding:15px;border-radius:10px;outline:0;border:0;
        font-size:16px;letter-spacing:-.30px;
        background:var(--color-surface); color:var(--color-text);
      }
      .footer-box .newsLetter-input button{
        width:158px;height:54px;border-radius:10px;display:flex;justify-content:center;align-items:center;position:absolute;top:3px;right:3px;
        background:var(--color-text);
        color:var(--color-bg) !important;
        font-size:16px;line-height:21.86px;font-weight:600;border:1px solid var(--color-text);
      }

      .footer-box form p{
        font-size:14px;line-height:26px;letter-spacing:-.28px;margin:0;padding-bottom:40px;text-transform:capitalize;font-weight:500;
        color:color-mix(in srgb, var(--color-bg) 85%, white);
      }

      .footer-box ul{list-style:none;padding-left:0;}
      .footer-box ul li{margin-bottom:15px;display:flex;align-items:center;font-size:14px;color:color-mix(in srgb, var(--color-bg) 92%, white);}
      .footer-box ul li:last-child{margin-bottom:0!important;}
      .footer-box ul li a{
        font-size:14px;line-height:24px;font-weight:500;text-decoration:none;
        color:color-mix(in srgb, var(--color-bg) 88%, white) !important;
      }

      .copy-write-sec .custom-container { text-align: center; }
      .copy-write-sec .copy-write-content.single-line{
        display:flex;justify-content:center;align-items:center;padding:12px 0;gap:0;
      }
      .copy-write-sec .copy-write-content p{ margin:0; }

      .copy-write-sec{
        border-top:1px solid color-mix(in srgb, var(--color-bg) 75%, transparent);
        background:var(--color-primary); float:left;width:100%;display:block;
      }
      .copy-write-content{display:flex;justify-content:space-between;padding:29px 0;}
      .copy-write-content a,.copy-write-content p{
        font-size:14px;text-transform:capitalize;font-weight:500;text-decoration:none;
        color:color-mix(in srgb, var(--color-bg) 85%, white) !important;
      }

      footer .row{row-gap:30px;}

      @media(max-width:768px){
        footer{padding:40px 15px 0;}
        .footer-box .newsLetter-input input{height:48px;border-radius:5px;font-size:14px;}
        .footer-box .newsLetter-input button{width:110px;height:44px;font-size:14px;line-height:21.86px;border-radius:5px;top:2px;right:2px;}
        .footer-box h5{font-size:18px;line-height:22px;padding-bottom:23px;}
        .footer-logo-box p{padding-bottom:20px;}
        .copy-write-content{flex-direction:column;align-items:center;padding:10px 0;}
        .copy-write-content a,.copy-write-content p{font-size:13px;}
      }

      @media(max-width:576px){
        footer{padding:40px 13px 0;}
        .footer-logo-box h4{font-size:24px;line-height:30.13px;padding-bottom:20px;text-align:center;}
        .footer-logo-box p{text-align:center;margin:0 auto!important;}
        .footer-social-icons{text-align:center;}
        .footer-accordion h5{padding:0!important;}
        .footer-box ul li{margin-bottom:10px;font-size:12px;}
        .footer-box ul li a{font-size:12px;}
        .footer-panel{padding-top:25px;}
        .footer-accordion{position:relative;}
        .footer-accordion:after{
          content:'\002B'; color:color-mix(in srgb, var(--color-bg) 92%, white);
          font-family:"Font Awesome 6 Free"; font-size:18px; position:absolute; top:0; right:0; display:flex; align-items:center; height:100%;
        }
        .footer-accordion.active:after{
          content:'\2212' !important; color:color-mix(in srgb, var(--color-bg) 92%, white);
          font-family:"revicons"; font-size:21px; position:absolute; top:0; right:0; display:flex; align-items:center; height:100%;
        }
        .footer-panel{display:none; overflow:hidden; transition:.5s ease-out; text-align:left;}
        .footer-box form p{font-size:12px;line-height:19px;padding-bottom:10px;}
      }
    </style>

    <footer>
      <div class="custom-container">
        <div class="row pb-4 pb-md-5">
          <div class="col-sm-6 col-lg-3 col-xl-4">
            <div class="footer-logo-box">
              {{-- ✅ ALWAYS use dynamic site name first, then fallback to branch, then generic --}}
              <a href="/"><h4>{{ $siteSettings->buisness_name ?? ($head_branch->name ?? 'Website') }}</h4></a>
              <p>Your {{ $brand }} partners in UK. Welcome to {{ $brand }}</p>

              {{-- DYNAMIC SOCIAL ICONS --}}
              <div class="footer-social-icons">
                @if(($siteSettings->fb_link_status ?? false) && !empty($siteSettings->fb_link))
                  <a target="_blank" href="{{ $siteSettings->fb_link }}" aria-label="Facebook">
                    <i class="fa-brands fa-facebook-f me-2"></i>
                  </a>
                @endif

                @if(($siteSettings->insta_link_status ?? false) && !empty($siteSettings->insta_link))
                  <a target="_blank" href="{{ $siteSettings->insta_link }}" aria-label="Instagram">
                    <i class="fa-brands fa-instagram me-2"></i>
                  </a>
                @endif

                @if(($siteSettings->twitter_link_status ?? false) && !empty($siteSettings->twitter_link))
                  <a target="_blank" href="{{ $siteSettings->twitter_link }}" aria-label="Twitter/X">
                    <i class="fa-brands fa-x-twitter me-2"></i>
                  </a>
                @endif

                @if(($siteSettings->tiktok_link_status ?? false) && !empty($siteSettings->tiktok_link))
                  <a target="_blank" href="{{ $siteSettings->tiktok_link }}" aria-label="TikTok">
                    <i class="fa-brands fa-tiktok me-2"></i>
                  </a>
                @endif

                @if(($siteSettings->linkedin_link_status ?? false) && !empty($siteSettings->linkedin_link))
                  <a target="_blank" href="{{ $siteSettings->linkedin_link }}" aria-label="LinkedIn">
                    <i class="fa-brands fa-linkedin-in me-2"></i>
                  </a>
                @endif

                @if(($siteSettings->snapchat_link_status ?? false) && !empty($siteSettings->snapchat_link))
                  <a target="_blank" href="{{ $siteSettings->snapchat_link }}" aria-label="Snapchat">
                    <i class="fa-brands fa-snapchat"></i>
                  </a>
                @endif
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-lg-4 col-xl-3">
            <div class="footer-box">
              <div class="footer-accordion"><h5>We Accept:</h5></div>
              <div class="weaccept-Images footer-panel">
                <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/FooterSection/pngwing.com%20(10).png" alt="1" class="me-3">
                <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/FooterSection/pngwing.com%20(11).png" alt="2" class="me-3">
                <img src="https://ik.imagekit.io/myfirstKit/irepairLondon/FooterSection/pngwing.com%20(10).png" alt="3">
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="footer-box">
              <div class="footer-accordion"><h5>Join Our Newsletter</h5></div>
              <div class="footer-panel">
                <form action="#">
                  <div class="newsLetter-input">
                    <input type="email" placeholder="Your email address">
                    <button type="submit">Subscribe</button>
                  </div>
                  <p>Subscribe to get promotions, discounts and offers.</p>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="row pb-4">
          <div class="col-sm-6 col-lg-3">
            <div class="footer-box">
              <div class="footer-accordion"><h5>Categories</h5></div>
              <ul class="footer-panel">
                @if ($formStatuses->repair ?? false)
                  <li><a href="{{ route('categories') }}" class="footer-link">Repair A Device</a></li>
                @endif
                <li><a href="{{ route('stores') }}" class="footer-link">Stores</a></li>
              </ul>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3">
            <div class="footer-box">
              <div class="footer-accordion"><h5>Information</h5></div>
              <ul class="footer-panel">
                <li><a href="{{ route('terms-and-conditions') }}" class="footer-link">Terms & Conditions</a></li>
                <li><a href="{{ route('privacy-and-policy') }}" class="footer-link">Privacy Policy</a></li>
                <li><a href="{{ route('aboutus') }}" class="footer-link">About us</a></li>
              </ul>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3">
            <div class="footer-box">
              <div class="footer-accordion"><h5>Company</h5></div>
              <ul class="footer-panel">
                <li><a href="{{ route('home') }}" class="footer-link">Home</a></li>
                <li><a href="{{ route('aboutus') }}" class="footer-link">About Us</a></li>
                @if ($formStatuses->repair ?? false)
                  <li><a href="{{ route('categories') }}" class="footer-link">Book a repair</a></li>
                @endif
              </ul>
            </div>
          </div>

          <div class="col-sm-6 col-lg-3">
            <div class="footer-box">
              <div class="footer-accordion"><h5>Contact Us</h5></div>
              <ul class="footer-panel">
                <li>
                  <i class="fa-solid fa-phone me-2"></i>
                  <a href="tel:{{ $head_branch->landline_number ?? '' }}" class="footer-link">{{ $head_branch->landline_number ?? '' }}</a>
                </li>
                <li>
                  <i class="fa-solid fa-envelope me-2"></i>
                  <a href="mailto:{{ $head_branch->email ?? '' }}" class="footer-link">{{ $head_branch->email ?? '' }}</a>
                </li>
                <li>
                  <i class="fa-solid fa-location-dot me-2"></i>
                  <a href="{{ $siteSettings->google_map_profile_link }}" target="_blank" class="footer-link">
                    {{ ($head_branch->address_line_1 ?? '') . ' ' . ($head_branch->address_line_2 ?? '') }}
                  </a>
            
                 
                {{--   <a
  href="{{
    (($siteSettings->google_map_profile_link_status ?? false) && !empty($siteSettings->google_map_profile_link))
      ? $siteSettings->google_map_profile_link
      : (!empty($head_branch->latitude) && !empty($head_branch->longitude)
          ? 'https://www.google.com/maps?q=' . $head_branch->latitude . ',' . $head_branch->longitude
          : 'https://www.google.com/maps/search/?api=1&query=' . urlencode(trim(($head_branch->address_line_1 ?? '') . ' ' . ($head_branch->address_line_2 ?? '') . ' ' . ($head_branch->postcode ?? '')))
        )
  }}"
  target="_blank" rel="noopener" class="footer-link">
  {{ trim(($head_branch->address_line_1 ?? '') . ' ' . ($head_branch->address_line_2 ?? '')) }}
</a> --}}

                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <div class="copy-write-sec">
      <div class="px-2 px-sm-3">
        <div class="custom-container">
          <div class="copy-write-content single-line">
            <p class="mb-0">Copyright © {{ date('Y') }} {{ $brand }} - All Rights Reserved.</p>
          </div>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      var acc = document.getElementsByClassName("footer-accordion");
      for (var i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          panel.style.display = (panel.style.display === "block") ? "none" : "block";
        });
      }
    </script>
</div>
