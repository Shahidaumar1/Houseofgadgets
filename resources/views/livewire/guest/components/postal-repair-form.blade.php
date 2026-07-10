<div>
@php
use App\Models\SiteSetting;
$setting = SiteSetting::first();
@endphp

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <style>
        .postal-rapiar-sec .repair-sec-1 h2 {
            font-size: 32px;
            line-height: 60px;
            font-weight: 700;
            text-align: center;
            color: #fff; /* was #000 */
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 50px;
            letter-spacing: -0.33px;
        }

        .postal-rapiar-sec .repair-sec-1 .repair-sec1-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            align-items: center;
        }

        .postal-rapiar-sec .repair-sec-1 .reair-sec1-box1 {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .reair-sec1-box1-inner h4 {
            font-size: 20px;
            line-height: 30px;
            font-weight: 700;
            color: #fff; /* was #000 */
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 10px;
            letter-spacing: -0.33px;
        }

        .reair-sec1-box1-inner p {
            font-size: 16px;
            line-height: 30px;
            font-weight: 400;
            color: #fff; /* was #000 */
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0;
            padding-bottom: 10px;
            letter-spacing: -0.33px;
        }

        .postal-rapiar-sec .repair-sec-1 .reair-sec1-box1 img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .postal-rapiar-sec .repair-sec1-box2 {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
        }

        .postal-rapiar-sec .reair-sec1-box2 iframe {
            border-radius: 10px;
            height: 400px;
        }

        .next-back-btn {
            width: 165px;
            height: 65px;
            border-radius: 5px;
            background-color: #C0C7D1 ;
            color: white; /* button text stays white */
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            font-size: 22px;
            line-height: 27px;
            text-decoration: none;
            border: 1px solid #C0C7D1 ;
            margin-bottom: 15px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
        }

        @media(max-width:991px) {
            .postal-rapiar-sec .repair-sec-1 .repair-sec1-inner {
                grid-template-columns: 1fr 1.2fr;
            }

            .next-back-btn {
                width: 123px;
                height: 60px;
                font-size: 20px;
                line-height: 16px;
            }

        }

        @media(max-width:768px) {
            .postal-rapiar-sec .repair-sec-1 .repair-sec1-inner {
                grid-template-columns: 1fr;
            }

            .postal-rapiar-sec .repair-sec-1 h2 {
                font-size: 25px;
                line-height: 32px;
                padding-bottom: 40px;
            }

            .reair-sec1-box1-inner h4 {
                font-size: 17px;
                line-height: 24px;

            }

            .reair-sec1-box1-inner p {
                font-size: 14px;
            }

            .postal-rapiar-sec .reair-sec1-box2 iframe {
                height: 300px;
            }
        }

        @media(max-width: 548px) {
            .postal-rapiar-sec .repair-sec-1 .reair-sec1-box1 {
                border-radius: 10px;
                padding: 15px;
            }

            .reair-sec1-box1-inner p {
                padding-bottom: 4px;
            }

            .postal-rapiar-sec .repair-sec1-box2 {
                padding: 15px;
            }

            .postal-rapiar-sec .reair-sec1-box2 iframe {
                border-radius: 10px;
                height: 230px;
            }
        }

        /* step 2 css */
        .postal-rapiar-sec .repair-sec-2 h2 {
            font-size: 32px;
            line-height: 60px;
            font-weight: 700; 
            color: #fff; /* was #000 */
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 30px;
            letter-spacing: -0.33px;
        }
        .search-postal-input{
            max-width: 550px;

        }
        .search-postal-input label{
            font-size: 16px;
            line-height: 30px;
            font-weight: 700;
            color: #fff; /* was #000 */
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 10px;
            letter-spacing: -0.33px;
        }
        .search-postal-input input, .repair-sec-2 .form-select{
            width: 100%;
            height: 50px;
            border-radius: 5px;
            border: 1px solid #E5E5E5;
            padding: 0 15px;
            font-size: 16px;
            line-height: 30px;
            font-weight: 400;
            color: #fff; /* was #000 */
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin-bottom: 15px;
            letter-spacing: -0.33px;
            text-wrap: unset;
        }
        .search-postal-input .post-search-btn{
            width: 120px;
            height: 50px;
            border-radius: 5px;
            background-color: rgba(234, 21, 85, 1);
            color: white; /* button text stays white */
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            font-size: 16px;
            line-height: 27px;
            text-decoration: none;
            border: 1px solid rgba(234, 21, 85, 1);
            margin-bottom: 15px;
            font-weight: 700;
            text-align: center;
            cursor: pointer;
        }
        .repair-sec-2 .rounded-pill{
            color: #fff; /* link pill text */
            text-decoration: underline; 
            border: 1px solid rgba(234, 21, 85, 1);
            background-color: rgba(234, 21, 85, 1);
            margin-bottom: 15px;
        }
        .repair-sec-2 .mb-3 label{
            font-size: 16px;
            line-height: 30px;
            font-weight: 700;
            color: #fff; /* was #000 */
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 10px;
            letter-spacing: -0.33px;
        }
        .repair-sec-2 .mb-3 input{
            width: 100%;
            height: 50px;
            border-radius: 5px;
            border: 1px solid #E5E5E5;
            padding: 0 15px;
            font-size: 16px;
            line-height: 30px;
            font-weight: 400;
            color: #fff; /* was #000 */
            font-family: "Manrope", sans-serif;
            font-style: normal; 
            letter-spacing: -0.33px;
        }
        .next-back-btns{
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        @media(max-width:768px) { 
           .postal-rapiar-sec .repair-sec-2 h2 {
                font-size: 25px;
                line-height: 32px;
                padding-bottom: 40px;
            }
            .search-postal-input input, .repair-sec-2 .form-select, .repair-sec-2 select, .repair-sec-2 input, .repair-sec-2 .mb-3 input{
                height: 44px;
                font-size: 13px;
                line-height: 17px;
                padding-right: 15px;
                
            }
            .repair-sec-2 .mb-3 label {
                font-size: 13px;
                line-height: 23px;
                color:#fff; /* ensure white on mobile too */
            }
            .repair-sec-2 .rounded-pill {
                font-size: 12px;
            }        
        }
        /* === THEME OVERRIDE: transparent boxes + primary border === */
.postal-rapiar-sec .repair-sec-1 .reair-sec1-box1,
.postal-rapiar-sec .repair-sec1-box2{
  background: #000 !important;
  border: 1px solid var(--color-primary) !important;
}

/* optional: keep inner stuff consistent if any child element forces white bg */
.postal-rapiar-sec .repair-sec-1 .reair-sec1-box1 * ,
.postal-rapiar-sec .repair-sec1-box2 *{
  background-color: #000 !important;
}
/* === BIG OUTER CARD (the full box in screenshot) === */
.postal-rapiar-sec .cust-container{
  background: #0E1113 !important;
  border: 1px solid var(--color-primary) !important;
  border-radius: 10px !important;
  padding: 30px !important;
}

/* responsive padding */
@media (max-width: 768px){
  .postal-rapiar-sec .cust-container{
    padding: 15px !important;
  }
}
  html, body {
    background: #000 !important;
    max-width: 100vw !important;
    overflow-x: hidden !important;
  }

  /* Main wrapper for this page */
  .postal-rapiar-sec {
    background: #000 !important;
  }

  /* Container should inherit black, not white */
  .postal-rapiar-sec .cust-container {
    background: #000 !important;
  }

  /* Kill any leftover white/light backgrounds */
  .postal-rapiar-sec [style*="background:#fff"],
  .postal-rapiar-sec [style*="background: #fff"],
  .postal-rapiar-sec [style*="background-color:#fff"],
  .postal-rapiar-sec [style*="background-color: #fff"],
  .postal-rapiar-sec [style*="background-color:white"],
  .bg-white {
    background: #000 !important;
  }

  /* 📱 Mobile-safe: no horizontal scroll */
  @media (max-width: 576px) {
    html, body {
      overflow-x: hidden !important;
      max-width: 100vw !important;
    }
    section, .postal-rapiar-sec, .cust-container {
      max-width: 100vw !important;
      overflow-x: hidden !important;
    }
  }
    </style>



    @if (Session::get('serviceType') == 'Repair')
    <div class="postal-rapiar-sec">
        <div class="cust-container">
            <form x-data="{ step: 0 }" class=" submit-form" wire:submit.prevent="submitForm">
                <!-- step 1 -->
                <div class="repair-sec-1" id="section-1" x-show="step === 0" x-cloak>
                    <h2>Post your device to this address</h2>
                    <div class="repair-sec1-inner mb-3">
                        <div class="reair-sec1-box1">
                            @if (session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                            @foreach ($branches as $branch)
                            <div class="reair-sec1-box1-inner">
                                <h4>{{ $branch->name }}</h4>
                                <p>{{ $branch->address_line_1 }}, 
                                 {{ $branch->address_line_2 ?: '' }}, 
                                 {{ $branch->town_city }}, 
                                 {{ $branch->post_code }}, UK</p>
                                 @if (!empty($branch->email))
                                 <p><strong>Email:</strong> {{ $branch->email }}</p>
                                 @endif
                                 @if (!empty($branch->landline_number))
                                 <p><strong>Landline:</strong> {{ $branch->landline_number }}</p>
                                 @endif
                                 @if (!empty($branch->mobile_number))
                                 <p class="mb-3"><strong>Mobile:</strong> {{ $branch->mobile_number }}</p>
                                 @endif 
                                 <img  src="{{$branch->image}}">  
                            </div>
                            @endforeach
                        </div>
                        <div class="repair-sec1-box2">
    <!--<iframe -->
    <!--    src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d79406.91599553301!2d0.6158364730279591!3d51.541351242877575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x47d8d9adc6d3209b%3A0xa47765869d76ded5!2s291%20London%20Rd%2C%20Westcliff-on-Sea%2C%20Southend-on-Sea%2C%20Westcliff-on-Sea%20SS0%207BX%2C%20United%20Kingdom!3m2!1d51.5413801!2d0.6982366999999999!5e0!3m2!1sen!2s!4v1759388810667!5m2!1sen!2s" -->
    <!--    width="100%" -->
    <!--    height="320" -->
    <!--    style="border:0;" -->
    <!--    allowfullscreen="" -->
    <!--    loading="lazy" -->
    <!--    referrerpolicy="no-referrer-when-downgrade">-->
    <!--</iframe>-->
      @if(!empty($setting->map_link))
    {!! $setting->map_link !!}
@else
    <p style="color: gray;">Map not available</p>
@endif

   
                        </div>
                    </div>
                    <button type="button" class="next-back-btn d-block ms-auto" role="button"
                    wire:click="selectBranch({{  $branch['id'] }})" @click="step = 1" >Next <i class="fa-solid fa-chevron-right ps-2" style="font-size: 10px;" aria-hidden="true"></i> </button>
                </div>
                <!-- step-2 -->
                <section class="repair-sec-2" id="section-2" x-show="step === 1" x-cloak>
                       <h2>Please Provide your address</h2>
                       <div class="search-postal-input">
                              <label for="post_code">Post Code:</label>
                              <input type="text" required wire:model="post_code" class="form-control" id="post_code"
                               placeholder="Enter Post Code">
                                <div id="resultContainer">
                                    <p>{{ $addressName }}</p>
                                </div>
                                @error('post_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                       </div>
                       <button wire:click.prevent="changeApiData" class="mb-2">Search</button>

                       @if ($responseData) 
                       <select wire:model="selectedOption" class="form-select" wire:change.prevent="updateAddressFields">
                           <option value="" selected>Select an option</option>
                           @foreach ($responseData['knownAddresses'] as $key => $address)
                           <option key="{{ $key }}" value="{{ $address }}">{{ $address }}</option>
                           @endforeach
                       </select>
                       @if ($errorMessage)
                       <p class="text-danger">{{ $errorMessage }}</p>
                       @endif
                       @endif

                       @if ($responseData)
                       <button class="rounded-pill"
                           wire:click.prevent="toggleInputFields">I can't find my address..</button>
                       
                        @if ($showInputFields)
                        <div class="mb-3 mt-3">
                            <label for="address_line_1">Address Line 1*:</label>
                            <input type="text" class="form-control form-control-sm"
                             wire:model.lazy="postal.address_line_1" placeholder="Address Line 1"
                             name="postal.address_line_1" required="">
                             @error('postal.address_line_1')
                             <span class="text-xs text-danger">{{ $message }}</span>
                             @enderror
                        </div> 
                        <div class="mb-3 mt-3">
                            <label for="address_line_2">Address Line 2:</label>
                            <input type="text" class="form-control form-control-sm"
                                wire:model.lazy="postal.address_line_2" placeholder="Address Line 2"
                                name="postal.address_line_2">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="city">Town/City*:</label>
                            <input type="text" class="form-control form-control-sm" wire:model.lazy="postal.city"
                                placeholder="Town/City" name="postal.city" required="">
                            @error('postal.city')
                            <span class="text-xs text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="postal_code">Post Code*:</label>
                            <input type="text" class="form-control form-control-sm" wire:model.lazy="postal.code"
                                placeholder="Post Code" name="postal.code" required="">
                            @error('postal.code')
                            <span class="text-xs text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif
                        @endif
                        <div class="next-back-btns">
                          
                            <button role="button" class="next-back-btn" type="button" @click="step = 0" x-show="step === 1"
                             wire:click="goBack" ><i class="fa-solid fa-chevron-left pe-2" style="font-size: 10px;" aria-hidden="true"></i> Go Back</button>
                            <button type="submit" class="next-back-btn" role="button" x-show="step === 1">Next <i class="fa-solid fa-chevron-right ps-2" style="font-size: 10px;" aria-hidden="true"></i></button>
                            
                        </div>  

                </section>

            </form>
        </div>

    </div>
    @endif

        <!-- Include this script in your Livewire component or wherever necessary -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Listen for the Livewire event indicating data update
                Livewire.on('addressFieldsUpdated', function () {
                    // Find the relevant input fields by name attribute
                    var address1 = document.querySelector("input[name='postal.address_line_1']");
                    var address2 = document.querySelector("input[name='postal.address_line_2']");
                    var city = document.querySelector("input[name='postal.city']");
                    var post_code = document.querySelector("input[name='postal.code']");

                    // Append five dots to each field if they exist
                    if (address1) {
                        address1.value += '.....';
                        // Trigger input event to simulate user interaction
                        var event = new Event('input', {
                            bubbles: true
                        });
                        address1.dispatchEvent(event);
                    }

                    if (address2) {
                        address2.value += '.....';
                        var event = new Event('input', {
                            bubbles: true
                        });
                        address2.dispatchEvent(event);
                    }

                    if (city) {
                        city.value += '.....';
                        var event = new Event('input', {
                            bubbles: true
                        });
                        city.dispatchEvent(event);
                    }

                    if (post_code) {
                        post_code.value += '.....';
                        var event = new Event('input', {
                            bubbles: true
                        });
                        post_code.dispatchEvent(event);
                    }
                });
            });
        </script>
</div>
