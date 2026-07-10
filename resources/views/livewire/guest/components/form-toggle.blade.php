<div>
    @php
        $tagline = [
            'sell' => 'How you’ll send your device',
            'repair' => 'How would you like us to repair your device?',
            'buy' => 'How you’ll get your device',
        ];

        $heading = [
            'sell' => 'Selling Options',
            'repair' => 'Repair Options',
            'buy' => 'Buying Options',
        ];

        $postalText = [
            'sell' => 'Post Your Device',
            'repair' => 'Postal Repair',
            'buy' => 'Post My Device',
        ];

        $formService = strtolower($data['service']);
      @endphp
 
<script>
     if ('scrollRestoration' in history) {
           history.scrollRestoration = 'manual';
      }

    window.onload = function () {
            window.scrollTo(0, 0);
        };

     window.onbeforeunload = function () {
        window.scrollTo(0, 0);
     };
</script>

<style>
     .custom-select-formSec{
        width: 100%;
        float: left;
        display: block;
        padding-bottom: 72px;
     } 
     .custom-container{
        max-width: 1140px;
        margin: 0 auto;
     }
     .custom-select-formSec small{
               font-size: 18px;
                font-family: 800;
                line-height: 24.59px;
                color: #EA1555;
                font-family: "Manrope", sans-serif;
                font-style: normal;
                display: block;
                text-align: center;
     }
     .custom-select-formSec h3{
                font-size: 32px;
                text-align: center;
                line-height: 60px;
                font-weight: 700;
                color: #000;
                font-family: "Manrope", sans-serif;
                font-style: normal;
                margin: 0 !important;
                padding-bottom: 50px;
                letter-spacing: -0.33px;
     }
     .select-form-main{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap; 
        gap: 30px;
     }
     .select-form-main .form-box{
        width: 470px; 
        height: 100%;
        background: #fff;
        border-radius: 10px; 
        padding: 25px;
        display: flex;
        flex-direction: column;  
        cursor: pointer;
        transition: all 0.3s ease;
        border: 1px solid rgba(234, 21, 85, 1);
     }
     .select-form-main .form-box:hover{
        box-shadow: 0 4px 40px #dc3545 !important;
        transition: 0.3s ease;
     }
     .select-form-main .form-box figure{ 
        width: 97px;
        height: 97px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #EA15551F;
        margin-bottom: 30px;
     }
     .select-form-main .form-box figure img{
        width: 50px;
        object-fit: contain;
      
     }
     .select-form-main .form-box .box-content h4{
        font-size: 24px;
        font-weight: 600;
        line-height: 40px;
        text-transform: capitalize;
        color: #000;
        font-family: "Manrope", sans-serif;
        font-style: normal;
        margin: 0;
        padding-bottom: 15px;
     }
     .select-form-main .form-box .box-content p{
        font-size: 18px;
        font-weight: 400;
        line-height: 23px;
        color: #444444B2;
        font-family: "Manrope", sans-serif;
        font-style: normal;
        margin: 0;
        letter-spacing: -0.30px;
        
     }
     @media(max-width:1200px){
        .select-form-main .form-box{
            width: 350px; 
            height: 100%;
        }
        .select-form-main .form-box figure {
         width: 80px;
         height: 80px;
         margin-bottom: 20px;
        }
        .select-form-main .form-box figure img{
            width: 40px;
        }
        .select-form-main .form-box .box-content h4 {
           font-size: 20px; 
           line-height: 25px;  
           padding-bottom: 10px;
        }
        .select-form-main{ 
            gap: 15px;
        }
     }
     @media(max-width:767px){
        .custom-select-formSec{
            padding-bottom: 40px;
        }
        .select-form-main .form-box .box-content p {
            font-size: 15px;
            line-height: 21px;
        }
        .custom-select-formSec h3{
            font-size: 25px;
            line-height: 32px;
            padding-bottom: 40px;
        }
        .select-form-main .form-box{  
            padding: 20px;
            flex-direction: row;
            gap: 20px
        }
        .select-form-main .form-box figure {
        width: 80px;
        height: 80px;
        margin-bottom: 0;
        flex: 0 0 80px;
        }
        .select-form-main .form-box .box-content h4 {
           font-size: 18px;
           line-height: 25px;
           padding-bottom: 10px;
         }

     }
     @media(max-width:548px){
        .select-form-main .form-box{  
            padding: 20px 15px; 
            gap: 10px;
            max-width: 350px;
            width: 100% !important;
        }
     }
     /* ================= THEME HOOKS (models select grid) ================= */

/* Page + container */
.custom-select-formSec{
  background: var(--color-background, #fff) !important;
}
.custom-container, .cunstom-container{ /* typo safeguard */
  color: var(--color-text, #111) !important;
}

/* Section labels */
.custom-select-formSec small{
  color: var(--color-primary, #EA1555) !important;
}
.custom-select-formSec h3{
  color: var(--color-text, #111) !important;
}

/* Cards */
.select-form-main .form-box{
  background: var(--color-surface, #fff) !important;
  border: 1px solid var(--color-border, rgba(0,0,0,.12)) !important;
  box-shadow: var(--shadow-sm, 0 1px 3px rgba(0,0,0,.12)) !important;
}
.select-form-main .form-box:hover{
  box-shadow: var(--shadow-lg, 0 8px 28px rgba(0,0,0,.18)) !important;
}

/* Card header icon bubble */
.select-form-main .form-box figure{
  /* primary with ~88% transparency */
  background: color-mix(in srgb, var(--color-primary, #EA1555) 12%, transparent) !important;
}

/* Card texts */
.select-form-main .form-box .box-content h4{
  color: var(--color-text, #111) !important;
}
.select-form-main .form-box .box-content p{
  color: color-mix(in srgb, var(--color-text, #111), transparent 30%) !important;
}

/* Card border accent = theme primary */
.select-form-main .form-box{
  border-color: var(--color-primary, #EA1555) !important;
}

/* Loader/overlay area (Livewire) */
.overlay.bg-pink-linear{
  /* subtle primary gradient; keeps your class name working */
  background-image: linear-gradient(
    135deg,
    color-mix(in srgb, var(--color-primary, #EA1555) 24%, #000 0%) 0%,
    color-mix(in srgb, var(--color-primary, #EA1555) 10%, transparent) 100%
  ) !important;
}

/* White blocks should follow theme surface (kills hardcoded .bg-white look) */
.bg-white{
  background: var(--color-surface, #fff) !important;
  color: var(--color-text, #111) !important;
  border-color: var(--color-border, rgba(0,0,0,.12)) !important;
}

/* Inline black wrapper in showForm section—force it to theme bg */
[style*="background-color:black"]{
  background: var(--color-background, #fff) !important;
}

/* “Go Back” buttons that use .bg-white inline */
button.bg-white{
  border: 1px solid var(--color-border, rgba(0,0,0,.12)) !important;
}
button.bg-white b,
button.bg-white i{
  color: var(--color-primary, #EA1555) !important;
}

/* Utility text colors inside (in case any stray #000 left) */
.select-form-main .form-box, 
.select-form-main .form-box *{
  --_t: var(--color-text, #111);
}
</style>

<style>
/* ===== kill the white slab & use theme colors ===== */

/* whole step section background = site background */
.custom-select-formSec{
  background: var(--color-background, #0f0f0f) !important;
}

/* koi container/panel/content jiska bg white ya light ho — use page background */
.custom-select-formSec :is(.bg-white, .bg-light, .content, .content-bg, .panel, .wrapper){
  background: var(--color-background, #0f0f0f) !important;
}

/* inline styles "background:#fff" / "background-color:white" ko bhi override karo */
.custom-select-formSec [style*="background:#fff"],
.custom-select-formSec [style*="background: #fff"],
.custom-select-formSec [style*="background-color:white"],
.custom-select-formSec [style*="background-color: #fff"]{
  background: var(--color-background, #0f0f0f) !important;
}

/* cards (options) should stay on theme surface, not full page bg */
.select-form-main .form-box{
 border-radius:20px; border-color:  1px solid  var(--color-primary) !important; background:transparent !important;
  box-shadow: var(--shadow-sm, 0 1px 3px rgba(0,0,0,.35)) !important;
}

/* headings + texts consistent */
.custom-select-formSec h3,
.custom-select-formSec small,
.select-form-main .box-content h4,
.select-form-main .box-content p{
  color: var(--color-text, #eaeaea) !important;
}

/* “Go Back” buttons that were white */
button.bg-white{
  background: var(--color-surface, #1a1a1a) !important;
  color: var(--color-text, #eaeaea) !important;
  border: 1px solid var(--color-border, rgba(255,255,255,.12)) !important;
}
button.bg-white b, button.bg-white i{
  color: var(--color-primary, #EA1555) !important;
}

/* newsletter/footer strip just below — remove light grey */
section.cust-container.px-3.pb-md-4{
  background: var(--color-surface, #1a1a1a) !important;
  border-top: 1px solid var(--color-border, rgba(255,255,255,.12)) !important;
  border-bottom: 1px solid var(--color-border, rgba(255,255,255,.12)) !important;
}

/* newsletter input follows theme */
section.cust-container .form-control,
section.cust-container input[type="email"]{
  background: var(--color-surface, #1a1a1a) !important;
  color: var(--color-text, #eaeaea) !important;
  border: 1px solid var(--color-border, rgba(255,255,255,.12)) !important;
}
section.cust-container .btn{
  background: var(--color-primary, #EA1555) !important;
  border-color: var(--color-primary, #EA1555) !important;
  color:#fff !important;
}
 /* ✅ Force full page background to black (responsive-safe) */
  html, body {
    background: #000 !important;
    max-width: 100vw !important;
    overflow-x: hidden !important;
  }

  /* Ensure this section also stays black */
  .custom-select-formSec {
    background: #000 !important;
  }

  /* If any wrapper tries to stay white, force it to black */
  .custom-select-formSec .bg-white,
  .custom-select-formSec [style*="background:#fff"],
  .custom-select-formSec [style*="background: #fff"],
  .custom-select-formSec [style*="background-color:white"],
  .custom-select-formSec [style*="background-color: #fff"],
  .custom-select-formSec [style*="background-color:black"] {
    background: #000 !important;
  }

  /* Mobile safety: prevent overflow */
  @media (max-width: 576px){
    html, body { overflow-x: hidden !important; max-width: 100vw !important; }
    section, .bg-white, .custom-select-formSec { max-width: 100vw !important; overflow-x: hidden !important; }
  }
</style>


    @if ($showGrid)
     <section class="custom-select-formSec">
          <div class="cunstom-container">
            <small>{{ $tagline[$formService] }}</small>
            <h3>{{ $heading[$formService] }}</h3> 
            <div class="select-form-main">
                @if ($formStatuses[0]->$formService)
                    <div class="form-box" wire:click="showForm('clinic_form')"  >
                        <figure>
                            <img src="https://ik.imagekit.io/b6iqka2sz/Store%20Repair.png?updatedAt=1719830430304" alt="" >
                        </figure>
                        <div class="box-content">
                            <h4>{{ $optionLabels['Store Repair'] }}  &nbsp; - &nbsp;  Visit Us </h4>
                            <p>Choose store repair to visit our location.</p> 
                        </div>
                    </div>
                @endif

                @if ($formStatuses[1]->$formService)
                    <div class="form-box" wire:click="showForm('postal_form')" >
                        <figure>
                            <img src="https://ik.imagekit.io/b6iqka2sz/Postal%20Repair.png?updatedAt=1719830318561" alt="" >
                        </figure>
                        <div class="box-content">
                            <h4>{{ $optionLabels['Postal Repair'] }} + £9.99</h4>
                            <p>No stores close to you? Send your device to us!</p>
                        </div> 
                    </div>
                @endif

                @if ($formStatuses[2]->$formService && $formService != 'buy')
                    <div class="form-box" wire:click="showForm('collection_form')" >
                        <figure>
                            <img src="https://i.imghippo.com/files/xat891724411729.png" alt="" >
                        </figure>
                        <div  class="box-content">
                            <h4>{{ $optionLabels['Collect My Device'] }} + £14.99 </h4>
                            <p>We'll pick up your device for repair and return it to you afterward.</p>
                        </div>  
                    </div>
                @endif

                @if ($formStatuses[3]->$formService && $data['device']['name'] != 'Apple iPad' && $formService == 'repair')
                    <div class="form-box" wire:click="showForm('fix_form')">
                        <figure>
                            <img src="https://ik.imagekit.io/b6iqka2sz/Fix%20At%20My%20Address.png?updatedAt=1719830266710" alt="" >
                        </figure>
                        <div  class="box-content"> 
                             <h4>{{ $optionLabels['Call Out Repair'] }} + £19.99  </h4>
                             <p>Our technicians will visit home/work place to repair your mobile device.</p>
                        </div> 
                    </div>
                @endif 
            </div> 
          </div>
     </section>  
    @endif

    @if ($showForm)
        <section>
            <div style="background-color:black">
                <div wire:loading wire:target="form_type" class="w-100">
                    <div class="overlay rounded d-flex flex-column justify-content-center align-items-center bg-pink-linear text-white" style="height:400px;">
                        <x-spinner color="danger" />
                    </div>
                </div>
                <div class="bg-white">
                    <div wire:loading.remove wire:target="form_type">
                <!--for desktop-->
                <div class="d-none d-lg-block d-md-block">
                    <button class="bg-white " role="button" type="button" wire:click="hideForm" 
                    style="float:left;margin-left:50px;margin-top:-70px;" >  <b>  <i class="fa-solid  fa-circle-chevron-left"></i> Go Back </b></button>             
                </div>
                <!--for phone-->
                <div class="d-lg-none d-md-none ">
                    <button class="bg-white " role="button" type="button" wire:click="hideForm" 
                    style="float:left;margin-top:-70px;" >  <b>  <i class="fa-solid  fa-circle-chevron-left"></i> Go Back </b></button>             
                </div>

                        @if ($showForm)
                            @if ($form_type == 'postal_form')
                                <div class="bg-white">
                                    <livewire:guest.components.postal-repair-form initialBranchId="13" />
                                </div>
                            @elseif($form_type == 'clinic_form')
                                <livewire:guest.components.clinic-repair-form :key="uniqid()" />
                            @elseif($form_type == 'collection_form')
                                <div wire:ignore>
                                    <livewire:guest.collection-form :key="uniqid()" />
                                </div>
                            @elseif($form_type == 'fix_form')
                                <div wire:ignore>
                                    <livewire:guest.fix-form :key="uniqid()" />
                                </div>
                            @endif
                        @endif
                        
                    </div>
                </div>
            </div> 
        </section> 
    @endif  
</div>

 

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('formShown', function () {
            document.querySelectorAll('.tab-pane').forEach(function (tabPane) {
                tabPane.classList.remove('active', 'show');
            });
        });

        Livewire.on('BranchSelected', function () {
            document.querySelector('.back-button').style.display = 'none';
        });

        Livewire.on('childGoBack', function () {
            document.querySelector('.back-button').style.display = 'block';
        });
    });

    function forgetPreviousForm() {
        @this.forgetSession('form_type');
    }
</script>

@push('scripts')
<script>
    function forgetPreviousForm() {
        @this.call('forgetFormType');
    }

    document.addEventListener('livewire:load', function () {
        Livewire.on('someEvent', function () {
            forgetPreviousForm();
        });
    });
</script>
@endpush

</div> 
  <script>
        document.addEventListener('livewire:load', function () {
    // Initial setup based on the form type loaded event
    Livewire.on('formTypeLoaded', function (formType) {
        console.log('Initial form type loaded:', formType);
        updateFormDisplay(formType);
    });

    // Handle form type changes
    Livewire.on('formToggle', function (formType, data) {
        console.log('Form type toggled:', formType);
        updateFormDisplay(formType);
    });

    function updateFormDisplay(formType) {
        // Hide all forms
        document.querySelectorAll('.form-section').forEach(function (element) {
            element.style.display = 'none';
        });

        // Show the relevant form based on formType
        if (formType === 'postal_form') {
            document.getElementById('postal-form').style.display = 'block';
        } else if (formType === 'collection_form') {
            document.getElementById('collection-form').style.display = 'block';
        } else if (formType === 'fix_form') {
            document.getElementById('fix-form').style.display = 'block';
        }
    }
});
</script>

<!-- ✅ MOBILE MAP OVERFLOW FIX (no other changes) -->
<style>
  /* Kill horizontal scroll on small screens */
  @media (max-width: 576px){
    html, body { overflow-x: hidden !important; max-width: 100vw !important; }

    /* Any map/iframe/canvas should never exceed viewport width */
    iframe, canvas, svg, img { max-width: 100% !important; height: auto; }

    /* Common map wrappers used by Google/Leaflet/Mapbox/Livewire components */
    .map, .map-container, .map-wrap, .mapboxgl-map, .leaflet-container, .gm-style,
    [class*="map"], [id*="map"] {
      width: 100% !important;
      max-width: 100vw !important;
      overflow: hidden !important;
      box-sizing: border-box !important;
    }

    /* Google Maps canvas */
    .gm-style > div,
    .gm-style iframe,
    .gm-style canvas {
      width: 100% !important;
      max-width: 100vw !important;
    }

    /* Mapbox canvas */
    .mapboxgl-canvas { width: 100% !important; max-width: 100vw !important; }

    /* Ensure the white wrapper for forms can’t cause overflow */
    .bg-white, .custom-select-formSec, section { max-width: 100vw !important; overflow-x: hidden !important; }
  }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Force scroll to top when page is fully loaded
        window.scrollTo({ top: 0, left: 0, behavior: "auto" });

        // Prevent browser from restoring scroll position
        if ("scrollRestoration" in history) {
            history.scrollRestoration = "manual";
        }
    });

    // Handle Livewire navigation and component updates
    document.addEventListener("livewire:load", function () {
        window.scrollTo({ top: 0, left: 0, behavior: "auto" });
    });

    // Also scroll to top on refresh (hard reload)
    window.addEventListener("beforeunload", function () {
        window.scrollTo(0, 0);
    });
</script>


    
