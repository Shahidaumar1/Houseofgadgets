<div>
    <style>
        .container {
            margin-top: 80px !important;
        }

        /* Make all text inside the grey card readable (silver) */
        .bg-gray,
        .bg-gray .form-label,
        .bg-gray .alert,
        .bg-gray .error {
            color: #c0c0c0 !important;
            /* silver */
        }

        /* Inputs ke andar ka text + placeholders */
        .bg-gray .form-control {
            color: #c0c0c0 !important;
            /* typed text */
        }

        .bg-gray .form-control::placeholder {
            color: #b8c0c7 !important;
            /* placeholder silver-ish */
            opacity: 1;
            /* ensure visible */
        }

        /* Optional: headings inside this container, if any */
        .bg-gray h1,
        .bg-gray h2,
        .bg-gray h3,
        .bg-gray h4,
        .bg-gray h5,
        .bg-gray h6 {
            color: #c0c0c0 !important;
        }

        /* Labels (inputs ke upar wala text) ko grey/silver karo */
        .bg-gray label,
        .bg-gray .form-label,
        .bg-gray .form-check-label {
            color: #c0c0c0 !important;
            /* same silver jo inputs ke liye use kiya */
            font-weight: 600;
        }

        /* Agar headings ya small captions hon */
        .bg-gray .form-text,
        .bg-gray .help-text,
        .bg-gray .col-form-label {
            color: #c0c0c0 !important;
        }
    </style>
<livewire:components.mega-nav />
    <div class="container  bg-gray rounded-4 p-5 mt-5  mb-5">
        <!-- Livewire form to collect customer information -->


        <form wire:submit.prevent="sendCustomerEmail">
            <!-- Form fields for customer information -->

            <!-- Additional Input Boxes for Brand and Model -->
            <div class="row">

                <div class="container col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="brand">Brand:</label>
                        <input class="form-control" type="text" id="brand" wire:model="brand"
                            placeholder="Enter brand">
                        @error('brand')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="model">Model:</label>
                        <input class="form-control" type="text" id="model" wire:model="model"
                            placeholder="Enter model">
                        @error('model')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label" for="additionalDescription">Additional
                            Information:</label>
                        <textarea class="form-control" class="form-control" id="additionalDescription" wire:model="additionalDescription"
                            placeholder="Enter additional information"></textarea>
                        @error('additionalDescription')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>




                <div class="container col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="otherText">Additional Information:</label>
                        <textarea class="form-control" id="otherText" wire:model="otherText" placeholder="Enter additional information"></textarea>
                        @error('otherText')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


            </div>


            <div class="row mt-5">

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="firstName">First Name:</label>
                        <input class="form-control" type="text" id="firstName"
                            wire:model="firstName" required placeholder="Enter your first name">
                        @error('firstName')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="lastName">Last Name:</label>
                        <input class="form-control" type="text" id="lastName"
                            wire:model="lastName" required placeholder="Enter your last name">
                        @error('lastName')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="phone">Phone:</label>
                        <input class="form-control" type="text" id="phone"
                            wire:model="phone" required placeholder="Enter your phone number">
                        @error('phone')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="email">Email:</label>
                        <input class="form-control" type="email" id="email"
                            wire:model="email" required placeholder="Enter your email">
                        @error('email')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="productName">Confirm Email</label>
                        <input class="form-control" type="email" id="productName"
                            wire:model="productName" required
                            placeholder="Enter the product name">
                        @error('productName')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>




                    {{-- <div>
                                            <label class="form-label" for="productDescription">Additional Info:</label>
                                            <textarea class="form-control" id="productDescription" wire:model="productDescription"
                                                placeholder="Describe More About YourSelf"></textarea>
                                            @error('productDescription')
                                                <span class="error">{{ $message }}</span>
                    @enderror
                </div> --}}



                <!--<div>-->
                <!--    <label class="form-label">Are you an existing customer?</label>-->
                <!-- Use Flexbox for close alignment -->
                <!--    <div style="width: 20%; display: flex; align-items: center; gap: 5px; ">-->
                <!-- Smaller gap -->
                <!--        <input class="form-check-input" type="radio"-->
                <!--            id="existingCustomerYes" name="existingCustomer" value="yes"-->
                <!--            wire:model="existingCustomer">-->
                <!--        <label class="form-check-label" for="existingCustomerYes">Yes</label>-->
                <!-- Label close to radio button -->

                <!--        <input class="form-check-input ms-5" type="radio"-->
                <!--            id="existingCustomerNo" name="existingCustomer" value="no"-->
                <!--            wire:model="existingCustomer">-->
                <!--        <label class="form-check-label ms-5" for="existingCustomerNo">No</label>-->
                <!-- Label close to radio button -->
                <!--    </div>-->

                <!--    @error('existingCustomer')-->
                <!--        <span class="error">{{ $message }}</span>-->
                <!--    @enderror-->
                <!--</div>-->


                <!--<div>-->
                <!--    <label class="form-label">Are you a business?</label>-->
                <!--    <div style="width: 20%; display: flex; align-items: center; gap: 5px;">-->
                <!-- Minimal gap -->
                <!--        <input class="form-check-input" type="radio" id="isBusinessYes"-->
                <!--            name="isBusiness" value="yes" wire:model="isBusiness">-->
                <!--        <label for="isBusinessYes">Yes</label>-->

                <!--        <input class="form-check-input ms-5" type="radio" id="isBusinessNo"-->
                <!--            name="isBusiness" value="no" wire:model="isBusiness">-->
                <!--        <label class="ms-5" for="isBusinessNo">No</label>-->
                <!--    </div>-->

                <!--    @error('isBusiness')-->
                <!--        <span class="error">{{ $message }}</span>-->
                <!--    @enderror-->
                <!--</div>-->


            </div>

    </div>



    <!-- Checkboxes for user selection -->



    <!-- Submit Button -->
    <div class="d-flex justify-content-center mt-5" style="margin-bottom:10px;">
        <button class="btn btn-danger text-white rounded-pill" type="submit">Ask For
            Qoute</button>
        <!-- Button to submit the form -->
    </div>



    </form>

    <!-- Display success message when the email is sent -->
    @if (session()->has('emailSent'))
    <div class="alert alert-success" role="alert">
        Email sent successfully!
    </div>
    @endif

    <!-- Display error message if email sending failed -->
    @if (session()->has('emailSendFailed'))
    <div class="alert alert-danger" role="alert">
        Email sending failed: {{ session('emailSendFailed') }}
    </div>
    @endif


</div>