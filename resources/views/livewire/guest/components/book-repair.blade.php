<div>
    @php
        use App\Models\PaymentMethod;
        use App\Models\PaymentMethodSetting;

        $form_name = 'Call Out Repair';
        $paywithcardtext = 'pay in store';

        $paypalRow = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();
        $stripeRow = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
        $klarnaRow = PaymentMethodSetting::where('payment_method_', 'Klarna')->first();

        $paypalSettings = $paypalRow ? json_decode($paypalRow->settings, true) : null;
        $stripeSettings = $stripeRow ? json_decode($stripeRow->settings, true) : null;
        $klarnaSettings = $klarnaRow ? json_decode($klarnaRow->settings, true) : null;

        $paypalEnabled  = (bool) ($paypalSettings['enabled'] ?? false);
        $stripeEnabled  = (bool) ($stripeSettings['enabled'] ?? false);
        $klarnaEnabled  = (bool) ($klarnaSettings['enabled'] ?? false);

        $offlineEnabled = (bool) ($stripeSettings['enable_offline_pay'] ?? true);
    @endphp

    @if (session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">
                            Congratulations! 🎉 Your repair has been booked.
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ session('success') }}</p>
                        <div class="alert alert-success" role="alert">
                            <p>Check your email for more instructions.</p>
                            <hr>
                            <p class="mb-0">Thank you for choosing us. Questions? Reach out anytime.</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            window.onload = function() {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            };
        </script>
    @endif

    <div>
        @php
            $storedInputValue = Session::get('storedInputValue');
        @endphp
        @if ($storedInputValue)
            <p>Delivery Charges For Postal Repair: £{{ $storedInputValue }}</p>
        @endif

        @php
            $storedCollectionRepairPrice = Session::get('collectionRepairPrice');
        @endphp
        @if ($storedCollectionRepairPrice)
            <p style="font-size:1vw">
                Delivery Charges For Collection Repair: £{{ $storedCollectionRepairPrice }}
            </p>
        @endif

        <style>
           .repair-payment-sec {
               margin-top: -50px;
               padding: 0 15px;
           }
            .cust-container {
                max-width: 1140px;
                margin: 0 auto;
            }
            .payment-box-heading, .summry-heading {
                font-size: 32px;
                line-height: 60px;
                font-weight: 700;
                color: #C0C7D1;
                font-family: "Manrope", sans-serif;
                font-style: normal;
                margin: 0 !important;
                padding-bottom: 0px;
                letter-spacing: -0.33px;
            }
            @media(max-width:768px) {
                .payment-box-heading, .summry-heading {
                    font-size: 25px;
                    line-height: 32px;
                    padding-bottom: 40px;
                }
            }
            @media (min-width: 992px) {
                .myklarna {
                    margin-top: -16px !important;
                }
            }
            .contact-line {
                display: flex;
                align-items: center;
                gap: 8px;
            }
        </style>

        <div class="repair-payment-sec">
            <div class="cust-container mb-5 pb-md-4 pb-lg-5 rounded">
                <div class="z">
                    <div class="col-md-12">
                        @php
                            $paywithcardtext = '';
                            $form_name = '';

                            if (session('form_type') == 'postal_form') {
                                $form_name = 'Post Your Device';
                                $paywithcardtext = 'Pay At our Store';
                            } elseif (session('form_type') == 'collection_form') {
                                $form_name = 'We Collect Your Device';
                                $paywithcardtext = "I'll Pay after Repair";
                            } elseif (session('form_type') == 'clinic_form') {
                                $form_name = 'store Repair';
                                $paywithcardtext = "I'll Pay after Repair";
                            } elseif (session('form_type') == 'fix_form') {
                                $form_name = 'Call Out Repair';
                                $paywithcardtext = "I'll Pay after Repair";
                            }
                        @endphp
                        <x-alert />
                    </div>
                </div>
            </div>
        </div>

        {{-- SUCCESS MODAL for pay_at_store --}}
        @if ($pm == 'pay_at_store' && $success)
            <div class="custom-modal">
                <div class="modal-content">
                    <h4 class="modal-title">
                        Congratulations! 🎉 Your repair has been booked. Your Booking Number is
                        <span style="color:red;">{{ session('trackingNumber') }}</span>
                    </h4>
                    <p>Check your email for more instructions.</p>
                    <hr>
                    <p>Thank you for choosing us. Questions? Reach out anytime.</p>
                    <button onclick="window.location.href='{{ url('/') }}'">Close</button>
                </div>
            </div>
            <div id="modalOverlay" class="modal-overlay"></div>

            <style>
                .modal-overlay {
                    position: fixed;
                    top: 0; left: 0;
                    width: 100%; height: 100%;
                    background: rgba(0, 0, 0, 0.5);
                    z-index: 999;
                }
                .custom-modal {
                    position: fixed;
                    top: 50%; left: 50%;
                    transform: translate(-50%, -50%);
                    z-index: 1000;
                    max-width: 90%;
                    width: 400px;
                }
                .modal-content {
                    background: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    font-family: Arial, sans-serif;
                }
                .modal-title {
                    margin: 0 0 10px;
                    color: #28a745;
                    font-size: 1.5em;
                }
                .modal-content p { margin: 0 0 10px; color: #666; }
                .modal-content hr { border: 0; border-top: 1px solid #eee; margin: 15px 0; }
                .modal-content button {
                    background: #28a745; color: #fff;
                    border: none; padding: 8px 16px;
                    border-radius: 4px; cursor: pointer;
                }
                .modal-content button:hover { background: #218838; }
            </style>
        @endif

        <div class="row justify-content-between" style="row-gap: 30px;">

            {{-- LEFT: Repair Summary --}}
            <div class="col-lg-5">
                <div style="position:relative; max-width: 500px; margin:0 auto;">
                    <table id="repair-summary" class="table table-striped border mt-4 repair-summary">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center">
                                    <h2 class="summry-heading">Repair Summary</h2>
                                </th>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td class="text-end">{{ $data['modal']['name'] }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Type</td>
                                <td class="text-end">{{ $form_name }}</td>
                            </tr>

                            {{-- STORE REPAIR --}}
                            @if ($form_name === 'store Repair')
                                <tr>
                                    <td>{{ $data['repair_type']['name'] }}</td>
                                    <td class="text-end">£ {{ number_format($price, 2) }}</td>
                                </tr>
                                <tr>
                                    <td style="white-space: nowrap;">Total Price</td>
                                    <td class="text-end">£ {{ number_format($price, 2) }}</td>
                                </tr>
                            @endif

                            {{-- COLLECTION FORM --}}
                            @if ($formType === 'collection_form')
                                @php $basePrice = $price - ($condition2Price ?? 0); @endphp
                                <tr>
                                    <td>{{ $data['repair_type']['name'] }}</td>
                                    <td class="text-end">£ {{ number_format($basePrice, 2) }}</td>
                                </tr>
                                @if (!empty($condition2Price))
                                    <tr>
                                        <td>Service Charges</td>
                                        <td class="text-end">£ {{ number_format($condition2Price, 2) }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td style="white-space: nowrap;">Total Price</td>
                                    <td class="text-end">£ {{ number_format($price, 2) }}</td>
                                </tr>
                            @endif

                            {{-- POSTAL FORM --}}
                            @if ($form_name === 'Post Your Device')
                                @php $basePrice = $price - ($condition1Price ?? 0); @endphp
                                <tr>
                                    <td>{{ $data['repair_type']['name'] }}</td>
                                    <td class="text-end">£ {{ number_format($basePrice, 2) }}</td>
                                </tr>
                                @if (!empty($condition1Price))
                                    <tr>
                                        <td>Service Charges</td>
                                        <td class="text-end">£ {{ number_format($condition1Price, 2) }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td style="white-space: nowrap;">Total Price</td>
                                    <td class="text-end">£ {{ number_format($price, 2) }}</td>
                                </tr>
                            @endif

                            {{-- FIX AT MY ADDRESS --}}
                            @if ($formType === 'fix_form')
                                @php $basePrice = $price - ($condition3Price ?? 0); @endphp
                                <tr>
                                    <td>{{ $data['repair_type']['name'] }}</td>
                                    <td class="text-end">£ {{ number_format($basePrice, 2) }}</td>
                                </tr>
                                @if (!empty($condition3Price))
                                    <tr>
                                        <td>Service Charges</td>
                                        <td class="text-end">£ {{ number_format($condition3Price, 2) }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td style="white-space: nowrap;">Total Price</td>
                                    <td class="text-end">£ {{ number_format($price, 2) }}</td>
                                </tr>
                            @endif

                            <tr>
                                <td>Repair Time</td>
                                <td class="text-end">{{ $siteSetting->repair_time ?? 'Not Available' }}</td>
                            </tr>
                            <tr>
                                <td>Warranty</td>
                                <td class="text-end">{{ $siteSetting->warranty ?? 'Not Available' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <style>
                #repair-summary, #repair-summary th, #repair-summary td {
                    background-color: #f5f5f5;
                    color: #888888;
                }
                .summry-heading { color: #888888 !important; }
                @media (max-width: 480px) { .myklarna { margin-bottom: 20px; } }
                #successModal:hover { color: black !important; }
            </style>

            {{-- RIGHT: Payment Options --}}
            <div class="col-lg-6 col-12">

                <h2 class="payment-box-heading pb-2">How would you like to Pay?</h2>

                <div class="p-2 p-lg-3"
                    style="gap:0px; border-radius:10px; border:2px solid #C0C7D1;">

                    <p class="text-center mt-3"
                        style="font-family:Manrope; font-size:18px; font-weight:700;
                               line-height:40px; letter-spacing:-0.01em; text-align:center;">
                        Select your payment option
                    </p>

                    <div class="row">
                        <div class="container-fluid">

                            {{-- PAY AT STORE / I'll Pay after Repair --}}
                            @if ($offlineEnabled)
                                <section class="accordion">
                                    <div class="tab">
                                        <input class="form-check-input" type="radio" checked
                                               name="accordion-1" id="cb4"
                                               wire:click="changePm('pay_at_store')"
                                               style="display:none;">

                                        <label for="cb4" class="tab__label form-check-label responsive"
                                            style="border:1px solid #C0C7D1; width:100%; height:80px;
                                                   border-radius:10px; opacity:1;">
                                            <div class="flex space-between mysetting col-12"
                                                style="display:flex; align-items:center; justify-content:space-between;">
                                                <div class="text-start" style="display:flex; align-items:center;">
                                                    <div style="font-weight:600; color:white;">
                                                        {{ $paywithcardtext }}
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4 class="text-primary fw-bold" style="margin-right:50px !important;">
                                                        £{{ number_format($price, 2) }}
                                                    </h4>
                                                </div>
                                            </div>
                                        </label>

                                        <div class="tab__content col-12 d-flex flex-column justify-content-center text-black">

                                            <div class="d-flex justify-content-center">
                                                <p class="mt-2 fw-bolder soft">
                                                    Pay at store when you visit our location below
                                                </p>
                                            </div>

                                            <div style="color:black;">
                                                <p class="soft contact-line">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                                    </svg>
                                                    {{ $name }}, {{ $address_line_1 }},
                                                    {{ $address_line_2 }}{{ $address_line_2 != '' ? ', ' : '' }}
                                                    {{ $town_city }}, {{ $post_code }}
                                                </p>
                                                <p style="margin-top:-4%; color:black;" class="soft contact-line">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                                                    </svg>
                                                    &nbsp;&nbsp;{{ $email }}
                                                </p>
                                            </div>

                                            <div style="margin-top:-4%;" class="d-flex soft">
                                                <p class="soft d-flex contact-line" style="color:black;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-telephone-forward" viewBox="0 0 16 16">
                                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zm10.762.135a.5.5 0 0 1 .708 0l2.5 2.5a.5.5 0 0 1 0 .708l-2.5 2.5a.5.5 0 0 1-.708-.708L14.293 4H9.5a.5.5 0 0 1 0-1h4.793l-1.647-1.646a.5.5 0 0 1 0-.708"/>
                                                    </svg>
                                                    &nbsp;&nbsp;{{ $landline_number }}
                                                </p>

                                                {{-- ✅ FIXED: wire:click="BookRepair" add kiya --}}
                                                @if ($pm == 'pay_at_store')
                                                    <div class="mt-3" style="margin-left:20%;">
                                                        <button
                                                            class="btn mb-4"
                                                            type="button"
                                                            wire:click="BookRepair"
                                                            wire:loading.attr="disabled"
                                                            style="background-color:var(--color-primary);
                                                                   color:#fff;
                                                                   border:2px solid #C0C7D1;
                                                                   font-weight:bold;
                                                                   border-radius:10px;
                                                                   padding:10px 20px;
                                                                   height:50px;
                                                                   width:150px;
                                                                   text-align:center;
                                                                   display:flex;
                                                                   align-items:center;
                                                                   justify-content:center;">
                                                            <span wire:loading.remove wire:target="BookRepair">BOOK NOW</span>
                                                            <span wire:loading wire:target="BookRepair">Booking...</span>
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif

                            {{-- STRIPE --}}
                            @if ($stripeEnabled)
                                <section class="accordion mt-2">
                                    <div class="tab">
                                        <input class="form-check-input" type="radio"
                                            wire:click="changePm('stripe')" name="accordion-1" id="cb3">

                                        <label for="cb3" class="tab__label responsive"
                                            style="border:1px solid #C0C7D1; width:100%; height:80px; border-radius:10px;">
                                            <div class="flex space-between mysetting col-12"
                                                style="display:flex; align-items:center; justify-content:space-between;">
                                                <div class="text-start">
                                                    <div style="font-weight:800;">Pay With Card</div>
                                                    <img class="img-fluid" style="width:30%;"
                                                        src="https://ik.imagekit.io/4csyk445b/2560px-Stripe_Logo__revised_2016%205.png?updatedAt=1711551636602"
                                                        alt="Stripe">
                                                </div>
                                                <div class="text-end">
                                                    <h4 class="text-primary fw-bold" style="margin-right:50px !important;">
                                                        £{{ number_format($price, 2) }}
                                                    </h4>
                                                </div>
                                            </div>
                                        </label>

                                        <div class="tab__content col-12 d-flex justify-content-center align-items-center">
                                            @if ($pm == 'stripe')
                                                <div class="mt-2">
                                                    <livewire:payment-methods.stripe :price="$price" color="success" service="Repair" />
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </section>
                            @endif

                            {{-- KLARNA --}}
                            @if ($klarnaEnabled)
                                <section class="accordion mt-2">
                                    <div class="tab">
                                        <input class="form-check-input" wire:click="changePm('klarna')"
                                            type="radio" name="accordion-1" id="cb2">

                                        <label for="cb2" class="tab__label responsive"
                                            style="border:1px solid #C0C7D1; width:100%; height:80px; border-radius:10px;">
                                            <div class="flex space-between mysetting col-12"
                                                style="display:flex; align-items:center; justify-content:space-between;">
                                                <div>
                                                    <h4>
                                                        &nbsp;&nbsp;
                                                        <img class="img-fluid myklarna"
                                                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Klarna_Payment_Badge.svg/2560px-Klarna_Payment_Badge.svg.png"
                                                            alt="Klarna"
                                                            style="width:50px; height:auto; object-fit:cover;">
                                                    </h4>
                                                </div>
                                                <div class="text-center">
                                                    <p class="klarna-resp meri-marzi" style="color:white;">
                                                        Make 3 payments of <b class="fw-bolder">Klarna</b>
                                                        £{{ number_format($price / 3, 2) }} in installment.
                                                    </p>
                                                </div>
                                                <div class="text-end">
                                                    <h4 class="text-primary fw-bold" style="margin-right:50px !important;">
                                                        £{{ number_format($price, 2) }}
                                                    </h4>
                                                </div>
                                            </div>
                                        </label>

                                        <div class="tab__content col-12 d-flex justify-content-center align-items-center">
                                            @if ($pm == 'klarna')
                                                <livewire:payment-methods.klarna :price="$price" color="var(--color-primary)" service="Repair" />
                                            @endif
                                        </div>
                                    </div>
                                </section>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function initTabs() {
                const tabs = document.querySelectorAll('.tab input[type="radio"]');
                const contents = document.querySelectorAll('.tab__content');

                function hideAllContents() {
                    contents.forEach(content => { content.style.display = 'none'; });
                }

                function showTabContent(tab) {
                    const content = tab.closest('.tab').querySelector('.tab__content');
                    if (content) { content.style.display = 'block'; }
                }

                hideAllContents();

                tabs.forEach(tab => {
                    tab.addEventListener('click', function () {
                        hideAllContents();
                        showTabContent(this);
                    });
                    if (tab.checked) { showTabContent(tab); }
                });
            }

            document.addEventListener('DOMContentLoaded', function () { initTabs(); });

            document.addEventListener('livewire:load', function () {
                Livewire.hook('message.processed', (message, component) => {
                    initTabs();
                    const activeTab = document.querySelector('.tab input[type="radio"]:checked');
                    if (activeTab) {
                        const content = activeTab.closest('.tab').querySelector('.tab__content');
                        if (content) { content.style.display = 'block'; }
                    }
                });
            });
        </script>

        <style>
            @media (max-width: 576px) {
                .ali { font-size: 13px; }
                .usman { width: 140%; margin-left: -20% !important; }
                .soft { font-size: 10px; }
            }
            .mysetting { width: 100%; }
            @media(max-width: 375px) {
                .responsive { width: 250px !important; height: 80px !important; }
                .klarna-resp { height: 5px; width: 50px; margin-top: -20px; font-size: 5px !important; }
                .tab__content p { margin: 0; padding: 0.5rem; }
            }

            :root { --primary: #227093; --secondary: #ff5252; --background: #eee; --highlight: #ffda79; --theme: var(--primary); }

            .tab input { position: absolute; opacity: 0; z-index: -1; }
            .tab__content { max-height: 0; overflow: hidden; transition: all 0.35s; }
            .tab input:checked ~ .tab__content { max-height: 30rem; padding-top: 5px; padding-bottom: 5px; }

            .accordion { color: var(--theme); border-radius: 0.5rem; overflow: hidden; }
            .tab__label, .tab__close { display: flex; color: black; cursor: pointer; }
            .tab__label { justify-content: space-between; padding: 10px; }
            .tab__label::after { width: 1em; height: 1em; text-align: center; transform: rotate(90deg); transition: all 0.35s; }
            .tab input:checked + .tab__label::after { transform: rotate(270deg); }
            .tab__content p { margin: 0; padding: 1rem; color: white !important; }
            .tab__close { justify-content: flex-end; padding: 0.5rem 1rem; font-size: 0.75rem; }
            .accordion--radio { --theme: var(--secondary); }
            .tab input:not(:checked) + .tab__label:hover::after { animation: bounce .5s infinite; }
            @keyframes bounce {
                25% { transform: rotate(90deg) translate(.25rem); }
                75% { transform: rotate(90deg) translate(-.25rem); }
            }

            .form-check-input { position: absolute; opacity: 0; z-index: -1; }
            .form-check-input + .tab__label::before {
                content: ''; display: inline-block;
                width: 20px; height: 20px; padding: 10px;
                margin-top: 13px; margin-right: 10px;
                border-radius: 50%;
                background-color: var(--color-primary);
                color: #fff; border: 1px solid var(--color-primary);
                vertical-align: middle;
                transition: background-color 0.3s, border-color 0.3s;
            }
            .form-check-input:checked + .tab__label::before {
                background-color: var(--color-primary);
                color: #fff; border-color: var(--color-primary);
            }
            .tab__label:hover::before { background-color: #C0C7D1; }
        </style>
    </div>
</div>