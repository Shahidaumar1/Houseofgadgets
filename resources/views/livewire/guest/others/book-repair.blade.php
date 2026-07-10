
<div class="p-4"  style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <div class=" text-light  p-4 " style=" background-image: linear-gradient(to left,#fff 28%, rgb(220, 53, 69) 30%);">
        <h2 class="text-center text-light mb-4">What you're paying... ? </h2>
        <div class="row mx-5">
            <div class="col-lg-9 ">


                {{-- @if ($data)
                    @foreach ($data['faults'] as $key => $value)
                        @if ($value != 'Other Fault (Please Specify)')
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" checked disabled />
                                <label class="form-check-label">
                                    {{ $data['make'] }} {{ $data['modal'] }}
                                    {{ array_key_exists('emc', $data) ? $data['emc'] : '' }}
                                    {{ $value }}
                                    @if (!$other_repair)
                                        =<strong class="text-warning">£TBC</strong>
                                    @endif
                                </label>
                            </div>
                        @endif
                    @endforeach
                @endif --}}

                <div wire:ignore>
                    @php
                        $res = $data ? $data['modal'] : '';
                        $modal = ['name' => $res];
                    @endphp
                    {{-- <livewire:guest.components.extra-services :model="$modal" :key="uniqid()" /> --}}
                </div>
                <div>
                    @if ($form_type == 'postal_form')
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked disabled />
                            <label class="form-check-label">
                                Surcharge for UK return delivery : £ 9
                            </label>
                        </div>
                    @endif
                </div>

                <div class="my-3" wire:ignore>
                    @php
                        
                        $repair_price = $data && array_key_exists('repair_price', $data) ? $data['repair_price'] : 'TBC';
                        
                    @endphp
                    <livewire:guest.components.total-price :repairprice="$repair_price" :tbc="$type" :key="uniqid()" />
                </div>
                <p style="color:#fff">Payable on successful completion of repair</p>
                <div>
                    <x-alert />
                </div>

                <div class="d-flex gap-3 ">
                    <button class="btn btn-light bg-light px-5" wire:click='BookRepair' wire:loading.attr='disabled'>
                        <span wire:loading.remove wire:target='BookRepair'>
                            Pay Now
                        </span>
                        <span wire:loading wire:target='BookRepair'>
                            Submitting.....
                        </span>
                    </button>
                    <div class="bg-danger rounded  p-2" wire:loading wire:target='BookRepair'>
                        <x-spinner />
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3" >
    <div class="row d-flex justify-content-center">
       <div class="col-lg-6 col-md-6" style="margin-right: 120px; margin-top: -120px;">
    <h3 class="my-4" style="font-size:50px">
        <img src="https://cdn.freebiesupply.com/logos/large/2x/apple-pay-payment-mark-logo-black-and-white.png"
             style="max-width: 200px; max-height: 100px;">
    </h3>
</div>

          <div class="col-lg-6 col-md-6" style="margin-left: 200px; margin-top: -140px;">
 <h3 class="my-4">
        <img src="https://developers.google.com/static/pay/api/images/brand-guidelines/google-pay-mark.png"
             style="max-width: 150px; max-height: 100px;">
    </h3>
        </div>
    </div>
    
    <div class="row d-flex justify-content-center">
        <div class="col-lg-3 col-md-3" style="margin-right: 120px; margin-top: 50px;">
        <h3 class="my-4">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Klarna_Payment_Badge.svg/2560px-Klarna_Payment_Badge.svg.png"
             style="max-width: 200px; max-height: 100px;">
    </h3>
        </div>
          <div class="col-lg-3 col-md-3" style=" margin-top: 50px;" >
            <h3 class="my-4">
        <img src="https://www.usnews.com/object/image/00000170-0bfb-d391-af74-afff99e10000/203001-paypallogo-submitted.png?update-time=1581455551671&size=responsiveGallery"
             style="max-width: 150px; max-height: 150px;">
    </h3>
        </div>
    </div>
    

</div>
        </div>
    </div>
</div>