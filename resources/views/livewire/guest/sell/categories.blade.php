
<div>
    <!-- --------Navbar------------ -->

            <livewire:components.mega-nav />

    <section class="head-sell">
        <div class="container">
            {{-- --}}

        </div>
    </section>
    <section class="head-sell my-5">
        <div class="container">

            <div class="row d-flex align-items-center">
                <div class="col-lg-6 p-3">

                    <p>{!! $webContent->sell_heading_1 !!}{{ $siteSettings->buisness_name ?? '' }}</p>
                    <h1 style=" font-family: heading;">{!! $webContent->sell_heading_2 !!}</h1>

                    {{-- <input type="text" class="form-control my-2 w-75" placeholder="Search e.g.iphone 12"> --}}
                    <p>{!! $webContent->sell_heading_3 !!}</p>
                    <p class="lead">{!! $webContent->sell_heading_4 !!}</p>
                </div>
                <div class="col-lg-6">
                    <img src="https://ik.imagekit.io/2nuimwatr/online-seller-1.jpg?updatedAt=1698831017024" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- ------------product-------- -->
     <section class="about">
    <div class="container">
        <h1 class="text-center" style="color: #E31E24">{!! $webContent->sell_heading_5 !!}</h1>
        <hr class="w-25 mx-auto">
        <div class="row justify-content-center" style="margin-left:5%"> <!-- Added row class and justify-content-center -->
            <div class="d-flex flex-wrap align-items-center justify-content-center my-2 gap-3 ">
                @forelse($categories as $category)
                <div class="col-md-3 mb-3 mr-4"> <!-- Removed 'a' tag and card classes from here -->
                    <a href="{{ route('guest-sell-device-types', $category->id) }}" class="card shah mb-3 mr-3"> <!-- Moved 'a' tag and card classes here -->
                        <img src="{{ $category->file ?? '' }}" class="img-thumbnail" style="height:150px;">
                        <div class="icon"><i class="bi bi-tablet"></i></div>
                        <div class="card-body text-dark text-center fs-3">
                            <h4><b>{{ $category->name }}</b></h4>
                        </div>
                    </a>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        {{-- <div class="text-center">
            <br>
            <button class="btn translate-up bg-danger text-white rounded-0">Other Products</button>
        </div> --}}
    </div>
    <style>
        .shah:hover {
    box-shadow: 0 0 15px red;
    transform: scale(1.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

    </style>
</section>
    {{-- <section class="types">
        <div class="container">
            <div class="col-lg-8 offset-lg-2 text-center">
                <h1 class="text-danger">New arrival</h1>
                <p>In the dynamic realm of mobile tech, numerous beloved phone models resonate with global consumers.
                    These gadgets expertly fuse style and utility, meeting diverse preferences and demands.</p>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 my-2">
                    <img src="https://ik.imagekit.io/phonelab2/iphone.jpg?updatedAt=1697117090695"
                        class="img-fluid img-thumbnail ">
                    <div class="p-3">
                        <h4>Sell My Iphone </h4>
                        <p>Sell your iPhone with us and we promise to pay you 100% of the price quoted or we'll send it
                            back
                            free of charge!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 my-2">
                    <img src="https://ik.imagekit.io/phonelab2/galaxy-s-series.jpg?updatedAt=1697117166025"
                        class="img-fluid img-thumbnail ">
                    <div class="p-3">
                        <h4>Sell my Samsung Galaxy S</h4>
                        <p>Sell your Samsung Galaxy series with us and get 100% of the price quoted or we'll send it
                            back, free of charge!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 my-2">
                    <img src="https://ik.imagekit.io/phonelab2/galaxy-note.jpg?updatedAt=1697117244119"
                        class="img-fluid img-thumbnail ">
                    <div class="p-3">
                        <h4>Sell my Samsung Galaxy Note</h4>
                        <p>We promise to pay you 100% of the price quoted or we’ll send your Samsung Galaxy Note back
                            free
                            of charge!</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 my-3">
                    <div class="img">
                        <h4 class="text-white">GET 50% OFF</h4>
                        <h2 style="font-family: heading;">iPhone 14</h2>
                        <button class="btn translate-up bg-danger text-white rounded-0" role="button">Sell Now</button>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 my-3">
                    <div class="img2">
                        <h4 class="text-white">GET 50% OFF</h4>
                        <h2 style="font-family: heading;">Samsung S Fold</h2>
                        <button class="btn translate-up bg-danger text-white rounded-0" role="button">Sell Now</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-2  ">
                    <div class=" bg-gray rounded-1 p-3 card">
                        <div class="icon"><i class="bi bi-credit-card"></i></div>
                        <h4 class="safe"> Safe Payment</h4>
                        <p>Our secure payment options ensure your transactions are protected, offering peace of mind
                            while selling your devices.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-2 ">
                    <div class=" bg-gray rounded-1 p-3 card">
                        <div class="icon"><i class="bi bi-check-circle-fill"></i></div>
                        <h4 class="shop">Sell With Confidence</h4>
                        <p>
                            List and sell your mobile devices on our trusted platform with transparency and a wide
                            customer base.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-2 ">
                    <div class=" bg-gray rounded-1 p-3 card">

                        <h4 class="shop">World Wide Delivery</h4>
                        <p> We offer global shipping, making it convenient to sell your devices from anywhere, and have reach buyers worldwide.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-2 ">
                    <div class="bg-gray rounded-1 p-3 card">
                        <div class="icon"><i class="bi bi-patch-question"></i></div>
                        <h4 class="safe">24/7 Help Center</h4>
                        <p>Our round-the-clock support is here to assist you at any time, ensuring a smooth and
                            hassle-free experience when selling your mobile phones.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="deals">

        <div class="container">
            <h1>Top rated</h1>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://ik.imagekit.io/phonelab2/deal1.jpg?updatedAt=1697118510429"
                                    class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <small>DRONE</small>
                                    <h5 class="fw-bold">Apple iPhone 13 Pro SmartPhone</h5>
                                    <small>₤20.03 <del>₤30.03</del></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://ik.imagekit.io/phonelab2/deal2.jpg?updatedAt=1697118584539"
                                    class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <small>HEADPHONES</small>
                                    <h5 class="fw-bold">Uborn P47 Wireless Headphone</h5>
                                    <small>₤20.03 <del>₤30.03</del></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://ik.imagekit.io/phonelab2/deal3.jpg?updatedAt=1697118637202"
                                    class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <small>CAMERA LANS</small>
                                    <h5 class="fw-bold">Uborn P47 Camera Lanse</h5>
                                    <small>₤20.03 <del>₤30.03</del></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://ik.imagekit.io/phonelab2/deal4.jpg?updatedAt=1697118727400"
                                    class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <small>SMART WATCH</small>
                                    <h5 class="Apple">Fire-Boltt Bluetooth Smartwatch</h5>
                                    <small>₤20.03 <del>₤30.03</del></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://ik.imagekit.io/phonelab2/deal5.jpg?updatedAt=1697118774399"
                                    class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <small>VIDEO</small>
                                    <h5 class="Apple">AMKETTE Evo Gamepad Pro 4</h5>
                                    <small>₤20.03 <del>₤30.03</del></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="https://ik.imagekit.io/phonelab2/deal6.jpg?updatedAt=1697118829196"
                                    class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <small>MACKBOOK</small>
                                    <h5 class="Apple">Uborn P47 Mackbook</h5>
                                    <small>₤20.03 <del>₤30.03</del></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}
    <section class="mobile">
        <div class="container">
            <h1>{!! $webContent->sell_heading_6 !!}</h1>
            <!--<p>{!! $webContent->sell_heading_7 !!}</p>-->
    <p>
        How Do I Sell My Mobile Phone? Selling your mobile phone with The {{ $siteSettings->buisness_name ?? '' }}  is quick, easy, and hassle-free. Follow these simple steps to get started: Step 1: Get an Instant Quote

Visit our website and click on the "Sell My Phone" button. Select your device's brand, model, and condition from our easy-to-use dropdown menus. Receive an instant quote for your device's value. Our competitive prices ensure you get the best deal. Step 2: Ship Your Device for Free

Once you accept the quote, we'll send you a free shipping label. Package your phone securely and drop it off at your nearest post office. We cover the shipping costs, so you don't have to worry about any additional expenses. Step 3: Inspection and Payment

Our experts will inspect your device to ensure it matches the details provided. Once your phone passes inspection, we'll process your payment promptly. You can choose to receive your payment via bank transfer or check. Step 4: Enjoy Your Payment
    </p>
    
        </div>
    </section>

    <section class="faq mb-5">
        <div class="container">
            <h1>{!! $webContent->sell_heading_8 !!}</h1>
            <p>{{ $siteSettings->buisness_name ?? '' }} {!! $webContent->sell_heading_9 !!}</p>

            <div class="row">
                <div class="col-lg-6">
                    <div class="accordion-container 1   rounded-0">

                        <input type="checkbox" class="accordion d-none " id="accordion-1">
                        <label class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom  text-center" for="accordion-1"> Why should you sell your mobile phone to {{ $siteSettings->buisness_name ?? '' }}?</label>
                        <div class="content card rounded-0 text-black bg-white m-0">
                            <div style="font-size: 14px;" class="rounded-0 text-black bg-white m-0">
                                {!! $webContent->sell_heading_11 !!} {{ $siteSettings->buisness_name ?? '' }}, but to put it simply; the price you’re quoted is the price you will get, and quickly too. We guarantee our quotes and make payments as quickly as possible, often on the same day your phone arrives at <span>{{ $siteSettings->buisness_name ?? '' }},</span> We don’t have any hidden fees or hidden conditions, delete your data and we recycle any device that’s sent to us with the environment in mind.
                            </div>
                        </div>





                    </div>

                    <div class="accordion-container 3  rounded-0">

                        <input type="checkbox" class="accordion d-none " id="accordion-3">
                        <label class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom  text-center" for="accordion-3">What is the process for recycling phones when I sell them to {{ $siteSettings->buisness_name ?? '' }} ?</label>
                        <div class="content card rounded-0 text-black bg-white m-0">
                            <div style="font-size: 14px;" class="rounded-0 text-black bg-white m-0">
                            {!! $webContent->sell_heading_15 !!} {{ $siteSettings->buisness_name ?? '' }} we recycle it. But ‘recycling’ can be different depending on both the type of phone and the condition it’s in when you sell it to us. If your phone is still in good working order, we’ll probably just give it a bit of a polish and refresh and then find a new home for it. 90% of the phones we buy stay in the country as second-hand devices. Some handsets will go overseas to be resold and a few remaining phones will be broken down into parts and safely disposed of if needs be.
                            </div>
                        </div>





                    </div>

                    <div class="accordion-container 5  rounded-0">

                        <input type="checkbox" class="accordion d-none " id="accordion-5">
                        <label class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom  text-center" for="accordion-5"> How much is my device worth?</label>
                        <div class="content card rounded-0 text-black bg-white m-0">
                            <div style="font-size: 14px;" class="rounded-0 text-black bg-white m-0">
                                {!! $webContent->sell_heading_19 !!}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="accordion-container 2   rounded-0">

                        <input type="checkbox" class="accordion d-none " id="accordion-2">
                        <label class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom  text-center" for="accordion-2">Why should I recycle my phone?</label>
                        <div class="content card rounded-0 text-black bg-white m-0">
                            <div style="font-size: 14px;" class="rounded-0 text-black bg-white m-0">
                              {!! $webContent->sell_heading_13 !!}
                            </div>
                        </div>





                    </div>

                    <div class="accordion-container 4   rounded-0">

                        <input type="checkbox" class="accordion d-none " id="accordion-4">
                        <label class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom  text-center" for="accordion-4"> What will happen to my phone?</label>
                        <div class="content card rounded-0 text-black bg-white m-0">
                            <div style="font-size: 14px;" class="rounded-0 text-black bg-white m-0">
                                 {!! $webContent->sell_heading_17 !!} {{ $siteSettings->buisness_name ?? '' }} for cash the same way you sell us another old phone. We accept mobile phones with broken screens, batteries and ones that don’t power on. Obviously it may affect how much we can pay you, but we’re still happy to help you recycle your broken phone.

                            </div>
                        </div>





                    </div>

                </div>










            </div>
        </div>
    </section>

   <style>
    /* Style for the label when the accordion is checked (open) */
    .label::before {
        content: '+';
        font-weight: 600;
        float: right;
    }

    .text-danger {
        color: #737272 !important;
    }

    .accordion:checked + .label::before {
        content: '-' !important;
        float: right !important;
    }

    /* Style for the content of the accordion */
    .content {
        display: none;
        background-color: white !important;
        padding: 10px;
    }

    /* Style for the content when the accordion is checked (open) */
    .accordion:checked + .label + .content {
        display: block;
    }

    .bg-danger {
        background-color: #E31E24 !important;
    }
</style>

</div>