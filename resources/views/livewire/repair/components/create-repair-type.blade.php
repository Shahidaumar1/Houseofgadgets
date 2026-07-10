<div>
    <div class="mb-3">
        <x-alert />
    </div>
    <div class="">
        <div>

            <input type="text" name="repair_type" class="form-control" id="price" placeholder="new repair_type name"
                required wire:model.debounce.500="repair_type_name">
            @error('repair_type_name')
                <span style="color:red " class="text-xs">{{ $message }}</span>
            @enderror

        </div>
        <br>
        <div>
            <livewire:components.file-upload :key="uniqid()" />
            @error('image')
                <span style="color:red " class="text-xs">{{ $message }}</span>
            @enderror

        </div>
        <br>

        <button class="btn btn-success" type="button" {{ !$image ? 'disabled' : '' }} wire:click="save"> Save</button>

    </div>
</div>
</div>
