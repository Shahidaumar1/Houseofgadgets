<div>
    <div class="d-flex flex-column gap-3">
        @if ($deviceName)
            <h3>{{ $deviceName }}</h3>
        @endif

        <div>
            <input placeholder="Enter name" type="text" required wire:model.debounce.500="name" /><br>
            @error('name')
                <span class="text-xs text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <input type="file" accept="*" wire:model="file" id="{{ $rand }}" /><br>
            <span wire:loading wire:target="file">loading...</span>
            @error('file')
                <span class="text-xs text-danger">{{ $message }}</span>
            @enderror
        </div>

        @error('deviceId')
            <span class="text-xs text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="float-end mt-3 ">
        <button type="button" class="bg-blue text-white" wire:click="save">
            Add Model
            <span wire:loading wire:target='save' wire:loading.attr="disabled">
                <x-spinner />
            </span>
        </button>
    </div>
</div>

