<div>
  <?php
    // Prefer new singleton table
    try {
        $gr = \App\Models\GoogleReviewsSetting::getSingleton();
        $rating      = isset($gr->rating)        ? (float) $gr->rating        : null;
        $reviewCount = isset($gr->reviews_count) ? (int)   $gr->reviews_count : null;
        $reviewUrl   = !empty($gr->review_url)   ?          $gr->review_url    : null;
    } catch (\Throwable $e) {
        $rating = $reviewCount = $reviewUrl = null;
    }

    // Fallback to old site_settings if new row missing
    if ($rating === null || $reviewCount === null || $reviewUrl === null) {
        $settings    = \App\Models\SiteSetting::getSiteSettings();
        $rating      = $rating      ?? (isset($settings->google_rating) ? (float) $settings->google_rating : 5.0);
        $reviewCount = $reviewCount ?? (
            isset($settings->google_reviews_count) ? (int)$settings->google_reviews_count
              : (isset($settings->google_review_count) ? (int)$settings->google_review_count : 0)
        );
        $reviewUrl   = $reviewUrl   ?? (!empty($settings->google_review_url) ? $settings->google_review_url : '#');
    }

    // ⭐ compute stars (clamp 0..5, round to 0.5)
    $clamped = max(0, min(5, (float) $rating));
    $rounded = round($clamped * 2) / 2.0;
    $full    = (int) floor($rounded);
    $half    = (($rounded - $full) >= 0.5) ? 1 : 0;
    $empty   = 5 - $full - $half;
  ?>

  <style>
  /* your existing CSS left intact */
  @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Manuale:ital,wght@0,300..800;1,300..800&display=swap');

  .home-banner-sec{
    padding:72px 15px 155px 15px;
    background-image:url("https://ik.imagekit.io/myfirstKit/irepairLondon/bannerSecImages/Home.png?updatedAt=1731255413364");
    background-position:right top;
    background-repeat:no-repeat;
    background-color:#000 !important;
    background-size:cover;
    box-shadow:0 0 2px 0 rgba(0,0,0,.25);
    float:left;
    color:var(--color-text);
  }

  .home-banner-sec .banner-btns-box1 a:nth-child(1){
    background:#D9DDE1 !important; border-color:#D9DDE1 !important; color:#111 !important;
  }
  .home-banner-sec .banner-btns-box1 a:nth-child(1) *{ color:inherit !important; }
  .home-banner-sec .banner-btns-box1 a:nth-child(1):hover{
    background:#C9CDD2 !important; border-color:#C9CDD2 !important; color:#111 !important;
  }

  .review-banner-btn:hover{ background:#D9DDE1 !important; border-color:#D9DDE1 !important; }
  .review-banner-btn:hover > span:not(.banner-stars),
  .review-banner-btn:hover strong{ color:#111 !important; }
  .review-banner-btn .banner-stars i{ color:var(--color-accent) !important; }
 .review-banner-btn:hover span{
     color: black;
 }

  .custom-container{ max-width:1283px; margin:0 auto; }
  .banner-content{ display:grid; grid-template-columns:1fr 1fr; align-items:center; }
  .banner-content .content-box1{ display:flex; flex-direction:column; max-width:650px; }
  .banner-content .content-box1 h2{
    font-size:40px; line-height:54.64px; font-weight:700; padding-bottom:50px; margin:0!important;
    font-family:"Manrope", serif; font-style:normal; color:var(--color-text);
  }

  .banner-btns-box1{ display:flex; margin-bottom:51px; }
  .banner-btns-box1 a{
    width:215px; height:65px; font-size:17px; line-height:27.32px; text-decoration:none; font-weight:500;
    display:flex; align-items:center; justify-content:center; border-radius:10px; transition:.3s ease;
    font-family:"Manrope", serif;
  }

  .home-banner-sec .banner-btns-box1 a:nth-child(1){ color:var(--color-bg) !important; }
  .home-banner-sec .banner-btns-box1 a:nth-child(1) *{ color:inherit !important; }

  .review-banner-btn:hover{ background:var(--color-primary); border:1px solid var(--color-primary); }
  .review-banner-btn:hover > span:not(.banner-stars){ color:var(--color-bg) !important; }
  .review-banner-btn .banner-stars i{ color:var(--color-accent) !important; }

  .banner-btns-box1 a:nth-child(1){
    background:var(--color-primary); color:#fff!important; border:1px solid var(--color-primary);
  }
  .banner-btns-box1 a:nth-child(1):hover{
    background:transparent; color:var(--color-text)!important; border:1px solid var(--color-text);
  }
  .banner-btns-box1 a:nth-child(2){
    margin-left:34px; background:var(--color-surface); color:var(--color-text)!important; border:1px solid var(--color-text);
  }
  .banner-btns-box1 a:nth-child(2):hover{
    background:var(--color-primary); color:#fff!important; border:1px solid var(--color-primary);
  }

  .review-banner-btn{
    font-family:"Manrope", serif; width:421px; height:65px;
    display:flex; align-items:center; justify-content:center;
    font-size:17px; line-height:27.32px; text-decoration:none; font-weight:500; border-radius:10px;
    color:var(--color-text); background:#000 !important; border:1px solid var(--color-text);
    padding: 0px 20px;
  }
  .review-banner-btn:hover{
    background:var(--color-primary); color:#fff!important; border:1px solid var(--color-primary);
  }
  .review-banner-btn:hover span:last-child span {
  color: black !important;
}

  
  .review-banner-btn .banner-stars{ padding:0 20px; display:flex; align-items:center; gap:6px; }
  .review-banner-btn .banner-stars i{
    color:var(--color-accent)!important; font-size:15px;
  }

  .carousel-indicators{ position:static; margin-top:-50px !important; }
  .carousel-indicators button{ width:12px; height:12px; border-radius:50%; }
  .carousel-indicators .active{ background-color:var(--color-primary); }

  .slider-container{ max-width:500px; margin:0 auto; }
  .carousel-inner img{ width:500px; height:300px; object-fit:cover; }

  @media(max-width:991px){
    .home-banner-sec{ padding:50px 15px 98px 15px; }
    .banner-content{ grid-template-columns:1fr; justify-content:center; }
    .banner-content .content-box1{ max-width:567px; margin:0 auto; align-items:center; }
    .banner-content .content-box1 h2{ font-size:36px; line-height:46.64px; padding-bottom:34px; text-align:center; }
    .banner-btns-box1{ margin-bottom:13px; }
    .banner-btns-box1 i{ font-size:11px; }
    .banner-btns-box1 a{ width:137px; height:50px; font-size:15px; border-radius:5px; margin-top:30px; display:none;}
    .review-banner-btn{ width:100%; max-width:324px; height:60px; font-size:15px; line-height:21.32px; border-radius:5px; margin-top:30px;}
    .review-banner-btn .banner-stars i{ font-size:13px; }
    .banner-btns-box1 a:nth-child(2){ margin-left:8px; }
  }

  @media(max-width:768px){
    .banner-content .content-box1 h2{ font-size:32px; line-height:37.64px; padding-bottom:30px; }
    .review-banner-btn .banner-stars{ padding:0 10px; }
  }
  @media(max-width:576px){
    .banner-content .content-box1 h2{ font-size:26px; line-height:32.64px; padding-bottom:25px; }
    .review-banner-btn, .banner-btns-box1 a{ font-size:14px; }
    .home-banner-sec{ padding:40px 15px 1px; }
  }
/* Mobile / tablet: show slider above the text */
@media (max-width: 991px) {
  /* make sure the banner uses a single column stack */
  .home-banner-sec .banner-content {
    display: grid;
    grid-template-columns: 1fr;
    grid-auto-flow: row;
  }

  /* slider first */
  .home-banner-sec .slider-container {
    grid-row: 1;
    margin: 0 auto 16px;
  }

  /* heading + buttons second */
  .home-banner-sec .content-box1 {
    grid-row: 2;
  }

  /* override d-none d-lg-block on small screens */
  .home-banner-sec .slider-container.d-none.d-lg-block {
    display: block !important;
  }
}

  @media (max-width:991.98px){
    .home-banner-sec .slider-container.d-none.d-lg-block{ display:block !important; }
    .home-banner-sec .slider-container{ max-width:500px; margin:0 auto 12px; }
    .home-banner-sec .carousel-inner img{ width:100% !important; height:240px !important; object-fit:contain; }
  }
  @media (max-width:575.98px){
    .home-banner-sec .content-box1 h2{
      font-size:24px; line-height:32px; padding:12px 12px 18px; text-align:center; word-break:break-word; overflow-wrap:anywhere; hyphens:auto; display:none !important;
    }
    .home-banner-sec .banner-btns-box1{ margin-top:4px; }
    .home-banner-sec .carousel-inner img{ height:180px !important; object-fit:contain; }
    .home-banner-sec .content-box1{ position:relative; z-index:2; }
    .home-banner-sec .slider-container{ position:relative; z-index:1; }
  }
  @media (min-width:576px) and (max-width:767.98px){
    .home-banner-sec .content-box1 h2{
      font-size:clamp(22px, 4.8vw, 28px); line-height:1.25; max-width:24ch; margin:0 auto 14px;
      text-align:center; text-wrap:balance; overflow-wrap:anywhere; hyphens:none;
    }
    .home-banner-sec .carousel-inner img{ height:220px !important; object-fit:contain; }
  }

  @media (max-width:991.98px){
    .home-banner-sec .slider-container.d-none.d-lg-block{ display:block !important; }
    .home-banner-sec .banner-content{ grid-auto-flow:row; }
    .home-banner-sec .slider-container{ grid-row:1; }
    .home-banner-sec .content-box1{ grid-row:2; }
    .home-banner-sec .slider-container{ max-width:500px; margin:0 auto 16px; }
    .home-banner-sec .carousel-inner img{ width:500px !important; height:300px !important; object-fit:cover; }
    .home-banner-sec .carousel-control-prev-icon,
    .home-banner-sec .carousel-control-next-icon{ filter:invert(1); }
    .home-banner-sec .custom-container{ overflow:hidden; }
  }
  /* REMOVE pink glow behind hero slider — safe override */
.home-banner-sec,
.home-banner-sec::before,
.home-banner-sec::after {
  background-image: none !important;
  background-repeat: no-repeat !important;
  background-position: initial !important;
  background-size: auto !important;
  box-shadow: none !important;
}

/* ensure slider itself has no background or shadow */
.home-banner-sec .slider-container,
.home-banner-sec .slider-container .carousel-inner,
.home-banner-sec .slider-container .carousel-item {
  background: transparent !important;
  box-shadow: none !important;
}

/* remove any radial/gradient overlays that might be applied via pseudo elements */
.home-banner-sec [class*="overlay"],
.home-banner-sec::after,
.home-banner-sec::before {
  background: transparent !important;
  background-image: none !important;
  opacity: 1 !important;
  filter: none !important;
}

/* if slider images use shadow/gradient via inline style, force neutral background */
.home-banner-sec .carousel-inner img {
  box-shadow: none !important;
  background: transparent !important;
}
@media (max-width: 576px) {
  /* Hide the review banner button at the top */
  .review-banner-btn {
    display: none !important;
  }
  </style>

  <!-- banner section start -->
  <section class="home-banner-sec w-100 float-left d-block">
    <div class="custom-container">
      <div class="banner-content">
        <div class="content-box1">
          <h2>Your One-Stop Shop for Devices Buy-Sell-Repair</h2>

          <div class="banner-btns-box1">
            <a href="/categories"> Book a Repair <i class="fa-solid fa-arrow-right ms-2"></i></a>
          </div>

          <a class="review-banner-btn" href="<?php echo e($reviewUrl); ?>" target="_blank" rel="noopener">
            <span>Review us</span>

            
            <span class="banner-stars">
              <strong><?php echo e(number_format($rounded, 1)); ?></strong>
              <?php for($i=0; $i<$full; $i++): ?>
                <i class="fa-solid fa-star"></i>
              <?php endfor; ?>
              <?php if($half): ?>
                <i class="fa-solid fa-star-half-stroke"></i>
              <?php endif; ?>
              <?php for($i=0; $i<$empty; $i++): ?>
                <i class="fa-regular fa-star"></i>
              <?php endfor; ?>
              <strong><?php echo e((int) $reviewCount); ?></strong>
            </span>

            <!--<span>Google Reviews</span>-->
             <span style="display:inline-flex; align-items:center; gap:6px;">
  <img src="https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png" 
       alt="Google" 
       class="google-icon me-2"
       style="width:48px; height:48px; object-fit:contain;">

</span>

          </a>
        </div>

        
        <div class="slider-container d-none d-lg-block">
          <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('hero-slider', ['placement' => 'home_hero','limit' => 4])->html();
} elseif ($_instance->childHasBeenRendered('rbh8GCU')) {
    $componentId = $_instance->getRenderedChildComponentId('rbh8GCU');
    $componentTag = $_instance->getRenderedChildComponentTagName('rbh8GCU');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('rbh8GCU');
} else {
    $response = \Livewire\Livewire::mount('hero-slider', ['placement' => 'home_hero','limit' => 4]);
    $html = $response->html();
    $_instance->logRenderedChild('rbh8GCU', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>

        <style>
          .slider-container { max-width: 500px; margin: 0 auto; }
          .carousel-inner img { width: 500px; height: 300px; object-fit: cover; }
          .carousel-indicators { position: static; margin-top: 10px; }
          .carousel-indicators button { width: 12px; height: 12px; border-radius: 50%; }
          .carousel-indicators .active { background-color: #EA1555; }
          .single-image { margin-top: 20px; text-align: center; }
          .single-image img { max-width: 100%; height: auto; }
        </style>
      </div>
    </div>
  </section>
</div>
<?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea\resources\views/frontend/Home_page_sections/banner.blade.php ENDPATH**/ ?>