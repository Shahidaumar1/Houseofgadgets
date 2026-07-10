<div>
                <livewire:components.mega-nav />
    <div>
        <section class="head-sell">
            <div class="container">

            </div>
        </section>
        <section class="head-sell mt-5">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 p-3 mt-5">
                        <h1 style="font-family: heading; ">{!! $webContent->brand_page_heading_1 !!}</h1>
                        <p style="text-align: justify;"> At {{ $siteSettings->buisness_name ?? '' }}, we've streamlined the process of selling your device, ensuring it's as effortless as can be. Trust 
            {{ $siteSettings->buisness_name ?? '' }} for a seamless, hassle-free journey in selling your phone or tablet. Our dedicated team guarantees meticulous evaluations and competitive prices for your device's true value. Count on 
            {{ $siteSettings->buisness_name ?? '' }} for not just good but exceptional value for your used device. With {{ $siteSettings->buisness_name ?? '' }} reliability and trustworthiness are our promises to you. Sell your device confidently, knowing you're partnering with an industry leader renowned for integrity. Experience unparalleled convenience when selling with  
            
         {{ $siteSettings->buisness_name ?? '' }} today. Join the ranks of numerous satisfied customers who've entrusted {{ $siteSettings->buisness_name ?? '' }} for their device selling needs.Let
         {{ $siteSettings->buisness_name ?? '' }} handle the intricacies of selling your phone or tablet, ensuring a smoother, faster, and more secure transaction for you.
         {!! $webContent->brand_page_heading_2 !!}
                        </p>
                    </div>
                    <div class="col-lg-6 p-3 ">
                        <img src="https://ik.imagekit.io/p2slevyg1/Best_Smartphones_US_2022-scaled.jpg?updatedAt=1698830519194" class="img-fluid">
                    </div>

                </div>
            </div>
        <div class="container mt-5">
    <div class="row  row-cols-md-4 row-cols-lg-7 justify-content-center">
        @forelse($devices as $key => $device)
        <div class="col mb-4">
            <a href="{{ route('guest-sell-models', $device->id) }}">
                <div class="card shadow-sm p-3 mb-5 rounded cursor-pointer d-flex justify-content-center align-items-center">
                    <img src="{{ $device->file ?? '' }}" class="img-fluid " style="max-height:120px; max-width:140px;">
                </div>
            </a>
        </div>
        @empty
        <!-- Add empty state message or handle empty case as needed -->
        @endforelse
    </div>
</div>


        </section>

        {{-- <section class="select-brand">
            <div class="container py-4">
                <h2>new arrival</h2>
                <div class="row mt-4">
                    <div class="col-lg-3 col-md-6 my-2">
                        <div class="card">
                            <a href="/mobilemodel.device-type/iphonemodel.html"> <img
                                    src="https://ik.imagekit.io/phonelab2/iphone12.png?updatedAt=1697183402202"
                                    class="img-fluid"></a>
                            <div class="card-body">
                                <h3 class="card-title">IPHONE 12</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-2">
                        <div class="card">
                            <a href="/mobilemodel.device-type/nokiamodel.html"> <img
                                    src="https://ik.imagekit.io/phonelab2/samsung.jpg?updatedAt=1697183476627"
                                    class="img-fluid"></a>
                            <div class="card-body">
                                <a href="/mobilemodel.device-type/sumsungmodel.html">
                                    <h3 class="card-title ">Samsung</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-2">
                        <div class="card">
                            <a href="/mobilemodel.device-type/huaweimodel.html"> <img
                                    src="https://ik.imagekit.io/phonelab2/Huawei.jpg?updatedAt=1697183531502"
                                    class="img-fluid"></a>
                            <div class="card-body">
                                <h3 class="card-title">Huawei</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 my-2">
                        <div class="card">
                            <a href="/mobilemodel.device-type/nokiamodel.html">
                                <img src="https://ik.imagekit.io/phonelab2/itel.jpg?updatedAt=1697183709404"
                                    class="img-fluid"></a>
                            <div class="card-body">
                                <h3 class="card-title">Itel</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <div class="container border rounded p-3 my-3">
            <h2 class="fw-bold">{!! $webContent->brand_page_heading_3 !!}</h2>
            <p>{{ $siteSettings->buisness_name ?? '' }} {!! $webContent->brand_page_heading_4 !!}.</p>
        </div>
    </div>

</div>