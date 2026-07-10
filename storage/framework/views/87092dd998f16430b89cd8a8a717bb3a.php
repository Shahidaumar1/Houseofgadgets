
<div class="slider-container d-none d-lg-block">
  <div id="homepageCarousel" class="carousel slide" data-bs-ride="carousel">

    
    <div class="carousel-indicators">
      <?php $count = max($slides->count(), 4); ?>
      <?php if($slides->count() > 0): ?>
        <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <button type="button"
                  data-bs-target="#homepageCarousel"
                  data-bs-slide-to="<?php echo e($i); ?>"
                  class="<?php echo e($i === 0 ? 'active' : ''); ?>"
                  aria-label="Slide <?php echo e($i+1); ?>"
                  <?php if($i===0): ?> aria-current="true" <?php endif; ?>></button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php else: ?>
        
        <?php for($i=0;$i<4;$i++): ?>
          <button type="button"
                  data-bs-target="#homepageCarousel"
                  data-bs-slide-to="<?php echo e($i); ?>"
                  class="<?php echo e($i === 0 ? 'active' : ''); ?>"
                  aria-label="Slide <?php echo e($i+1); ?>"
                  <?php if($i===0): ?> aria-current="true" <?php endif; ?>></button>
        <?php endfor; ?>
      <?php endif; ?>
    </div>

    
    <style>
    /* ===== Hero Slider: videos show whole frame (no left/right crop) ===== */

    .slider-container {
      width: 100%;
      overflow: hidden;
    }

    .slide-media {
      width: 100%;
      overflow: hidden;
      border-radius: 10px;
      position: relative;
      height: 500px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #000; /* neutral bg when videos use 'contain' */
    }

    /* Images keep cover behaviour */
    .slide-media img.slide-media__media {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      border-radius: 10px;
      max-height: 100%;
      width: auto;
      height: auto;
      margin-left: auto;
      margin-right: auto;
    }

    /* Videos: use contain so whole video is visible (no left/right crop).
       Centered with neutral background to avoid ugly gaps. */
    .slide-media video.slide-media__media {
      object-fit: contain;
      width: 100%;
      height: 100%;
      max-width: 100%;
      max-height: 100%;
      display: block;
      border-radius: 10px;
      background: #000;
      /* ensure the video is centered inside the flex container */
      margin: 0 auto;
      align-self: center;
    }

    /* remove native overlay where possible */
    .slide-media video::-webkit-media-controls,
    .slide-media video::-webkit-media-controls-panel,
    .slide-media video::-webkit-media-controls-play-button,
    .slide-media video::-webkit-media-controls-start-playback-button {
      display: none !important;
      -webkit-appearance: none;
    }

    .slide-media__media:focus { outline: none; }

    /* Tablet */
    @media (min-width: 768px) and (max-width: 991px) {
      .slide-media { height: 350px; }
    }

    /* Mobile */
    @media (max-width: 767px) {
      .slide-media { height: 250px; }
    }

  
   /* Show the hero slider again on tablet & mobile even though it uses d-none d-lg-block */
@media (max-width: 991px) {
  .slider-container.d-none.d-lg-block {
    display: block !important;
  }
}


    </style>

    <div class="carousel-inner">
      <?php if($slides->count() > 0): ?>
        <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="carousel-item <?php echo e($i === 0 ? 'active' : ''); ?>">
            <?php
              $src = $s->image_path;
              $alt = $s->title ?: 'Slide';
              $type = $s->media_type ?? 'image';
            ?>

            <div class="slide-media" aria-label="Homepage slide <?php echo e($i+1); ?>">
              <?php if($type === 'video'): ?>
                
                <video class="d-block slide-media__media" autoplay muted loop playsinline preload="auto" tabindex="-1">
                  <source src="<?php echo e($src); ?>" type="video/mp4">
                  <?php echo e($alt); ?>

                </video>
              <?php else: ?>
                <?php if(!empty($s->link_url)): ?>
                  <a href="<?php echo e($s->link_url); ?>">
                    <img src="<?php echo e($src); ?>" class="d-block slide-media__media" alt="<?php echo e($alt); ?>">
                  </a>
                <?php else: ?>
                  <img src="<?php echo e($src); ?>" class="d-block slide-media__media" alt="<?php echo e($alt); ?>">
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      <?php else: ?>
        
        <div class="carousel-item active">
          <div class="slide-media">
            <img src="https://ik.imagekit.io/8qyy56iye/House%20Of%20gadgets/WhatsApp_Image_2025-09-10_at_1.58.06_AM-removebg-preview.png?updatedAt=1758019673021"
                 class="d-block slide-media__media" alt="iPhone">
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-media">
            <img src="https://ik.imagekit.io/kqeykkpy5/3.png?updatedAt=1743232565345"
                 class="d-block slide-media__media" alt="Huawei">
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-media">
            <img src="https://ik.imagekit.io/8qyy56iye/House%20Of%20gadgets/transparent_1-removebg-preview.png?updatedAt=1758714479728"
                 class="d-block slide-media__media" alt="Google">
          </div>
        </div>
        <div class="carousel-item">
          <div class="slide-media">
            <img src="https://ik.imagekit.io/8qyy56iye/House%20Of%20gadgets/transparent_2-removebg-preview.png?updatedAt=1758714595071"
                 class="d-block slide-media__media" alt="Samsung">
          </div>
        </div>
      <?php endif; ?>
    </div>

    
    <button class="carousel-control-prev" type="button" data-bs-target="#homepageCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homepageCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<?php /**PATH /home/thephonelab/houseofgadgets.thephonelab.co.uk/resources/views/livewire/hero-slider.blade.php ENDPATH**/ ?>