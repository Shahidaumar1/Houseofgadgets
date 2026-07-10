 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';"<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <div class="text-center bg-danger">
        <div class="container py-3">
            <h2 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="text-danger">Problems with your Laptop?</h2>
            <h2 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Let’s check the Laptop & repair needed</h2>
            <p style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">As well as iPads & Samsung Galaxy Tabs, we fix Laptops from Asus, Amazon, Huawei & others. With
                Central
                London repair<br>
                clinics & Postal/Courier repairs across the UK, tell us the Laptop you have, the fault & we’ll give
                the
                best repair
                options.<br>
                With the best value parts & express repair options, our experienced technicians have fixed over
                120,000
                devices since
                2004.
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row ">
            <div class="col-lg-4  bg-pink-linear rounded ">
                <div class="w-75 mx-auto p-4">
                    <div>
                        <h4 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Let’s figure out which laptop you have</h4>
                        <img src="{{ asset('https://ik.imagekit.io/krgti2xic/12.png?updatedAt=1693921200775') }}"
                            class="img-fluid">
                        <p style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Please enter your laptop’s make & model:</p>
                        <input type="text" placeholder="Make" class="form-control" wire:model.lazy="make">
                        @error('make')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <input type="text" placeholder="Model" class="form-control" wire:model="modal">
                        @error('modal')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-8 bg-pink-linear rounded ">
                <div class="w-75 mx-auto p-4">
                    <div>
                        <h3 style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">Laptop Fault List</h3>
                        <p style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">(Tell us what’s wrong: a provisional quote will be given on inspection)</p>
                        <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" style="text-align: left;">
                            @foreach ($faults as $fault)
                                <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="form-check">
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
                        <p>Remember, we don’t charge to diagnose and there’s no-obligation once we give a quote
                            Multiple Faults? We’ll apply a discount so you’re not paying more than you need to</p>
                        @if ($alert)
                            <div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';" class="py-2 bg-white">
                                <strong class="text-danger">Alert ! Please select any fault your device have.</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
