<div>
    <div class="d-flex flex-column gap-3">
        <div>
            <input placeholder="Enter name" type="text" required wire:model.debounce.500="category.name" /><br>
            @error('category.name')
                <span class="text-xs text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input type="file" accept="*" wire:model="file" id={{ $rand }} /><br>
            <span wire:loading wire:target="file">loading...</span>
        </div>


    </div>
    <div class="float-end mt-3 ">
        <button type="button" class="bg-blue text-white" wire:click="update">
            Save Changes
            <span wire:loading wire:target='update'>
                <x-spinner />
            </span>
        </button>
    </div>




</div>
