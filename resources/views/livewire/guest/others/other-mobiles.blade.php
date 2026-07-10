<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <div class="text-center bg-pink-linear">
        <div class="container py-3">
            <h2  style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';"class="text-danger">Problems with your phone?</h2>
            <h2 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Let’s work out the device & repair needed</h2>
            <p style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">We fix all phones from Huawei, Xiaomi, Oppo, Nokia, Honor, Sony, Vivo & Blackberry! With Central
                London<br>
                repair clinics &
                a UK-wide repair service, tell us about your phone, the fault & we’ll give you the best repair
                options.<br>
                With the best value parts & express repair options, our experienced technicians have fixed over
                120,000
                devices since
                2004.
            </p>

        </div>
    </div>
    <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="container">
        <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="row ">
            <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="col-lg-4  bg-pink-linear rounded ">
                <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="w-75 mx-auto p-4">
                    <h3 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Let’s figure out which phone you have</h3>
                    <img src="{{ asset('https://ik.imagekit.io/krgti2xic/12.png?updatedAt=1693921355976') }}"
                        class="img-fluid">
                    <p style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Please enter your phone’s make & model:</p>
                    <label>Make</label>
                    <input type="text" class="form-control" placeholder="Enter make" wire:model.lazy="make">
                    @error('make')
                        <span class="error">{{ $message }}</span>
                    @enderror
                    <br>
                    <label style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Model</label>
                    <input type="text" class="form-control" wire:model.debounce.500="modal"
                        placeholder="Enter model">
                    @error('modal')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="col-lg-8 bg-pink-linear rounded ">
                <div class="w-75 mx-auto p-4">
                    <h3 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Phone Fault List</h3>
                    <p  style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">(Tell us what’s wrong: a provisional quote will be given on inspection)</p>
                    <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" style="text-align: left;">
                        @foreach ($faults as $fault)
                            <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="form-check">
                                <input class="form-check-input mb-1" type="checkbox" value="{{ $fault }}"
                                    wire:model.debounce.500="selectedFaults">
                                <label class="form-check-label">
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
                    <p style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="py-3">Remember, we don’t charge to diagnose and there’s no-obligation once we give a
                        quote
                        Multiple Faults? We’ll apply a discount so you’re not paying more than you need to</p>
                    @if ($alert)
                        <div class="py-2 px-3 bg-white rounded">
                            <strong class="text-danger">Alert ! Please select any fault your device have.</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
