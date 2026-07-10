
<div class="search-bar align-self-center d-none d-lg-block" wire:keydown.escape="$set('search','')">
    <style>
        /* input */
        .search-input{color:#fff!important;background:#000!important;caret-color:#fff!important;border-radius:20px 0 0 20px;height:35px;font-size:12px;width:250px;border:1px solid #000;}
        .search-input::placeholder{color:rgba(255,255,255,.85)!important;opacity:1;}
        /* dropdown */
        .mylistgroup{position:absolute;z-index:1000;max-height:300px;overflow-y:auto;background:#000;color:#fff;border-radius:8px;box-shadow:0 4px 10px rgba(0,0,0,.2);}
        .mylistitem{padding:10px;border-bottom:1px solid #444;background:transparent!important;border-left:none!important;border-right:none!important}
        .mylistitem.even-item{background:rgba(0,0,0,.25)!important}
        .mylistitem.odd-item{background:rgba(0,0,0,.18)!important}
        .mylistitem:hover{background:rgba(0,0,0,.4)!important;color:#fff!important}
        .mylistitem a,.mylistitem span,.mylistitem p,.fw-bold{color:#fff!important}
        /* scrollbar */
        ul.mylistgroup{scrollbar-width:thick;scrollbar-color:#F75D59 #fff;}
        ul.mylistgroup::-webkit-scrollbar{width:20px}
        ul.mylistgroup::-webkit-scrollbar-track{background:#fff;border-radius:20px}
        ul.mylistgroup::-webkit-scrollbar-thumb{background:#F75D59;border-radius:20px;height:100px}
        /* button */
        .search-button{background:#000;border-radius:0 20px 20px 0;width:60px;height:35px;display:flex;justify-content:center;align-items:center;border:1px solid #000}
        .search-button i{color:#fff}
    </style>
<style>
.middle-header-bar {
  background: #000 !important;
}
</style>
    <div class="d-flex position-relative">
        <div class="flex-grow-1">
            <input type="text"
                   class="form-control search-input"
                   placeholder="Search, type your phone model here.."
                   wire:model.debounce.300ms="search">

            @if($results && $results->count())
                <ul class="list-group mylistgroup mt-2">
                    @foreach ($results as $result)

                        {{-- DEVICE TYPE → list its modals + prices --}}
                        @if ($result instanceof \App\Models\DeviceType)
                            @foreach ($result->modals as $modal)
                                <li class="list-group-item mylistitem text-center">
                                    <a class="fw-bold" href="javascript:void(0);" wire:click="navigate('modal', {{ $modal->id }})">
                                        {{ $modal->name }}
                                    </a>
                                    <ul class="list-group mylistgroup ml-3" style="position:static;margin-top:10px">
                                        @forelse ($modal->prices as $price)
                                            @if ($price->repairType)
                                                <li class="list-group-item mylistitem {{ $loop->even ? 'even-item' : 'odd-item' }}">
                                                    <a class="d-flex justify-content-between align-items-center"
                                                       href="javascript:void(0);" wire:click="navigate('price', {{ $price->id }})">
                                                        <p class="mb-0">{{ $price->repairType->name }}</p>
                                                        <p class="mb-0"><b>£{{ $price->price }}</b></p>
                                                    </a>
                                                </li>
                                            @endif
                                        @empty
                                            <li class="list-group-item mylistitem"><span>No prices available</span></li>
                                        @endforelse
                                    </ul>
                                </li>
                            @endforeach

                        {{-- MODAL → list its prices --}}
                        @elseif ($result instanceof \App\Models\Modal)
                            <li class="list-group-item mylistitem text-center">
                                <a class="fw-bold" href="javascript:void(0);" wire:click="navigate('modal', {{ $result->id }})">
                                    {{ $result->name }}
                                </a>
                                <ul class="list-group mylistgroup ml-3" style="position:static;margin-top:10px">
                                    @forelse ($result->prices as $price)
                                        @if ($price->repairType)
                                            <li class="list-group-item mylistitem {{ $loop->even ? 'even-item' : 'odd-item' }}">
                                                <a class="d-flex justify-content-between align-items-center"
                                                   href="javascript:void(0);" wire:click="navigate('price', {{ $price->id }})">
                                                    <p class="mb-0">{{ $price->repairType->name }}</p>
                                                    <p class="mb-0"><b>£{{ $price->price }}</b></p>
                                                </a>
                                            </li>
                                        @endif
                                    @empty
                                        <li class="list-group-item mylistitem"><span>No prices available</span></li>
                                    @endforelse
                                </ul>
                            </li>

                        {{-- PRICE (direct hit) --}}
                        @elseif ($result instanceof \App\Models\Price)
                            @if ($result->modal && $result->modal->deviceType)
                                <li class="list-group-item mylistitem">
                                    <a href="javascript:void(0);" wire:click="navigate('price', {{ $result->id }})">
                                        Price: £{{ $result->price }} —
                                        Model: {{ $result->modal->name }} —
                                        Device Type: {{ $result->modal->deviceType->name }}
                                    </a>
                                    <ul class="list-group mylistgroup ml-3" style="position:static;margin-top:10px">
                                        <li class="list-group-item mylistitem">
                                            Repair Type: {{ $result->repairType?->name ?? 'N/A' }}
                                        </li>
                                    </ul>
                                </li>
                            @endif

                        {{-- REPAIR TYPE → list its prices (filtered by service=repair in PHP) --}}
                        @elseif ($result instanceof \App\Models\RepairType)
                            @php
                                $prices = $result->prices->filter(fn($p) => $p->modal && $p->modal->deviceType);
                            @endphp
                            @if ($prices->isNotEmpty())
                                @foreach ($prices as $price)
                                    <li class="list-group-item mylistitem">
                                        <a href="javascript:void(0);" wire:click="navigate('price', {{ $price->id }})">
                                            Repair Type: {{ $result->name }} —
                                            Price: £{{ $price->price }} —
                                            Model: {{ $price->modal->name }} —
                                            Device Type: {{ $price->modal->deviceType->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li class="list-group-item mylistitem"><span>No prices available</span></li>
                            @endif
                        @endif

                    @endforeach
                </ul>
            @endif
        </div>

        <button type="button" class="search-button" title="Search">
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </div>
</div>
