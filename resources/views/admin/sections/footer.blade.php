<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/demo16.css')); ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg"
        style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
        <div class="container">
            <a class="navbar-brand animate__animated animate__pulse animate__infinite	infinite" href="#"><img
                    src="<?php echo e(asset('demo16/img/logo.png')); ?>" class="w-50"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse animate__animated animate__rotateInUpRight" id="navbarSupportedContent"
                style="background-color: #FFFFFF;padding: 2px 5px; border-radius: 7px; font-weight:bold">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sell</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">Contact Us</a>
                    </li>
                </ul>
                <div class="icon">
                    <!--<i class="bi bi-heart" style="color: red;"></i> Wishlist &nbsp;&nbsp;-->
                    <i class="bi bi-cart" style="color: red;"></i> My Cart &nbsp;
                </div>
                <!--<form class="d-flex" role="search">-->
                <!--<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">-->
                <!--<button style="color: red;" class="btn btn-outline-success" type="submit"><i-->
                <!--        class="bi bi-search"></i></button>-->
                <!--</form>-->
            </div>
        </div>
    </nav>
    <section class="head">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 animate__animated animate__zoomIn">
                    <h1>Repairing Your</h1>
                    <h2>Broken Devices</h2>
                    <p class="lead">Our trained technicians will diagnose and repair your device within 24 hours.</p>
                    <a href="<?php echo e(route('device-types')); ?>"><button class="button-33" role="button">&#8600; Book
                            Repair</button></a>
                </div>
                <div class="col-lg-6 animate__animated animate__fadeInBottomLeft">
                    <img src="<?php echo e(asset('demo16/img/pngimg 1.png')); ?>" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="cart">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-7 my-3" data-aos="fade-up" data-aos-duration="1000">
                    <img src="<?php echo e(asset('demo16/img/pngaaa 2.png')); ?>" class="img-fluid">
                </div>
                <div class="col-lg-5 my-3" data-aos="fade-up" data-aos-duration="2000">
                    <img src="<?php echo e(asset('demo16/img/Rectangle 36.png')); ?>" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="card2">
        <div class="container">
            <h1 class="text-white" data-aos="fade-up" data-aos-duration="2000">Select Your Repairing Device <img
                    src="<?php echo e(asset('demo16/img/l1.png')); ?>" width="25"></h1>
            <div class="row my-5" style="background: #ff8080;border-radius: 10px;">
                <div class="col-lg-3 col-md-6 d-flex align-items-sterch my-3" data-aos="fade-up"
                    data-aos-duration="1000">
                    <div class="card">
                        <img src="<?php echo e(asset('demo16/img/1.png')); ?>" class="img-thumbnail img-fluid">
                        <div class="p-2">
                            <h2>Mobile Phone</h2>
                            <p>All Type Off Andriod <br> And Iphone</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-sterch my-3" data-aos="fade-up"
                    data-aos-duration="2000">
                    <div class="card">
                        <img src="<?php echo e(asset('demo16/img/2.png')); ?>" class="img-thumbnail img-fluid">
                        <div class="p-2">
                            <h2>Tablet</h2>
                            <p>All Type Off Tablets <br> And Ipaid</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-sterch my-3" data-aos="fade-up"
                    data-aos-duration="3000">
                    <div class="card">
                        <img src="<?php echo e(asset('demo16/img/3.png')); ?>" class="img-thumbnail img-fluid">
                        <div class="p-2">
                            <h2>Laptop</h2>
                            <p>All Type Off Laptop <br> And Mackbook</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-sterch my-3" data-aos="fade-up"
                    data-aos-duration="3000">
                    <div class="card">
                        <img src="<?php echo e(asset('demo16/img/4.png')); ?>" class="img-thumbnail img-fluid">
                        <div class="p-2">
                            <h2>Smart Watch</h2>
                            <p>All Type Off Smart Watch <br> And Apple Watch</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex alig-items-center">
                <h1 class="text-white" data-aos="fade-up">About Us</h1>
                <div class="col-lg-6">
                    <div class="row my-3 d-flex justify-content-around">
                        <div class="col-lg-5 col-md-5 my-2 box text-center" data-aos="fade-up">
                            <img src="<?php echo e(asset('demo16/img/d.png')); ?>" class="img-fluid">
                            <h4 class="my-3">Long Warranty</h4>
                            <p>For most screen repairs.</p>
                        </div>
                        <div class="col-lg-5 col-md-5 my-2 box text-center" data-aos="fade-up">
                            <img src="<?php echo e(asset('demo16/img/r.png')); ?>" class="img-fluid">
                            <h4 class="py-3">No-Fix, No-Fee</h4>
                            <p>If you we can’t repair, you
                                don’t pay!</p>
                        </div>
                        <div class="col-lg-5 col-md-5 my-2 box text-center" data-aos="fade-up">
                            <img src="<?php echo e(asset('demo16/img/g.png')); ?>" class="img-fluid">
                            <h4 class="py-3">Savings for Saviours</h4>
                            <p>For most screen repairs.</p>
                        </div>
                        <div class="col-lg-5 col-md-5 my-2 box text-center" data-aos="fade-up">
                            <img src="<?php echo e(asset('demo16/img/b.png')); ?>" class="img-fluid">
                            <h4 class="py-3">Express Repairs</h4>
                            <p>Screen repairs typically completed within a 30 to 60-minute turnaround.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-3" data-aos="fade-up">
                    <img src="<?php echo e(asset('demo16/img/p.png')); ?>" class="img-fluid">
                </div>
                <div class="col-lg-8 text-center offset-lg-2" data-aos="fade-up">
                    <p class="lead text-white pt-3">Accidents happen, and it’s our job to repair them when it come to
                        damaging your mobile device. It’s never been easier to render your
                        device useless after dropping it. Our trained technicians will diagnose
                        and repair your device within 24 hours.</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container" data-aos="fade-up">
        <img src="<?php echo e(asset('demo16/img/gr.png')); ?>" class="img-fluid py-3">
    </div>
    <section class="Expert">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5" data-aos="fade-up" data-aos-duration="1000">
                    <h1 class=" text-white display-1">Expert Support</h1>
                    <p class="lead text-white my-5">Faulty phone battery? Slow laptop? We have <br>
                        tech experts who can assist you. Visit us in stores!</p>
                    <h4 class="h4">
                        <button style="border-radius: 5px;background: white;font-weight: bold;">rna.</button>
                        Empower your device's potential with expert repairs.
                    </h4>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-duration="2000">
                    <img src="<?php echo e(asset('demo16/img/Rectangle 16.png')); ?>" class="img-fluid">
                </div>
                <div class="col-lg-1"></div>
            </div>
            <div class="row my-4 d-flex justify-content-between">
                <div class="col-lg-3 col-md-5 box2 my-3" data-aos="fade-up" data-aos-duration="1000">
                    <img src="<?php echo e(asset('demo16/img/Send.png')); ?>" width="70px">
                    <h2 class="mt-4">Book Repair <br>
                        Visit us</h2>
                </div>
                <div class="col-lg-3 col-md-5 box2 my-3" data-aos="fade-up" data-aos-duration="2000">
                    <img src="<?php echo e(asset('demo16/img/bi.png')); ?>" width="70px">
                    <h2 class="mt-4">Book Repair <br>
                        Call out Servive</h2>
                </div>
                <div class="col-lg-3 box2 my-3" data-aos="fade-up" data-aos-duration="3000">
                    <img src="<?php echo e(asset('demo16/img/Plus.png')); ?>" width="70px">
                    <h2 class="mt-4">Post Your <br>
                        Device</h2>
                </div>
            </div>
            <h1 class="my-3 text-white" data-aos="fade-up"> Our Locations <img src="<?php echo e(asset('demo16/img/l1.png')); ?>"
                    width="30">
            </h1>
            <div class="row">
                <div class="col-lg-3 col-md-6 my-3" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card">
                        <img src="<?php echo e(asset('demo16/img/ll1.png')); ?>" class="img-fluid img-thumbnail">
                        <div class="p-3">
                            <h2>iCrack Norwich</h2>
                            <p><img class="img-thumbnail" src="<?php echo e(asset('demo16/img/plus1.png')); ?>" />
                                109 st stephen
                                arcade, Chapelfied RD,
                                Norwich
                                NR2 1SB</p>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            <span style="float: right;">4.8</span>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-6 my-3" data-aos="fade-up" data-aos-duration="2000">
                    <div class="card">
                        <img src="<?php echo e(asset('demo16/img/l2.png')); ?>" class="img-fluid img-thumbnail">
                        <div class=" p-3">
                            <h2>iRepair Norwich</h2>
                            <p><img class="img-thumbnail" src="<?php echo e(asset('demo16/img/plus1.png')); ?>" />25 Gentleman’s
                                walk
                                Norwich NR2 1NA</p>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            <span style="float: right;">4.9</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-3" data-aos="fade-up" data-aos-duration="3000">
                    <div class="card">
                        <img src="<?php echo e(asset('demo16/img/l3.png')); ?>" class="img-fluid img-thumbnail" />
                        <div class=" p-3">
                            <h2>Phone Land </h2>
                            <p><img class="img-thumbnail" src="<?php echo e(asset('demo16/img/plus1.png')); ?>" />106, London RD
                                N,
                                lowestoft NR32 1HA</p>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            <span style="float: right;">4.7</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 my-3" data-aos="fade-up" data-aos-duration="3000">
                    <div class="card">
                        <img src="<?php echo e(asset('demo16/img/l4.png')); ?>" class="img-fluid img-thumbnail">
                        <div class=" p-3">
                            <h2>iRepair</h2>
                            <p><img class="img-thumbnail" src="<?php echo e(asset('demo16/img/plus1.png')); ?>">22-24
                                Spurriengate,
                                York YO1 9QR
                            </p>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                            <span style="float: right;">4.8</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="border:solid black 1px; "font-family: 'Segoe UI' , Roboto, 'Helvetica Neue' , 'Noto Sans'
        , 'Liberation Sans' , Arial, sans-serif, 'Apple Color Emoji' , 'Segoe UI Emoji' , 'Segoe UI Symbol'
        , 'Noto Color Emoji' ;border:2px solid black; margin:0px; width: 100%;" class="footer">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 col-md-4" data-aos="fade-up">
                    <img src="<?php echo e(asset('demo16/img/logo.png')); ?>" class=""><br>
                    <button>Kalrna.</button>
                </div>
                <div class="col-lg-4 col-md-4" data-aos="fade-up">
                    <h2>Connect with us</h1>
                        <h3 class="mt-5">Main Office</h3>
                        <p class="lead">109 st stephen arcade, <br>

                            Chapelfied RD, Norwich <br>

                            NR2 1SB</p>
                </div>
                <div class="col-lg-4 col-md-4" data-aos="fade-up">
                    <h1>Follow us</h1>
                    <h3 class="my-4"><img src="<?php echo e(asset('demo16/img/f.jpg')); ?>" width="40"> Facebook</h3>
                    <h3 class="my-4"><img src="<?php echo e(asset('demo16/img/i.jpg')); ?>" width="40"> Instagram</h3>
                    <h3 class="my-4"><img src="<?php echo e(asset('demo16/img/t.jpg')); ?>" width="40"> Twitter</h3>
                </div>


            </div>
        </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 200
        });
    </script>
</body>

</html>
<?php /**PATH /home/websiteaccess/demo16.websiteaccess.co.uk/resources/views/demo16.blade.php ENDPATH**/ ?>
