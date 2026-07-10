<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" x-data="{ open: false }">
    <span @click="open = true" x-show="open == false"
        wire:click="editablePrice('{{ $price->id }}')">{{ $price->price }}</span>
    <input x-show="open" type="text" wire:model.lazy="newPrice" style="padding:0px;" @click.away="open = false" />
    <a x-show="open" href="javascitp:void(0)" wire:click="delete('{{ $price->id }}')"
        style="color: rgb(211, 64, 64)"><i class="bi bi-trash-fill"></i> </a>

</div>
