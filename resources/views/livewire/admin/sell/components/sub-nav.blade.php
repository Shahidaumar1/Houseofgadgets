<div>
    <div class="d-flex justify-content-center admin-sub-nav">
        <ul class="pt-2 gap-3" role="group">
            @foreach ($items as $item)
                <button class=" btn m-2 btn {{ $active == $item['name'] ? 'selected-button' : 'unselected-button' }}" aria-current="page" wire:click="showData('{{ $item['name'] }}')">{{ $item['name'] }}</button>
            @endforeach
        </ul>
    </div>
</div>
