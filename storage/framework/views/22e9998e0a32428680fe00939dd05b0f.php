

<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startPush('head'); ?>
    <!-- First paint background to avoid white flash -->
    <meta name="theme-color" content="#111827">

    
    <style>
        html, body{
            background-color:#111827;
            color:#e5e7eb;
        }
    </style>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />

    <meta name="google-site-verification"
          content="VBeQKFx66BgWgsYX-MVEK9At7HDHXS7ZS1GDqYLdCiM" />

    <!-- Google Tag Manager -->
    <script>
        window.addEventListener("load", function() {
            (function(w,d,s,l,i){
                w[l]=w[l]||[];
                w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
                var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s), dl=l!='dataLayer'?'&l='+l:'';
                j.async=true;
                j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
                f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-PLKSQVFN');

            // optional: agar tum fade-in effect chahti ho to CSS me body.page-loaded pe transition laga sakti ho
            document.body.classList.add('page-loaded');
        });
    </script>
    <!-- End Google Tag Manager -->
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php
        use App\Models\FormStatus;
        $formStatuses = FormStatus::where('name', 'services')->first();
    ?>

    <div>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.top-bar', [])->html();
} elseif ($_instance->childHasBeenRendered('01oZLDg')) {
    $componentId = $_instance->getRenderedChildComponentId('01oZLDg');
    $componentTag = $_instance->getRenderedChildComponentTagName('01oZLDg');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('01oZLDg');
} else {
    $response = \Livewire\Livewire::mount('components.top-bar', []);
    $html = $response->html();
    $_instance->logRenderedChild('01oZLDg', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>  
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('components.mega-nav', [])->html();
} elseif ($_instance->childHasBeenRendered('ONaqtuq')) {
    $componentId = $_instance->getRenderedChildComponentId('ONaqtuq');
    $componentTag = $_instance->getRenderedChildComponentTagName('ONaqtuq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ONaqtuq');
} else {
    $response = \Livewire\Livewire::mount('components.mega-nav', []);
    $html = $response->html();
    $_instance->logRenderedChild('ONaqtuq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        

        <?php echo $__env->make('frontend.Home_page_sections.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.Home_page_sections.selectAdeviceSection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.Home_page_sections.devicesAndBrandsSection', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.Home_page_sections.wecanFix', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.Home_page_sections.brandSectionSider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.Home_page_sections.storeRepair', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.Home_page_sections.whyWeChoose', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.Home_page_sections.repairOptinsSec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.Home_page_sections.formAndLocationSec', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/thephonelab/houseofgadgets.thephonelab.co.uk/resources/views/home.blade.php ENDPATH**/ ?>