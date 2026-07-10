<!-- resources/views/livewire/branches-map.blade.php -->
<div>
    <div id="map" style="height: 600px;"></div>
</div>

@push('scripts')
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    document.addEventListener('livewire:load', function () {
        // Initialize the map
        const map = L.map('map').setView([51.505, -0.09], 10);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // Example marker (replace with dynamic data if needed)
        L.marker([51.505, -0.09]).addTo(map)
            .bindPopup('A sample location.');
    });
</script>
@endpush
