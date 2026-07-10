{{-- TOP BAR (desktop + mobile) --}}
<nav class="px-3 py-2" style="background-color: transparent;">
    <div class="d-flex justify-content-between align-items-center">

        {{-- Left drawer icon – only mobile --}}
        <button class="btn p-0 d-md-none" type="button" onclick="toggleLeftDrawer()" aria-label="Toggle navigation">
            <i class="fa fa-bars cursor-pointer text-black" aria-hidden="true"></i>
        </button>

        {{-- Desktop menu (center) --}}
        <div class="d-none d-md-flex align-items-center admin-top-items">

            {{-- Devices --}}
            <div>
                <a href="{{ route('repair-categories') }}"
                   class="text-dark p-3 {{ $active == 'categories' ? 'text-danger fw-bold p-3' : '' }}">
                    Devices
                </a>
            </div>

            {{-- Brands --}}
            <div>
                <a href="{{ route('repair-devices') }}"
                   class="text-dark p-3 {{ $active == 'devices' ? 'text-danger fw-bold p-3' : '' }}">
                    Brands
                </a>
            </div>

            {{-- Sub Brands --}}
            <div>
                <a href="{{ route('repair-sub-brands') }}"
                   class="text-dark p-3 {{ $active == 'sub-brands' ? 'text-danger fw-bold p-3' : '' }}">
                    Sub Brands
                </a>
            </div>

            {{-- Series --}}
            <div>
                <a href="{{ route('repair-series') }}"
                   class="text-dark p-3 {{ $active == 'series' ? 'text-danger fw-bold p-3' : '' }}">
                    Series
                </a>
            </div>

            {{-- Models --}}
            <div>
                <a href="{{ route('repair-models') }}"
                   class="text-dark p-3 {{ $active == 'models' ? 'text-danger fw-bold p-3' : '' }}">
                    Models
                </a>
            </div>

            {{-- Repair --}}
            <div>
                <a href="{{ route('repair-price') }}"
                   class="text-dark p-3 {{ $active == 'price' ? 'text-danger fw-bold p-3' : '' }}">
                    Repair
                </a>
            </div>

        </div>

        {{-- Avatar right side --}}
        <livewire:components.avatar />
    </div>
</nav>

{{-- BOTTOM STICKY NAV (ONLY MOBILE) --}}
<nav class="d-md-none" 
     style="position:fixed; bottom:0; left:0; right:0; z-index:1030; background:#00529b;">
    <div class="d-flex justify-content-around text-center text-white py-2 px-2" style="font-size:14px;">

        <a href="{{ route('repair-categories') }}"
           class="flex-fill text-decoration-none mx-1 {{ $active == 'categories' ? 'fw-bold text-white' : 'text-white-50' }}">
            Devices
        </a>

        <a href="{{ route('repair-devices') }}"
           class="flex-fill text-decoration-none mx-1 {{ $active == 'devices' ? 'fw-bold text-white' : 'text-white-50' }}">
            Brands
        </a>

        <a href="{{ route('repair-sub-brands') }}"
           class="flex-fill text-decoration-none mx-1 {{ $active == 'sub-brands' ? 'fw-bold text-white' : 'text-white-50' }}">
            Sub Brands
        </a>

        <a href="{{ route('repair-series') }}"
           class="flex-fill text-decoration-none mx-1 {{ $active == 'series' ? 'fw-bold text-white' : 'text-white-50' }}">
            Series
        </a>

        <a href="{{ route('repair-models') }}"
           class="flex-fill text-decoration-none mx-1 {{ $active == 'models' ? 'fw-bold text-white' : 'text-white-50' }}">
            Models
        </a>

        <a href="{{ route('repair-price') }}"
           class="flex-fill text-decoration-none mx-1 {{ $active == 'price' ? 'fw-bold text-white' : 'text-white-50' }}">
            Repair
        </a>

    </div>
</nav>
