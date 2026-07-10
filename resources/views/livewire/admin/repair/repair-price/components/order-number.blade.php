

<div x-data="{ open: false }">
    <span class="bg-danger rounded-circle px-2 font-weight-bold cursor-pointer" @click="open = true" x-show="open == false" wire:click="toggle">1</span>
    <input x-show="open" type="text" wire:model.lazy="newOrder" style="padding:0px;" @click.away="open = false" />
</div>


