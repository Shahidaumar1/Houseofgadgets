

<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" x-data="{ open: false }">
    <span class="bg-danger rounded-circle px-2 font-weight-bold cursor-pointer" @click="open = true" x-show="open == false" wire:click="toggle">1</span>
    <input x-show="open" type="text" wire:model.lazy="newOrder" style="padding:0px;" @click.away="open = false" />
</div>


