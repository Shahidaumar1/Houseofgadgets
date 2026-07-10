<div>
 <livewire:components.mega-nav theme="white" />



    
    
    
    <style>
            .breadcrumb-thread {
            
            display: flex;
            flex-wrap: wrap;
            padding-top: 100px;
            padding-bottom: 50px;
            margin-bottom: 1rem;
            list-style: none;
            background-color: transparent;
            border-radius: .25rem;
        }
        .breadcrumb-thread .breadcrumb-item {
            display: flex;
            align-items: center;
            position: relative;
        }
        .breadcrumb-thread .breadcrumb-item + .breadcrumb-item::before {
            content: '';
            width: 20px;
            height: 2px;
            background-color: #6c757d;
            position: absolute;
            left: -21px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
        }
        .breadcrumb-thread .breadcrumb-item a {
      color: #007bff;
      text-decoration: none;
      padding: 0.5rem 1rem;
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
       border-radius: 9999px 9999px 9999px 9999px;
      position: relative;
      z-index: 2;
      color:black;
    }
        .breadcrumb-thread .breadcrumb-item a:hover {
            color: #dc3545;
            text-decoration: none;
            border: 1px solid #dc3545;
        }
        .breadcrumb-thread .breadcrumb-item a.active {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        
        @media (max-width: 768px) {
        .breadcrumb-thread {
            padding-top: 50px;
            padding-bottom: 30px;
        }
        .breadcrumb-thread .breadcrumb-item a {
            padding: 5px 5px;
            font-size: 10px;
        }
        .breadcrumb-thread .breadcrumb-item + .breadcrumb-item::before {
            width: 10px;
            height: 1px;
        }
    }
        
        
    </style>
     <div class="" style=" justify-content: center; align-items: center;  margin: 0;">
     <div class="container mt-3" style="text-align: center;">
    <ul class="breadcrumb-thread" id="form-navigation" style="list-style: none; padding: 0; display: inline-flex; justify-content: center; align-items: center;">
      <li class="breadcrumb-item" style="margin: 0 10px;">
        <a href="#" data-step="0">Select Option</a>
      </li>
      <li class="breadcrumb-item" style="margin: 0 10px;">
        <a href="#" data-step="1">Selling Option</a>
      </li>
      <li class="breadcrumb-item" style="margin: 0 10px;">
        <a href="#" data-step="2">Personal Detail</a>
      </li>
      <li class="breadcrumb-item" style="margin: 0 10px;">
        <a href="#" data-step="3">Book Your Order</a>
      </li>
    </ul>
  </div>
        <!-- Multi-step Form Sections -->
        <div class="container mt-5" id="multi-step-form">
            <!-- Product Info Section -->
            <section id="product-info-section" class="form-step">
                
                <div class="container mt-5 ">
                    <div class="row">
                        <h6 class="text-center fs-1 fw-bold">Sell {{ $model->name }}</h6>


                        <!-- Parent View -->


                        <p class="text-center text-danger">(This enables us to offer you a preliminary estimate.)</p>
                        <div class="col-lg-6 p-5 mt-5">
                            <img src="{{ $product_spec_image ?? $model->file }}" class="img-fluid"
                                alt="Responsive Image" style="max-height: 380px;">
                        </div>

                        {{-- <div class="col-lg-6">
                            <img src="{{ $product_spec_image ?? $model->file }}" height="300px; width:300px">
                        </div> --}}
                        @php
                            $product_specs = App\Models\ProductSpec::where('model_id', $model->id)->get();
                        @endphp
                        <div class="col-lg-6  p-5 ">
                            <div>
                                @if (in_array(!null, $available_memory_sizes))
                                    <p class="fs-6 fw-bold">Select Memory Size:</p>
                                @endif

                                @forelse($available_memory_sizes as $memory_size)
                                    @if ($memory_size != null)
                                        <button type="button"
                                            class="btn btn-outline-danger {{ $memory_size == $selectedMemorySize ? 'bg-danger text-white' : '' }}"
                                            wire:click="$set('selectedMemorySize','{{ $memory_size }}')">{{ $memory_size }}</button>
                                    @endif
                                @empty
                                @endforelse

                                <div>
                                    @php
                                        // Define the custom order
                                        $customOrder = ['Excellent', 'Good', 'Fair', 'Poor', 'Faulty'];
                                        // Sort the grades array based on the custom order
                                        usort($available_conditions, function ($a, $b) use ($customOrder) {
                                            return array_search($a, $customOrder) - array_search($b, $customOrder);
                                        });
                                    @endphp
                                    <p class="fs-6 mt-3 fw-bold">Select Condition:</p>
                                    <div class="d-flex  gap-2 border-0  align-items-center" style="margin-bottom: -7px">
                                        @forelse($available_conditions as $condition)
                                            <label
                                                class=" cursor-pointer px-3  py-2 rounded-top border border-2  {{ $condition == $selectedCondition ? '  bg-gray text-black' : '' }} "
                                                wire:click="$set('selectedCondition','{{ $condition }}')">
                                                {{ $condition }}
                                            </label>

                                        @empty
                                        @endforelse
                                    </div>



                                    @if ($selectedCondition)
                                        <div class="bg-gray border-0 text-black  rounded p-2 mt-1   ">
                                            {!! $condition_text !!}
                                        </div>
                                    @endif

                                    <div class="mt-3">

                                        @if ($mobileMode || $tabletMode)
                                                                                @php
                                                                                    $network_images = [
                                                                                        'Vodafone' =>
                                                                                            'https://upload.wikimedia.org/wikipedia/commons/f/ff/Logo_vodafone_new.png',
                                                                                        'o2' => 'https://cdn2.downdetector.com/static/uploads/logo/O2-logo.jpg',
                                                                                        'Smarty' =>
                                                                                            'https://media.product.which.co.uk/prod/images/original/gm-9642cb8d-b24b-4ce6-afd6-cfac01256877-smarty.jpg',
                                                                                        'EE' =>
                                                                                            'https://c8.alamy.com/comp/EFEKFE/ee-logo-or-sign-for-mobile-network-operator-and-internet-provider-EFEKFE.jpg',
                                                                                        'Asda' =>
                                                                                            'https://media.product.which.co.uk/prod/images/original/gm-99fb2e68-49d9-4b68-be97-57f35c5e8314-asda-mobile.jpg',
                                                                                        'Tesco' =>
                                                                                            'https://media.product.which.co.uk/prod/images/original/gm-989813fb-0b40-4582-a0e8-2ab7a437429e-tesco-mobile.jpg',
                                                                                    ];
                                                                                @endphp
                                                                                

                                                                                {{-- <div class="col-lg-6 p-5">
                                                                                    <div>
                                                                                        @if (count($network_providers) > 0)
                                                                                        <p class="fs-6 fw-bold">Select Network:</p>
                                                                                        @endif

                                                                                        @forelse($network_providers as $network)
                                                                                        <button type="button"
                                                                                            class="btn btn-outline-primary {{ $network == $selectedNetwork ? 'bg-primary text-white' : '' }}"
                                                                                            wire:click="selectNetwork('{{ $network }}')">
                                                                                            {{ $network }}
                                                                                        </button>
                                                                                        @empty
                                                                                        <p>No networks available for the selected memory size and condition</p>
                                                                                        <!-- Fallback message -->
                                                                                        @endforelse
                                                                                    </div>
                                                                                </div> --}}

                                                                                {{-- <tr>
                                                                                    <th>Network/unlocked</th>
                                                                                    <td>
                                                                                        <div class="form-check form-switch">
                                                                                            <input type="checkbox" role="switch"
                                                                                                class="form-check-input border border-dark"
                                                                                                wire:model="network_unlocked" id="{{ $rand . 'nu' }}" />
                                                                                        </div>
                                                                                    </td>
                                                                                </tr> --}}
                                                                                <!--<tr>-->
                                                                                <!--    <th>Account/cleared</th>-->
                                                                                <!--    <td>-->
                                                                                <!--        <div class="form-check form-switch">-->
                                                                                <!--            <input type="checkbox" role="switch"-->
                                                                                <!--                class="form-check-input border border-dark"-->
                                                                                <!--                wire:change="toggleAccountCleared" id="{{ $rand . 'ac' }}" />-->
                                                                                <!--        </div>-->
                                                                                <!--    </td>-->
                                                                                <!--</tr>-->
                                        @endif

                                        <div class="mt-3 mb-1">
                                            <div class=" mt-5 d-flex align-items-end flex-column  mb-3">
                                                <div class="text-center" id="cashText">
                                                    <h2 class=" text-danger fw-bold">Cash Value: £ {{ $price }}.00</h2>
                                                    <small>select device specification above to see price</small>
                                                </div>
                                                <div class="p-2 fs-3 fw-bold text-secondary ">
                                                    {{-- <strong>Gift e-card up to: $467.50</strong> --}}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </section>

            <!-- Form Toggle Section -->
            <section id="form-toggle-section" class="form-step" style="display: none;">
                   <div class="container">
                <div class="row">
                    <!-- Form Toggle Column -->
                    <div class="col-lg-12">
                       <div class="rounded p-4" style="background-color:white; ">
  <livewire:guest.components.form-toggle :data="$data" :key="uniqid()" />
</div>

                    </div>
                </div>
            </div>
            </section>

            <!-- Patient Detail Section -->
            <section id="patient-detail-section" class="form-step" style="display: none;">
              <div class="container">
                <div class="row ">
                    <!-- Patient Detail Form Column -->
                    <div class=" col-lg-12 ">
                        <div class="rounded p-4">
                            <livewire:guest.components.patient-detail-form :key="uniqid()" />
                        </div>
                    </div>
                </div>
            </div>
            </section>

            <!-- Booking Section -->
            <section id="booking-section" class="form-step" style="display: none;">
                <livewire:guest.sell.booking-form />
            </section>
        </div>

        <!-- Next and Back Buttons -->
        <div class="container mt-3" style="position: relative;">
    <div class="d-flex justify-content-between">
        <!--<button type="reset" id="back-button" class="btn " style="display: block;"><img src="https://ik.imagekit.io/b6iqka2sz/prev.png?updatedAt=1719938010352" style="width: 150px; height: auto; margin-left: auto;"></button>-->
      
        <button id="next-button" type="reset" class="button-27 " role="button" style="width: 150px; height: auto; margin-left: auto;"> Next </button>
    
    </div>
</div>
    </div>

    <!-- JavaScript for Form Navigation -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            const steps = ['#product-info-section', '#form-toggle-section', '#patient-detail-section', '#booking-section'];
            let currentStep = 0;
            let formCompleted = [true, false, false, true]; // Initialize with `false` for all steps

            function showStep(stepIndex) {
                $('.form-step').hide(); // Hide all form steps
                $(steps[stepIndex]).show(); // Show the current step

                // Show "Next" button only in the first section
                $('#next-button').toggle(stepIndex === 0);

                // Show "Back" button in the second-to-last and last sections
                $('#back-button').toggle(stepIndex === steps.length - 1 || stepIndex === steps.length - 2);
                 // Update navigation bar
                $('#form-navigation .breadcrumb-item a').removeClass('active');
                $('#form-navigation .breadcrumb-item a[data-step="' + stepIndex + '"]').addClass('active');

            }

            function moveToNextStep() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            }

            $('#back-button').click(function () {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            $('#next-button').click(function () {
                // Check if form is completed for the current step
                if (formCompleted[currentStep]) {
                    moveToNextStep(); // Move to the next step
                } else {
                    alert('Please complete the current step.'); // Display validation message
                }
            });

            // Livewire event: Form submission completed successfully
            Livewire.on('formSubmitted', function () {
                formCompleted[currentStep] = true;
                moveToNextStep();
            });

            // Livewire event: Form submission failed validation
            Livewire.on('formInvalid', function () {
                formCompleted[currentStep] = false;
                showStep(currentStep); // Show current step again on validation failure
            });

            // Initial display setup
            showStep(currentStep);
        });
    </script>

    </script>
    <!-- Livewire Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/livewire/2.x/livewire.js"></script>
    <script src="https://kit.fontawesome.com/09d3c3a997.js" crossorigin="anonymous"></script>

    <!-- Livewire Scripts -->

</div>