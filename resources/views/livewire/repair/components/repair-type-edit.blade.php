<div>
    <div class="mb-3">
        <x-alert />
    </div>
    <div x-data="{ open: false }">
        <span @click="open = true" x-show="open == false"
            wire:click="editable('{{ $repair_type->id }}')">{{ $repair_type->name }}</span>
        <input  x-show="open" type="text" wire:model.lazy="newRepairType"
            @click.away="open = false" />
        {{-- <div>
            <livewire:components.file-upload :key="uniqid()" />
            @error('image')
                <span style="color:red " class="text-xs">{{ $message }}</span>
            @enderror

        </div> --}}
        <a x-show="open" href="javascitp:void(0)" wire:click="delete('{{ $repair_type->id }}')"
            style="color: rgb(211, 64, 64)"><i class="fa fa-trash"></i> </a>

    </div>
</div>
