<div class="card p-3">
    <p class="mb-2">
        Klarna uses your Stripe account. Provide the Stripe <b>secret key</b> to enable Klarna.
    </p>

    <label class="pb-2 mt-2"><b>Stripe Secret Key for Klarna</b></label>
    <input
        type="text"
        class="form-control input_form mb-2 w-75"
        placeholder="sk_live_..."
        wire:model.defer="secret"
    />
    @error('secret')
        <span class="text-primary">{{ $message }}</span>
    @enderror

    <div class="form-check mt-2">
        <input
            class="form-check-input"
            type="checkbox"
            id="klarnaEnabled"
            wire:model="enabled"
        >
        <label class="form-check-label" for="klarnaEnabled">
            Enable Klarna payment method
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
