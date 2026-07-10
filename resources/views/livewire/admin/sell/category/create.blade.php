<div>
    <div class="d-flex flex-column gap-3">
        <div>
            <input placeholder="Enter name" type="text" required wire:model="name" /><br>
            @error('name')
                <span class="text-xs text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input type="file" accept="*" wire:model="file" id={{ $rand }} /><br>
            <span wire:loading wire:target="file">loading...</span>
            @error('file')
                <span class="text-xs text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="float-end mt-3 ">
        <button type="button" class="bg-blue text-white" wire:click="save" wire:loading.attr="disabled" wire:target="file">
            Add Category
            <span wire:loading wire:target='save'>
                <x-spinner />
            </span>
        </button>
    </div>

</div>
