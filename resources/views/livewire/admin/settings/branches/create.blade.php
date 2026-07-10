<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="settings" />
        <x-content>
            <livewire:admin.settings.components.top-nav active="create" />
            <div class="container">
                <h2 class="text-primary px-5 pt-5 pb-3">Create Branch</h2>
                <form wire:submit.prevent="saveBranch">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="form-group">
                                <label for="name">Branch Name:</label>
                                <input type="text" wire:model="name" class="form-control" placeholder="Enter Branch Name">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="address_line_1">Address Line 1:</label>
                                <input type="text" wire:model="address_line_1" class="form-control" id="address_line_1" placeholder="Enter Address Line 1">
                                @error('address_line_1') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="address_line_2">Address Line 2:</label>
                                <input type="text" wire:model="address_line_2" class="form-control" id="address_line_2" placeholder="Enter Address Line 2">
                                @error('address_line_2') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="town_city">Town/City:</label>
                                <input type="text" wire:model="town_city" class="form-control" id="town_city" placeholder="Enter Town/City">
                                @error('town_city') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="post_code">Post Code:</label>
                                <input type="text" wire:model="post_code" class="form-control" id="post_code" placeholder="Enter Post Code">
                                <div id="resultContainer">
                                    <p>{{$addressName}}</p>
                                </div>
                                @error('post_code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mobile_number">Mobile Number:</label>
                                <input type="text" wire:model="mobile_number" class="form-control" id="mobile_number" placeholder="Enter Mobile Number">
                                @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="landline_number">Landline Number:</label>
                                <input type="text" wire:model="landline_number" class="form-control" id="landline_number" placeholder="Enter Landline Number">
                                @error('landline_number') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" wire:model="email" class="form-control" id="email" placeholder="Enter Email">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude:</label>
                                <input type="number" wire:model="latitude" step="any" class="form-control" id="latitude" placeholder="Enter Latitude">
                                @error('latitude') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude:</label>
                                <input type="number" wire:model="longitude" step="any" class="form-control" id="longitude" placeholder="Enter Longitude">
                                @error('longitude') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group"><span class="text-danger" id="locationInfo"></span></div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <label for="description" class="form-label">
                            <h2 class="text-primary pt-5 pb-3">About Us <b>{{$name}}</b></h2>
                        </label>
                        <div class=" mb-2" wire:ignore style="overflow-x: hidden;">

                            <textarea wire:model.debounce.500="description" id="editor" class="form-control"></textarea>

                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-12 mb-2">
                            <label for="map_link" class="form-label">Map Code:</label>
                            <textarea rows="10" wire:model="map_link" class="form-control" id="map_link" placeholder="Enter Map Embedded code"></textarea>

                            @error('map_link') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-2">{!! $map_link !!}</div>
                        <div class="col-md-6 mb-2">

                            <div class="form-group">
                                <label class="form-label">Branch <strong>{{ $name }}</strong> Image</label>
                                <input type="file" accept="image/*" wire:model="file" onchange="displaySelectedImage(event, 'selectedImage')" id={{ $rand }} /> <br>
                                <span wire:loading wire:target="file">loading...</span>
                                @error('file')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                                <div class="text-center mt-2">
                                    <img id="selectedImage" wire:ignore src="{{ $image }}" class="img-fluid" alt="{{ $name }} - Image">
                                </div>
                            </div>
                        </div>
                    </div>
                        <h2 class="text-primary px-5 pt-5 pb-3">Appointment Time Slots</h2>
                    <div class=" " style="overflow-x: auto;">
                        <!-- Display time slots -->

                        <table class="table  table-hover" >
                            <thead class="table-primary">
                                <tr>
                                    <th>Day</th>
                                    <th>Opening Time</th>
                                    <th>Closing Time</th>
                                    <th>Status</th>
                                    <!-- Add more columns if needed -->
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($timeSlots as $index => $timeSlot)
                                <tr>
                                    <td>{{ $timeSlot['day'] }}</td>
                                    <td>
                                        <input type="time" wire:model="timeSlots.{{ $index }}.opening_time" />
                                        @error("timeSlots.{$index}.opening_time")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="time" wire:model="timeSlots.{{ $index }}.closing_time" />
                                        @error("timeSlots.{$index}.closing_time")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" role="switch" type="checkbox" id="flexSwitch{{$index}}" wire:click="toggleStatus({{ $index }})" {{ $timeSlot['status'] ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexSwitch{{$index}}">{{ $timeSlot['status'] ? 'Opened' : 'Closed' }}</label>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="form-group">
                            <button type="submit" class="btn " style="border-radius: 20px;color: white;background-color: #20375E;padding: 10px">Create Branch</button>
                        </div>
                    </div>
                </form>
                <div class="row my-5 pb-5">
                    <div class="col-lg-12" wire:ignore id="mapView">
                        <div class="w-100 h-100" id="mapContainer"></div>
                    </div>
                </div>
            </div>
        </x-content>
    </div>
</div>
            <!----------------------------- footer-------------------------->

<style>
.button-sticky {
    height: 60px;
    color: white;
    font-family: sans-serif;
    font-size: 15px;
    line-height: 15px;
    text-align: center;
    position: fixed !important;
    bottom: -2px;
    z-index: 999;
    width: 100%;
 
}

.home-btn:hover {
    color: orange;
}
.button-sticky .col-2 {
    margin-right: 5px; /* Adjust this value to set the desired gap */
}



</style>
<div class="button-sticky container bg-blue d-lg-none d-md-none">
    <div class="row ">

        <div class="col-2  mt-4 ml-1">
            <a href="{{ route('payment-methods-settings') }}" class="text-white item "> Payment</a>
     
     
        </div>

        <div class="col-2  mt-4 ">
            <a href="{{ route('site-settings') }}" class="text-white  item "> site-settings</a>
        
        </div>

        <div class="col-2  mt-4 ">
            <a href="{{ route('branches-settings') }}" class="text-white  item "> Branches</a>
        </div>

        <div class="col-2 mt-4">
            <a href="{{ route('create-branches') }}" class="text-white  item ">Create</a>
        </div>
        <div class="col-2 mt-4">
            <a href="{{ route('services-settings') }}" class="text-white  item ">Services</a>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    document.addEventListener('livewire:load', function() {
        const locationInfo = document.getElementById("locationInfo");
        const resultContainer = document.getElementById("resultContainer");
        var mapContainer = document.getElementById("mapContainer");
        document.getElementById('post_code').addEventListener('change', function() {
            getLatLong();
        });
        navigator.geolocation.getCurrentPosition(onSuccess, onError);

        function onSuccess(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            @this.latitude = latitude;
            @this.longitude = longitude;
            showMap(latitude, longitude);
        }

        function onError(error) {
            console.error("Error getting location:", error.message);
        }
        async function getLatLong() {
            var postalCode = document.getElementById("post_code").value;
            try {
                const response = await fetch(`https://nominatim.openstreetmap.org/search?format=json&postalcode=${postalCode}`);
                const data = await response.json();
                if (data.length > 0) {
                    const result = data[0];
                    resultContainer.innerHTML = `<p>${result.display_name}</p>`;
                    @this.addressName = result.display_name;
                    @this.latitude = result.lat;
                    @this.longitude = result.lon;
                    // mapContainer.innerHTML = "";
                    showMap(result.lat, result.lon);
                } else {
                    resultContainer.innerHTML =
                        "<p>No results found for the provided postal code.</p>";
                }
            } catch (error) {
                console.error("Error fetching data:", error);
            }
        }

        function showMap(latitude, longitude) {
            // Create a new div element
            var mapDiv = document.createElement("div");
            // Set the classes for the div
            mapDiv.classList.add("w-100", "h-100");
            mapDiv.setAttribute("style", "min-height: 400px;");
            // Set the id for the div
            mapDiv.id = "mapContainer";
            var mapViewDiv = document.getElementById("mapView");
            mapViewDiv.innerHTML = '';
            mapViewDiv.appendChild(mapDiv);
            var map = L.map("mapContainer").setView([latitude, longitude], 15);
            L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
                attribution: "&copy; OpenStreetMap contributors",
            }).addTo(map);
            const marker = L.marker([latitude, longitude], {
                draggable: true,
            }).addTo(map).bindPopup('<b> Branch location </b>').openPopup();
            marker.on("dragend", (event) => {
                const updatedLatitude = event.target.getLatLng().lat;
                const updatedLongitude = event.target.getLatLng().lng;
                @this.latitude = updatedLatitude;
                @this.longitude = updatedLongitude;
            });
        }
    });

    function displaySelectedImage(event, elementId) {
        const selectedImage = document.getElementById(elementId);
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                selectedImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    let editorInstance = null;
    createEditor();

    function createEditor() {
        if (editorInstance) {
            editorInstance.destroy().then(() => {
                // console.log('Editor destroyed.');
                initializeNewEditor();
            });
        } else {
            initializeNewEditor();
        }
    }

    function initializeNewEditor() {

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editorInstance = editor;
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                });

            })
            .catch(error => {
                console.error(error);
            });
    }
</script>