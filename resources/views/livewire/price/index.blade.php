<section style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="repair-types ">
    <livewire:components.mega-nav theme="white" />
    <div class="container">
        <div class="text-center my-4 w-75 mx-auto">
            <h2 class="text-danger">Prices to Repair Your Devices</h2>
            <p>Bring your ailing tech to fone doctors, where we’ll diagnose what’s wrong and nurse your sick device back
                to
                health Our provisional prices below are for our most common repairs, but if you can’t find your device
                or
                repair, please get in touch and we’ll be happy to give a no-obligation quote</p>
            <p>What we can’t put a price on is the awesome service which our patients love And yes, we are really THAT
                cheesy…😉</p>
        </div>

        <div class="mb-5 ">

            <div class="dropdown mb-3 text-center ">
                <button class="btn btn-sm btn-secondary rounded dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ $selectedDeviceType->name ?? 'Please select your Device Type' }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach ($device_types as $device_type)
                        <li wire:click="loadModalWithPrice('{{ $device_type->id }}')"><a class="dropdown-item"
                                href="javascript:void(0)">{{ $device_type->name }}</a></li>
                    @endforeach


                </ul>
            </div>
            <div class="mb-3 text-center  ">
                <strong class="text-danger " wire:loading.remove>
                    {{ $selectedDeviceType->name }}
                </strong>
                <strong wire:loading><x-spinner color="dark" /></strong>
            </div>
            {{-- price in cards start --}}
            @if ($selectedDeviceType)
                <div class="d-flex gap-2 flex-wrap justify-content-center white-cards ">
                    @foreach ($modals as $modal)
                        @php
                            $d = App\Helpers\SeoUrl::encodeUrl($selectedDeviceType->name);
                            $m = App\Helpers\SeoUrl::encodeUrl($modal->name);
                        @endphp

                        <div class="card">
                            <a href="{{ route('repair-types', ['device' => $d, 'modal' => $m]) }}">
                                <div class="card-header">{{ $modal->name }}</div>
                            </a>
                            <div class="card-body">
                                @foreach ($selectedDeviceType->repair_types as $repair_type)
                                    @php
                                        $price = $modal->prices->where('repair_type_id', $repair_type->id)->first();
                                        $d = App\Helpers\SeoUrl::encodeUrl($selectedDeviceType->name);
                                        $m = App\Helpers\SeoUrl::encodeUrl($modal->name);
                                        $r = App\Helpers\SeoUrl::encodeUrl($repair_type->name);
                                    @endphp
                                    <a
                                        href="{{ route('repair-detail', ['device' => $d, 'modal' => $m, 'repair' => $r]) }}">
                                        <div class="d-flex justify-content-between ">
                                            <span class="repair-name">{{ $repair_type->name }}</span>
                                            @if ($price)
                                                <strong
                                                    class="fw-bold text-black">£{{ number_format($price->price, 2) }}</strong>
                                            @else
                                                <strong class="fw-bold text-black">---</strong>
                                            @endif
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
