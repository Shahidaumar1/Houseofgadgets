<div>
    <div class="d-flex justify-content-start ">
        <ul class=" " role="group">
            @foreach ($items as $item)
      
                    <button class="button btn mx-1 my-1 {{ $active == $item['name'] ? 'selected-button' : 'unselected-button' }}" aria-current="page" wire:click="showData('{{ $item['name'] }}')">{{ $item['name'] }}</button>
               
            @endforeach
        </ul>
    </div>
</div>