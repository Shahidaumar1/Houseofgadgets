<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<title><?php echo e($siteSettings->meta_title ?? $siteSettings->buisness_name ?? 'Website'); ?></title>

<!-- Google Search Console Verification -->
<meta name="google-site-verification" content="P4FGobBpxDedxAq8dv2FknjaczznP06xTGd0ZmfotCs" />

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3PEHD0X1TV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-3PEHD0X1TV');
</script>


<link rel="icon" type="image/x-icon" href="<?php echo e(asset($siteSettings->favicon ?? 'https://ik.imagekit.io/p2slevyg1/ea20c3ae-ce38-4625-89be-1ea4508601b1-removebg-preview.png?updatedAt=1701091177625')); ?>" />


<?php echo \Livewire\Livewire::styles(); ?>

<?php echo \Livewire\Livewire::scripts(); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.1/dist/cdn.min.js"></script>

<!-- Flatpickr -->
<link rel="stylesheet" href="<?php echo e(asset('flatpickr/flatpickr.min.css')); ?>">
<script src="<?php echo e(asset('flatpickr/flatpickr.min.js')); ?>"></script>

<?php echo $__env->yieldPushContent('scripts'); ?>


<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea\resources\views/frontend/sections/head.blade.php ENDPATH**/ ?>