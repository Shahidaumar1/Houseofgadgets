<div class="" style="overflow: hidden;">
    <div class="row">
        <div class="col">
            <div class="d-flex flex-column flex-md-row">

                {{-- Left sidebar --}}
                <livewire:admin.components.side-nave active="settings" />

                {{-- Main content --}}
                <x-content>
                    <livewire:admin.settings.components.top-nav active="payment" />

                    <div class="container">
                        <h2 class="px-3 pt-1 pt-md-5 pb-3">
                            <b>Payment Gateway</b>
                        </h2>

                        <p class="px-3 py-1">
                            A payment gateway facilitates secure online payments for businesses.
                        </p>

                        {{-- Tabs: Paypal / Stripe / Klarna --}}
                        <div class="ml-2 d-flex gap-2 align-items-center">
                            <label
                                class="p-3 text-center {{ $pm == 'Paypal' ? 'selected-button' : 'unselected-button' }} cursor-pointer"
                                wire:click="$set('pm', 'Paypal')">
                                Paypal
                            </label>

                            <label
                                class="p-3 text-center {{ $pm == 'Stripe' ? 'selected-button' : 'unselected-button' }} cursor-pointer"
                                wire:click="$set('pm', 'Stripe')">
                                Stripe
                            </label>

                            <label
                                class="p-3 text-center {{ $pm == 'Klarna' ? 'selected-button' : 'unselected-button' }} cursor-pointer"
                                wire:click="$set('pm', 'Klarna')">
                                Klarna
                            </label>
                        </div>

                        {{-- --------- Tab content --------- --}}
                        <div class="px-3 pt-3">

                            {{-- PAYPAL TAB --}}
                            @if ($pm === 'Paypal')
                                <div class="card p-3">
                                    <label class="pb-2"><b>Client ID</b></label>
                                    <input type="text"
                                           class="form-control input_form mb-2 w-75"
                                           placeholder="Client ID"
                                           wire:model.defer="paypal_client_id" />
                                    @error('paypal_client_id')
                                        <span class="text-primary">{{ $message }}</span>
                                    @enderror

                                    <label class="pb-2"><b>Secret</b></label>
                                    <input type="text"
                                           class="form-control input_form mb-2 w-75"
                                           placeholder="Secret"
                                           wire:model.defer="paypal_secret" />
                                    @error('paypal_secret')
                                        <span class="text-primary">{{ $message }}</span>
                                    @enderror

                                    <label class="pb-2"><b>Mode</b></label>
                                    <input type="text"
                                           class="form-control input_form mb-2 w-75"
                                           placeholder="Live / Sandbox"
                                           wire:model.defer="paypal_mode" />

                                    <div class="form-check mt-2">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="paypalEnabled"
                                               wire:model="paypal_enabled">
                                        <label class="form-check-label" for="paypalEnabled">
                                            Enable Paypal payment method
                                        </label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center pt-2 mb-3">
                                    <button type="button"
                                            class="{{ $dirty ? 'selected-button' : 'unselected-button' }}"
                                            wire:click="connect">
                                        Connect
                                    </button>
                                    <span wire:loading wire:target="connect">connecting....</span>
                                    @if (session()->has('message'))
                                        <span class="text-success ms-2">{{ session('message') }}</span>
                                    @endif
                                </div>
                            @endif

                            {{-- STRIPE TAB --}}
                            @if ($pm === 'Stripe')
                                <p>Stripe keys will work for Klarna also.</p>

                                <div class="card p-3">
                                    <label class="pb-2 mt-3"><b>Private Key</b></label>
                                    <input type="text"
                                           class="form-control input_form w-75 mb-3"
                                           placeholder="Secret Key"
                                           wire:model.defer="stripe_secret" />
                                    @error('stripe_secret')
                                        <span class="text-primary pb-3">{{ $message }}</span>
                                    @enderror

                                    <label class="pb-2 mt-3"><b>Public Key</b></label>
                                    <input type="text"
                                           class="form-control input_form w-75 mb-3"
                                           placeholder="Public Key"
                                           wire:model.defer="stripe_public_key" />
                                    @error('stripe_public_key')
                                        <p>{{ $message }}</p>
                                    @enderror

                                    <div class="form-check mt-2">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="stripeEnabled"
                                               wire:model="stripe_enabled">
                                        <label class="form-check-label" for="stripeEnabled">
                                            Enable Stripe payment method
                                        </label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center pt-2 mb-3">
                                    <button type="button"
                                            class="{{ $dirty ? 'selected-button' : 'unselected-button' }}"
                                            wire:click="connect">
                                        Connect
                                    </button>
                                    <span wire:loading wire:target="connect">connecting....</span>
                                    @if (session()->has('message'))
                                        <span class="text-success ms-2">{{ session('message') }}</span>
                                    @endif
                                </div>
                            @endif

                            {{-- KLARNA TAB --}}
                            @if ($pm === 'Klarna')
                                <div class="card p-3">
                                    <p>
                                        Klarna uses your Stripe account.
                                        Provide the Stripe <b>secret key</b> to enable Klarna.
                                    </p>

                                    <label class="pb-2 mt-2"><b>Stripe Secret Key for Klarna</b></label>
                                    <input type="text"
                                           class="form-control input_form w-75 mb-3"
                                           placeholder="Stripe Secret Key"
                                           wire:model.defer="klarna_secret" />
                                    @error('klarna_secret')
                                        <span class="text-primary pb-3">{{ $message }}</span>
                                    @enderror

                                    <div class="form-check mt-2">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="klarnaEnabled"
                                               wire:model="klarna_enabled">
                                        <label class="form-check-label" for="klarnaEnabled">
                                            Enable Klarna payment method
                                        </label>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center pt-2 mb-3">
                                    <button type="button"
                                            class="{{ $dirty ? 'selected-button' : 'unselected-button' }}"
                                            wire:click="connect">
                                        Connect
                                    </button>
                                    <span wire:loading wire:target="connect">connecting....</span>
                                    @if (session()->has('message'))
                                        <span class="text-success ms-2">{{ session('message') }}</span>
                                    @endif
                                </div>
                            @endif

                        </div>
                    </div>
                </x-content>

            </div>
        </div>
    </div>
</div>

{{-- MOBILE sticky footer (same as pehle) --}}
<style>
    .card {
        min-width: 200px;
        border-radius: 20px;
        border: 1px solid gray;
        background: whitesmoke;
    }

    .button-sticky {
        height: 60px;
        color: white;
        font-family: sans-serif;
        font-size: 15px;
        line-height: 15px;
        text-align: center;
        position: fixed !important;
        bottom: -2px;
        z-index: 999;
        width: 100%;
    }

    .home-btn:hover {
        color: orange;
    }

    .button-sticky .col-2 {
        margin-right: 5px;
    }
</style>

<div class="button-sticky container bg-blue d-lg-none d-md-none">
    <div class="row">
        <div class="col-2 mt-4 ml-1">
            <a href="{{ route('payment-methods-settings') }}" class="text-white item">Payment</a>
        </div>
        <div class="col-2 mt-4">
            <a href="{{ route('site-settings') }}" class="text-white item">site-settings</a>
        </div>
        <div class="col-2 mt-4">
            <a href="{{ route('branches-settings') }}" class="text-white item">Branches</a>
        </div>
        <div class="col-2 mt-4">
            <a href="{{ route('create-branches') }}" class="text-white item">Create</a>
        </div>
        <div class="col-2 mt-4">
            <a href="{{ route('services-settings') }}" class="text-white item">Services</a>
        </div>
    </div>
</div>
