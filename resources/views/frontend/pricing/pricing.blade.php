@extends('frontend.layouts.app')
@section('title', 'Price-fone-doctors')
@section('content')
<style>
    @import url(//db.onlinewebfonts.com/c/396a25718aa788c4df0b49b11e6a248d?family=HelveticaNeueW02-47LtCn);

</style>
<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="container2 fonts-de" >
    <div class="row heading">
        <h1 class="h-lg text-center">Prices to Repair <span class="color" style="color: #be1e2d;">Your
                Devices</span></h1>
        <p class="text-center text-center--full mt-5">Bring your
            ailing tech to <span style="color: #be1e2d;"><strong>fone doctors</strong></span>,
            where we’ll diagnose what’s wrong
            and nurse your sick device back to health. Our
            provisional prices below are for our most common
            repairs, but if you can’t find your device or
            repair, please <span style="color: #be1e2d;"><a style="color: #be1e2d;" href="mailto:support@fonedoctors.com"><strong>get in touch</strong></a></span> and
            we’ll be happy to give a no-obligation quote.
        </p>
        <p class="text-center text-center--full">What we can’t
            put a price on is the awesome service which our
            patients love. And yes, we are really <em>THAT</em>
            cheesy…😉 ">
        </p>
    </div>
</div>

<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="container2">
    <div class="row mb-5">
        <div class="col col-md-4 col-sm-12">
            <select class="form-select btn btn-danger" aria-label="Default select example">
                <i class="icon-angle-down"></i>
                <option selected>
                    <h1>Select Your Device</h1>
                </option>
                @foreach ($device_types as $device_type)
                <option value="{{ $device_type->id }}">{{ $device_type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 col-sm-12">
            <select class="form-select btn btn-danger me-md-2" aria-label="Default select example">
                <option selected>Tablet</option>
                <option value="1">IPad</option>

            </select>
        </div>
        <div class="col-md-4 col-sm-12">
            <select class="form-select btn btn-danger me-md-2">
                <option selected>Computer</option>
                <option value="1">iMac</option><br>
                <option value="2">MacBook</option><br>
                <option value="3">Compaq</option><br>
                <option value="4">Dell</option><br>
                <option value="5">HP</option><br>
            </select>
        </div>
    </div>
    <div class="col-md-12 mb-5">
        <table class="table table-hover" id="table_id">
            <thead>
                <tr>
                    {{-- <th>Id</th> --}}
                    <th>Device Type</th>
                    <th>Model</th>
                    <th>BROKEN SCREEN (ORIGINAL)</th>
                    <th>BROKEN SCREEN (PREMIUM GENERIC)</th>
                    <th>BATTERY REPLACEMENT</th>
                    <th>SCREEN (GENERIC) & BATTERY REPAIR</th>
                    <th>BACK PLATE REPAIR</th>
                    <th>TABLET COMPLETE SCREEN REPAIR</th>
                    <th>TABLET DIGITISER REPAIR</th>
                    <th>TABLET INTERNAL SCREEN REPAIR</th>
                    <th>Computer Fan Repair</th>
                    <th>Computer Hard Drive Repair</th>
                    <th>Computer Processor Repair</th>
                    <th>Computer Processor Repair</th>
                    <th>Computer Motherboard Repair</th>
                    <th>Computer RAM Repair</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($products as $product)
                <tr class="gradeX">

                    {{-- <td>{{ $product->id }}</td> --}}
                    <td>{{ $product->master->title }}</td>
                    <td>{{ $product->category->title }}</td>
                    <td class="center">{{ $product->broken_screen_o }}</td>
                    <td class="center">{{ $product->broken_screen_p }}</td>
                    <td>{{ $product->battery_replacement }}</td>
                    <td>{{ $product->screen_battery }}</td>
                    <td>{{ $product->back_plate }}</td>
                    <td class="center">{{ $product->tablet_complete_screen }}</td>
                    <td class="center">{{ $product->tablet_digitiser }}</td>
                    <td class="center">{{ $product->tablet_internal_screen }}</td>
                    <td>{{ $product->computer_fan }}</td>
                    <td>{{ $product->computer_harddrive }}</td>
                    <td class="center">{{ $product->computer_processor }}</td>
                    <td class="center">{{ $product->computer_graphic_card }}</td>
                    <td class="center">{{ $product->computer_motherboard }}</td>
                    <td class="center">{{ $product->computer_ram }}</td>

                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>

<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="vc_column-inner">
    <div class="wpb_wrapper"><a href="https://www.fonedoctors.co.uk/book-repair/">
        </a>
        <div class="wpb_text_column wpb_content_element wpb_animate_when_almost_visible wpb_fadeInUp fadeInUp wpb_start_animation animated">
            <h4 style="text-align: center;"><span style="font-size: 32px;"><span style="font-size: 18pt;">Book your
                        repair now</span></span></h4>
            <h4 style="text-align: center;"><span style="font-size: 32px;"><span style="font-size: 18pt;"><b>020 7403
                            9111</b></span></span></h4>
            </a>
            <h4 style="text-align: center; margin-bottom: 30px;"><span style="color: #be1e2d; font-size: 18pt;">support@fonedoctors.com</span></a>
            </h4>

        </div>
    </div>
</div>
@endsection