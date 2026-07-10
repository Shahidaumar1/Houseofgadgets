<div class="container" style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <div class="container-fluid">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h2>Create</h2>
            </div>
        </div>
        <div class="row align-items-start">
            <livewire:repair.components.import-export />
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <x-alert />
        </div>
    </div>
    <div class="container-fluid">

        <div class="row align-items-start">
            <div class="col-3">
                <label for="master_id">Device Type</label>
                <select class="form-select" aria-label="Default select example" id="select_Cat"
                    wire:model="selectedDeviceType">
                    <option selected disabled>Select Device Type</option>
                    @foreach ($device_types as $device_type)
                        <option value="{{ $device_type->id }}">{{ $device_type->name }}
                    @endforeach
                    </option>
                </select>
                @error('selectedDeviceType')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-3">
                <label for="master_id">Select Modal</label>
                <select class="form-select" aria-label="Default select example" id="select_Cat"
                    wire:model="selectedModal">
                    <option>Select Modal</option>
                    @foreach ($modals as $modal)
                        <option value="{{ $modal->id }}">{{ $modal->name }}
                    @endforeach
                    </option>
                </select>
                @error('selectedModal')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="card"
            style="    margin-left: 41rem;
        position: absolute;
        height: 25rem;margin-top: -9rem;">
            <div class="d-flex justify-content-end border"
                style="width: 100%;
                max-height: 100vh;
                z-index: 1013;
                overflow-y: auto; ">

                <livewire:repair.index page="create" />
            </div>
        </div>
        <hr style="width: 32rem">


        <div class=" col-3 ml-0 mb-2 pl-0">
            @if ($editable)
                <livewire:repair.components.create-repair-type />
            @endif
        </div>

        <div class="row align-items-start">

            <div class="col-3">
                <div class="d-flex justify-content-between">
                    <label for="master_id">Select Repair Type</label>
                    <svg wire:click="toggle" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        style="cursor: pointer; height: 25; width:25px; color:green" class="w-2 h-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                    </svg>

                </div>



                <div>
                    <select class="form-select" aria-label="Default select example" id="select_Cat"
                        wire:model="selectedRepairType">
                        <option>Select Repair Type</option>
                        @foreach ($repair_types as $repair)
                            <option value="{{ $repair->id }}">{{ $repair->name }}
                        @endforeach
                        </option>
                    </select>
                    @error('selectedRepairType')
                        <span style="color:red " class="text-xs">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="col-3">
                <label for="broken_screen_p">Price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Price" required
                    wire:model.debounce.500="price">
                @error('price')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="d-flex justify-content-start" style="padding: 8px">
            <button class="btn btn-primary" type="button" wire:click="create">Create</button>
        </div>


    </div>
</div>
