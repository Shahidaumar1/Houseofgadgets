
<div>
    <style>
        .call-out-rapir-sec {
            width: 100%;
            float: left;
            display: block;
        }

        .call-out-sec1 .form-group label,
        .call-out-sec1 .conditional-address-form label {
            font-size: 16px;
            line-height: 30px;
            font-weight: 700;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 10px;
            letter-spacing: -0.33px;
        }

        .call-out-sec1 .form-group input,
        .call-out-sec1 #resultContainer select,
        .call-out-sec1 .conditional-address-form input {
            width: 100%;
            height: 50px;
            border-radius: 5px;
            border: 1px solid #E5E5E5;
            padding: 0 15px;
            font-size: 16px;
            line-height: 30px;
            font-weight: 400;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            letter-spacing: -0.33px;
        }

        .go-next-btn {
            width: 160px;
            height: 65px;
            border-radius: 5px;
            background-color:#C0C7D1 ;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            font-size: 24px;
            line-height: 27px;
            text-decoration: none;
            border: 1px solid #C0C7D1 ;
            margin-bottom: 15px;
            font-weight: 700;
            text-align: center;
        }
.go-next-btn:hover{
    color:#C0C7D1 !important;
}
        @media (max-width: 768px) {

            .call-out-sec1 .form-group input,
            .call-out-sec1 #resultContainer select,
            .call-out-sec1 .conditional-address-form input {
                height: 40px;
                font-size: 14px;
            }

            .call-out-sec1 .conditional-address-form label {
                font-size: 14px;
            }

            .go-next-btn {
                width: 123px;
                height: 60px;
                font-size: 18px;
                line-height: 16px;
            }

            .call-out-sec1 #resultContainer select {
                text-wrap: unset;
            }
        }

        /* date and time sec 2nd step css */
        .select-date-time-sec small{
                font-size: 18px;
                font-family: 800;
                line-height: 24.59px;
                color: #C0C7D1 ;
                font-family: "Manrope", sans-serif;
                font-style: normal;
                display: block;
                text-align: center;
        }
        .select-date-time-sec h2 {
            font-size: 32px;
            text-align: center;
            line-height: 60px;
            font-weight: 700;
            color: white;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            padding-bottom: 50px;
            letter-spacing: -0.33px;
        }

        .select-date-time-sec .calender-box {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            border: 1px solid #C0C7D1 ;
            max-width: 450px;
        }

        .select-date-time-sec .calender-box-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            border-bottom: 1px solid #C0C7D1 ;
            height: 70px;
        }

        .select-date-time-sec .calender-box-header button {
            width: 30px !important;
            height: 30px;
            border: 1px solid rgba(0, 0, 0, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #000;
            border-radius: 50%;
            background-color: #fff;
        }

        .select-date-time-sec .calender-box-header button i {
            font-size: 12px;
        }

        .select-date-time-sec .calender-box-header span {
            font-family: Manrope;
            font-size: 20px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0.05em;
            color: white;
        }

        .select-date-time-sec .calendar-table {
            width: 100%;
            border-collapse: collapse;
            padding: 10px 20px 30px 20px;
            margin-bottom: 0;
        }

        .select-date-time-sec .calendar-table th {
            background-color:transparent;
            color: #C0C7D1 ;
            font-family: Manrope;
            font-size: 18px;
            font-weight: 400;
            line-height: 32px;
            letter-spacing: -0.02em;
            text-align: center;
        }

        .select-date-time-sec .calendar-table td {
            font-family: Manrope;
            font-size: 20px;
            font-weight: 500;
            line-height: 32px;
            letter-spacing: -0.02em;
            text-align: center;
            color: #C0C7D1 ;
            background-color:transparent;
        }

        .select-date-time-sec .calendar-table td.selected {
            background-color: #C0C7D1 ;
            color: #fff;
        }

        .select-date-time-sec .calendar-table td:hover {
            background-color: #C0C7D1 ;
            color: #fff;
        }

        .select-date-time-sec .time-boxes {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .select-date-time-sec .time-box {
            box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.25);
            border-radius: 10px;

        }

        .select-date-time-sec .time-box button {
            text-align: center;
            width: 100%;
            height: 100%;
            padding: 40px 15px;
            border-radius: 10px;
            background-color: #fff;
            color: #000;
            font-family: Manrope;
            font-size: 20px;
            font-weight: 600;
            line-height: 30px;
            letter-spacing: 0.05em;
            cursor: pointer;
            border: none;
            outline: none;
        }

        .select-date-time-sec .time-box button.active {
            background-color: #C0C7D1 ;
            color: #fff;
        }

        .select-date-time-sec .time-box button i {
            color: #C0C7D1 ;
            margin-bottom: 10px;
        }

        .select-date-time-sec .time-box button p {
            font-size: 16px;
            font-weight: 500;
            line-height: 24px;
            letter-spacing: 0.05em;
            color: #000;
            margin-bottom: 0;
        }

        .select-date-time-sec .time-box button.active i {
            color: #fff;
        }

        .select-date-time-sec .time-box button.active p {
            color: #fff;
        }

        .select-date-time-sec .time-box button:hover {
            background-color: #C0C7D1 ;
            color: #fff;
        }

        .select-date-time-sec .time-box button:hover i {
            color: #fff;
        }

        .select-date-time-sec .time-box button:hover p {
            color: #fff;
        }

        .select-date-time-sec .seleted-date-time {
            font-family: Manrope;
            font-size: 20px;
            font-weight: 700;
            line-height: 30px;
            letter-spacing: 0.05em;
            color: white;
            text-align: center;
            margin-top: 40px;
        }

        @media(max-width:992px) {
            .select-date-time-sec .time-boxes {
                gap: 15px;
            }

            .select-date-time-sec .time-box button {
                padding: 34px 15px;
            }

            .select-date-time-sec .time-box button p,
            .select-date-time-sec .calendar-table td,
            .select-date-time-sec .calendar-table th {
                font-size: 14px;
            }

            .select-date-time-sec .calender-box-header button i {
                font-size: 10px;
            }

            .select-date-time-sec .calender-box-header span {
                font-size: 18px;
            }

        }

        @media(max-width:768px) {
            .select-date-time-sec .row {
                row-gap: 20px;
            }

            .select-date-time-sec h2 {
                font-size: 25px;
                line-height: 32px;
                padding-bottom: 40px;
            }
            .select-date-time-sec small {
                font-size: 16px;
            }


            .select-date-time-sec .calender-box {
                display: block;
                margin: 0 auto;
            }

            .select-date-time-sec .time-boxes {
                gap: 15px;
            }
            .select-date-time-sec .seleted-date-time { 
               font-size: 14px; 
               line-height: 20px; 
               margin-top: 26px;
             }


        }


        @media(max-width:548px) {
            .select-date-time-sec .time-box {
                max-width: 280px;
                display: block;
                margin: 0 auto;
                width: 100%;
            }

            .select-date-time-sec .time-boxes {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }
        .text-danger{
            color:black !important;
        }
    </style>

    <div class="call-out-rapir-sec pb-5">
        <div x-data="{ step: 1 }"
            style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
            <!-- Step 1 -->
            <div x-show="step === 1" class="call-out-sec1" x-data="{ selectedAddress: '', showFields: false }">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <!-- Post Code Input -->
                        <div class="form-group">
                            <label for="post_code">Post Code:</label>
                            <input type="text" wire:model.debounce.500ms="post_code" class="form-control" id="post_code"
                                placeholder="Enter Post Code">
                            @error('post_code')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Address Selection Dropdown -->
                        <div id="resultContainer" class="mt-3">
                            @if (isset($responseData['knownAddresses']) && is_array($responseData['knownAddresses']) &&
                            count($responseData['knownAddresses']) > 0)
                            <select x-model="selectedAddress" wire:model="selectedAddress" class="form-select">
                                <option value="" selected>Select an option</option>
                                @foreach ($responseData['knownAddresses'] as $address)
                                <option value="{{ $address }}">
                                    {{ $address }}
                                </option>
                                @endforeach
                            </select>
                            <div class="mb-3 mt-3 d-flex justify-content-start">
                                <button type="button" class="btn text-danger" @click="showFields = !showFields" style="text-decoration: underline;">
                                    I can't find my address
                                </button>
                            </div>
                            @else
                            <p>No addresses found or API call failed.</p>
                            @endif

                        </div>

                        <!-- Conditional Form Fields -->
                        <div x-show="showFields" x-cloak class="conditional-address-form">
                            <div class="mb-3 mt-3">
                                <label for="address_line_1">Address Line 1*:</label>
                                <input type="text" class="form-control form-control-sm" id="address_line_1"
                                    wire:model.lazy="fixed.address_line_1" placeholder="Address Line 1"
                                    name="address_line_1" required>
                                @error('fixed.address_line_1')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="address_line_2">Address Line 2:</label>
                                <input type="text" class="form-control form-control-sm"
                                    wire:model.lazy="fixed.address_line_2" id="address_line_2"
                                    placeholder="Address Line 2" name="address_line_2">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="city">Town/City*:</label>
                                <input type="text" class="form-control form-control-sm" id="city"
                                    wire:model.lazy="fixed.city" placeholder="Town/City" name="city" required>
                                @error('fixed.city')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="post_code_fixed">Post Code*:</label>
                                <input type="text" class="form-control form-control-sm" id="post_code_fixed"
                                    wire:model.lazy="fixed.post_code" placeholder="Post Code" name="post_code" required>
                                @error('fixed.post_code')
                                <span class="text-xs text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Next Button -->
                        <div class="mb-3 mt-3 d-flex justify-content-end">
                            <button type="button" class="go-next-btn" @click="step = 2"
                                :disabled="selectedAddress === ''">Next <i class="fa-solid fa-chevron-right ps-2" style="font-size: 10px;" aria-hidden="true"></i></button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- step 2 -->
            <section x-show="step === 2" class="call-out-sec1" x-cloak>
                <div class="select-date-time-sec">
                    <small>Select Date and Time</small>
                    <h2>
                        @switch(session()->get('serviceType'))
                        @case(\App\Helpers\ServiceType::ACCESSORIES)
                        Fix your accessories at my address
                        @break
                        @case(\App\Helpers\ServiceType::BUY)
                        Buy at my address
                        @break
                        @case(\App\Helpers\ServiceType::SELL)
                        Sell at My Address
                        @break
                        @case(\App\Helpers\ServiceType::REPAIR)
                        Call Out Repair
                        @break
                        @case(\App\Helpers\ServiceType::UNLOCKING)
                        Unlock your device at my address
                        @break
                        @default
                        Fix at my address
                        @endswitch
                    </h2>
                   
                    <div class="row justify-content-center">
                         <div class="col-md-5">
                              <div class="calender-box">
                                    <div class="calender-box-header">
                                        <button type="button" class="btn" wire:click="previousMonth">
                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        </button>
                                        <span>{{ $this->currentMonth->format('F Y') }}</span>
                                        <button type="button" class="btn" wire:click="nextMonth">
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <table class="table table-bordered calendar-table">
                                        <thead>
                                            <tr>
                                                <th>Mo</th>
                                                <th>Tu</th>
                                                <th>We</th>
                                                <th>Th</th>
                                                <th>Fr</th>
                                                <th>Sa</th>
                                                <th>Su</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($this->calendarDays)
                                                @foreach ($this->calendarDays as $week)
                                                    <tr>
                                                        @foreach ($week as $day)
                                                            <td class="{{ $day['class'] }}"
                                                                wire:click="selectDate('{{ $day['date'] }}')"
                                                                @if($day['disabled'])
                                                                    style="pointer-events: none; opacity: 0.5;"
                                                                @endif>
                                                                {{ $day['day'] }}
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="7">No dates available</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                              </div>
                              @error('fixed.repair_date')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                         </div>
                         <!-- time slot box -->
                          <div class="col-md-6 time-main-box">
                            @php 
                            $formattedTime = $fixed['repair_time'] ?? '';
                            @endphp
                            <div class="time-boxes">
                                  @foreach($timeSlots as $timeslots)
                                   <div class="time-box">
                                    <button type="button"
                                    class="time-slot-btn {{ $fixed['repair_time'] === $timeslots['time'] ? 'active' : '' }}"
                                    wire:click="$set('fixed.repair_time', '{{ $timeslots['time'] }}')">
                                
                                   <i class="{{ $timeslots['icon'] }} fa-3x"></i>   <br>
                                   <p class="pt-1"> <b> {{ $timeslots['time'] }} </b></p>
                                   </button>
                                   </div>
                                   @endforeach
                            </div>
                            @error('fixed.repair_time')
                            <span class="text-danger">{{ $message }}</span>
                           @enderror
                          </div>
                    </div>
                    <p class="seleted-date-time">
                        <span style="color: #C0C7D1 ;">Date:</span> {{ $fixed['repair_date'] ?? 'Not set' }} and 
                        <span style="color: #C0C7D1 ;">Time:</span> {{ $fixed['repair_time'] ?? 'Not set' }}
                    </p>
                    <button type="submit"wire:click.prevent="submitForm"   class="go-next-btn d-block ms-auto" >Next <i class="fa-solid fa-chevron-right ps-2" style="font-size: 10px;" aria-hidden="true"></i></button>
                </div>
            </section>
        </div>
    </div>
</div>