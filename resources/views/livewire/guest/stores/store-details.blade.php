@php
use App\Models\FormStatus;
use App\Http\SeoUrl;
$formStatuses = FormStatus::where('name', 'services')->first();

@endphp

<div>
    <div>
        <!-- --------------------------top bar----------------- -->
        <livewire:components.top-bar />
        <!-- --------------------navbar--------------------- -->
        <livewire:components.mega-nav />
        <div class="container-fluid mt-5">

            <div class="row d-flex align-items-between p-2 mt-5">
                <div class="col-lg-6">
                    <div>
                        @if($map_link)
                        {!! $map_link !!}
                        @else
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d19868.378589988257!2d-0.370116!3d51.503174!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760d4e05cae911%3A0x2dcb4d18fbda3298!2sMobile%20Bitz%20-%20Head%20Office!5e0!3m2!1sen!2sus!4v1704983208144!5m2!1sen!2sus" width="100%" height="550" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        @endif
                    </div>
                </div>

                <div class="col-lg-6">
                    <h1 class="text-danger text-center">
                     {{ $branch->name }}
                    </h1>
                    <div class="d-flex flex-row mt-5 gap-3 justify-content-center">
                        <h3>Address:</h3>
                        <p class="">{{ $branch->address_line_1 }}, {{ $branch->address_line_2 }}{{ $branch->address_line_2 != '' ? ', ' : '' }} {{ $branch->town_city }}, {{ $branch->post_code }},UK</p>
                    </div>
                    <p class="text-center">**Find us between EE and Accessorize**</p>
                    <div class="d-flex flex-row  gap-3 justify-content-center">
                        <h3>Email:</h3>
                        <p class="">{{ $branch->email }}</p>
                    </div>
                    <div class="d-flex flex-row  gap-3 justify-content-center">
                        <h3>Call us:</h3>
                        <p class=""> {{ $branch->mobile_number }}</p>
                    </div>
                    <h3 class="text-center">Opening Hours: </h3>
                    @foreach ($timeSlots as $timeSlot)
                    <p class="text-center">{{ $timeSlot->day }}: @if($timeSlot->status) {{ date('h:i a', strtotime($timeSlot->opening_time)) }} To {{ date('h:i a', strtotime($timeSlot->closing_time)) }} @else Closed @endif </p>
                    @endforeach

                        @if($formStatuses->sell)
                    <div class="justify-content-around mt-5 row">
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('guest-sell-categories') }}">
                                <button type="button" class="btn w-100 btn-danger my-2 rounded-0">
                                    SELL
                                </button>
                            </a>
                        </div>
                        @endif
                        @if($formStatuses->buy)
                        <div class="col-md-4 mb-2">

                            <a href="{{ route('guest-buy-products') }}">
                                <button type="button" class="btn w-100 btn-danger my-2 rounded-0">
                                    BUY
                                </button>
                            </a>

                        </div>
                        @endif
                        
                        @if($formStatuses->repair)
                        <div class="col-md-4 mb-2">
                            <a href="{{ route('categories') }}">
                                <button type="button" class="btn w-100 btn-danger my-2 rounded-0">
                                    REPAIR
                                </button>
                            </a>
                        </div>
                        @endif
                    </div>






                </div>
            </div>
        </div>



        <!-- <h3 class=" text-center mt-5">Repair Your Device with Confidence</h3> -->
        <div class="container-fluid mt-5">

            <div class="row d-flex align-items-between p-3 mt-5">
                <div class="col-lg-6 mt-5">
                    <h2 class="text-danger">
                        About Our {{ $branch->name }}
                    </h2>

                    {!! $branch->description !!}

                </div>
                <div class="col-lg-6 mt-5">
                    <div>
                        <img src="{{ $branch->image ? $branch->image : 'https://ik.imagekit.io/qml3d7tgz/118771222_3248867385205903_5573724224360234256_n_nW6iVMHYK.jpg' }}" class="img-fluid" style="border: 0"></img>
                    </div>
                </div>







            </div>
        </div>
    </div>
</div>