<div>
    <div class="d-flex gap-4 align-items-center justify-content-start mb-5">
        <span class="cursor-pointer" wire:click="changePm('stripe')"><i
                class="fa fa-cc-stripe {{ $selectedPm == 'stripe' ? 'text-success border border-success rounded p-1' : '' }}"
                style="font-size:40px" aria-hidden="true"></i></span>
        <span class="cursor-pointer" wire:click='changePm("paypal")'><i
                class="fa fa-paypal {{ $selectedPm == 'paypal' ? 'text-success border border-success rounded p-1' : '' }}"
                style="font-size:36px" aria-hidden="true"></i></span>


    </div>

    @if ($selectedPm == 'stripe')
        <livewire:payment-methods.stripe :price="$price" :color="$color" :service="$service" />
    @elseif($selectedPm == 'paypal')
        <livewire:payment-methods.paypal :price="$price" :color="$color" :service="$service" />
    @endif

</div>
