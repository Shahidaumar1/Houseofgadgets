@extends('frontend.layouts.app')

@section('title', 'Home')

@push('head')
    <!-- First paint background to avoid white flash -->
    <meta name="theme-color" content="#111827">

    {{-- Initial background dark so page load pe white flash na aaye --}}
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
@endpush

@section('content')
    @php
        use App\Models\FormStatus;
        $formStatuses = FormStatus::where('name', 'services')->first();
    @endphp

    <div>
        <livewire:components.top-bar />  
        <livewire:components.mega-nav />
        {{-- <livewire:hero-slider /> --}}

        @include('frontend.Home_page_sections.banner')
        @include('frontend.Home_page_sections.selectAdeviceSection')
        @include('frontend.Home_page_sections.devicesAndBrandsSection')
        @include('frontend.Home_page_sections.wecanFix')
        @include('frontend.Home_page_sections.brandSectionSider')
        @include('frontend.Home_page_sections.storeRepair')
        @include('frontend.Home_page_sections.whyWeChoose')
        @include('frontend.Home_page_sections.repairOptinsSec')
        @include('frontend.Home_page_sections.formAndLocationSec')
    </div>
@endsection
