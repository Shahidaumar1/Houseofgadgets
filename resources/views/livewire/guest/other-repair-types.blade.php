<div>
        <livewire:components.top-bar />

    <div class="text-center bg-pink-linear">
        <div class="container py-3">
            <h2>Problems with your <span class='text-danger'>{{ $modal->name }}? <span></h2>
            <h2>Let’s see what we need to repair</h2>
            <p>With repair clinics in popular Central London hubs and Postal/Courier repairs across the UK, we’ll find
                the fault with your {{ $modal->name }} (no diagnosis charge) and have your phone repaired and healthy
                again.<br>
                With the best value parts & express repair options, our experienced technicians have fixed over 120,000
                devices since 2004.
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row ">
            <div class="col-lg-4  bg-pink-linear rounded ">
                <div class="w-75 mx-auto p-4">
                    <div class="text-center  mt-5">
                        <img src="{{ $modal->image ? asset($modal->image) : asset('https://ik.imagekit.io/phonelab2/img1.png?updatedAt=1697193111803') }}"
                            style="height:250px;">

                        <h3 class="text-danger mt-2">{{ $modal->name }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 bg-pink-linear rounded ">
                <div class="w-75 mx-auto p-4">
                    <div class="box">
                        <h3>Phone Fault List</h3>
                        <p>(Tell us what’s wrong: a provisional quote will be given on inspection)</p>
                        @forelse ($make->repair_types as $repair_type)
                            @php
                                $price = App\Models\Price::where('modal_id', $modal->id)
                                    ->where('repair_type_id', $repair_type->id)
                                    ->first();
                            @endphp

                            @if ($price)
                                <div class="form-check " style="text-align: left;">
                                    <input class="form-check-input" type="checkbox"
                                        value="{{ $repair_type->name }}: £ {{ $price->price }}"
                                        id="flexCheckIndeterminate" wire:model="selectedFaults">
                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                        {{ $repair_type->name }} £ {{ $price->price }}
                                    </label>
                                </div>
                            @endif

                        @empty
                            <p>No repair types found.</p>
                        @endforelse
                        <div style="text-align: left;">
                            @foreach ($faults as $fault)
                                <div class="form-check">
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
