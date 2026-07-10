<div>
    <div class="d-flex justify-content-center admin-sub-nav">
    <div class="pt-2 gap-3" role="group" >
        @foreach ($items as $item)
            <button type="button" 
                    class="btn m-2 {{ $active == $item['name'] ? 'selected-button' : 'unselected-button' }} mx-1" 
                    wire:click="showData('{{ $item['name'] }}')">
                {{ $item['name'] }}
            </button>
        @endforeach
    </div>
</div>

</div>
