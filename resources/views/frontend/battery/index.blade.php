@extends('frontend.layouts.app')
@section('title', 'Battery-fone-doctors')
@section('content')
    <section style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="repair-types ">
        <livewire:components.mega-nav theme="white" />
        <div class="bg-color">
            <div class="container">
                <div class="text-center py-5 w-75 mx-auto">
                    <h2 class="text-danger">How to Battery?</h2>
                    <p>Don’t you hate feeling powerless? We do too, which is why we replace batteries on a whole range of
                        phones, tablets and laptops, but with most modern tech using Lithium-Ion batteries which are
                        consumable products, just changing the battery is not enough It’s not just what we do, it’s what you
                        do too Now there are many different opinions on the best charging practice, but the following tips
                        are a good guide to follow:</p>
                </div>
                <div class="battery-card my-4 rounded p-3">
                    <div class="d-flex align-items-center ">
                        <h3>01</h3> &nbsp;&nbsp;
                        <h4 class="text-danger">40-80% = Happy Battery:</h4>
                    </div>
                    <hr>
                    <p>Modern Lithium-Ion batteries are happiest between 40% and 80% It’s like battery heaven and so small
                        charges to try and maintain the battery within this range will keep your battery performing at
                        optimum levels Of course, in the real world, this is not always easy to maintain, but it’s something
                        to aspire to</p>
                </div>
                <div class="battery-card my-4 rounded p-3">
                    <div class="d-flex align-items-center ">
                        <h3>02</h3> &nbsp;&nbsp;
                        <h4 class="text-danger">Charge from the mains:</h4>
                    </div>
                    <hr>
                    <p>Use a decent plug & lead and charge from the mains as your main form of charging Multi-plug adaptors,
                        USB ports, car chargers and battery packs are OK for occasional top-ups, but should never be your
                        main form of charging Think of it like healthy meals against junk food</p>
                </div>
                <div class="battery-card my-4 rounded p-3">
                    <div class="d-flex align-items-center ">
                        <h3>03</h3> &nbsp;&nbsp;
                        <h4 class="text-danger">Don’t overload!</h4>
                    </div>
                    <hr>
                    <p>If you have background apps open you’re not using, close them Having lots of Apps open for days on
                        end, puts unnecessary strain on the phone processor which impacts on the battery</p>
                </div>
                <div class="battery-card my-4 rounded p-3">
                    <div class="d-flex align-items-center ">
                        <h3>04</h3> &nbsp;&nbsp;
                        <h4 class="text-danger">Avoid Overnight Charging:</h4>
                    </div>
                    <hr>
                    <p>It’s the metaphorical equivalent of binge eating Overnight charging means your battery is not able to
                        depreciate for a long part of the day</p>
                </div>
                <div class="battery-card my-4 rounded p-3">
                    <div class="d-flex align-items-center ">
                        <h3>05</h3> &nbsp;&nbsp;
                        <h4 class="text-danger">Charing Cycle Every Fortnight:</h4>
                    </div>
                    <hr>
                    <p>Drain the battery, charge it up to 100% and then take it off It’s like going to the toilet for your
                        battery and helps to “clean it all out”</p>
                </div>
            </div>
        </div>
    </section><br>
    <!-- newbootstrap -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="pricing.css"> --}}
    {{-- <style>
        .container2 {

            padding: 60px 100px;
        }

        .c2 {
            margin-top: 100px;
        }

        h1 {
            color: brown;
            margin-bottom: 40px;
            font-family: Noto Serif !important;
        }

        ol li {
            margin-top: 30px;
        }

        ol strong {
            font-weight: 600;
            color: brown;
            margin-top: 40px;
        }
    </style> --}}
    {{-- <div class="container2" style="background-color:black">
        <div class="container mt-5" style=" color: #000000;">
            <h1 style="font-weight: bold" class="entry-title table-bordered   h-lg text-center Noto Serif !important;">How
                to Battery?</h1>
            </header><!-- .entry-header -->
            <!-- Block -->
            <div class="block offset-sm" style="background-color: black; color:white">
                <div class="vc_row wpb_row vc_row-fluid" style="color: white;">
                    <div class="wpb_column vc_column_container vc_col-sm-12" style="color: white;">
                        <div class="vc_column-inner" style="color: white;">
                            <div class="wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper mt-md-3" style="text-align:justify">
                                        <p>Don’t you hate feeling <strong>powerless</strong>? We do too, which is why we
                                            replace batteries on a whole range of phones, tablets and laptops, but with most
                                            modern tech using Lithium-Ion batteries which are consumable products, just
                                            changing the battery is not enough. It’s not just what we do, it’s what you do
                                            too. Now there are many different opinions on the best charging practice, but
                                            the following tips are a good guide to follow:</p>
                                        <ol>
                                            <li><strong>40-80% = Happy Battery</strong>: Modern Lithium-Ion batteries are
                                                happiest between 40% and 80%. It’s like battery heaven and so small charges
                                                to try and maintain the battery within this range will keep your battery
                                                performing at optimum levels. Of course, in the real world, this is not
                                                always easy to maintain, but it’s something to aspire to.</li>
                                            <li><strong>Charge from the mains</strong>: Use a decent plug &amp; lead and
                                                charge from the mains as your main form of charging. Multi-plug adaptors,
                                                USB ports, car chargers and battery packs are OK for occasional top-ups, but
                                                should never be your main form of charging. Think of it like healthy meals
                                                against junk food.</li>
                                            <li><strong>Don’t overload!</strong> If you have background apps open you’re not
                                                using, close them. Having lots of Apps open for days on end, puts
                                                unnecessary strain on the phone processor which impacts on the battery.</li>
                                            <li><strong>Avoid Overnight Charging</strong>: it’s the metaphorical equivalent
                                                of binge eating. Overnight charging means your battery is not able to
                                                depreciate for a long part of the day.</li>
                                            <li><strong>Charing Cycle Every Fortnight</strong>: Drain the battery, charge it
                                                up to 100% and then take it off. It’s like going to the toilet for your
                                                battery and helps to “clean it all out”.</li>
                                        </ol>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> --}}
@endsection
