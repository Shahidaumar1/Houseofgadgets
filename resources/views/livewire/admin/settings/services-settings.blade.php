<div>
    <div class="d-flex">

        <div></div>
        <livewire:admin.components.side-nave active="settings" />
        <x-content>
            <livewire:admin.settings.components.top-nav active="services" />
            <div
                style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
                <div class="container my-5">

                    <div class="table-responsive" style="overflow-x: auto;">
                        <table class="table  table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">
                                        <div class="d-flex">
                                            <span class="flex-fill">Sell</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" role="switch" type="checkbox"
                                                    wire:click="toggleStatus({{ $formStatuses[4]->id }}, 'sell')"
                                                    {{ $formStatuses[4]->sell ? 'checked' : '' }} />
                                            </div>
                                        </div>

                                    </th>
                                    <th scope="col">
                                        <div class="d-flex">
                                            <span class="flex-fill">Buy</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" role="switch" type="checkbox"
                                                    wire:click="toggleStatus({{ $formStatuses[4]->id }}, 'buy')"
                                                    {{ $formStatuses[4]->buy ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    </th>
                                    <th scope="col">
                                        <div class="d-flex">
                                            <span class="flex-fill">Repair</span>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" role="switch" type="checkbox"
                                                    wire:click="toggleStatus({{ $formStatuses[4]->id }}, 'repair')"
                                                    {{ $formStatuses[4]->repair ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    </th>

                                    <!-- <th scope="col">-->
                                    <!--    <div class="d-flex">-->
                                    <!--        <span class="flex-fill">Accessories</span>-->
                                    <!--        <div class="form-check form-switch">-->
                                    <!--            <input class="form-check-input" role="switch" type="checkbox" wire:click="toggleStatus({{ $formStatuses[4]->id }}, 'accessories')" {{ $formStatuses[4]->accessories ? 'checked' : '' }} />-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</th>-->

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" role="switch" type="checkbox"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus({{ $formStatuses[0]->id }}, 'sell')"
                                                {{ $formStatuses[0]->sell ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Sell In
                                                Store</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus({{ $formStatuses[0]->id }}, 'buy')"
                                                {{ $formStatuses[0]->buy ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Buy in
                                                Store</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus({{ $formStatuses[0]->id }}, 'repair')"
                                                {{ $formStatuses[0]->repair ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Store
                                                Repair</label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus({{ $formStatuses[1]->id }}, 'sell')"
                                                {{ $formStatuses[1]->sell ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Post Your
                                                Device</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus({{ $formStatuses[1]->id }}, 'buy')"
                                                {{ $formStatuses[1]->buy ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Post My
                                                Device</label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckDefault1"
                                                    wire:click="toggleStatus({{ $formStatuses[1]->id }}, 'repair')"
                                                    {{ $formStatuses[1]->repair ? 'checked' : '' }} />
                                                <label class="form-check-label" for="flexSwitchCheckDefault1">Postal
                                                    Repair</label>
                                            </div>

                                            <!--add postal price method -->
                                            <div class="form-check form-switch">
                                                <input role="switch" type="checkbox" checked class="form-check-input"
                                                    wire:click="toggleCustomStatus">
                                                <p style="width: 167px;font-weight:bold">
                                                    {{ $customToggleStatus ? 'Delievry Charges: On' : 'Delievry Charges: Off' }}
                                                </p>

                                                </input>

                                            </div>



                                            <div>
                                                <div style="position: relative;">
                                                    <input type="text" placeholder="Enter Price in £"
                                                        wire:model="inputValue"
                                                        class="form-control mr-2 border-success"
                                                        style="width: 150px; height: 30px; display: inline-block; ">
                                                    <button class="btn btn-success rounded-pill"
                                                        wire:click="storeInput"
                                                        style="position: absolute; right: 0; top: 0; height: 100%; padding: 0 10px;">Save
                                                    </button>
                                                </div>


                                                @error('inputValue')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                                @php
                                                    $storedInputValue = Session::get('storedInputValue');
                                                @endphp
                                                @if ($storedInputValue)
                                                    <p style="font-size:0.8vw">Deleivry Charges For Postal Repair:
                                                        £{{ $storedInputValue }}</p>
                                                @endif
                                            </div>




                                            <!--ends here-->



                                        </div>
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus({{ $formStatuses[2]->id }}, 'sell')"
                                                {{ $formStatuses[2]->sell ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Collect My
                                                Device</label>
                                        </div>



                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            <!-- First element -->
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    id="flexSwitchCheckDefault1"
                                                    wire:click="toggleStatus({{ $formStatuses[2]->id }}, 'repair')"
                                                    {{ $formStatuses[2]->repair ? 'checked' : '' }} />
                                                <label class="form-check-label" for="flexSwitchCheckDefault1">Collect
                                                    My Device</label>
                                            </div>

                                            <!-- Second element -->
                                            <div class="form-check form-switch">
                                                <input role="switch" type="checkbox" checked
                                                    class="form-check-input" wire:click="toggleAnotherStatus">
                                                <p style="width: 167px;font-weight:bold">
                                                    {{ $anotherToggleStatus ? 'Delievry Charges: On' : 'Delievry Charges: Off' }}
                                                </p>

                                                </input>

                                            </div>



                                            <div>
                                                <div style="position: relative;">
                                                    <input type="text" placeholder="Enter Price in £"
                                                        wire:model="collectionRepairPriceInput"
                                                        class="form-control mr-2 border-success"
                                                        style="width: 150px; height: 30px; display: inline-block; ">
                                                    <button class="btn btn-success rounded-pill"
                                                        wire:click="storeCollectionRepairPrice"
                                                        style="position: absolute; right: 0; top: 0; height: 100%; padding: 0 10px; ">Save</button>
                                                </div>


                                                @error('collectionRepairPriceInput')
                                                    <span class="error">{{ $message }}</span>
                                                @enderror
                                                @php
                                                    $storedCollectionRepairPrice = Session::get(
                                                        'collectionRepairPrice',
                                                    );
                                                @endphp
                                                @if ($storedCollectionRepairPrice)
                                                    <p style="font-size:0.8vw">Delivery Charges For Collection Repair:
                                                        £{{ $storedCollectionRepairPrice }}</p>
                                                @endif
                                            </div>


                                            {{-- <button wire:click="toggleAnotherStatus">
                                                {{ $anotherToggleStatus ? 'Another Status: On' : 'Another Status: Off' }}
                                            </button> --}}

                                        </div>



                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault"
                                                wire:click="toggleStatus({{ $formStatuses[3]->id }}, 'repair')"
                                                {{ $formStatuses[3]->repair ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Fix At My
                                                Address</label>
                                        </div>







                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <livewire:payment-method-toggle />

        </x-content>





        <!-- File: resources/views/livewire/admin/settings/services-settings.blade.php -->




    </div>

    <div class="container d-flex justify-content-center">

        {{-- <div>
            <h2>Create a New Service Charge</h2>
            <form wire:submit.prevent="storeServiceCharge">
                <div>
                    <label for="serviceChargeName">Service Charge Name:</label>
                    <input type="text" id="serviceChargeName" wire:model="serviceChargeName"
                        placeholder="Enter service charge name" required>
                </div>
                <div>
                    <label for="serviceChargePrice">Price:</label>
                    <input type="number" step="0.01" id="serviceChargePrice" wire:model="serviceChargePrice"
                        placeholder="Enter price" required>
                </div>
                <div>
                    <label for="serviceChargeCharges">Is Active:</label>
                    <input type="checkbox" id="serviceChargeCharges" wire:model="serviceChargeCharges">
                </div>
                <button type="submit">Add Service Charge</button>
            </form>
        </div> --}}




        <!-- Include Bootstrap CSS in your HTML head section -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS for animations and styling -->
        <style>
            .fade-in {
                animation: fadeIn 1s ease-in-out;
            }

            .btn-primary {
                color: white;
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                }

                100% {
                    opacity: 1;
                }
            }

            .btn-primary:hover {
                animation: shake 0.5s;
                animation-iteration-count: 1;
            }

            @keyframes shake {
                0% {
                    transform: translate(1px, 1px) rotate(0deg);
                }

                10% {
                    transform: translate(-1px, -2px) rotate(-1deg);
                }

                20% {
                    transform: translate(-3px, 0px) rotate(1deg);
                }

                30% {
                    transform: translate(3px, 2px) rotate(0deg);
                }

                40% {
                    transform: translate(1px, -1px) rotate(1deg);
                }

                50% {
                    transform: translate(-1px, 2px) rotate(-1deg);
                }

                60% {
                    transform: translate(-3px, 1px) rotate(0deg);
                }

                70% {
                    transform: translate(3px, 1px) rotate(-1deg);
                }

                80% {
                    transform: translate(-1px, -1px) rotate(1deg);
                }

                90% {
                    transform: translate(1px, 2px) rotate(0deg);
                }

                100% {
                    transform: translate(1px, -2px) rotate(-1deg);
                }
            }
        </style>

        <div class="container my-4">
            <h2 class="mb-4">Service Charges</h2>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($serviceCharges as $serviceCharge)
                        <tr>
                            <td>{{ $serviceCharge->name }}</td>
                            <td>{{ $serviceCharge->price }}</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input"
                                        id="customSwitch{{ $serviceCharge->id }}"
                                        {{ $serviceCharge->charges ? 'checked' : '' }} disabled>
                                    <label class="custom-control-label"
                                        for="customSwitch{{ $serviceCharge->id }}"></label>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm"
                                    wire:click="startEdit({{ $serviceCharge->id }})">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($editingServiceChargeId)
                <div class="card mt-4 fade-in">
                    <div class="card-header bg-primary text-white">
                        <h3>Edit Service Charge</h3>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent="updateServiceCharge">
                            <div class="form-group">
                                <label for="serviceChargeName">Service Charge Name:</label>
                                <input type="text" class="form-control" id="serviceChargeName"
                                    wire:model="serviceChargeName" required>
                            </div>
                            <div class="form-group">
                                <label for="serviceChargePrice">Price:</label>
                                <input type="number" step="0.01" class="form-control" id="serviceChargePrice"
                                    wire:model="serviceChargePrice" required>
                            </div>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="serviceChargeCharges"
                                    wire:model="serviceChargeCharges">
                                <label class="custom-control-label" for="serviceChargeCharges">Is Active</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>

        <!-- Include Bootstrap JS and dependencies in your HTML before the closing body tag -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>







        {{--
        <div>
            <h2>Service Charges</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Active</th>
                        <th>Actions</th> <!-- New column for edit button -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($serviceCharges as $serviceCharge)
                        <tr>
                            <td>{{ $serviceCharge->name }}</td>
                            <td>{{ $serviceCharge->price }}</td>
                            <td>{{ $serviceCharge->charges ? 'Yes' : 'No' }}</td>
                            <td>
                                <!-- Edit button to start editing -->
                                <button wire:click="startEdit({{ $serviceCharge->id }})">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($editingServiceChargeId)
                <!-- Show edit form only when editing -->
                <div>
                    <h3>Edit Service Charge</h3>
                    <form wire:submit.prevent="updateServiceCharge">
                        <div>
                            <label for="serviceChargeName">Service Charge Name:</label>
                            <input type="text" id="serviceChargeName" wire:model="serviceChargeName" required>
                        </div>
                        <div>
                            <label for="serviceChargePrice">Price:</label>
                            <input type="number" step="0.01" id="serviceChargePrice"
                                wire:model="serviceChargePrice" required>
                        </div>
                        <div>
                            <label for="serviceChargeCharges">Is Active:</label>
                            <input type="checkbox" id="serviceChargeCharges" wire:model="serviceChargeCharges">
                        </div>
                        <button type="submit">Update</button>
                    </form>
                </div>
            @endif
        </div> --}}


    </div>

</div>



<!----------------------------- footer-------------------------->

<style>
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
        /* Adjust this value to set the desired gap */
    }
</style>
<div class="button-sticky container bg-blue d-lg-none d-md-none">
    <div class="row ">

        <div class="col-2  mt-4 ml-1">
            <a href="{{ route('payment-methods-settings') }}" class="text-white item "> Payment</a>


        </div>

        <div class="col-2  mt-4 ">
            <a href="{{ route('site-settings') }}" class="text-white  item "> site-settings</a>

        </div>

        <div class="col-2  mt-4 ">
            <a href="{{ route('branches-settings') }}" class="text-white  item "> Branches</a>
        </div>

        <div class="col-2 mt-4">
            <a href="{{ route('create-branches') }}" class="text-white  item ">Create</a>
        </div>
        <div class="col-2 mt-4">
            <a href="{{ route('services-settings') }}" class="text-white  item ">Services</a>
        </div>
    </div>
</div>
