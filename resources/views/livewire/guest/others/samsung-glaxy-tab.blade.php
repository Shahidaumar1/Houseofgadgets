<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <div class="text-center bg-danger">
        <div  style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';"class="container py-3">
            <h2 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="text-danger">Problems with your Samsung Galaxy Tab?</h2>
            <h2 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Let’s check the model & the repair needed</h2>
            <p style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">With repair clinics in popular Central London hubs and Postal/Courier repairs across the UK, tell us
                which Samsung<br>
                Galaxy Tab you have and what’s wrong with it, so we can advise which repair you need.<br>
                With the best value parts & express repair options, our experienced technicians have fixed over 120,000
                devices since
                2004.
            </p>

        </div>
    </div>

    <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="container">
        <div class="row ">
            <div class="col-lg-4  bg-danger ">
                <div class="w-75 mx-auto p-4">

                    <h3 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Let’s figure out which Galaxy Tab you have</h3>
                    <img src="{{ asset('https://ik.imagekit.io/krgti2xic/2.png?updatedAt=1693917520269') }}"
                        class="img-fluid">
                    <label style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Please enter the Model Number (SM-TXXX format) for your Galaxy Tab:</label>
                    <input type="text" class="form-control" placeholder="SM-TXXX" wire:model.debounce.500="modal">
                    @error('modal')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="col-lg-8 bg-pink-linear rounded ">
                <div class="w-75 mx-auto p-4">
                    <div>
                        <h3 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Samsung Glaxy Tab Fault List</h3>
                        <p style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">(Tell us what’s wrong: a provisional quote will be given on inspection)</p>
                        <div  style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';"style="text-align: left;">
                            @foreach ($faults as $fault)
                                <div  style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';"class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $fault }}"
                                        id="flexCheckIndeterminate" wire:model="selectedFaults">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        {{ $fault }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @if (in_array('Other Fault (Please Specify)', $selectedFaults))
                            <div class="py-2">
                                <input type="text" class="form-control" wire:model.lazy="fault"
                                    placeholder="Please specify the fault">
                            </div>
                        @endif
                        <br>
                        <p>Remember, we don’t charge to diagnose and there’s no-obligation once we give a quote
                            Multiple Faults? We’ll apply a discount so you’re not paying more than you need to</p>
                        @if ($alert)
                            <div class="py-2 bg-white">
                                <strong class="text-danger">Alert ! Please select any fault your device have.</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
