@php
use App\Helpers\ServiceType;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Category;
$args = 'Publish';
@endphp

<div style="overflow: hidden;">
    <div class="d-flex align-items-center d-lg-none d-md-none">


        <p data-mdb-ripple-init type="button" style="text-decoration: none; color: black;font-size:10px; " class="btn btn-link  pt-3 col-3">
            <a href="/user-dashboard
">
                My Account
            </a>

        <div style="border-right: 1px solid #e1e1e1; color:  white; font-size: 10px;">o</div>
        </p>

        <p data-mdb-ripple-init type="button" style="text-decoration: none; color: black; font-size: 10px;" class="btn btn-link pt-3 col-3">
            My Wish List (0)
        <div style="border-right: 1px solid #e1e1e1; color:  white; font-size: 10px;">o</div>
        </p>
        <p data-mdb-ripple-init type="button" style="text-decoration: none; color: black; font-size: 10px;" class="btn btn-link  pt-3 col-3">
            <a href="/user-login
">Login</a>
        <div style="border-right: 1px solid #e1e1e1; color:  white; font-size: 10px;">o</div>
        </p>
        <p data-mdb-ripple-init type="button" style="text-decoration: none; color: black; font-size: 10px;" class="btn btn-link  pt-3 col-3">
            <a href="/user-register
">
                Sign up
            </a>

        <div style="border-right: 1px solid #e1e1e1; color:  white; font-size: 10px;">o</div>
        </p>

    </div>
    <!--top bar for mobile screen ends-->

    <!-- Navbar -->
    <div style="overflow: hidden;">
        <div class="d-none d-md-block d-lg-block">

            <nav class="navbar navbar-expand-lg navbar-light bg-white  " style="height: 50px; border-bottom: 1px solid #e1e1e1;">
                <!-- Container wrapper -->
                <!-- Navbar brand -->
                <a class="navbar-brand me-2 pt-3 d-none d-lg-block d-md-none" style="margin-left: 20px;">
                    <p style="color: #000; font-size: 13px;"><i class="bi bi-geo-alt-fill"></i>{{ $siteBranch->name }} ,
                        {{ $siteBranch->address_line_1 }} , {{$siteBranch->address_line_2}}
                        {{$siteBranch->address_line_2!=''?', ':''}} {{$siteBranch->town_city}} , {{
                        $siteBranch->post_code }},UK
                    </p>
                </a>
                <!-- Toggle button -->
                <!--<button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">-->
                <!--    <i class="fas fa-bars"></i>-->
                <!--</button>-->
                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <!-- Left links -->
                    <p class="navbar-nav me-auto mb-2 mb-lg-0">
                    </p>
                    <!-- Left links -->
                    <div class="d-flex align-items-center khur">
                        <p data-mdb-ripple-init type="button"
                            style="text-decoration: none; color: black;font-size: 13px; "
                            class="btn btn-link px-3 me-2 pt-3">
                            <a href="" data-toggle="modal" data-target="#exampleModalCenter">
                                Track your Order
                            </a>

                        <div style="border-right: 1px solid #e1e1e1; color:  white; font-size: 10px;">o</div>
                        </p>
                        <p data-mdb-ripple-init type="button" style="text-decoration: none; color: black;font-size: 13px; " class="btn btn-link px-3 me-2 pt-3">
                            <a href="/user-dashboard
">
                                My Account
                            </a>

                        <div style="border-right: 1px solid #e1e1e1; color:  white; font-size: 10px;">o</div>
                        </p>

                        <p data-mdb-ripple-init type="button" style="text-decoration: none; color: black; font-size: 13px;" class="btn btn-link px-3 me-2 pt-3">
                            My Wish List (0)
                        <div style="border-right: 1px solid #e1e1e1; color:  white; font-size: 10px;">o</div>
                        </p>
                        <p data-mdb-ripple-init type="button" style="text-decoration: none; color: black; font-size: 13px;" class="btn btn-link px-3 me-2 pt-3">
                            <a href="/user-login
">Login</a>
                        <div style="border-right: 1px solid #e1e1e1; color:  white; font-size: 10px;">o</div>
                        </p>
                        <p data-mdb-ripple-init type="button" style="text-decoration: none; color: black; font-size: 13px;" class="btn btn-link px-3 me-2 pt-3">
                            <a href="/user-register
">
                                Sign up
                            </a>

                        <div style="border-right: 1px solid #e1e1e1; color:  white; font-size: 10px;">o</div>
                        </p>

                    </div>

                </div>
                <!-- Collapsible wrapper -->
                <!-- Container wrapper -->
            </nav>

        </div>
        </di <!-- Navbar -->
        <div style="overflow: hidden;">
            <!-- -----------------------------start------top bar-------------------------- -->
            <div class="pt-3 d-none d-lg-block d-md-block">
                <div class="row">
                    <div class="col-lg-2 col-sm-2 col-xs-12" style="margin-top:-15px">
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        <livewire:components.logo />
                    </div>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="row">
                                    <div class="col-md-12 d-flex align-items-center">
                                        &nbsp; &nbsp; <img src="https://blueskytechmage.com/ayo/static/version1699782474/frontend/ayo/ayo_home2/en_US/css/images/hotline_icon.svg" alt="" style="width: 50px; height: auto; fill: red;">
                                        <div class="ml-5">
                                            <p><span style="color:#e1e1e1">Customer Care</span><br /><span>{{$siteBranch->mobile_number}}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-8 text-center">
                                        <div class="col-lg-8 text-center">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    <div class="swiper-slide">
                                                        <p class="mt-3">Your Destination for Buying, Selling, and Repair.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-2 justify-content-between ">
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        <!-- Check and display Facebook link -->
                                        @if($siteSettings->fb_link_status && $siteSettings->fb_link)
                                        <a target="_blank" href="{{ $siteSettings->fb_link }}" class="facebook">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Facebook_icon.svg/2048px-Facebook_icon.svg.png" style="width: 40px; height: 40px;" alt="Facebook Profile">
                                        </a>
                                        @endif
                                        <!-- Check and display Instagram link -->
                                        @if($siteSettings->insta_link_status && $siteSettings->insta_link)
                                        <a target="_blank" href="{{ $siteSettings->insta_link }}" class="instagram">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1200px-Instagram_logo_2022.svg.png" style="width: 40px; height: 40px;" alt="Facebook Profile">
                                        </a>
                                        @endif
                                        <!-- Check and display linkedin_link link -->
                                        @if($siteSettings->linkedin_link_status && $siteSettings->linkedin_link)
                                        <a target="_blank" href="{{ $siteSettings->linkedin_link }}" class="instagram">
                                            <i class="fa fa-linkedin" style="font-size: 30px;"></i>
                                        </a>
                                        @endif
                                        <!-- Check and display Twitter link -->
                                        @if($siteSettings->twitter_link_status && $siteSettings->twitter_link)
                                        <a target="_blank" href="{{ $siteSettings->twitter_link }}" class="twitter"><i class="fa fa-twitter-square" style="font-size: 30px;"></i></a>
                                        @endif
                                        <!-- Check and display TikTok link -->
                                        @if($siteSettings->tiktok_link_status && $siteSettings->tiktok_link)
                                        <a target="_blank" href="{{ $siteSettings->tiktok_link }}" class="tiktok">
                                            <!-- TikTok Color -->
                                            <svg width="48px" height="48px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>Tiktok</title>
                                                <g id="Icon/Social/tiktok-color" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="Group-7" transform="translate(8.000000, 6.000000)">
                                                        <path d="M29.5248245,9.44576327 C28.0821306,9.0460898 26.7616408,8.29376327 25.6826204,7.25637551 C25.5109469,7.09719184 25.3493143,6.92821224 25.1928245,6.75433469 C23.9066204,5.27833469 23.209151,3.38037551 23.2336408,1.42290612 L17.3560898,1.42290612 L17.3560898,23.7086204 C17.3560898,27.7935184 15.1520082,29.9535184 12.416498,29.9535184 C11.694049,29.9611102 10.9789469,29.8107429 10.3213959,29.5124571 C9.6636,29.2144163 9.07951837,28.7758041 8.60955918,28.2272327 C8.1398449,27.6789061 7.79551837,27.0340898 7.60180408,26.3385796 C7.4078449,25.6430694 7.36890612,24.9132735 7.48743673,24.2008653 C7.60596735,23.4884571 7.87902857,22.8105796 8.28751837,22.2154776 C8.69625306,21.6198857 9.23037551,21.1212735 9.85241633,20.7546612 C10.474702,20.3878041 11.1694776,20.1617633 11.8882531,20.0924571 C12.6070286,20.023151 13.3324163,20.1122939 14.0129878,20.3535184 L14.0129878,14.3584163 C13.4889061,14.2430694 12.9530694,14.1862531 12.416498,14.1894367 L12.3917633,14.1894367 C10.2542939,14.1943347 8.16604898,14.8325388 6.39127347,16.0234776 C4.61649796,17.2149061 3.23429388,18.9051918 2.41976327,20.8812735 C1.60523265,22.8578449 1.39486531,25.0310694 1.8151102,27.1269061 C2.2351102,29.2227429 3.2671102,31.1469061 4.78033469,32.6564571 C6.29380408,34.1660082 8.22066122,35.1933551 10.3174776,35.6082122 C12.4142939,36.0230694 14.5870286,35.8073143 16.561151,34.9878857 C18.5355184,34.1682122 20.2226204,32.7820898 21.409151,31.0041306 C22.5959265,29.2264163 23.2289878,27.136702 23.228498,24.9992327 L23.228498,12.8155592 C25.5036,14.392702 28.2244163,15.134498 31.1289061,15.1886204 L31.1289061,9.68551837 C30.5869469,9.66568163 30.049151,9.5851102 29.5248245,9.44576327" id="Fill-1" fill="#FE2C55"></path>
                                                        <path d="M25.195102,6.75428571 C24.7946939,6.47510204 24.4148571,6.1675102 24.0587755,5.83346939 C22.8210612,4.66016327 22.0062857,3.11020408 21.7420408,1.42530612 C21.6622041,0.954367347 21.6220408,0.47755102 21.6220408,0 L15.7444898,0 L15.7444898,22.6408163 C15.7444898,27.5069388 13.5404082,28.5183673 10.804898,28.5183673 C10.0829388,28.5262041 9.36783673,28.3758367 8.71028571,28.0773061 C8.0524898,27.7792653 7.46791837,27.3406531 6.99820408,26.7920816 C6.5282449,26.2437551 6.18440816,25.5989388 5.99044898,24.9034286 C5.7964898,24.2079184 5.75755102,23.4781224 5.87583673,22.7657143 C5.99461224,22.053551 6.26767347,21.3756735 6.67640816,20.7800816 C7.08489796,20.1847347 7.61902041,19.6861224 8.24106122,19.3195102 C8.86334694,18.952898 9.55787755,18.7266122 10.276898,18.6573061 C10.9959184,18.588 11.7208163,18.6773878 12.4016327,18.9183673 L12.4016327,12.9328163 C5.40489796,11.8236735 0,17.4783673 0,23.5760816 C0.00465306122,26.4426122 1.14514286,29.1898776 3.17191837,31.216898 C5.19869388,33.2434286 7.94595918,34.3839184 10.8124898,34.3885714 C16.7730612,34.3885714 21.6220408,30.7444898 21.6220408,23.5760816 L21.6220408,11.3924082 C23.8995918,12.9795918 26.6204082,13.7142857 29.524898,13.7632653 L29.524898,8.26040816 C27.9658776,8.18914286 26.4617143,7.66604082 25.195102,6.75428571" id="Fill-3" fill="#25F4EE"></path>
                                                        <path d="M21.6220653,23.5764245 L21.6220653,11.392751 C23.8996163,12.9794449 26.6204327,13.7141388 29.5251673,13.7633633 L29.5251673,9.44581224 C28.0822286,9.04613878 26.7617388,8.29381224 25.6824735,7.25617959 C25.5110449,7.09724082 25.3494122,6.92826122 25.1926776,6.75438367 C24.7922694,6.4752 24.4126776,6.16736327 24.056351,5.83356735 C22.8186367,4.66026122 22.0041061,3.11030204 21.7396163,1.42540408 L17.3730857,1.42540408 L17.3730857,23.7111184 C17.3730857,27.7957714 15.1690041,29.9560163 12.4334939,29.9560163 C11.6569224,29.9538122 10.8918612,29.7681796 10.2005143,29.414302 C9.50941224,29.0601796 8.91186122,28.5476082 8.45635102,27.9182204 C7.49071837,27.3946286 6.72712653,26.5636898 6.2865551,25.5571592 C5.84573878,24.5508735 5.75341224,23.4260571 6.02377959,22.3609959 C6.29390204,21.2959347 6.91177959,20.3516082 7.77896327,19.6771592 C8.64639184,19.0027102 9.71365714,18.6365878 10.8122694,18.6365878 C11.3564327,18.6412408 11.8961878,18.7362612 12.4090041,18.9182204 L12.4090041,14.1894857 C10.304351,14.1921796 8.24647347,14.8093224 6.48786122,15.9657306 C4.72924898,17.1221388 3.3470449,18.7666286 2.51047347,20.6978939 C1.67390204,22.6291592 1.41969796,24.7627102 1.77896327,26.8362612 C2.13822857,28.9098122 3.09553469,30.8334857 4.53308571,32.3704653 C6.36271837,33.6848327 8.55945306,34.3906286 10.8122694,34.3884296 C16.7730857,34.3884296 21.6220653,30.7445878 21.6220653,23.5764245" id="Fill-5" fill="#000000"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </a>
                                        @endif
                                        <!-- Check and display Snapchat link -->
                                        @if($siteSettings->snapchat_link_status && $siteSettings->snapchat_link)
                                        <a target="_blank" href="{{ $siteSettings->snapchat_link }}" class="snapchat"><i class="fa fa-snapchat" style="font-size: 30px;"></i></a>
                                        @endif
                                        <!--<a target="_blank" href="#" class="twitter"><i class="fa fa-twitter-square" style="font-size: 30px;"></i></a>-->
                                        <!-- <a target="_blank" href=""><i class="fa fa-linkedin-square" style="font-size: 30px;"></i></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ------------------------------------------end----top bar -->
            <!-- ---------------------------start ----Navbar---------------------------- -->

        </div>
        <!--two icons in same row -->
        <style>
            /* Adjustments to make it fit better */
            .image-container,
            .icon-container {
                height: 100px;
                /* Adjust height as needed */
            }

            .icon-container i {
                font-size: 3rem;
                /* Adjust icon size as needed */
                color: #333;
            }
        </style>


        <div class="container-fluid d-lg-none d-md-none">
            <div class="row">
                <div class="col-6 text-start">
                    <a href="{{ route('home') }}">
                        <img class="img-fluid" src="{{ asset($siteSettings->logo ?? 'logo/logo.png') }}" alt="222">
                    </a>
                </div>

                <div class="col-6 text-end">
                    <i class="fa fa-shopping-cart fs-1 mt-4"></i>
                </div>



            </div>

        </div>



        <!--ends here-->


    </div>
    <nav class="container-fuild d-none d-lg-block d-md-block">
        <ul class="" style="display: flex; align-items: center; justify-content: space-evenly; font-size: .8vw;">
            <li style="margin-left: 5%;">
                <a class="fw-bolder text-white " href="#">
                    <i class="bi bi-border-width mr-3" style="padding-left: -10%; width: 20%;"></i>&nbsp; &nbsp;&nbsp;BOOK A REPAIR
                </a>
                <ul class="drop-menu " style="width: 100%;">
                    <div class="shadow" style="background-color: white; width: 22%; position: fixed; left: 0%;">

                        @php

                        $nav_categories = Category::where('service', ServiceType::REPAIR)->where('status',
                        $args)->limit(6)->get();

                        @endphp
                        @foreach($nav_categories as $category)


                        <li style="height: 25px; float: right; width: 100%;" class="dropend dropdown mt-2 khur ">
                            <p aria-expanded="false" class="d-flex justify-content-between" style="color: #000; text-align: left; gap: 30px;>
                                    <span style=" flex-grow: 1;">&nbsp; &nbsp;&nbsp;{{ $category->name }}</span>

                                <span><i class="bi bi-arrow-right kl" style="color: #E1E1E1;"></i></span>


                            </p>



                            <ul class="dropdown-menu shadow" style=" margin-left: 310px; width: 60%; height: 50vh;
                                    top: 12rem; left: .2rem; background-color: white; position: fixed; font-size: .9vw;">

                                <div class="d-flex">
                                    <!-- Dropdown menu links -->

                                    @php
                                    $nav_devices_count= DeviceType::where('category_id', $category->id)->where('status', $args)->count();
                                    $nav_devices = DeviceType::where('category_id', $category->id)->where('status', $args)->limit(5)->get();
                                    @endphp

                                    @foreach($nav_devices as $device)



                                    <div class=" d-flex flex-column mx-2 mt-3" style="">

                                        <li class="d-flex justify-content-center">
                                            <a href="{{ route('modals', $device->id) }}" style="color: black; white-space: normal; line-height: normal; height: auto; display: block; text-align: left;">
                                                <strong>{{ $device->name }}</strong>
                                            </a>
                                        </li>




                                        @php
                                        $nav_models_count = Modal::where('device_type_id', $device->id)->where('status',
                                        $args)->count();
                                        $nav_models = Modal::where('device_type_id', $device->id)->where('status',
                                        $args)->limit(8)->get();
                                        @endphp
                                        @foreach($nav_models as $nav_model)

                                        <li>
                                            <a href="{{ route('repair-types', ['device' => $device->id, 'modal' => $nav_model->id]) }}" style="color: black;line-height: normal;height: auto;">{{ $nav_model->name }}</a>
                                        </li>
                                        <li class="mx-auto" style="width:90%"></li>
                                        @endforeach

                                        @if($nav_models_count > $nav_models->count())
                                        <li><a href="{{ route('modals', $device->id) }}" style="line-height: normal;height: auto;padding:1px;"><span class="btn text-dark fw-bolder" style="font-size:13px">See
                                                    more</span></a></li>

                                        @endif
                                    </div>
                                    @endforeach
                                    @if($nav_devices_count > $nav_devices->count())
                                    <li><a href="{{ route('device-types', $category->id) }}"><span class="btn text-dark fw-bolder" style="font-size:13px">See
                                                more</span></a></li>
                                    @endif
                                </div>
                            </ul>


                        </li>
                        <li class="drop-menu-item ml-3" style="border-bottom: 1px solid #e1e1e1;width:90%"></li>
                        @endforeach


                </ul>
            </li>



            <li>
                <a href="{{ route('guest-sell-categories') }}" class="text-white fw-bolder " style="border-left: 2px solid white;margin-left:60;padding:0px 50px">
                    SELL YOUR DEVICE <i class="bi bi-chevron-down  fs-5"></i>
                </a>
                <ul style="margin-left:21rem;border-top:2px solid #e1e1e1" class="text-wrap khur shadow">
                    @php

                    $nav_categories = Category::where('service', ServiceType::SELL)->where('status', $args)->get();

                    @endphp
                    @foreach($nav_categories as $category)

                    <li>
                        <a href="{{ route('guest-sell-device-types', $category->id) }}" class="text-black  " style="display: block; font-size: 14px; padding:0px 50px"> {{ $category->name }} <i class="bi bi-chevron-down ml-2 fs-5"></i>
                        </a>


                        <ul style="width:100%; height:45vh; border-top:2px solid #e1e1e1; list-style-type: none; padding: 0;">
                            <div class="d-flex shadow" style="background-color: white;">
                                @php
                                $nav_devices_count= DeviceType::where('category_id', $category->id)->where('status',
                                $args)->count();
                                $nav_devices= DeviceType::where('category_id', $category->id)->where('status',
                                $args)->limit(4)->get();
                                @endphp
                                @foreach($nav_devices as $device)
                                <div class="d-flex flex-column mx-2 mt-3">
                                    <li class="fw-bolder justify-content-center" style="height: 2vh;">
                                        <a href="{{ route('guest-sell-models', $device->id) }}" style="black; white-space: normal; line-height: -10%; height: auto; display: block; ">
                                            {{ $device->name }}
                                        </a>
                                    </li>

                                    @php
                                    $nav_models_count = Modal::where('device_type_id', $device->id)->where('status', $args)->count();
                                    $nav_models = Modal::where('device_type_id', $device->id)->where('status', $args)->limit(7)->get();
                                    @endphp

                                    @foreach($nav_models as $nav_model)
                                    <li class="my-2" style="height: 1vh;">
                                        <a href="{{ route('guest-sell-model-detail', $nav_model->id) }}" style=" display: block; text-align: left;">
                                            {{ $nav_model->name }}
                                        </a>
                                    </li>
                                    @endforeach

                                    @if($nav_models_count > $nav_models->count())
                                    <li class="mt-3">
                                        <a href="{{ route('guest-sell-models', $device->id) }}" class="btn text-dark fw-bolder" style="font-size: 13px; text-align: left;">
                                            See all models
                                        </a>
                                    </li>
                                    @endif
                                </div>

                                @endforeach

                                @if($nav_devices_count > $nav_devices->count())
                                <li><a href="{{ route('guest-sell-device-types', $category->id) }}"><span class="btn text-dark fw-bolder" style="font-size:13px">See all Devices
                                        </span></a></li>
                                @endif
                            </div>
                        </ul>


                    </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{ route('guest-buy-products') }}" class="text-white fw-bolder " style="padding:0px 50px">
                    BUY A DEVICE <i class="bi bi-chevron-down  fs-5"></i>
                </a>
                <ul style="margin-left:22%;border-top:2px solid #e1e1e1" class="text-wrap shadow">
                    <div class="d-flex " style="background-color: white;">
                        @php

                        $nav_categories = Category::where('service', ServiceType::BUY)->where('status', $args)->get();

                        @endphp
                        @foreach($nav_categories as $category)
                        <li>
                            <a href="#" class="text-black" style="display: block; font-size: 14px; padding:0px 50px"">{{ $category->name }}<i class=" bi bi-chevron-down ml-2 fs-5"></i>
                            </a>


                            <ul style="width:100%; height:45vh;border-top:1px solid #e1e1e1;">
                                <div class="d-flex pt-3 shadow" style="background-color: white;">
                                    @php
                                    $nav_devices_count= DeviceType::where('category_id', $category->id)->where('status',
                                    $args)->count();
                                    $nav_devices= DeviceType::where('category_id', $category->id)->where('status',
                                    $args)->limit(7)->get();
                                    @endphp
                                    @foreach($nav_devices as $device)
                                    <div class="d-flex flex-column mx-2">
                                        <li class="fw-bolder mb-2">
                                            <a href="{{ route('guest-buy-product-specs', $device->id) }}" style="line-height: normal;height: auto">{{ $device->name }}</a>
                                        </li>
                                        @php
                                        $nav_models_count = Modal::where('device_type_id', $device->id)->where('status',
                                        $args)->count();
                                        $nav_models = Modal::where('device_type_id', $device->id)->where('status',
                                        $args)->get();
                                        @endphp
                                        @foreach($nav_models as $nav_model)

                                        <li class="my-2"><a href="{{ route('guest-buy-product-specs', $nav_model->id) }}" style="line-height: normal;height: auto">{{ $nav_model->name }}</a></li>
                                        <li class="mx-auto" style="width:50%"></li>
                                        @endforeach

                                        @if($nav_models_count > $nav_models->count())
                                        <li><a href="{{ route('guest-buy-product-specs', $nav_model->id)}}"><span class="btn text-dark fw-bolder" style="font-size:13px">See all
                                                    models</span></a></li>
                                        @endif
                                    </div>
                                    @endforeach

                                    @if($nav_devices_count > $nav_devices->count())
                                    <li><a href="{{ route('guest-buy-product-specs', $device->id) }}"><span class="btn text-dark fw-bolder" style="font-size:13px">See all
                                                devices</span></a></li>
                                    @endif
                                </div>
                            </ul>
                        </li>
                        @endforeach
                </ul>
            </li>

            <li><a href="{{ route('aboutus') }}" class="text-white fw-bolder " style="padding:0px 50px">ABOUT US </a></li>
            <li><a href="{{ route('blog') }}" class="text-white fw-bolder AA" style="padding:0px 50px">BLOG </a></li>
            <li><a href="{{ route('stores') }}" class="text-white fw-bolder AA" style="padding:0px 50px">FIND A STORE </a></li>
        </ul>
    </nav>



    <!--navbar for mobile screen only-->
    <!--first nav style-->
    <style>
        .nav-pills>li>a {
            border-radius: 0;
        }

        #wrapper {
            padding-left: 0;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
            overflow: hidden;
        }

        #wrapper.toggled {
            padding-left: 250px;
            overflow: hidden;
        }

        #sidebar-wrapper {
            z-index: 1000;
            position: absolute;
            left: 250px;
            width: 0;
            height: 100%;
            margin-left: -250px;
            overflow-y: auto;
            background: white;
            color: black;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 250px;
        }

        #page-content-wrapper {
            position: absolute;
            padding: 15px;
            width: 100%;
            overflow-x: hidden;
        }

        .xyz {
            min-width: 360px;
        }

        #wrapper.toggled #page-content-wrapper {
            position: relative;
            margin-right: 0px;
        }

        .fixed-brand {
            width: auto;
        }

        /* Sidebar Styles */

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 250px;
            margin: 0;
            padding: 0;
            list-style: none;
            margin-top: 2px;
        }

        .sidebar-nav li {
            text-indent: 15px;
            line-height: 40px;
        }

        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            color: black;
        }

        .sidebar-nav li a:hover {
            text-decoration: none;
            color: #fff;
            /*background: rgba(255, 255, 255, 0.2);*/
            background-color: red;
            border-left: red 2px solid;
        }

        .sidebar-nav li a:active,
        .sidebar-nav li a:focus {
            text-decoration: none;
        }

        .sidebar-nav>.sidebar-brand {
            height: 65px;
            font-size: 18px;
            line-height: 60px;
        }

        .sidebar-nav>.sidebar-brand a {
            color: #999999;
        }

        .sidebar-nav>.sidebar-brand a:hover {
            color: #fff;
            background: none;
        }

        .no-margin {
            margin: 0;
        }

        @media (min-width: 768px) {
            #wrapper {
                padding-left: 250px;
            }

            .fixed-brand {
                width: 250px;
            }

            #wrapper.toggled {
                padding-left: 0;
            }

            #sidebar-wrapper {
                width: 250px;
            }

            #wrapper.toggled #sidebar-wrapper {
                width: 250px;
            }

            #wrapper.toggled-2 #sidebar-wrapper {
                width: 50px;
            }

            #wrapper.toggled-2 #sidebar-wrapper:hover {
                width: 250px;
            }

            #page-content-wrapper {
                padding: 20px;
                position: relative;
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;
            }

            #wrapper.toggled #page-content-wrapper {
                position: relative;
                margin-right: 0;
                padding-left: 250px;
            }

            #wrapper.toggled-2 #page-content-wrapper {
                position: relative;
                margin-right: 0;
                margin-left: -200px;
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;
                width: auto;
            }
        }
    </style>
    <!---->


    <!--second nav style-->
    <style>
        .smart-btn button+button {
            --_c: grey;
            flex: calc(.75 + var(--_s, 0));
            background:
                conic-gradient(from -90deg at calc(1.3*var(--b)) 100%, var(--_c) 119deg, #0000 121deg) border-box;
            clip-path: polygon(calc(0.577*var(--h)) 0, 100% 0, 100% 100%, 0 100%);
            margin: 0 0 0 calc(-0.288*var(--h));
            padding: 0 0 0 calc(0.288*var(--h));
        }

        .smart-btn button:focus-visible {
            outline-offset: calc(-2*var(--b));
            outline: calc(var(--b)/2) solid #000;
            background: none;
            clip-path: none;
            margin: 0;
            padding: 0;
        }

        .smart-btn button:focus-visible+button {
            background: none;
            clip-path: none;
            margin: 0;
            padding: 0;
        }

        .smart-btn button:has(+ button:focus-visible) {
            background: none;
            clip-path: none;
            margin: 0;
            padding: 0;
        }

        button:hover,
        button:active:not(:focus-visible) {
            --_s: .75;
        }

        button:active {
            box-shadow: inset 0 0 0 100vmax var(--_c);
            color: #fff;
        }


        .bg-gradient-danger {
            background-image: var(--linear-red);
        }

        .address label.active {
            background: white;
            padding: 9px 16px 13px 16px;
            color: black;
        }

        .label::before {
            content: '+';
            font-weight: 600;
            float: right;
        }

        /* Style for the label when the accordion is checked (open) */
        .accordion:checked+.label::before {
            content: '-';
        }

        /* Style for the content of the accordion */
        .content {
            display: none;
            padding: 10px;
        }

        /* Style for the content when the accordion is checked (open) */
        .accordion:checked+.label+.content {
            display: block;
        }
    </style>

    <!--ends here-->


    <div style="position:relative; left:60px;top:13px;" class="container d-lg-none d-md-none">

    </div>


    <div class="d-lg-none d-md-none">
        <nav class="navbar navbar-default no-margin bg-white">

            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="row justify-content-left">
                <div class="col-2">
                    <div class="navbar-header fixed-brand">
                        <button style="" type="button" class="navbar-toggle fa fa-bars collapsed border-0 fs-1 bg-white" data-toggle="collapse" id="menu-toggle">
                            <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                        </button>


                        <!--<a class="navbar-brand" href="#"><i class="fa fa-bars fa-4"></i> M-33</a>-->
                    </div>

                </div>

                <div class="col-10"> <!-- Adjust the column size based on your preference -->
                    <div class="input-group ">
                        <input style="border-radius: 50px 0 0 50px; padding: 10px; border: 1px solid red; " type="text" class="form-control" placeholder="Enter Email" aria-label="Enter something" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button style="border-radius: 0 50px 50px 0;font-size:10px;" class="btn btn-danger text-white w-100" type="button" id="button-addon2">Subscribe</button>
                        </div>
                    </div>
                </div>

            </div>


            <!-- navbar-header-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2"> <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                        </button>
                    </li>
                </ul>
            </div>
            <!-- bs-example-navbar-collapse-1 -->
        </nav>
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">



                <div class="accordion-container card mt-2">

                    <input type="checkbox" class="accordion d-none " id="accordion-1">
                    <label style="background-color:white;" class="label d-block p-2 bg-gray cursor-pointer border-bottom " for="accordion-1">Sell
                        Your Device</label>
                    <div style="" class="content col-12">

                        <!--dynamic data -->
                        <style>
                            .accordion-icon::before,
                            .accordion-icon::after {
                                content: '';
                                display: inline-block;
                                width: 8px;
                                height: 8px;
                                border-left: 2px solid currentColor;
                                border-bottom: 2px solid currentColor;
                                transform: rotate(-180deg);
                                transition: transform 0.3s;
                            }

                            .accordion-icon::after {
                                transform: rotate(135deg);
                            }

                            .accordion-icon-open::before {
                                transform: rotate(180deg);
                            }

                            .accordion-icon-open::after {
                                transform: rotate(-180deg);
                            }
                        </style>

                        <div style="margin-top:-50%;">
                            @php
                            $nav_categories = Category::where('service', ServiceType::SELL)->where('status', $args)->get();
                            @endphp
                            @foreach($nav_categories as $category)
                            @php $categoryId = 'category_' . $category->id; @endphp
                            <li style="margin-bottom:-10px;list-style:none;" class="col-12 p-0 m-0">
                                <a href="#" class="" style=" font-size: 14px; " onclick="toggleAccordion('{{ $categoryId }}')">
                                    {{ $category->name }} <i id="icon_{{ $categoryId }}" class="bi bi-chevron-down ms-3 fs-5 "></i>
                                </a>
                                <ul id="{{ $categoryId }}" style="display: none; border-top: 2px solid #e1e1e1; list-style-type: none; padding: 0;">
                                    <div class="d-flex flex-column">
                                        @php
                                        $nav_devices_count= DeviceType::where('category_id', $category->id)->where('status', $args)->count();
                                        $nav_devices= DeviceType::where('category_id', $category->id)->where('status', $args)->limit(4)->get();
                                        @endphp
                                        @foreach($nav_devices as $device)
                                        <div class="d-flex flex-column">
                                            @php $deviceId = 'device_' . $device->id; @endphp
                                            <li class="fw-bolder" style="margin-bottom:-10px;">
                                                <a href="#" style="color: black; white-space: normal; display: block; padding: 5px;" onclick="toggleAccordion('{{ $deviceId }}')">
                                                    {{ $device->name }} <i id="icon_{{ $deviceId }}" class="bi bi-chevron-down ml-2 fs-5 "></i>
                                                </a>
                                                <ul id="{{ $deviceId }}" style="display: none; list-style-type: none; padding: 0;">
                                                    @php
                                                    $nav_models_count = Modal::where('device_type_id', $device->id)->where('status', $args)->count();
                                                    $nav_models = Modal::where('device_type_id', $device->id)->where('status', $args)->limit(7)->get();
                                                    @endphp
                                                    @foreach($nav_models as $nav_model)
                                                    <li>
                                                        <a href="{{ route('guest-sell-model-detail', $nav_model->id) }}" style="color: black; display: block; text-align: left;">
                                                            {{ $nav_model->name }}
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                    @if($nav_models_count > $nav_models->count())
                                                    <li>
                                                        <a href="{{ route('guest-sell-models', $device->id) }}" class="btn text-dark fw-bolder" style="font-size: 13px; text-align: left;">
                                                            See all models
                                                        </a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </li>
                                        </div>
                                        @endforeach
                                        @if($nav_devices_count > $nav_devices->count())
                                        <li>
                                            <a href="{{ route('guest-sell-device-types', $category->id) }}">
                                                <span class="btn text-dark fw-bolder" style="font-size: 13px;">See all Devices</span>
                                            </a>
                                        </li>
                                        @endif
                                    </div>
                                </ul>
                            </li>
                            @endforeach
                        </div>

                        <script>
                            function toggleAccordion(elementId) {
                                var element = document.getElementById(elementId);
                                var icon = document.getElementById('icon_' + elementId);
                                if (element.style.display === "none") {
                                    element.style.display = "block";
                                    icon.classList.add('accordion-icon-open');
                                } else {
                                    element.style.display = "none";
                                    icon.classList.remove('accordion-icon-open');
                                }
                            }
                        </script>


                        <!--ends here-->

                    </div>










                </div>







                <div class="accordion-container card">

                    <input type="checkbox" class="accordion d-none " id="accordion-buy">
                    <label style="background-color:white;" class="label d-block p-2 bg-gray cursor-pointer border-bottom " for="accordion-buy">Buy A
                        Device</label>
                    <div class="content">
                        <!--dynamic data for buy a device-->
                        <style>
                            .custom-accordion-icon::before,
                            .custom-accordion-icon::after {
                                content: '';
                                display: inline-block;
                                width: 8px;
                                height: 8px;
                                border-left: 2px solid currentColor;
                                border-bottom: 2px solid currentColor;
                                transform: rotate(-180deg);
                                transition: transform 0.3s;
                            }

                            .custom-accordion-icon::after {
                                transform: rotate(135deg);
                            }

                            .custom-accordion-icon-open::before {
                                transform: rotate(180deg);
                            }

                            .custom-accordion-icon-open::after {
                                transform: rotate(-180deg);
                            }
                        </style>

                        <div style="margin-top:-50%;">
                            @php
                            $nav_categories = Category::where('service', ServiceType::BUY)->where('status', $args)->get();
                            @endphp
                            @foreach($nav_categories as $category)
                            @php $categoryId = 'custom_category_' . $category->id; @endphp
                            <li style="margin-bottom:-10px;list-style:none;" class="col-12 p-0 m-0">
                                <a href="#" class="text-black" style=" display: block; font-size: 16px;white-space:nowrap; " onclick="toggleCustomAccordion('{{ $categoryId }}')">
                                    {{ $category->name }}<i id="custom_category_icon_{{ $categoryId }}" class="bi bi-chevron-down fs-5  "></i>
                                </a>
                                <ul id="{{ $categoryId }}" style="display: none;  list-style: none; padding: 0;">
                                    <div class="">
                                        @php
                                        $nav_devices_count= DeviceType::where('category_id', $category->id)->where('status', $args)->count();
                                        $nav_devices= DeviceType::where('category_id', $category->id)->where('status', $args)->limit(7)->get();
                                        @endphp
                                        @foreach($nav_devices as $device)
                                        <div class="">
                                            @php $deviceId = 'custom_device_' . $device->id; @endphp
                                            <li class=" mb-2">
                                                <a href="#" class="text-black fw-bold" style="" onclick="toggleCustomAccordion('{{ $deviceId }}')">
                                                    {{ $device->name }}<i id="custom_device_icon_{{ $deviceId }}" class="bi bi-chevron-down ml-2 fs-5  "></i>
                                                </a>
                                                <ul id="{{ $deviceId }}" style="display: none; list-style-type: none; padding: 0;">
                                                    @php
                                                    $nav_models_count = Modal::where('device_type_id', $device->id)->where('status', $args)->count();
                                                    $nav_models = Modal::where('device_type_id', $device->id)->where('status', $args)->get();
                                                    @endphp
                                                    @foreach($nav_models as $nav_model)
                                                    <li>
                                                        <a href="{{ route('guest-buy-product-specs', $nav_model->id) }}" style="color: black; display: block; text-align: left;font-size:12px;">
                                                            {{ $nav_model->name }}
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                    @if($nav_models_count > $nav_models->count())
                                                    <li>
                                                        <a href="{{ route('guest-buy-product-specs', $device->id) }}" class="btn text-dark fw-bolder" style="font-size: 13px; text-align: left;">
                                                            See all models
                                                        </a>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </li>
                                        </div>
                                        @endforeach
                                        @if($nav_devices_count > $nav_devices->count())
                                        <li><a href="{{ route('guest-buy-product-specs', $category->id) }}" class="btn text-dark fw-bolder" style="font-size:13px; padding-left: 10px;">See all devices</a></li>
                                        @endif
                                    </div>
                                </ul>
                            </li>
                            @endforeach
                        </div>

                        <script>
                            function toggleCustomAccordion(elementId) {
                                var element = document.getElementById(elementId);
                                var icon = document.getElementById('custom_category_icon_' + elementId) || document.getElementById('custom_device_icon_' + elementId);
                                if (element.style.display === "none") {
                                    element.style.display = "block";
                                    icon.classList.add('custom-accordion-icon-open');
                                } else {
                                    element.style.display = "none";
                                    icon.classList.remove('custom-accordion-icon-open');
                                }
                            }
                        </script>


                        <!--ends here-->

                    </div>










                </div>


                <div class="accordion-container card ">

                    <input type="checkbox" class="accordion d-none " id="accordion-repair">
                    <label style="background-color:white;" class="label d-block p-2 bg-gray cursor-pointer border-bottom " for="accordion-repair">Repair A Device</label>
                    <div class="content">
                        <style>
                            .custom-accordion-icon::before,
                            .custom-accordion-icon::after {
                                content: '';
                                display: inline-block;
                                width: 8px;
                                height: 8px;
                                border-left: 2px solid currentColor;
                                border-bottom: 2px solid currentColor;
                                transform: rotate(-180deg);
                                transition: transform 0.3s;
                            }

                            .custom-accordion-icon::after {
                                transform: rotate(135deg);
                            }

                            .custom-accordion-icon-open::before {
                                transform: rotate(180deg);
                            }

                            .custom-accordion-icon-open::after {
                                transform: rotate(-180deg);
                            }
                        </style>


                        <div style="background-color: white;margin-top:-50%;">
                            @php
                            $nav_categories = Category::where('service', ServiceType::REPAIR)->where('status', $args)->limit(6)->get();
                            @endphp
                            @foreach($nav_categories as $category)
                            @php $categoryId = 'repair_category_' . $category->id; @endphp
                            <li style="list-style:none;" class="mt-2">
                                <p data-bs-toggle="dropdown" aria-expanded="false" class=" justify-content-between" style="color: #000;">
                                    <span style="flex-grow: 1;font-size:15px;font-weight:bolder; white-space:nowrap;">&nbsp; &nbsp;&nbsp;{{ $category->name }}</span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<span><i id="repair_icon_{{ $categoryId }}" class="bi bi-chevron-down kl " style="color: #E1E1E1;list-style:none;" onclick="toggleRepairAccordion('{{ $categoryId }}')"></i></span>
                                </p>
                                <ul id="{{ $categoryId }}" class="" style="display: none;list-style:none; ">
                                    <div class="">
                                        <!-- Dropdown menu links -->
                                        @php
                                        $nav_devices_count= DeviceType::where('category_id', $category->id)->where('status', $args)->count();
                                        $nav_devices = DeviceType::where('category_id', $category->id)->where('status', $args)->limit(7)->get();
                                        @endphp
                                        @foreach($nav_devices as $device)
                                        @php $deviceId = 'repair_device_' . $device->id; @endphp
                                        <div class="mt-3">
                                            <li class="">
                                                <a href="{{ route('modals', $device->id) }}" style="color: black; white-space: normal; ">
                                                    <strong>{{ $device->name }}</strong>
                                                </a>
                                            </li>
                                            @php
                                            $nav_models_count = Modal::where('device_type_id', $device->id)->where('status', $args)->count();
                                            $nav_models = Modal::where('device_type_id', $device->id)->where('status', $args)->limit(8)->get();
                                            @endphp
                                            @foreach($nav_models as $nav_model)
                                            <li>
                                                <a href="{{ route('repair-types', ['device' => $device->id, 'modal' => $nav_model->id]) }}" style="color: black;line-height: normal;height: auto;">{{ $nav_model->name }}</a>
                                            </li>
                                            <li class="mx-auto" style="width:90%"></li>
                                            @endforeach
                                            @if($nav_models_count > $nav_models->count())
                                            <li><a href="{{ route('modals', $device->id) }}" style="line-height: normal;height: auto;padding:1px;"><span class="btn text-dark fw-bolder" style="font-size:13px">See more</span></a></li>
                                            @endif
                                        </div>
                                        @endforeach
                                        @if($nav_devices_count > $nav_devices->count())
                                        <li><a href="{{ route('device-types', $category->id) }}"><span class="btn text-dark fw-bolder" style="font-size:13px">See more</span></a></li>
                                        @endif
                                    </div>
                                </ul>
                            </li>
                            <!--<li class="drop-menu-item ml-3" style="border-bottom: 1px solid #e1e1e1;width:90%"></li>-->
                            @endforeach
                        </div>


                        <script>
                            function toggleRepairAccordion(elementId) {
                                var element = document.getElementById(elementId);
                                var icon = document.getElementById('repair_icon_' + elementId);
                                if (element.style.display === "none") {
                                    element.style.display = "block";
                                    icon.classList.add('custom-accordion-icon-open');
                                } else {
                                    element.style.display = "none";
                                    icon.classList.remove('custom-accordion-icon-open');
                                }
                            }
                        </script>



                    </div>










                </div>

                <!--new content ends here-->


            </div>

        </div>


    </div>




    <!--new scripts-->
    <script>
        function changeRadioButton() {

            document.getElementById("text").innerHTML = "<div class=\'fs-6\'><h3>IS A REFURBISHED IPHONE 12 MINI AS GOOD AS A NEW ONE?</h3>When a product gets refurbished, the technicians get it as close to brand new as they can. That means resetting everything so it’s just like the phone is fresh out the box. So, in many ways, it practically is a new phone.</br></br>While some second hand iPhone 12 Mini models may have slight cosmetic marks, it's nothing a case won’t cover and the saving you make on a second-hand model more than makes up for it!<h3 class=\'mt-5\'>DOES A REFURBISHED IPHONE 12 MINI HAVE A WARRANTY?</h3>It does any second-hand iPhone 12 mini you buy with Mazuma will have a 13-month warranty. This will cover electrical or technical faults, so all you have to do is let us know. It doesn’t cover against wear and tear once you’re using it though. Check our full warranty rundown for more info.<h3 class=\'mt-5\'>WILL MY REFURBISHED IPHONE 12 MINI COME IN THE ORIGINAL BOX?</h3>Some of our second hand iPhone 12 Mini listings will be sent to you in their original box looking as good as new. Where a listing doesn’t have its original box, we’ll still package it up carefully in a replacement so you can enjoy that fresh-out-the-box feeling.</div>"

            document.getElementById("style-div").style.background = "#e1e1e1";
            document.getElementById("style-div").style.color = "black";



            document.getElementById("detail").style.background = "#e1e1e1";
            document.getElementById("detail").style.color = "black";

            document.getElementById("specification").style.background = "white";
            document.getElementById("specification").style.color = "gray";

            document.getElementById("warranty").style.background = "white";
            document.getElementById("warranty").style.color = "gray";

            document.getElementById("review").style.background = "white";
            document.getElementById("review").style.color = "gray";


        }

        function changeRadioButton2() {
            document.getElementById("text").innerHTML = "<div class=\'p-3 \'>Touchscreen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Haptic Touch</span></br>SIM Size(s)&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; nano-SIM • eSIM</br>Sensor Type(s) &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; LiDAR</br>Screen Type &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	OLED</br>Product Family  &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	iPhone 12 mini</br>Operating System	 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;iOS 14</br>Chipset  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	A14</br>Camera Features  &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Night mode</br>Built in Camera  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;	Yes</br>Bluetooth Version  &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;	&nbsp; 5</br>Item Returns	 &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; This item can be returned</div>";

            document.getElementById("style-div").style.background = "#e1e1e1";
            document.getElementById("style-div").style.color = "black";


            document.getElementById("specification").style.background = "#e1e1e1";
            document.getElementById("specification").style.color = "black";

            document.getElementById("detail").style.background = "white";
            document.getElementById("detail").style.color = "gray";

            document.getElementById("warranty").style.background = "white";
            document.getElementById("warranty").style.color = "gray";

            document.getElementById("review").style.background = "white";
            document.getElementById("review").style.color = "gray";


        }

        function changeRadioButton3() {
            document.getElementById("text").innerHTML = "<div class=\'fs-6\'><h3>13 MONTH WARRANTY INCLUDED</h3></br><p class=\'fs-6 fw-bold\'>What’s better than a 12-month warranty for your new device?</p>A 13-month warranty, I hear you say!</br></br><p class=\'fs-6 fw-bold\'>What does the Mobilebitz Shop Warranty 13 cover?</p>Let’s keep this simple! In short, any fault or issue with the phone that is not due to any fault of yours.</br></br><p class=\'fs-6 fw-bold\'>What’s unfortunately not covered?</p>Here at Mobilebitz Shop we know accidents can happen, and your phone is usually with you wherever you go, a pub, a club and skydiving for example. Unfortunately, if your phone is damaged, dropped, or it's stopped working because of any non OEM software upgrades changes, we will not be able to cover you.</br></br>Here’s a little list to make this a little simpler for what we do not cover:</br></br>1.Jailbreak attempts or corruption caused by attempts to unlock a device</br>2.Damage and cracks to a device body or screen</br>3.Liquid damage</br>4.Accidental or intentional damage</br>5.Damaged caused by attempted repairs or third party attempted repairs.</br>6.Use on non-genuine parts in any repair (we check this using Phonecheck)</br>7.Normal wear and tear caused for your use of the device</br>8.Faults caused by a reduction in battery health below our provided capacity</br>9.Use of non-genuine accessories or improper use of accessories</div>";

            document.getElementById("style-div").style.background = "#e1e1e1";
            document.getElementById("style-div").style.color = "black";


            document.getElementById("warranty").style.background = "#e1e1e1";
            document.getElementById("warranty").style.color = "black";

            document.getElementById("detail").style.background = "white";
            document.getElementById("detail").style.color = "gray";

            document.getElementById("specification").style.background = "white";
            document.getElementById("specification").style.color = "gray";

            document.getElementById("review").style.background = "white";
            document.getElementById("review").style.color = "gray";
        }

        function sellStore() {
            document.getElementById("result").innerHTML = " <div class=\'mb-3 mt-3\'><label for=\'disabledSelect\' class=\'form-label fw-bold\'>Choose Store</label><select id=\'disabledSelect\' class=\'form-select\'><option>Select Store</option></select></div><div class=\'mb-3\'><label for=\'disabledSelect\' class=\'form-label fw-bold\'>Appointment Date</label><select id=\'disabledSelect\' class=\'form-select\'><option>Select a date</option></select></div><div class=\'mb-3\'><label for=\'disabledSelect\' class=\'form-label fw-bold\'>Appointment Time</label><select id=\'disabledSelect\' class=\'form-select\'><option>Select a time</option></select></div>";
            document.getElementById("opt1").style.background = "white";
            document.getElementById("opt1").style.color = "black";
            document.getElementById("opt2").style.background = "transparent";
            document.getElementById("opt2").style.color = "gray";

        }

        function postDevice() {
            document.getElementById("result").innerHTML = "<div class=\'mb-3 mt-3\'><label  class=\'form-label fw-bold\'>Address Line 1*:</label><input type=\'text\' class=\'form-control\' placeholder=\'Address Line 1\'></div><div class=\'mb-3\'><label  class=\'form-label fw-bold\'>Address Line 2*:</label><input type=\'text\' class=\'form-control\' placeholder=\'Address Line 2\'></div><div class=\'mb-3\'><label  class=\'form-label fw-bold\'>Town/City*:</label><input type=\'text\' class=\'form-control\' placeholder=\'Town/City\'></div><div class=\'mb-3\'><label  class=\'form-label fw-bold\'>Post Code*:</label><input type=\'text\' class=\'form-control\' placeholder=\'Post Code\'></div>";
            document.getElementById("opt2").style.background = "white";
            document.getElementById("opt2").style.color = "black";
            document.getElementById("opt1").style.background = "transparent";
            document.getElementById("opt1").style.color = "gray";

        }


        function sameAdd() {
            document.getElementById("result1").innerHTML = "<div class=\'mb-3 mt-3\'><label  class=\'form-label fw-bold\'>Address Line 1*:</label><input type=\'text\' class=\'form-control\' placeholder=\'Address Line 1\' disabled></div><div class=\'mb-3\'><label  class=\'form-label fw-bold\'>Address Line 2*:</label><input type=\'text\' class=\'form-control\' placeholder=\'Address Line 2\' disabled></div><div class=\'mb-3\'><label  class=\'form-label fw-bold\'>Town/City*:</label><input type=\'text\' class=\'form-control\' placeholder=\'Town/City\' disabled></div><div class=\'mb-3\'><label  class=\'form-label fw-bold\'>Post Code*:</label><input type=\'text\' class=\'form-control\' placeholder=\'Post Code\' disabled></div>";
            document.getElementById("sameAdd").style.background = "white";
            document.getElementById("sameAdd").style.color = "black";
            document.getElementById("newAdd").style.background = "transparent";
            document.getElementById("newAdd").style.color = "gray";

        }

        function newAddress() {
            document.getElementById("result1").innerHTML = "<div class=\'mb-3 mt-3\'><label  class=\'form-label fw-bold\'>Name:</label><input type=\'text\' class=\'form-control\' ></div><div class=\'mb-3\'><label  class=\'form-label fw-bold\'>Address</label><input type=\'text\' class=\'form-control\'></div><div class=\'mb-3\'><label  class=\'form-label fw-bold\'>Phone Number</label><input type=\'text\' class=\'form-control\' ></div><div class=\'mb-3\'><label  class=\'form-label fw-bold\'>Post Code:</label><input type=\'text\' class=\'form-control\' ><label  class=\'form-label fw-bold\'>Post Code:</label><input type=\'text\' class=\'form-control\' ></div>"
            document.getElementById("newAdd").style.background = "white";
            document.getElementById("newAdd").style.color = "black";
            document.getElementById("sameAdd").style.background = "transparent";
            document.getElementById("sameAdd").style.color = "gray";
        }



        function applePay() {
            document.getElementById("card").innerHTML = "<form id=\'card\'><div class=\'row\'><div class=\'mb-3 col\'><label  class=\'form-label fw-bold\'>Card Holder Name</label><input type=\'text\' class=\'form-control\' required ></div><div class=\'mb-3 col\'><label  class=\'form-label fw-bold\'>Card Number</label><input type=\'text\' placeholder=\'1111-2222-3333-4444\' required minlength=\'16\' maxlength=\'16\' class=\'form-control\'></div></div><div class=\'row\'><div class=\'mb-3 col\'><label  class=\'form-label fw-bold\'>CCV</label><input type=\'number\' class=\'form-control\' required ></div><div class=\'mb-3 col\'><label  class=\'form-label fw-bold\'>Expiry Date</label><input type=\'text\' class=\'form-control\' placeholder=\'MM/YYYY\' required ></div></div><button type=\'submit\' class=\'btn btn-outline-dark fs-6 mt-3 p-2\'>Pay Now</button></form>"

        }

        function googlePay() {

        }

        function klarana() {

        }

        function payPal() {

        }
    </script>


    <!--ends here-->



    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $("#menu-toggle-2").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled-2");
            $('#menu ul').hide();
        });

        function initMenu() {
            $('#menu ul').hide();
            $('#menu ul').children('.current').parent().show();

            $('#menu li a').click(function(e) {
                var submenu = $(this).next('ul');
                if (submenu.length) {
                    toggleSubMenu(submenu);
                    return false; // Prevent default anchor behavior
                }
            });
        }

        function toggleSubMenu(submenu) {
            if (submenu.is(':visible')) {
                submenu.slideUp('normal');
            } else {
                $('#menu ul:visible').slideUp('normal');
                submenu.slideDown('normal');
            }
        }

        $(document).ready(function() {
            initMenu();
        });
    </script>




    <!---------------------------------------------------------------------------->
<div>
    <section class="head-sell">
        <div class="container">
        </div>
    </section>
    <section class="head-sell sell-bg-gradient">
        <div class="container">
            <div class="row d-flex align-items-center ">
                <div class="col-lg-6">
                    <h3 class="display-3"> {{ $model->name }}</h3>
                    <p class="lead mt-4">Sell your iphone 13 pro max series with us and get 100% of the price quoted
                        or we'll
                        send it back, free of charge!</p>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <img src="https://ik.imagekit.io/phonelab2/img1.png?updatedAt=1697193111803" class="img-fluid">
                </div>
            </div>
        </div>
    </section>


    <section>

        <div class="container mt-5 ">
            <div class="row">
                <h6 class="text-center fs-1 fw-bold">Tell us about your {{ $model->name }}</h6>
                <p class="text-center text-danger">(This enables us to offer you a preliminary estimate.)</p>
                <div class="col-lg-6 p-5">
                    <img src="https://ik.imagekit.io/phonelab2/img1.png?updatedAt=1697193111803"
                        style="margin-top:-100px;" class="img-fluid">
                </div>

                <div class="col-lg-6  p-5 ">
                    <div class="">

                        <p class="fs-6  fw-bold">Select Memory Size:</p>

                        @forelse($memory_sizes as $memory_size)
                            @if (in_array($memory_size, $available_memory_sizes))
                                <button type="button"
                                    class="btn btn-outline-danger {{ $memory_size == $selectedMemorySize ? 'bg-danger text-white' : '' }}"
                                    wire:click="$set('selectedMemorySize','{{ $memory_size }}')">{{ $memory_size }}</button>
                            @else
                                <button type="button" class="btn bg-gray" disabled>{{ $memory_size }}</button>
                            @endif
                        @empty
                        @endforelse

                    </div>

                    <p class="fs-6 mt-3 fw-bold">Select Condition:</p>


                    <div class="d-flex justify-content-between  align-items-center  ">
                        @forelse($conditions as $condition)
                            @if (in_array($condition, $available_conditions))
                                <label
                                    class="cursor-pointer d-flex gap-2 align-items-center p-2 {{ $condition == $selectedCondition ? 'bg-danger text-white' : 'bg-dark text-white' }} "
                                    wire:click="$set('selectedCondition','{{ $condition }}')">
                                    <span>&#x2713;</span>
                                    {{ $condition }}
                                </label> |
                            @else
                                <label class="d-flex gap-2 align-items-center p-2">
                                    <span>&#x2713;</span>
                                    {{ $condition }}
                                </label> |
                            @endif
                        @empty
                        @endforelse


                    </div>



                    <p class="fs-5 mt-3 fw-bold">Color: </p>
                    @php
                        $replaceColorCode = [
                            'Black' => 'black',
                            'White' => 'white',
                            'Red' => 'danger',
                            'Green' => 'success',
                            'Yellow' => 'warning',
                        ];
                    @endphp

                    <div>
                        @forelse($colors as $key => $color)
                            @if (in_array($color, $available_colors))
                                <button type="button" wire:click="$set('selectedColor','{{ $color }}')"
                                    class="p-3  btn bg-{{ $replaceColorCode[$color] }} rounded-circle shadow-sm border border-warning {{ $color == $selectedColor ? 'bg-danger text-white' : '' }}"></button>
                            @else
                                <button type="button"
                                    class="p-3  btn bg-{{ $replaceColorCode[$color] }} rounded-circle shadow-sm border "
                                    disabled></button>
                            @endif
                        @empty
                        @endforelse
                    </div>

                    <p class="fs-5 mt-3 fw-bold">Network unlocked:</p>
                    <div class="smart-bt">
                        @if ($network_unlocked)
                            <button class="fw-bold fs-5">Yes</button>
                        @else
                            <button class="fw-bold fs-5">No</button>
                        @endif
                    </div>


                    <div class=" mt-5 d-flex align-items-end flex-column  mb-3">
                        <div class="p-2 fs-1 text-danger fw-bold" id="cashText">
                            <h2>Cash Value: £{{ $price }}.00</h2>
                        </div>
                        <div class="p-2 fs-3 fw-bold text-secondary ">
                            <strong>Gift e-card up to: £467.50</strong>
                        </div>
                        <div class="mt-auto p-2 ">
                            <button type="button" class=" p-4 fs-5 rounded-pill btn btn-primary text-white ">SELL
                                THE
                                DEVICE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>


</div>
</div>
</div>
</div>
</section>



{{-- --------------SELL PAGE 3 CODE-------------  --}}

<section>
    <div class="container p-5 mt-5 bg-gray text-black ">
        <div class="row">

            <!-- customer details form -->
            <div class="col-lg-6 p-2 ">
                <div class="">
                    <p class=" fs-1 mt-3 fw-bold text-danger">Customer Details</p>
                    <p class="">Tell us about yourself</p>

                    <form class="">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">First Name*</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Last Name*</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Email Address*</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Confirm Email*</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Phone Number*</label>
                                    <input type="number" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">City/Town*</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>

                        </div>


                        <p class="fw-bold">Are you an existing customer?</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>
                        <p class="fw-bold">Is this a business sell?</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">No</label>
                        </div>


                    </form>

                </div>
            </div>




            {{-- ---- sell option form ----- --}}
            <div class="col-lg-6">
                <div class=" p-2">
                    <p class="fs-1 fw-bold mt-3 text-danger">Sell Options</p>
                    <p>How you'll sell your device</p>
                    <div class="d-flex justify-content-center align-items-center  ">
                        <div class="form-check address">

                            <label class="form-check-label fw-bold p-3 active" id="opt1" for="flexRadioDefault1"
                                onclick="sellStore()">
                                Sell In Store*
                            </label>
                        </div>
                        <div class="form-check">

                            <label class="form-check-label fw-bold p-3 " id="opt2" for="flexRadioDefault2"
                                onclick="postDevice()">
                                Post Your Device*
                            </label>
                        </div>
                        <div class="form-check">

                            <label class="form-check-label fw-bold p-3" id="opt3" for="flexRadioDefault2"
                                onclick="collectDevice()">
                                Collect My Device*
                            </label>
                        </div>

                    </div>
                </div>

                <!-- -------change radio forms------ -->
                <div id="style-div" class=" text-black  bg-white p-3" style="margin-top: -18px;">
                    <div id="result">
                        <div class="mb-3 mt-3">
                            <label for="disabledSelect" class="form-label fw-bold">Choose Store</label>
                            <select id="disabledSelect" class="form-select">
                                <option>Select Store</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label fw-bold">Appointment Date</label>
                            <select id="disabledSelect" class="form-select">
                                <option>Select a date</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="disabledSelect" class="form-label fw-bold">Appointment Time</label>
                            <select id="disabledSelect" class="form-select">
                                <option>Select a time</option>
                            </select>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</section>



<section>
    <div class="container mt-5">


        <div class="container-fluid mb-5 bg-gray p-5">
            <div class="row ">


                <div class="col-lg-6  bg-gray ">
                    <h2 class="fw-bold">Billing Address</h2>
                    <div class=" p-3 mt-5">


                        <!-- -------change radio forms------ -->
                        <div id="style-div" class=" text-black bg-white p-5 border-3 border border-primary rounded-1">
                            <div id="result1">

                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label fw-bold">Your Name</label>
                                    <input type="number" class="form-control" placeholder="enter your Name">
                                </div>

                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label fw-bold">Your Account Name</label>
                                    <input type="number" class="form-control" placeholder="enter your account name">
                                </div>
                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label fw-bold">Your Account Email
                                        Address</label>
                                    <input type="number" class="form-control"
                                        placeholder=" enter your account email address">
                                </div>

                                <div class="mb-3">
                                    <label for="disabledSelect" class="form-label fw-bold">Confirm Email</label>
                                    <input type="number" class="form-control"
                                        placeholder="confirm your email address">
                                </div>


                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-lg-1"></div>

                <div class="col-lg-3 p-5" style="margin-top: 58px;">
                    <div class="card text-center mb-2 border-3 border border-primary rounded-1"
                        style="width: 15rem; height:145px;">
                        <div class="card-body ">
                            <p class="card-title">PAYPAL</p>
                            <p class="card-text" style="font-size: 12px;">We will pay through paypal</p>
                            <img src="https://cdn3.iconfinder.com/data/icons/logos-and-brands-adobe/512/249_Paypal_Credit_Card-512.png"
                                width="60px" style="margin-top: -12px;">
                        </div>
                    </div>
                    <div class="card text-center mb-2" style="width: 15rem; height:149px ;">
                        <div class="card-body">
                            <p class="card-title">Bank Transfer</p>
                            <p class="card-text" style="font-size: 12px;">We will pay directly to your bank account.
                            </p>
                            <img src="https://cdn4.iconfinder.com/data/icons/simple-peyment-methods/512/bank_transfer-512.png"
                                width="60px" style="margin-top: -20px;">
                        </div>
                    </div>
                    <div class="card text-center" style="width: 15rem; height:140px;">
                        <div class="card-body">
                            <p class="card-title">Voucher</p>
                            <p class="card-text" style="font-size: 12px;">We will pay through voucher</p>
                            <img src="https://cdn-icons-png.flaticon.com/512/5939/5939991.png" width="60px"
                                style="margin-top: -12px;">
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

<!-- -----------------------Product------------------- -->
<section class=" mb-4">
    <div class="container bg-gray rounded-4 p-5">
        <h1 class="fw-bold text-danger">Find your iphone Model </h1>
        <p>Choose your iphone 13 pro model and memory size to see what it’s worth...</p>
        <div class="card p-2">
            <div class="row">
                <div class="col-lg-3 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/im2.webp?updatedAt=1697193847328"
                                class="w-50">
                        </div>
                        <div class="card-body">
                            <p>iphone 13 pro max</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/img2(13).jpg?updatedAt=1697193931991"
                                class="w-50">
                        </div>

                        <div class="card-body">
                            <p>iphone 13 pro </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/img3(11).png?updatedAt=1697193983509"
                                class="w-50">
                        </div>

                        <div class="card-body">
                            <p>iphone 11 pro</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/images.jpeg?updatedAt=1697194026960"
                                class="w-50">
                        </div>

                        <div class="card-body">
                            <p>iphone 12 pro max</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/img2(13).jpg?updatedAt=1697193931991"
                                class="w-50">
                        </div>
                        <div class="card-body">
                            <p>iphone 12 pro</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/img5(14).webp?updatedAt=1697198317015"
                                class="w-50">
                        </div>

                        <div class="card-body">
                            <p>iphone 14 pro</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/img6(14).webp?updatedAt=1697198360828"
                                class="w-50">
                        </div>
                        <div class="card-body">
                            <p>iphone 14 pro max</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/img7(15).webp?updatedAt=1697198405867"
                                class="w-50">
                        </div>
                        <div class="card-body">
                            <p>iphone 15 pro max</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/img10(12).jpg?updatedAt=1697198454545"
                                class="w-50">
                        </div>
                        <div class="card-body">
                            <p>iphone 14 pro max</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/img9(12).jpg?updatedAt=1697198504571"
                                class="w-50">
                        </div>
                        <div class="card-body">
                            <p>iphone 15 pro max</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card text-center p-3">
                        <div class="text-center">
                            <img src="https://ik.imagekit.io/phonelab2/img11(11).jpg?updatedAt=1697198565693"
                                class="w-50">
                        </div>
                        <div class="card-body">
                            <p>iphone 13 pro max</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>
 <!-------------------------modal--------------->
 


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>