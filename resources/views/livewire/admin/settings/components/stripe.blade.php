<p>Stripe keys will work for Klarna also.</p>

<div class="card p-3">
    <label class="pb-2 mt-3"><b>Private Key</b></label>
    <input
        type="text"
        class="form-control input_form w-75 mp-3"
        placeholder="Secret Key"
        wire:model.defer="secret"
    />
    @error('secret')
        <span class="text-primary pb-3">{{ $message }}</span>
    @enderror

    <label class="pb-2 mt-3"><b>Public Key</b></label>
    <input
        type="text"
        class="form-control input_form w-75 mp-3"
        placeholder="Public Key"
        wire:model.defer="public_key"
    />
    @error('public_key')
        <p class="text-primary">{{ $message }}</p>
    @enderror

    <div class="form-check mt-3">
        <input
            class="form-check-input"
            type="checkbox"
            id="stripeEnabled"
            wire:model="enabled"
        >
        <label class="form-check-label" for="stripeEnabled">
            Enable Stripe payment method
        </label>
    </div>
</div>

<div class="d-flex justify-content-end align-items-center pt-2 mb-3">
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
