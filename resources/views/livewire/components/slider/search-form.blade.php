<div class=" search-form d-flex flex-column flex-lg-row gap-2 align-items-center">

    <li class="m-1 nav-item dropdown select-device-dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

            {{ $selectedDeviceType ? $device_type->name : 'Select Device' }}
        </a>
        <ul class="dropdown-menu">
            @foreach ($device_types as $device_type)
                <li><a class="dropdown-item" href="javascript:void(0)"
                        wire:click="selectDeviceType('{{ $device_type->id }}')">{{ $device_type->name }}</a></li>
            @endforeach
            <a class="dropdown-item" href="{{ route('other-device-booking', ['type' => 'samsung-glaxy-tab']) }}">
                Samsung Galaxy Tab
            </a>
            <a class="dropdown-item" href="{{ route('other-device-booking', ['type' => 'apple-macbook']) }}">
                Apple Macbook
            </a>
            <a class="dropdown-item" href="{{ route('other-device-booking', ['type' => 'microsoft-surface']) }}">
                Microsoft Surface
            </a>

            <a class="dropdown-item" href="{{ route('other-device-booking', ['type' => 'other-mobiles']) }}">
                Other Mobiles
            </a>
            <a class="dropdown-item" href="{{ route('other-device-booking', ['type' => 'other-tablets']) }}">
                Other Tablets
            </a>
            <a class="dropdown-item" href="{{ route('other-device-booking', ['type' => 'other-laptops']) }}">
                Other Laptops
            </a>


        </ul>
    </li>
    <li class="m-1 nav-item dropdown select-modal-dropdown ">
        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ $selectedModal ? $modal->name : 'Select Model' }}
        </a>
        <ul class="dropdown-menu">
            @foreach ($modals as $modal)
                <li><a wire:click="selectModal('{{ $modal->id }}')" class="dropdown-item"
                        href="javascript:void(0)">{{ $modal->name }}</a></li>
            @endforeach
        </ul>
    </li>
    <button type="button" wire:click="Go" class="mx-1 btn btn-light "
        {{ $selectedDeviceType && $selectedModal ? '' : 'disabled' }}>
        <div>
            <span wire:loading.remove wire:target='Go'>GO</span>
            <span wire:loading wire:target='Go' class="text-white">loading.....</span>
        </div>
    </button>
</div>
</div>
