<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('frontend.sections.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="<?php echo e(route('asset.theme', ['v' => cache('site.theme_version', 1)])); ?>">

    
    <style>
      .text-danger{ color: var(--color-primary) !important; }
      .border-danger{ border-color: var(--color-primary) !important; }
      .btn-danger{
        background: var(--color-primary) !important;
        border-color: var(--color-primary) !important;
      }
    </style>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
</head>

<body>
    
    <?php
       
        $cookieBizName    = $siteSetting->buisness_name ?? 'House Of Gadgets';
        $cookieWebsiteUrl = $siteSetting->website_url   ?? 'https://houseofgadgets.co.uk';
        $cookieDomain     = preg_replace('#^https?://#', '', rtrim($cookieWebsiteUrl, '/'));
    ?>

    
    <div id="kf-cookie-overlay" style="
        position:fixed; inset:0;
        background:rgba(0,0,0,0.55);
        z-index:99990;
        display:none;
    "></div>

    
    <div id="kf-cookie-popup" style="
        position:fixed; top:50%; left:50%;
        transform:translate(-50%,-50%);
        z-index:99999; display:none;
        width:460px; max-width:calc(100vw - 32px);
        border-radius:16px; overflow:hidden;
        box-shadow:0 20px 60px rgba(0,0,0,0.25);
        font-family:inherit;
    ">
        
        <div style="
            background:linear-gradient(135deg, #85898c 0%, #85898c 50%, #85898c 100%);
            padding:1.6rem 1.75rem;
            position:relative; overflow:hidden;
        ">
            
            <div style="position:absolute;top:-20px;right:-20px;width:110px;height:110px;background:rgba(255,255,255,0.06);border-radius:50%;"></div>
            <div style="position:absolute;top:15px;right:45px;width:55px;height:55px;background:rgba(255,255,255,0.06);border-radius:50%;"></div>
            <div style="position:absolute;bottom:-30px;left:-20px;width:90px;height:90px;background:rgba(255,255,255,0.04);border-radius:50%;"></div>

            <div style="display:flex;align-items:center;gap:12px;margin-bottom:10px;position:relative;">
                <div style="width:38px;height:38px;background:rgba(255,255,255,0.18);border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:19px;">🔒</div>
                <div>
                    <p style="margin:0;color:#fff;font-size:15px;font-weight:700;line-height:1.2;"><?php echo e($cookieBizName); ?></p>
                    <p style="margin:0;color:rgba(255,255,255,0.55);font-size:10px;"><?php echo e($cookieDomain); ?></p>
                </div>
                <span style="margin-left:auto;background:rgba(255,255,255,0.18);color:#fff;font-size:9px;padding:3px 10px;border-radius:20px;font-weight:700;letter-spacing:0.06em;">PRIVACY</span>
            </div>
            <p style="margin:0;color:rgba(255,255,255,0.88);font-size:12.5px;line-height:1.65;position:relative;">
                We use cookies to enhance your browsing experience and analyse site traffic. Your data is never sold to third parties.
            </p>
        </div>

        
        <div style="background:#fff;padding:1.25rem 1.75rem;">
            <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:10px;">
                <button onclick="kfAcceptAll()" style="
                    flex:2; min-width:140px; padding:11px 16px;
                    background:linear-gradient(135deg, #85898c, #85898c);
                    color:#fff; border:none;
                    border-radius:8px; font-size:13px; font-weight:700;
                    cursor:pointer; letter-spacing:0.02em;
                    box-shadow: 0 3px 10px rgba(139,0,0,0.3);
                ">✓ Accept All</button>

                <button onclick="kfDeclineAll()" style="
                    flex:1; min-width:90px; padding:11px 12px;
                    background:#fff; color:#9ca3af;
                    border:1px solid #e5e7eb; border-radius:8px;
                    font-size:12px; cursor:pointer;
                ">Decline</button>
            </div>

            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px;">
                <button onclick="kfOpenSettings()" style="
                    background:none; border:none;
                    color:#85898c; font-size:12px;
                    cursor:pointer; text-decoration:underline; padding:0;
                ">⚙️ Manage Cookie Settings</button>

                <a href="<?php echo e(rtrim($cookieWebsiteUrl,'/')); ?>/privacy-policy"
                   style="color:#9ca3af;font-size:11px;text-decoration:underline;">
                    Privacy Policy
                </a>
            </div>
        </div>
    </div>

    
    <div id="kf-cookie-settings" style="
        position:fixed; top:50%; left:50%;
        transform:translate(-50%,-50%);
        z-index:100000; display:none;
        width:480px; max-width:calc(100vw - 32px);
        border-radius:16px; overflow:hidden;
        box-shadow:0 20px 60px rgba(0,0,0,0.3);
        font-family:inherit; background:#fff;
    ">
        
        <div style="background:linear-gradient(135deg, #85898c, #85898c);padding:1.25rem 1.75rem;display:flex;align-items:center;justify-content:space-between;">
            <div>
                <p style="margin:0;color:#fff;font-size:15px;font-weight:700;">⚙️ Cookie Settings</p>
                <p style="margin:0;color:rgba(255,255,255,0.6);font-size:11px;"><?php echo e($cookieDomain); ?></p>
            </div>
            <button onclick="kfCloseSettings()" style="
                background:rgba(255,255,255,0.18); border:none; color:#fff;
                width:30px; height:30px; border-radius:50%;
                cursor:pointer; font-size:16px;
                display:flex; align-items:center; justify-content:center;
            ">✕</button>
        </div>

        
        <div style="padding:1.5rem 1.75rem;">
            <p style="font-size:12.5px;color:#6b7280;line-height:1.65;margin:0 0 1.25rem;">
                Choose which cookies you want to allow. Essential cookies are always on as they are required for the site to work.
            </p>

            
            <div style="display:flex;align-items:flex-start;justify-content:space-between;padding:14px 0;border-bottom:1px solid #f3f4f6;">
                <div style="flex:1;padding-right:1rem;">
                    <p style="margin:0 0 3px;font-size:13px;font-weight:700;color:#111;">Essential Cookies</p>
                    <p style="margin:0;font-size:11.5px;color:#9ca3af;line-height:1.5;">Required for the website to function. Cannot be disabled.</p>
                </div>
                <div style="display:flex;align-items:center;gap:6px;padding-top:2px;">
                    <span style="font-size:11px;color:#22c55e;font-weight:600;">Always On</span>
                    <div style="width:40px;height:22px;background:#22c55e;border-radius:20px;position:relative;">
                        <div style="position:absolute;top:3px;right:3px;width:16px;height:16px;background:#fff;border-radius:50%;"></div>
                    </div>
                </div>
            </div>

            
            <div style="display:flex;align-items:flex-start;justify-content:space-between;padding:14px 0;border-bottom:1px solid #f3f4f6;">
                <div style="flex:1;padding-right:1rem;">
                    <p style="margin:0 0 3px;font-size:13px;font-weight:700;color:#111;">Analytics Cookies</p>
                    <p style="margin:0;font-size:11.5px;color:#9ca3af;line-height:1.5;">Help us understand how visitors interact with our website.</p>
                </div>
                <div id="kf-analytics-toggle" onclick="kfToggle('analytics')" style="width:40px;height:22px;background:#85898c;border-radius:20px;position:relative;cursor:pointer;transition:background 0.2s;">
                    <div id="kf-analytics-dot" style="position:absolute;top:3px;right:3px;width:16px;height:16px;background:#fff;border-radius:50%;transition:all 0.2s;"></div>
                </div>
            </div>

            
            <div style="display:flex;align-items:flex-start;justify-content:space-between;padding:14px 0;border-bottom:1px solid #f3f4f6;">
                <div style="flex:1;padding-right:1rem;">
                    <p style="margin:0 0 3px;font-size:13px;font-weight:700;color:#111;">Performance Cookies</p>
                    <p style="margin:0;font-size:11.5px;color:#9ca3af;line-height:1.5;">Used to improve website speed and performance.</p>
                </div>
                <div id="kf-performance-toggle" onclick="kfToggle('performance')" style="width:40px;height:22px;background:#85898c;border-radius:20px;position:relative;cursor:pointer;transition:background 0.2s;">
                    <div id="kf-performance-dot" style="position:absolute;top:3px;right:3px;width:16px;height:16px;background:#fff;border-radius:50%;transition:all 0.2s;"></div>
                </div>
            </div>

            
            <div style="display:flex;align-items:flex-start;justify-content:space-between;padding:14px 0;">
                <div style="flex:1;padding-right:1rem;">
                    <p style="margin:0 0 3px;font-size:13px;font-weight:700;color:#111;">Marketing Cookies</p>
                    <p style="margin:0;font-size:11.5px;color:#9ca3af;line-height:1.5;">Used to show relevant ads and track marketing campaigns.</p>
                </div>
                <div id="kf-marketing-toggle" onclick="kfToggle('marketing')" style="width:40px;height:22px;background:#e5e7eb;border-radius:20px;position:relative;cursor:pointer;transition:background 0.2s;">
                    <div id="kf-marketing-dot" style="position:absolute;top:3px;left:3px;width:16px;height:16px;background:#fff;border-radius:50%;transition:all 0.2s;"></div>
                </div>
            </div>

            <button onclick="kfSaveSettings()" style="
                width:100%; padding:12px;
                background:linear-gradient(135deg, #85898c, #85898c);
                color:#fff; border:none; border-radius:9px;
                font-size:13.5px; font-weight:700;
                cursor:pointer; margin-top:8px;
                box-shadow: 0 3px 10px rgba(139,0,0,0.3);
            ">✓ Save My Preferences</button>

            <button onclick="kfCloseSettings()" style="
                width:100%; padding:10px;
                background:#f9fafb; color:#6b7280;
                border:1px solid #e5e7eb; border-radius:9px;
                font-size:12px; cursor:pointer; margin-top:8px;
            ">← Back</button>
        </div>
    </div>

    
    <script>
        var kfToggles = { analytics: true, performance: true, marketing: false };

        document.addEventListener('DOMContentLoaded', function () {
            if (!localStorage.getItem('kf_cookieChoice')) {
                document.getElementById('kf-cookie-popup').style.display   = 'block';
                document.getElementById('kf-cookie-overlay').style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        });

        function kfAcceptAll() {
            localStorage.setItem('kf_cookieChoice',  'all');
            localStorage.setItem('kf_analytics',     'true');
            localStorage.setItem('kf_performance',   'true');
            localStorage.setItem('kf_marketing',     'true');
            kfCloseAll();
        }

        function kfDeclineAll() {
            localStorage.setItem('kf_cookieChoice',  'declined');
            localStorage.setItem('kf_analytics',     'false');
            localStorage.setItem('kf_performance',   'false');
            localStorage.setItem('kf_marketing',     'false');
            kfCloseAll();
        }

        function kfOpenSettings() {
            document.getElementById('kf-cookie-popup').style.display    = 'none';
            document.getElementById('kf-cookie-settings').style.display = 'block';
        }

        function kfCloseSettings() {
            document.getElementById('kf-cookie-settings').style.display = 'none';
            document.getElementById('kf-cookie-popup').style.display    = 'block';
        }

        function kfSaveSettings() {
            localStorage.setItem('kf_cookieChoice',  'custom');
            localStorage.setItem('kf_analytics',     kfToggles.analytics   ? 'true' : 'false');
            localStorage.setItem('kf_performance',   kfToggles.performance ? 'true' : 'false');
            localStorage.setItem('kf_marketing',     kfToggles.marketing   ? 'true' : 'false');
            kfCloseAll();
        }

        function kfCloseAll() {
            document.getElementById('kf-cookie-popup').style.display    = 'none';
            document.getElementById('kf-cookie-settings').style.display = 'none';
            document.getElementById('kf-cookie-overlay').style.display  = 'none';
            document.body.style.overflow = 'auto';
        }

        function kfToggle(name) {
            kfToggles[name] = !kfToggles[name];
            var tog = document.getElementById('kf-' + name + '-toggle');
            var dot = document.getElementById('kf-' + name + '-dot');
            if (kfToggles[name]) {
                tog.style.background = '#85898c';
                dot.style.right = '3px';
                dot.style.left  = 'auto';
            } else {
                tog.style.background = '#e5e7eb';
                dot.style.left  = '3px';
                dot.style.right = 'auto';
            }
        }
    </script>


    <!-- GTM noscript -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQHMKBMJ"
                height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>

    
    <?php echo $__env->yieldContent('content'); ?>
    <?php if(isset($slot)): ?> <?php echo e($slot); ?> <?php endif; ?>

    <?php echo $__env->make('frontend.sections.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- WhatsApp Floating Button -->
    <!-- WhatsApp Floating Button -->
   <?php
use App\Models\SiteSetting;
$setting = SiteSetting::first();
?>

<?php if(!empty($setting) && !empty($setting->whatsapp_number)): ?>
    <?php
        // remove any +, spaces, or dashes for WhatsApp link
        $whatsappNumber = preg_replace('/\D+/', '', $setting->whatsapp_number);
        $businessName = $setting->business_name ?? 'House of Gadgets';
        $defaultMessage = urlencode("Hello {$businessName}, I'd like some help with my device.");
    ?>

    <a
      href="https://api.whatsapp.com/send?phone=<?php echo e($whatsappNumber); ?>&text=<?php echo e($defaultMessage); ?>"
      class="whatsapp-float"
      target="_blank"
      rel="noopener"
      aria-label="Chat with <?php echo e($businessName); ?> on WhatsApp"
      title="Chat with <?php echo e($businessName); ?> on WhatsApp"
    >
      <i class="fab fa-whatsapp whatsapp-icon"></i>
    </a>
<?php endif; ?>

<style>
  /* Floating WhatsApp button */
  .whatsapp-float{
    position: fixed;
    right: 20px;
    bottom: 20px;
    width: 58px;
    height: 58px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #25D366;
    color: #fff !important;
    box-shadow: 0 10px 20px rgba(0,0,0,.15);
    z-index: 9999;
    text-decoration: none;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
  }
  .whatsapp-float:hover{
    transform: translateY(-2px) scale(1.03);
    box-shadow: 0 12px 24px rgba(0,0,0,.18);
    background: #1ebe5d;
  }
  .whatsapp-icon{
    font-size: 28px;
    line-height: 1;
  }

  @media (max-width: 576px){
    .whatsapp-float{
      right: 14px;
      bottom: 14px;
      width: 68px;
      height: 68px;
    }
    .whatsapp-icon{
      font-size: 34px;
    }
  }
</style>



    <style>
      .whatsapp-float{
        position:fixed; bottom:20px; right:20px; z-index:999;
        background-color:#25D366; color:white; border-radius:50%;
        padding:12px; box-shadow:0 4px 8px rgba(0,0,0,0.2);
        text-align:center; width:55px; height:55px;
      }
      .whatsapp-icon{ font-size:30px; line-height:1; }
    </style>
    

    <?php echo $__env->make('frontend.partials.chatbot_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.sections.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>