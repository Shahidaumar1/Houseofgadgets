@php
use App\Helpers\ServiceType;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Category;
use App\Models\Branch;
$args = 'Publish';
$branches = Branch::all();
$allCategories = Category::all();

$head_branch = Branch::orderBy('created_at', 'ASC')->first();

@endphp

<div>
    <!-- middle navbar-->
    <style>
        .middle-header-bar {
            padding: 5px 0 5px 15px;
            box-shadow: 0px 0px 10px 0px #00000040;
        }
          a{
                color: #000;
                text-decoration:none;
            }
        .custom-container {
            max-width: 1283px;
            margin: 0 auto;
        }

        .middle-header-main {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header-middle-btns {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .header-middle-btns a {
            width: 140px;
            height: 50px;
            border-radius: 10px;
            border: 1px solid #000;
            color: #000;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 15px;
            line-height: 24.59px;
            font-weight: 500;
            background: transparent;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            text-decoration: none;
        }

        .header-middle-btns a:hover {
            border: 1px solid #d9dde1;
            color: #fff;
            background: #d9dde1;
            transition: 0.3s ease;

        }

        @media(max-width:1200px) {
            .header-middle-btns a {
                width: 130px;
                height: 40px;
                font-size: 14px;
            }

            .header-middle-btns {
                gap: 10px;
            }
        }

        @media(max-width:991px) {

            .header-middle-btns a,
            .header-middle-btns .mobile-view-search i,
            .sidebar-toggleBtn {
                width: 40px !important;
                height: 40px;
                font-size: 14px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                text-align: center;
                color: #d9dde1;
                border: 1px solid #000;
            }

            .header-middle-btns .mobile-view-search i:hover,
            .sidebar-toggleBtn:hover {
                color: #fff;
                background: #d9dde1;
                border: 1px solid #d9dde1;
                transition: 0.3s ease;
            }

            .header-middle-btns {
                gap: 8px;
            }

            .header-middle-btns a:nth-child(1) {
                display: none !important;
            }
        }
    </style>

    <div class="middle-header-bar w-100 float-left d-block">
        <div class="custom-container">
            <div class="middle-header-main">
                <!-- side bar mobile view toggle btn  -->
                <i class="fa fa-bars d-flex d-lg-none sidebar-toggleBtn"></i>

                <!-- Logo -->
                <livewire:components.logo />
                <!-- Search Bar -->
                <div class="align-self-center d-none d-lg-block"><livewire:components.search-bar /></div>
                <!-- btns -->
                <div class="header-middle-btns">
                    <a href="/quotation">
                        <i class='fas fa-file-alt me-2'></i>
                        Get a Quote
                    </a>
                    {{-- ✅ NULL SAFE: head_branch null ho to crash nahi hoga --}}
                    @if($head_branch)
                    <a href="tel:{{ $head_branch->landline_number }}">
                        <i class="fas fa-phone me-lg-2"></i>
                        <span class="d-none d-lg-block">{{ $head_branch->landline_number }}</span>
                    </a>
                    @endif
                    <span class="mobile-view-search d-none">
                        <input class="d-none" type="text" placeholder="Search" wire:model="search">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <!--mega navbar-->
    <div class="web-menu-bar d-none d-lg-block" x-data="{ open: false, hover: false }" wire:mouseleave="hideDevices">
        <div class="custom-container">
            @php
            $routeMapping = [
                'repair' => 'categories',
            ];
            @endphp
            <div :class="{ 'show': open }" id="navbarContent">
                <ul class="mx-auto main-menus">

                    {{-- ✅ REPAIR - Desktop --}}
                    @if($formStatuses->repair)
                    <li class="nav-item navList" @mouseenter="open = true; hover = true"
                        @mouseleave="hover = false; setTimeout(() => { if(!hover) open = false }, 200)">
                        <a class="nav-link"
                            wire:mouseenter="showDevices('Repair')"
                            href="{{ route($routeMapping['repair']) }}">
                            Device Services <i class="bi bi-chevron-down"></i>
                        </a>
                    </li>
                    @endif

                    {{-- ✅ BUY A DEVICE - Desktop --}}
                    @if($formStatuses->buy)
                    <li class="nav-item navList">
                        <a class="nav-link" href="{{ route('guest-buy-products') }}">Buy a Device <i class="bi bi-chevron-down"></i></a>
                    </li>
                    @endif

                    {{-- ✅ SELL YOUR DEVICE - Desktop --}}
                    @if($formStatuses->sell)
                    <li class="nav-item navList">
                        <a href="{{ route('guest-sell-categories') }}" class="nav-link">Sell Your Device</a>
                    </li>
                    @endif

                    {{-- ✅ ACCESSORIES - Desktop --}}
                    @if($formStatuses->accessories)
                    <li class="nav-item navList">
                        <a class="nav-link" href="{{ route('guest-accessories-products') }}">Accessories <i class="bi bi-chevron-down"></i></a>
                    </li>
                    @endif

                    {{-- Repair Guide - always visible --}}
                    <li class="nav-item navList">
                        <a class="nav-link" href="{{ route('repair-guide') }}">
                            Service Guide
                        </a>
                    </li>

                    {{-- About Us & Stores - always visible --}}
                    @foreach(['About Us', 'Stores'] as $item)
                    <li class="nav-item navList">
                        <a class="nav-link" href="{{ url(strtolower(str_replace(' ', '', $item))) }}">
                            {{ $item }}
                        </a>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>

        <!-- mega navbar styles -->
        <style>
            .web-menu-bar {
                display: block;
                width: 100%;
                padding: 20px 15px;
                float: left;
                background-color: #d9dde1;
            }

            .custom-container {
                position: relative;
                max-width: 1283px;
                margin: 0 auto;
            }

            .web-menu-bar .main-menus {
                display: flex;
                flex-direction: row !important;
                gap: 33px !important;
                align-items: center;
                justify-content: center;
                margin-bottom: 0 !important;
            }

            .web-menu-bar .main-menus .nav-link {
                font-weight: 700;
                font-size: 18px;
                line-height: 27.32px;
                color: #fff;
                font-family: "Manrope", sans-serif;
                font-style: normal;
                text-decoration: none;
            }

            .web-menu-bar .main-menus .nav-link:hover {
                color: #fff !important;
            }

            .web-dropmenu {
                position: absolute !important;
                display: block !important;
                background: #fff !important;
                left: 250px;
                top: 44px;
                padding: 20px;
                z-index: 100;
            }

            .web-dropmenu-main {
                display: flex;
                gap: 30px;
            }

            .web-dropmenu-inner {
                display: flex;
                flex-direction: column;
                row-gap: 10px;
            }

            .web-dropmenu-inner .dropdown-heading {
                font-size: 18px;
                color: #d9dde1;
                font-weight: 700;
            }

            .web-dropmenu-inner .drop-menues-link {
                font-size: 14px;
                font-weight: 500;
                color: #000;
            }

            .web-dropmenu .see-all-devices {
                text-align: end;
                width: 100%;
            }

            .web-dropmenu .see-all-devices a {
                font-size: 18px;
                color: #d9dde1;
                font-weight: 700;
            }

            .navList {
                list-style: none;
                text-decoration: none;
            }

            .scroll-css {
                overflow-y: auto;
                max-height: 400px;
                padding-right: 10px;
            }
        </style>
    </div>

    <!-- mobile sidebar -->
    <div>
        <style>
            .mobile-menu-sidebar {
                max-width: 250px;
                width: 100%;
                padding: 35px 15px;
                background-color: white;
                height: 100%;
                position: fixed;
                top: 0;
                left: -300px;
                overflow-y: auto;
                transition: left 0.3s ease;
                z-index: 1000;
            }

            .mobile-menu-sidebar.open {
                left: 0;
            }

            .mobile-menu-sidebar ul {
                list-style: none;
                padding-left: 20px;
            }

            .mobile-menu-sidebar .main-menus {
                display: flex;
                flex-direction: column;
                list-style: none;
                padding: 0;
            }

            .mobile-menu-sidebar .main-menus li {
                border-bottom: 1px solid rgba(0, 0, 0, 0.2);
                padding: 10px 0px;
            }

            .mobile-menu-sidebar .main-menus li a {
                font-size: 16px;
                color: #000;
                text-align: left;
                text-decoration: none;
                font-family: "Manrope", sans-serif;
                font-style: normal;
                font-weight: 600;
            }

            .mobile-menu-sidebar .main-menus div.custom-accordion {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }

            .mobile-menu-sidebar .main-menus div.custom-accordion span {
                font-size: 22px;
            }

            .mobile-menu-sidebar .main-menus li:last-child {
                border-bottom: none;
            }

            .mobile-menu-sidebar .fa-close {
                position: absolute;
                right: 17px;
                top: 5px;
                font-size: 20px;
                color: #000;
                cursor: pointer;
            }

            .close-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .close-overlay.active {
                display: block;
            }

            .mobile-menu-sidebar .main-menus .panel {
                display: none;
            }
        </style>

        <div class="close-overlay"></div>
        <div class="mobile-menu-sidebar">
            <i class="fa-solid fa-close"></i>
            <ul class="main-menus">

                {{-- ============================================ --}}
                {{-- ✅ SELL YOUR DEVICE - Mobile                 --}}
                {{-- ============================================ --}}
                @if($formStatuses->sell)
                <li>
                    <div class="custom-accordion">
                        <a>Sell Your Device</a>
                        <span>+</span>
                    </div>
                    <ul class="panel">
                        @php
                            $sell_categories = Category::where('service', ServiceType::SELL)->where('status', $args)->get();
                        @endphp
                        @foreach($sell_categories as $category)
                        <li>
                            <div class="custom-accordion">
                                <a>{{ $category->name }}</a>
                                <span>+</span>
                            </div>
                            <ul class="panel">
                                @php
                                    $sell_devices_count = DeviceType::where('category_id', $category->id)->where('status', $args)->count();
                                    $sell_devices = DeviceType::where('category_id', $category->id)->where('status', $args)->limit(4)->get();
                                @endphp
                                @foreach($sell_devices as $device)
                                <li>
                                    <div class="custom-accordion">
                                        <a>{{ $device->name }}</a>
                                        <span>+</span>
                                    </div>
                                    <ul class="panel">
                                        @php
                                            $sell_models_count = Modal::where('device_type_id', $device->id)->where('status', $args)->count();
                                            $sell_models = Modal::where('device_type_id', $device->id)->where('status', $args)->limit(7)->get();
                                        @endphp
                                        @foreach($sell_models as $model)
                                        {{-- ✅ SELL: route uses model->id (detail page) --}}
                                        <li>
                                            <a href="{{ route('guest-sell-model-detail', $model->id) }}">
                                                {{ $model->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                        @if($sell_models_count > $sell_models->count())
                                        <li>
                                            <a href="{{ route('guest-sell-models', $device->id) }}">See all models</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                                @endforeach
                                @if($sell_devices_count > $sell_devices->count())
                                <li>
                                    <a href="{{ route('guest-sell-device-types', $category->id) }}">See all Devices</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endforeach
                        @if($sell_categories->isEmpty())
                        <li><a href="{{ route('guest-sell-categories') }}">View All</a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- ============================================ --}}
                {{-- ✅ BUY A DEVICE - Mobile                     --}}
                {{-- ============================================ --}}
                @if($formStatuses->buy)
                <li>
                    <div class="custom-accordion">
                        <a>Buy A Device</a>
                        <span>+</span>
                    </div>
                    <ul class="panel">
                        @php
                            $buy_categories = Category::where('service', ServiceType::BUY)->where('status', $args)->get();
                        @endphp
                        @foreach($buy_categories as $category)
                        <li>
                            <div class="custom-accordion">
                                <a>{{ $category->name }}</a>
                                <span>+</span>
                            </div>
                            <ul class="panel">
                                @php
                                    $buy_devices_count = DeviceType::where('category_id', $category->id)->where('status', $args)->count();
                                    $buy_devices = DeviceType::where('category_id', $category->id)->where('status', $args)->limit(7)->get();
                                @endphp
                                @foreach($buy_devices as $device)
                                <li>
                                    <div class="custom-accordion">
                                        <a>{{ $device->name }}</a>
                                        <span>+</span>
                                    </div>
                                    <ul class="panel">
                                        @php
                                            $buy_models_count = Modal::where('device_type_id', $device->id)->where('status', $args)->count();
                                            $buy_models = Modal::where('device_type_id', $device->id)->where('status', $args)->limit(7)->get();
                                        @endphp
                                        @foreach($buy_models as $model)
                                        {{-- ✅ BUY: route uses category_slug, device_slug, model_slug --}}
                                        <li>
                                            <a href="{{ route('guest-buy-product-specs', [
                                                'category_slug' => $category->slug,
                                                'device_slug'   => $device->slug,
                                                'model_slug'    => $model->slug
                                            ]) }}">
                                                {{ $model->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                        @if($buy_models_count > $buy_models->count())
                                        {{-- ✅ See more models for this device --}}
                                        <li>
                                            <a href="{{ route('guest-buy-products') }}">See all models</a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                                @endforeach
                                @if($buy_devices_count > $buy_devices->count())
                                <li>
                                    <a href="{{ route('guest-buy-products') }}">See all Devices</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endforeach
                        @if($buy_categories->isEmpty())
                        <li><a href="{{ route('guest-buy-products') }}">View All</a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- ============================================ --}}
                {{-- ✅ REPAIR A DEVICE - Mobile                  --}}
                {{-- ============================================ --}}
                @if($formStatuses->repair)
                <li>
                    <div class="custom-accordion">
                        <a>Device Services</a>
                        <span>+</span>
                    </div>
                    <ul class="panel">
                        @php
                            $repair_categories = Category::where('service', ServiceType::REPAIR)
                                ->where('status', $args)
                                ->limit(6)
                                ->get();
                        @endphp
                        @foreach($repair_categories as $category)
                        <li>
                            <div class="custom-accordion">
                                <a>{{ $category->name }}</a>
                                <span>+</span>
                            </div>
                            <ul class="panel">
                                @php
                                    $repair_devices_count = DeviceType::where('category_id', $category->id)->where('status', $args)->count();
                                    $repair_devices = DeviceType::where('category_id', $category->id)->where('status', $args)->limit(7)->get();
                                @endphp
                                
                                @foreach($repair_devices as $device)
                                <li>
                                    <div class="custom-accordion">
                                        <a>{{ $device->name }}</a>
                                        <span>+</span>
                                    </div>
                                    <ul class="panel">
                                        @php
                                            $repair_models_count = Modal::where('device_type_id', $device->id)->where('status', $args)->count();
                                          $repair_models = Modal::where('device_type_id', $device->id)
    ->where('status', $args)
    ->get()
    ->sortByDesc(function ($model) {

        $name = strtolower($model->name);

        preg_match('/(\d+)/', $name, $matches);

        $series = isset($matches[1]) ? (int)$matches[1] : 0;

        $variantScore = 0;

        if (str_contains($name, 'pro max')) {
            $variantScore = 5;
        } elseif (str_contains($name, 'pro')) {
            $variantScore = 4;
        } elseif (str_contains($name, 'air')) {
            $variantScore = 3;
        } elseif (str_contains($name, 'plus')) {
            $variantScore = 2;
        } else {
            $variantScore = 1;
        }

        return ($series * 10) + $variantScore;
    });
                                        @endphp
                                        @foreach($repair_models as $model)
                                        {{-- ✅ REPAIR: route uses category, device, modal (slug binding) --}}
                                        <li>
                                            <a href="{{ route('repair-types', [
                                                'category' => $category->slug,
                                                'device'   => $device->slug,
                                                'modal'    => $model->slug
                                            ]) }}">
                                                {{ $model->name }}
                                            </a>
                                        </li>
                                        @endforeach
                                        @if($repair_models_count > $repair_models->count())
                                        <li>
                                            <a href="{{ route('modals', [
                                                'category' => $category->slug,
                                                'device'   => $device->slug
                                            ]) }}">
                                                See more
                                            </a>
                                        </li>
                                        @endif
                                    </ul>
                                </li>
                                @endforeach
                                @if($repair_devices_count > $repair_devices->count())
                                <li>
                                    <a href="{{ route('device-types', [
                                        'category' => $category->slug
                                    ]) }}">
                                        See more
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endforeach
                        @if($repair_categories->isEmpty())
                        <li><a href="{{ route('categories') }}">View All</a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- ============================================ --}}
                {{-- ✅ ACCESSORIES - Mobile                       --}}
                {{-- ============================================ --}}
                @if($formStatuses->accessories)
                <li>
                    <div class="custom-accordion">
                        <a>Accessories</a>
                        <span>+</span>
                    </div>
                    <ul class="panel">
                        @php
                            $acc_categories = Category::where('service', ServiceType::ACCESSORIES)->where('status', $args)->get();
                        @endphp
                        @foreach($acc_categories as $category)
                        <li>
                            <div class="custom-accordion">
                                <a>{{ $category->name }}</a>
                                <span>+</span>
                            </div>
                            <ul class="panel">
                                @php
                                    $acc_devices_count = DeviceType::where('category_id', $category->id)->where('status', $args)->count();
                                    $acc_devices = DeviceType::where('category_id', $category->id)->where('status', $args)->limit(7)->get();
                                @endphp
                                @foreach($acc_devices as $device)
                                {{-- ✅ ACCESSORIES: simple link to accessories products page --}}
                                <li>
                                    <a href="{{ route('guest-accessories-products') }}">{{ $device->name }}</a>
                                </li>
                                @endforeach
                                @if($acc_devices_count > $acc_devices->count())
                                <li>
                                    <a href="{{ route('guest-accessories-products') }}">See all</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endforeach
                        @if($acc_categories->isEmpty())
                        <li><a href="{{ route('guest-accessories-products') }}">View All Accessories</a></li>
                        @endif
                    </ul>
                </li>
                @endif

                {{-- ============================================ --}}
                {{-- ✅ REPAIR GUIDE - Mobile                      --}}
                {{-- ============================================ --}}
                <li>
                    <a href="{{ route('repair-guide') }}">Service Guide</a>
                </li>

                {{-- ============================================ --}}
                {{-- ✅ ABOUT US & STORES - always visible         --}}
                {{-- ============================================ --}}
                @foreach(['About Us', 'Stores'] as $item)
                <li>
                    <a href="{{ url(strtolower(str_replace(' ', '', $item))) }}">
                        {{ $item }}
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <!-- sidebar html end -->

    <!-- jQuery + Sidebar + Accordion Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {

            // Web accordion (old)
            var acc = document.getElementsByClassName("accordion-web");
            for (var i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function () {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    panel.style.display = (panel.style.display === "block") ? "none" : "block";
                });
            }

            $('.web-header-main button').click(function () {
                $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
            });

            // Toggle sidebar open/close
            $('.sidebar-toggleBtn').on('click', function () {
                $('.mobile-menu-sidebar').addClass('open');
                $('.close-overlay').addClass('active');
            });

            $('.mobile-menu-sidebar .fa-close, .close-overlay').on('click', function () {
                $('.mobile-menu-sidebar').removeClass('open');
                $('.close-overlay').removeClass('active');
            });

            // Close sidebar when clicking outside
            $(document).on('click', function (e) {
                if (!$(e.target).closest('.mobile-menu-sidebar, .sidebar-toggleBtn').length) {
                    $('.mobile-menu-sidebar').removeClass('open');
                    $('.close-overlay').removeClass('active');
                }
            });

            // Mobile custom-accordion slide toggle
            $('.custom-accordion').on('click', function () {
                $(this).next('.panel').slideToggle();
                var span = $(this).find('span');
                span.text(span.text() === '+' ? '-' : '+');
            });
        });
    </script>
</div>