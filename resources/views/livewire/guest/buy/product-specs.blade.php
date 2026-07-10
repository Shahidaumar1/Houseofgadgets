<div>
    <livewire:components.top-bar />
    <livewire:components.mega-nav />
    
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
    </style>


  <div class="d-none d-md-block" style="display: flex; justify-content: center; align-items: center; margin: 0;">
    <div class="container mt-3" style="text-align: center;">
        <ul class="breadcrumb-thread d-flex justify-content-center" id="form-navigation" style="padding: 0; list-style: none;">
            <li class="breadcrumb-item" style="margin: 0 10px;">
                <a href="#" data-step="0">Product Info</a>
            </li>
            <li class="breadcrumb-item" style="margin: 0 10px;">
                <a href="#" data-step="1">Select Condition</a>
            </li>
            <li class="breadcrumb-item" style="margin: 0 10px;">
                <a href="#" data-step="2">Personal Detail</a>
            </li>
            <li class="breadcrumb-item" style="margin: 0 10px;">
                <a href="#" data-step="3">Book Repair</a>
            </li>
        </ul>
    </div>
</div>



    <section id="product-info-section" class="form-step"  >
  <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6 p-5 mt-5 text-center">
                    @if (json_decode($product_spec_image) === null)
                        <!-- Display single image -->
                        <img src="{{ $product_spec_image ?? $model->file }}" class="img-fluid"
                            style="min-width: 75%; max-height: 480px;">
                    @else
                        <!-- Display image slider for multiple images -->
                        <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach (json_decode($product_spec_image) as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }} text-center">
                                        <img src="{{ $image }}" class="img-fluid"
                                            style="min-width: 75%; max-height: 480px;" alt="Image {{ $index + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev text-bg-danger" type="reset"
                                data-bs-target="#imageSlider" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next text-bg-danger" type="reset"
                                data-bs-target="#imageSlider" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    @endif
                </div>

                <div class="col-lg-6">
                    <div class="mt-4 text-center">
                        <h6 class="fs-2 fw-bold">Please select specifications </h6>
                        <p class="text-danger">(This enables us to offer you a preliminary estimate.)</p>
                    </div>

                    <div class="mt-5">
                        <p class="fs-3 fw-bold">{{ $model->name }}</p>

                        @if (!empty($available_memory_sizes))
                            <p class="fs-6 fw-bold">Select Memory Size:</p>
                            <div class="d-flex gap-2">
                                @foreach ($available_memory_sizes as $memory_size)
                                    <button type="reset"
                                        class="btn btn-outline-danger {{ $memory_size == $selectedMemorySize ? 'bg-danger text-white' : '' }}"
                                        wire:click="$set('selectedMemorySize', '{{ $memory_size }}')">
                                        {{ $memory_size }}
                                    </button>
                                @endforeach
                            </div>
                        @endif

                        <p class="fs-5 mt-3 fw-bold">Select Grade:</p>
                        <div class="d-flex gap-2">
                            @foreach ($available_grades as $grade)
                                <button type="reset"
                                    class="btn btn-outline-dark {{ $grade == $selectedGrade ? 'bg-danger text-white' : '' }}"
                                    wire:click="$set('selectedGrade', '{{ $grade }}')">
                                    {{ $grade }}
                                </button>
                            @endforeach
                        </div>

                        @if (!empty($available_colors))
                            <p class="fs-5 mt-3 fw-bold">Color:</p>
                            <div class="d-flex gap-2">
                                @foreach ($available_colors as $color)
                                    <button type="reset"
                                        class="btn btn-outline-dark {{ $color == $selectedColor ? 'bg-danger text-white' : '' }}"
                                        wire:click="$set('selectedColor', '{{ $color }}')">
                                        {{ $color }}
                                    </button>
                                @endforeach
                            </div>
                        @endif

                        <div class="mt-3">
                            <label for="quantity">Quantity: only {{ $available_quantity }} Available</label>
                            <div class="input-group mt-2" style="max-width: max-content;">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-danger"
                                        wire:click="decreaseQuantity">-</button>
                                </div>
                                <input type="number" class="form-control border-0 text-center"
                                    wire:model="quantity" min="1" max="{{ $available_quantity }}" step="1"
                                    wire:change="quantityChanged">
                                <div class="input-group-append">
                                    <button type="reset" class="btn btn-success"
                                        wire:click="increaseQuantity">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="accordion mt-4">
                            <div class="accordion-item" x-data="{ openTab: 1 }">
                                <div class="accordion-header bg-gray p-2 cursor-pointer"
                                    x-on:click="openTab === 1 ? openTab = 0 : openTab = 1">
                                    <span class="fw-bold">Details</span>
                                    <i x-show="openTab !== 1" class="fa fa-plus"></i>
                                    <i x-show="openTab === 1" class="fa fa-minus"></i>
                                </div>
                                <div class="accordion-content" x-show="openTab === 1">
                                    {!! $detail ?? '' !!}
                                </div>
                            </div>

                            <div class="accordion-item" x-data="{ openTab: 2 }">
                                <div class="accordion-header bg-gray p-2 cursor-pointer"
                                    x-on:click="openTab === 2 ? openTab = 0 : openTab = 2">
                                    <span class="fw-bold">Specification</span>
                                    <i x-show="openTab !== 2" class="fa fa-plus"></i>
                                    <i x-show="openTab === 2" class="fa fa-minus"></i>
                                </div>
                                <div class="accordion-content" x-show="openTab === 2">
                                    {!! $specification ?? '' !!}
                                </div>
                            </div>

                            <div class="accordion-item" x-data="{ openTab: 3 }">
                                <div class="accordion-header bg-gray p-2 cursor-pointer"
                                    x-on:click="openTab === 3 ? openTab = 0 : openTab = 3">
                                    <span class="fw-bold">Warranty</span>
                                    <i x-show="openTab !== 3" class="fa fa-plus"></i>
                                    <i x-show="openTab === 3" class="fa fa-minus"></i>
                                </div>
                                <div class="accordion-content" x-show="openTab === 3">
                                    {!! $warranty ?? '' !!}
                                </div>
                            </div>
                        </div>


                        <div class="p-2 fs-5 text-danger fw-bold mt-4" id="cashText">
                            <h2 style="white-space: nowrap;">Cash Value: £ {{ $price ?? 0 }}.00</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="form-toggle-section" class="form-step pt-5" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="rounded p-4">
                        <livewire:guest.components.form-toggle :data="$data" :key="uniqid()" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="patient-detail-section" class="form-step" style="display: none;">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="rounded p-4">
            <livewire:guest.components.patient-detail-form :key="uniqid()" />
               </div>
              </div>
             </div>
        </div>
    </section>

    <section id="booking-section" class="form-step" style="display: none;">
        <div class="container" wire:ignore>
            <livewire:guest.buy.book-repair :data="$data" :key="uniqid()" />
        </div>
    </section>

   
       
             <div class="container mt-3" style="position: relative;">
    <div class="d-flex justify-content-between">
        <!--<button type="reset" id="back-button" class="btn " style="display: block;"><img src="https://ik.imagekit.io/b6iqka2sz/prev.png?updatedAt=1719938010352" style="width: 150px; height: auto; margin-left: auto;"></button>-->
      
        <button id="next-button" type="reset" class="button-27 " role="button" style="width: 150px; height: auto; margin-left: auto;"> Next </button>
    
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function () {
    const steps = ['#product-info-section', '#form-toggle-section', '#patient-detail-section', '#booking-section'];
    let currentStep = 0;
    let formCompleted = [true, false, false, true];

    function showStep(stepIndex) {
        steps.forEach((step, index) => {
            $(step).toggle(index === stepIndex);
        });

        // Show or hide navigation buttons based on step index
        $('#back-button').toggle(stepIndex === steps.length - 1 || stepIndex === 2 ); // Show only on the last step
        $('#next-button').toggle(stepIndex === 0 ); // Show only on steps 0 and 2

        // Update breadcrumb navigation
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
        if (formCompleted[currentStep]) {
            Livewire.emit('formSubmitted', currentStep);
        } else {
            alert('Please complete the current step.');
        }
    });

    Livewire.on('formSubmitted', function (stepIndex) {
        formCompleted[stepIndex] = true;
        moveToNextStep();
    });

    Livewire.on('formInvalid', function (stepIndex) {
        formCompleted[stepIndex] = false;
        showStep(currentStep);
    });

    // Handle breadcrumb clicks
    $('#form-navigation .breadcrumb-item a').click(function (e) {
        e.preventDefault();
        const stepIndex = $(this).data('step');
        if (stepIndex !== currentStep) {
            currentStep = stepIndex;
            showStep(currentStep);
        }
    });

    showStep(currentStep);
});


    </script>

</div>


      