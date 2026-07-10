<div class="">
    <livewire:admin.repair.repair-price.components.import-export />
    <hr>
    <x-alert />

    <div>
        <div class="align-items-center d-flex gap-3 flex-wrap">

            {{-- Device --}}
            <div>
                <label for="select_device">Select Device</label>
                <select class="form-select" id="select_device" wire:model="selectedCatId">
                    <option value="" selected disabled>Select Device</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('selectedCatId')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>

            {{-- Brand --}}
            <div>
                <label for="select_brand">Select Brand</label>
                <select class="form-select" id="select_brand" wire:model="selectedDeviceId">
                    <option value="">Select Brand</option>
                    @foreach ($devices as $device)
                        <option value="{{ $device->id }}">{{ $device->name }}</option>
                    @endforeach
                </select>
                @error('selectedDeviceId')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>

            {{-- Sub Brand (optional) --}}
            <div>
                <label for="select_sub_brand">Select Sub Brand</label>
                <select class="form-select" id="select_sub_brand" wire:model="selectedSubBrandId">
                    <option value="">All Sub Brands</option>
                    @foreach ($subBrands as $sb)
                        <option value="{{ $sb->id }}">{{ $sb->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Series (optional) --}}
            <div>
                <label for="select_series">Select Series</label>
                <select class="form-select" id="select_series" wire:model="selectedSeriesId">
                    <option value="">All Series</option>
                    @foreach ($series as $ser)
                        <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Model (filtered by device + sub brand + series) --}}
            <div>
                <label for="select_model">Select Model</label>
                <select class="form-select" id="select_model" wire:model="selectedModelId">
                    <option value="">Select Model</option>
                    @foreach ($models as $model)
                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                    @endforeach
                </select>
                @error('selectedModelId')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>

            {{-- Repair type --}}
            <div>
                <label for="select_repair">Select Repair</label>
                <select class="form-select" id="select_repair" wire:model="selectedRepairType">
                    <option value="">Select Repair</option>
                    @foreach ($repair_types as $repair)
                        <option value="{{ $repair->id }}">{{ $repair->name }}</option>
                    @endforeach
                </select>
                @error('selectedRepairType')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>

            {{-- Price --}}
            <div class="d-flex flex-column">
                <label for="price">Price</label>
                <input
                    type="text"
                    name="price"
                    id="price"
                    placeholder="Price"
                    required
                    wire:model.debounce.500ms="price"
                >
                @error('price')
                    <span style="color:red " class="text-xs">{{ $message }}</span>
                @enderror
            </div>

            <button type="button" class="bg-blue text-white mt-3" wire:click="create">
                Add Repair Price
                <span wire:loading wire:target='create'>
                    <x-spinner />
                </span>
            </button>
        </div>
    </div>
</div>
