@php
use App\Helpers\SeoUrl;
@endphp

@php
use App\Models\SiteSetting;
$setting = SiteSetting::first();
@endphp

<div>
    <div class="locations-theme">
        <!-- --------------------------top bar----------------- -->
        <livewire:components.top-bar />
        <!-- --------------------navbar--------------------- -->
        <livewire:components.mega-nav />

        <div class="container-fluid mt-5">
            <h1 class="text-center text-danger">Locations</h1>
            <div class="row d-flex align-items-between p-2 mt-5">
                <!-- ===== LEFT: MAP (responsive) ===== -->
                <div class="col-lg-6">
                   <div class="map-embed">
    @if(!empty($setting->map_link))
        {!! $setting->map_link !!}
    @else
        <!--<iframe-->
        <!--    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d19868.378589988257!2d-0.370116!3d51.503174!"-->
        <!--    allowfullscreen-->
        <!--    loading="lazy"-->
        <!--    referrerpolicy="no-referrer-when-downgrade">-->
        <!--</iframe>-->
    @endif
</div>

                </div>

                <!-- ===== RIGHT: Postcode + list ===== -->
                <div class="col-lg-6">
                    <h4>Enter your postcode, select from the map or pick the store location</h4>

                    <input type="text" class="form-control my-2 w-100 rounded-0" id="postalCode" placeholder="Postcode..." />
                    <button type="button" class="btn w-100 btn-outline-danger my-2 rounded-0" onclick="getLatLong()">
                        Submit
                    </button>

                    <div id="resultContainer"></div>

                    @push('scripts')
                    <script>
                        document.addEventListener('livewire:load', function() {
                            const resultContainer = document.getElementById("resultContainer");

                            Livewire.on('getLatLong', function() {
                                getLatLong();
                            });

                            async function getLatLong() {
                                const postalCode = document.getElementById("postalCode").value;

                                try {
                                    const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&postalcode=${postalCode}`);
                                    const data = await response.json();

                                    if (data.length > 0) {
                                        const result = data[0];
                                        resultContainer.innerHTML = `<p>${result.display_name}</p>`;

                                        Livewire.emit('updateLocation', {
                                            latitude: result.lat,
                                            longitude: result.lon
                                        });
                                    } else {
                                        resultContainer.innerHTML = "<p>No results found for the provided postal code.</p>";
                                    }
                                } catch (error) {
                                    console.error("Error fetching data:", error);
                                }
                            }

                            Livewire.on('updateLocation', (location) => {
                                console.log('Received location update:', location);
                            });

                            window.getLatLong = getLatLong;
                        });
                    </script>
                    @endpush

                    <h3 class="text-danger mt-4">All Branches</h3>
                    <div class="row justify-content-between">
                        @foreach($branches as $branch)
                            <div class="col-lg-4 col-md-6">
                                <li wire:click="getMap({{ $branch->id }})">{{ $branch->name }}  </li>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5 p-5 branches">
            <h1 class="text-center text-danger">Our Stores</h1>
            <div class="row text-center justify-content-center mt-3">
                @foreach($branches->unique('town_city') as $branch)
                    <div class="col-lg-3 col-md-6 mb-3">
                        <a href="#{{$branch->town_city}}">
                            <button type="button" class="btn bg-black text-white w-100">{{ $branch->town_city }}</button>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container mt-5">
            <h1 class="text-center text-danger mt-5">Find Our Stores</h1>
            <div class="row justify-content-center mt-5 g-4">
                @foreach($branches as $branch)
                    <div class="col-lg-3 col-md-6" id="{{$branch->town_city}}">
                        <div class="card border-0">
                            <a href="{{ route('store-details', ['branchSlug' => SeoUrl::encodeUrl($branch->town_city)]) }}">
                                <img
                                    src="{{ $branch->image ? $branch->image : 'https://ik.imagekit.io/qml3d7tgz/118771222_3248867385205903_5573724224360234256_n_nW6iVMHYK.jpg' }}"
                                    class="card-img-top fixed-size-img"
                                    alt="...">
                                <div class="card-body">
                                    <h4 class="card-title text-danger">{{ $branch->town_city }} - {{ $branch->name }}</h4>
                                    <p class="card-text">
                                        {{ $branch->address_line_1 }}, {{ $branch->address_line_2 }}{{ $branch->address_line_2 != '' ? ', ' : '' }} {{ $branch->town_city }}, {{ $branch->post_code }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    ul { list-style-type: none; }
    li { list-style-type: none; color: black; cursor: pointer; }
    li:hover { color: rgb(220, 30, 30); }
    p { color: black; cursor: pointer; }
    p:hover { color: rgb(220, 30, 30); }
    .branches { background-color: rgb(242, 242, 242); }
    .fixed-size-img { width: 100%; height: 180px; object-fit: cover; }

    /* ========= Responsive Map ========= */
    .map-embed{
        position: relative;
        width: 100%;
        /* mobile: 4:3 */
        padding-top: 75%;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,.08);
    }
    .map-embed iframe,
    .map-embed > *:is(iframe, .gm-style){
        position: absolute !important;
        inset: 0;
        width: 100% !important;
        height: 100% !important;
        border: 0 !important;
    }
    /* md+ screens: 16:9 */
    @media (min-width: 768px){
        .map-embed{ padding-top: 56.25%; }
    }

    /* ===== Locations page — theme aware ===== */
    .locations-theme{ background: #000 !important; color: var(--color-text); }

    .locations-theme .text-danger{ color: var(--color-primary) !important; }

    .locations-theme p,
    .locations-theme li{ color: var(--color-text); cursor: pointer; }
    .locations-theme p:hover,
    .locations-theme li:hover{ color: var(--color-primary); }

    .locations-theme .btn-outline-danger{
        border-color: var(--color-primary);
        color: var(--color-primary);
        background: transparent;
    }
    .locations-theme .btn-outline-danger:hover{
        background: var(--color-primary);
        color: var(--color-bg);
        border-color: var(--color-primary);
    }

    .locations-theme .branches .btn.bg-black{
        background: color-mix(in srgb, var(--color-text) 92%, transparent);
        color: var(--color-bg) !important;
        border: 1px solid color-mix(in srgb, var(--color-text) 20%, transparent);
    }
    .locations-theme .branches .btn.bg-black:hover{
        background: var(--color-primary);
        border-color: var(--color-primary);
        color: var(--color-bg) !important;
    }

    .locations-theme .branches{
         background:#000 !important;
  border:1px solid var(--color-primary) !important;
  border-radius:16px;
        
    }
.locations-theme .card{
    background: #0E1113 !important;
    color: var(--color-text);
    border: 1px solid var(--color-primary) !important;
    border-radius: 10px;
}

    .locations-theme .card-title{ color: var(--color-primary) !important; }
    .locations-theme .card-text{ color: color-mix(in srgb, var(--color-text) 85%, transparent); }

    .locations-theme .form-control{
        background:#000 !important;
        color: var(--color-text);
        border: 1px solid color-mix(in srgb, var(--color-muted) 70%, transparent);
    }
    .locations-theme .form-control::placeholder{
        color: color-mix(in srgb, var(--color-text) 55%, transparent);
    }

    .locations-theme .card a{ color: inherit; text-decoration: none; }
    .locations-theme .card a:hover .card-title{ text-decoration: underline; }

    /* Submit button = filled with theme primary (your last rule was cut) */
    .locations-theme .btn-outline-danger{
        background: var(--color-primary);
        color: var(--color-bg);
    }
</style>
