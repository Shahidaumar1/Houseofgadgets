<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    @if ($heading && $addOns)
        <div class="bg-danger text-center">
            <h3 class="text-white">{{ $heading->heading }}</h3>
        </div>
        <div class="row white-cards">

            @forelse($addOns as $key =>  $addOn)
                <div class="my-2 col-lg-3 col-md-6 d-flex align-items-strech ">
                    @php
                        $fileExists = Illuminate\Support\Facades\File::exists('storage/icon/' . $addOn->icon);
                    @endphp
                    <div class="card w-100">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/1.png') }}" alt="icon" style="width:48px; height:48px">
                            {{-- <img
                                src="{{ $addOn->icon ? asset('storage/icon/' . $addOn->icon) : 'https://static.wixstatic.com/media/d5f919_dea03f9b2b424256a0f5404b0d6eee93~mv2.png/v1/fill/w_137,h_137,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/Icons-01.png' }}"> --}}
                            <h3 class="my-2">{{ $addOn->sub_heading }}</h3>
                            <p>{{ $addOn->description }}</p>
                        </div>

                    </div>

                </div>
            @empty
            @endforelse
        </div>
    @endif


</div>
