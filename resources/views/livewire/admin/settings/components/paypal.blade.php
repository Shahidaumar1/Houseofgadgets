<div class="card p-3">
    <label class="pb-2"><b>Client ID</b></label>
    <input
        type="text"
        class="form-control input_form mb-2 w-75"
        placeholder="Client ID"
        wire:model.defer="client_id"
    />
    @error('client_id')
        <span class="text-primary">{{ $message }}</span>
    @enderror

    <label class="pb-2"><b>Secret</b></label>
    <input
        type="text"
        class="form-control input_form mb-2 w-75"
        placeholder="Secret"
        wire:model.defer="secret"
    />
    @error('secret')
        <span class="text-primary">{{ $message }}</span>
    @enderror

    <label class="pb-2 mt-2"><b>Mode</b></label>
    <select
        class="form-control input_form mb-2 w-75"
        wire:model="mode"
    >
        <option value="live">Live</option>
        <option value="sandbox">Sandbox</option>
    </select>

    <div class="form-check mt-2">
        <input
            class="form-check-input"
            type="checkbox"
            id="paypalEnabled"
            wire:model="enabled"
        >
        <label class="form-check-label" for="paypalEnabled">
            Enable Paypal payment method
        </label>
    </div>
</div>

<div class="d-flex justify-content-end align-items-center pt-2">
    <button
        type="button"
        class="selected-button"
        wire:click="connect"
    >
        Connect
    </button>

    <span wire:loading wire:target="connect" class="ms-2">
        connecting....
    </span>

    @if(session()->has('message'))
        <span class="text-success ms-2">{{ session('message') }}</span>
    @endif
</div>

<style>
.card{
    min-width: 200px;
    border-radius: 20px;
    border: 1px solid gray;
    background: whitesmoke;
}
</style>
