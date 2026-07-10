<div class="">

   @php
    use App\Models\PaymentMethod;
    $paymentMethods = PaymentMethod::where('is_enabled', true)->get();

    // Check for specific payment methods
    $hasBuyPayPal = $paymentMethods->where('name', 'Repair_PayPal')->isNotEmpty();
    $hasBuyStripe = $paymentMethods->where('name', 'Repair_Stripe')->isNotEmpty();
    $hasBuyKlarna = $paymentMethods->where('name', 'Repair_Klarna')->isNotEmpty();
    $hasBuyPayAtStore = $paymentMethods->where('name', 'Repair_Pay_at_Store')->isNotEmpty();
    @endphp



    @if ($data['service'] == \App\Helpers\ServiceType::REPAIR)
    @endif






    {{-- @php
        if ($data['service'] == \App\Helpers\ServiceType::REPAIR) {
            $price = $data['repair_priece'];
        } else {
            $price = $data['price'];
        }
    @endphp --}}



    <div>


    @php

        $form_name = 'Fix at my address';
        $paywithcardtext = "Buy at store";
    @endphp

 @if (session('form_type') == 'postal_form')
    @php
        $form_name = 'Post Your Device';
        $paywithcardtext = 'I’ll Pay after Repair'

    @endphp
                                                
   @endif
                     

@if (session('form_type') == 'collection_form')
    @php
        $form_name = 'We Collect Your Device';
                $paywithcardtext = 'I’ll Pay after Repair'

    @endphp
 @endif
                       
@if (session('form_type') == 'clinic_form')
    @php
        $form_name = 'Buy at store';
                $paywithcardtext = 'Buy at store'
    @endphp


@endif

@if (session('form_type') == 'fix_form')
    @php
        $form_name = 'Fix at Your Location';
                $paywithcardtext = 'I’ll Pay after Repair'

    @endphp
@endif


        @php
            if ($data['service'] == \App\Helpers\ServiceType::REPAIR) {
                $price = \App\Models\Price::findPrice($data['repair_type']['id'], $data['modal']['id']);
            }
        @endphp
        <div class=" ">

            <div class="row mx-5">

                @if ($data['service'] == \App\Helpers\ServiceType::REPAIR)
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" checked disabled>
                        <label class="form-check-label">
                            {{ $data['modal']['name'] }} {{ $data['repair_type']['name'] }}: £ {{ $price ? $price : 0 }}
                        </label>
                    </div>
                @endif

                <div>
 @if (session('form_type') == 'postal_form')



                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" checked disabled />
                            <label class="form-check-label">
                                Surcharge for UK return delivery : £ 9

                            </label>
                        </div>
                    @endif
                </div>

                <div class="my-3" wire:ignore>
                    {{-- @php
                        if ($data['service'] == \App\Helpers\ServiceType::REPAIR) {
                            $price = $data['repair_priece'];
                        } else {
                            $price = $data['price'];
                        }
                    @endphp --}}

                </div>


                <div class="row">
                    <div class="col-9">
                        <x-alert />
                    </div>
                </div>


            </div>

        </div>
    </div>




    <div class = "container mb-5">
  <h2 class="text-center" style="color: red;">How would you like to Pay</h2>

        <div class="row">


<div class="col-md-5">
            

                <div  class="container">

                    <table class="table table-striped border"  style="position:relative;top:5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
                        <thead>



                            <tr>
                                <th colspan="2" class="text-center text-danger fw-bolder fs-3">Buy Summary</th>
                                <!-- Center-aligned heading -->
                            </tr>



                            <tr>

                                <td scope="col">Model</td>
                                <td style="white-space: nowrap;" class="text-end" scope="col">
                                    {{ $data['modal']['name'] }}</td>

                            </tr>
                        </thead>
                        <tbody>
                            <tr class="justify-content-between

">

                                <td>Type</td>
                                <td class="text-end">
                                    @if (session('form_type') == 'postal_form')
                                        Post Your Device
                                    @else
                                        Buy In Store
                                    @endif
                                </td>

                            </tr>



                          











                            <tr>

                                <th scope="col">Total Price</th>
                                <th class="text-end" scope="col">£{{ $price ?? 0 }}</th>

                            </tr>

                        </tbody>
                    </table>
                </div>


            </div>


            <div class="col-md-7  pt-4 mb-3"  style="
                                   height: 100%;
                                   gap: 0px;
                                   border-radius: 10px 10px 10px 10px;
                                   opacity: 0px;
                                   border: 2px solid #EA1555;">
                                
                   <p class="text-center mt-3"
                                    style="font-family: Manrope;
                                       font-size: 18px;
                                       font-weight: 700;
                                       line-height: 40px;
                                       letter-spacing: -0.01em;
                                       text-align: center;">Select your payment option </p>

                <div class=" p-1  ">
                    <div class="container p-1">
                        <div class="accordion" id="payment-accodoion">


                            {{-- pay with card starts from here  --}}
                            @if ($form_type =='clinic_form')
                            <div class="accordion-item"   style="border: 1px solid #EA1555; width:100%;">
                                <h2 wire:click="changePm('drop_at')" class="accordion-header" id="headingOne">
                                  <button class="accordion-button d-flex justify-content-between align-items-center collapsed" style="border:!important;box-shadow: none !important;" type="button" aria-expanded="true" aria-controls="collapseOne">
    <label class="form-check-label d-flex align-items-center mb-0" for="flexCheckIndeterminate">
        <input type="radio" name="radio-payment" style=" width: 19px;height: 17px; font-size: 1.3rem;accent-color:#EA1555;"checked>
        <p class="mb-0 ms-2" style="font-size: 1.4rem;">{{$paywithcardtext}}</p>
    </label>
    <p class="mb-0" style="font-size: 1.3rem; color:red;">£{{ $price ? $price : 0 }}</p>
</button>

                                </h2>


                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#payment-accordion">
                                    <div class="accordion-body" style="padding-top: 0px;">
                                        <div class="container">
                                            <div class="d-felx" style="gap: 10px;">

                                                <div class>
                                                    @if ($pm == 'drop_at')
                                                        <p>Pay at store when you visit our location below</p>
                                                        <p class> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                                            </svg> {{ $name }}, {{ $address_line_1 }},
                                                            {{ $address_line_2 }}{{ $address_line_2 != '' ? ', ' : '' }}
                                                            {{ $town_city }}, {{ $post_code }}</p>
                                                </div>

                                                <div class="details-con">
                                                    <p class><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-envelope"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                                        </svg> {{ $email }}</p>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <p> <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor"
                                                            class="bi bi-telephone-forward" viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708" />
                                                        </svg> {{ $landline_number }}</p>


                                                    {{-- <button class="btn btn-success" type="button"
                                                        wire:click="BuyDevice">Submit</button>
                                       --}}

                                                    <div class="d-flex justify-content-between">
                                                        <button class="btn btn-success" type="button"
                                                            wire:click="BuyDevice" id="submitButton">
                                                            Submit
                                                        </button>


                                                    </div>





                                                    <script>
                                                        document.getElementById('submitButton').addEventListener('click', function() {
                                                            // Get the button element
                                                            var button = this;

                                                            // Add spinner to button
                                                            button.innerHTML =
                                                                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...';

                                                            // Simulate a delay (e.g., waiting for an async process to complete)
                                                            setTimeout(function() {
                                                                // Remove spinner after a delay (simulating completion of a process)
                                                                button.innerHTML = 'Submit'; // Reset to original text
                                                            }, 3000); // Delay of 3 seconds
                                                        });
                                                    </script>
                                                    <script>
                                                        document.getElementById('submitButton').addEventListener('click', function() {
                                                            alert('Your order has been confirmed.');
                                                        });
                                                    </script>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
@endif


                            {{-- pay with card ends here  --}}

                            <div class="accordion-item" style="border: 1px solid #EA1555; width:100%;">
                                <h2 wrie:click="changePm('stripe')" class="accordion-header " id="headingTwo">
                                   <button style="padding-bottom: 3px;" class="accordion-button collapsed d-flex justify-content-between align-items-center"
                                   style="border:!important;box-shadow: none !important;"
                                   type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" onclick="handleRadio(this)">
    <div class="d-flex align-items-center" style="margin-bottom:10px">
        <input type="radio" name="radio-payment" style="height: 18px; width: 20px; margin-right: 10px;accent-color:#EA1555;">
        <p class="mb-0" style="font-size: 1.3rem; margin-right: 10px;">Pay with card</p>
           <img src="https://ik.imagekit.io/4csyk445b/2560px-Stripe_Logo__revised_2016%205.png?updatedAt=1711551636602" alt="" style="height: 31px; margin-right: 10px;">
    </div>
 
    <p class="mb-0" style="font-size: 1.3rem; color:red;">£{{ $price ?? 0 }}</p>
</button>

                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#payment-accodoion">
                                    <div class="accordion-body " style="padding-top: 0px;">
                                        <div class="container">
                                            <div class="accordion-body p-0">
                                                <p style="font-size:15px;" class="text-center">Securely pay with your
                                                    card using Stripe for hassle-free transactions!</p>

                                                <div class="d-flex justify-content-center pt-3">
                                                    <livewire:payment-methods.stripe :price="$price" color="success"
                                                        service="Buy" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item"  style="border: 1px solid #EA1555; width:100%;">
                                <h2 wire:click="changePm('paypal')" class="accordion-header" id="headingthree">
                        <button style="padding-bottom: 0px; width: 100%; text-align: left;border:!important;box-shadow: none !important;" class="accordion-button collapsed d-flex justify-content-between" type="button" aria-expanded="true" aria-controls="collapsethree" onclick="handleRadio(this)">
    <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
        <div style="display: flex; align-items: center;">
            <input type="radio" name="radio-payment" style="width: 19px; height: 17px; font-size: 1.3rem; margin-right: 10px;accent-color:#EA1555;">
            <img class="img-fluid" style="width: 100px; flex-shrink: 0;" src="https://ik.imagekit.io/4csyk445b/PayPal_horizontally_Logo_2014.png?updatedAt=1709738114776" alt="PayPal Logo">
        </div>
        <p class="mb-0" style="font-size: 1.3rem; color: red; margin-left: auto; margin-bottom: 0;">£{{ $price ?? 0 }}</p>
    </div>
</button>


                                </h2>
                                <div id="collapsethree" class="accordion-collapse collapse show"
                                    aria-labelledby="collapsethree" data-bs-parent="#payment-accodoion">
                                    <div class="accordion-body">

                                        @if ($pm == 'paypal')
                                        <label class="form-check-label" for="flexCheckIndeterminate">

                                            <p style="font-size:15px;" class= "text-center">Seamlessly checkout with
                                                PayPal
                                                for a trusted payment experience. </p>
                                            <div class="d-flex justify-content-center">
                                                <livewire:payment-methods.paypal :price="$price" color="success"
                                                    service="Buy" />

                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>


<!--                            <div class="accordion-item">-->
<!--                                <h2 wire:click="changePm('klarna')" class="accordion-header" id="headingfour">-->
<!--                          <button style="padding-bottom: 0px;" class="accordion-button collapsed d-flex justify-content-between" type="button" aria-expanded="true" aria-controls="collapsefour" onclick="handleRadio(this)">-->
    <!--<div class="row g-0 align-items-center w-100">-->
    <!--    <div class="col-auto">-->
    <!--        <input type="radio" name="radio-payment" style="width: 19px; height: 17px;">-->
    <!--    </div>-->
    <!--    <div class="col-auto">-->
    <!--        <img src="https://ik.imagekit.io/4csyk445b/download__13_-removebg-preview%207%20(1).png?updatedAt=1711553724733" class="img-fluid" alt="Klarna Logo">-->
    <!--    </div>-->
    <!--    <div class="col ml-3">-->
    <!--        <div style="border-radius: 5px;">-->
    <!--            <small style="font-size: 10px; line-height: 1; white-space: nowrap;">make 3 payments of £{{ number_format($price / 3, 2) }} <b>Klarna</b>.</small>-->
    <!--            <br>-->
    <!--            <small style="font-size: 10px; line-height: 1;">Terms and conditions apply</small>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <div class="col-auto ms-auto">-->
    <!--        <h4 style="font-size: 1.3rem; color: red; margin-bottom: 0;">£{{ $price ? $price : 0 }}</h4>-->
    <!--    </div>-->
    <!--</div>-->
<!--</button>-->


<!--                                </h2>-->
<!--                                <div id="collapsefour" class="accordion-collapse collapse show"-->
<!--                                    aria-labelledby="collapsefour" data-bs-parent="#payment-accodoion">-->
<!--                                    <div class="accordion-body">-->
<!--                                        @if ($pm == 'klarna')-->
<!--                                            <p style="font-size:15px;" class = "text-center">Enjoy the convenience of-->
<!--                                                paying in 3 installments with Klarna!</p>-->
<!--                                            <livewire:payment-methods.klarna :price="$price" color="success"-->
<!--                                                service="Buy" />-->
<!--                                        @endif-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->

                        </div>
                    </div>
                </div>

            </div>


            
        </div>


    </div>


    <style>
        .accordion-button:not(.collapsed) {
            background-color: white;
            box-shadow: none;
        }

        .accordion-button:not(.collapsed)::after {
            display: none;
        }

        .accordion-button::after {
            display: none;
        }

        .accordion-item {
            justify-content: space-between;
        }
    </style>
