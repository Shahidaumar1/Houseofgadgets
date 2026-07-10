<div class="p-10">
    <div class="form-group">
        <label for="post_code">Post Code:</label>
        <input type="text" wire:model="post_code" class="form-control" id="post_code" placeholder="Enter Post Code">
        <div id="resultContainer">
            <p>{{ $addressName }}</p>
        </div>
        @error('post_code')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    {{-- <input type="text" placeholder="write a postal code ..." wire:model="searchText" wire:keydown.enter="changeApiData"> --}}
    <button wire:click.prevent="changeApiData" class="mb-2">Search</button>
    @if ($responseData)
        {{-- <h1>API Response</h1> --}}
        {{-- <pre>{{ json_encode($responseData, JSON_PRETTY_PRINT) }}</pre> --}}

        {{-- <br> --}}
        <select wire:model="selectedOption"  class="form-select" wire:change.prevent="addAddressData">
            <option value="" selected >Select an option</option>
            @foreach ($responseData['knownAddresses'] as $key => $address)
                <option key="{{ $key }}" value="{{ $address }}">{{ $address }}</option>
            @endforeach
        </select>

        <a class="text-primary" href="#" wire:click.prevent="toggleAddressFields" >or you can write your own </a>
        {{-- <input type="text" placeholder="write your location ..." wire:model="selectedOption"> --}}
    @endif
</div>
