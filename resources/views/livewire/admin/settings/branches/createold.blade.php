<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="settings" />
        <x-content>
            <livewire:admin.settings.components.top-nav active="create" />

            <div class="container">
                <h2 class="text-primary px-5 pt-5 pb-3">Create Branch</h2>

                <div class="row">
                    <div class="col-md-8">

                        <form wire:submit.prevent="saveBranch">
                            @csrf

                            <div class="form-group">
                                <label for="name">Branch Name:</label>
                                <input type="text" wire:model="name" class="form-control" id="name" placeholder="Enter Branch Name">
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
                                @error('post_code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

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
                            <button type="submit" class="btn btn-primary">Create Branch</button>
                        </form>
                    </div>
                </div>

            </div>


        </x-content>

        <livewire:admin.sell.components.right-nav :data="$data" />

    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            const locationInfo = document.getElementById("locationInfo");
            const latitudeElement = document.getElementById("latitude");
            const longitudeElement = document.getElementById("longitude");

            navigator.geolocation.getCurrentPosition(onSuccess, onError);

            function onSuccess(position) {
                @this.latitude = position.coords.latitude;
                @this.longitude = position.coords.longitude;
            }

            function onError(error) {
                console.error("Error getting location:", error.message);
            }
        })
    </script>

</div>