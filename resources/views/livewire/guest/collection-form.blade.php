<div>
    {{-- <div class=" mb-3 mt-3">
        <label for="post_code_area">Post Code Area</label>
        <select id="single" class="js-states form-control" wire:model="collection.post_code_area" name="post_code_area"
            wire:ignore.self>
            <option value="">Select Post Code Area</option>
            @foreach ($post_code_areas as $post_code_area)
                <option value="{{ $post_code_area->post_code_area . '-' . $post_code_area->price }}">
    {{ $post_code_area->post_code_area }} --
    {{ $post_code_area->price }}
    </option>
    @endforeach
    </select>
    @error('collection.post_code_area')
    <span class="text-xs" style="color: red; font-size:12px;">{{ $message }}</span>
    @enderror
</div> --}}






<!--<div>-->
<!--    <div class="form-group">-->
<!--        <label for="post_code">Post Code:</label>-->
<!--        <input type="text" wire:model.debounce.500ms="post_code" class="form-control" id="post_code" placeholder="Enter Post Code">-->
<!--        @error('post_code')-->
<!--            <span class="text-danger">{{ $message }}</span>-->
<!--        @enderror-->
<!--    </div>-->

<!--    <div id="resultContainer" class="mt-3">-->
<!--        @if (isset($responseData['knownAddresses']) && count($responseData['knownAddresses']) > 0)-->
<!--            <select class="form-select">-->
<!--                <option value="" selected>Select an option</option>-->
<!--                @foreach ($responseData['knownAddresses'] as $address)-->
<!--                    <option value="{{ $address }}">{{ $address }}</option>-->
<!--                @endforeach-->
<!--            </select>-->
<!--        @else-->
<!--            <p>No addresses found or API call failed.</p>-->
<!--        @endif-->
<!--    </div>-->
<!--</div>-->
<div class="row" style="display: flex; justify-content: center; align-items: center;">
    <div class="col-md-6 col-sm-12 col-12">
<div>
    <div class="form-group">
        <label for="post_code">Post Code:</label>
        <input type="text" wire:model.debounce.500ms="post_code" wire:model.lazy="collection.post_code" class="form-control" id="post_code" placeholder="Enter Post Code">
        @error('post_code')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div id="resultContainer" class="mt-3">
        @if (isset($responseData['knownAddresses']) && count($responseData['knownAddresses']) > 0)
            <select wire:model="selectedAddress" class="form-select">
                <option value="" selected>Select an option</option>
                @foreach ($responseData['knownAddresses'] as $address)
                    <option value="{{ $address }}">{{ $address }}</option>
                @endforeach
            </select>
        @else
            <p>No addresses found or API call failed.</p>
        @endif
    </div>
</div>

<div class="mb-3 mt-3">
    <label for="address_line_2">Address Line 1*:</label>
    <input type="text" class="form-control form-control-sm" id="address" wire:model.lazy="collection.address_line_1" placeholder="Address Line 1" name="address_line_1" required="">
    @error('collection.address_line_1')
    <span class="text-xs" style="color: red; font-size:12px;">{{ $message }}</span>
    @enderror
</div>






{{-- collection --}}
<!--<div class="mb-3 mt-3">-->
<!--    <label for="address_line_2">Address Line 1*:</label>-->
<!--    <input type="text" class="form-control form-control-sm" id="address" wire:model.lazy="collection.address_line_1" placeholder="Address Line 1" name="address_line_1-->
<!--            " required="">-->
<!--    @error('collection.address_line_1')-->
<!--    <span class="text-xs" style="color: red; font-size:12px;">{{ $message }}</span>-->
<!--    @enderror-->
<!--</div>-->
<div class="mb-3 mt-3">
    <label for="address_line_2">Address Line 2:</label>
    <input type="text" class="form-control form-control-sm" wire:model.lazy="collection.address_line_2" id="address_line_2" placeholder="Address Line 2" name="address_line_2">
</div>
{{-- Town/City --}}
<div class="mb-3 mt-3">
    <label for="city">Town/City*:</label>
    <input type="text" class="form-control form-control-sm" id="city" wire:model.lazy="collection.city" placeholder="Town/City" name="city" required="">
    @error('collection.city')
    <span class="text-xs" style="color: red; font-size:12px;">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3 mt-3 ">
    <label for="email">Post Code*:</label>
    <input type="text" class="form-control form-control-sm" id="post_code
        " wire:model.lazy="collection.post_code" placeholder="Post Code
                   " name="post_code
                   " required="">
    @error('collection.post_code
    ')
    <span class="text-xs" style="color: red; font-size:12px;">{{ $message }}</span>
    @enderror
</div>




<div class="mb-3 mt-3">
    <label for="repair_date">Date</label>
    <select class="form-control form-select form-control-sm" id="repair_date" name="repair_date" wire:model.lazy="collection.repair_date">
        <option>Select Date</option>
        @php
        use Carbon\Carbon;
        use Carbon\CarbonInterval;
        $currentDate = Carbon::now('Europe/London');
        $workingDays = 0;

        // Fetch public holidays using API
        $year = $currentDate->year;
        $publicHolidaysURL = "https://date.nager.at/Api/v3/PublicHolidays/{$year}/GB";

        $publicHolidaysResponse = file_get_contents($publicHolidaysURL);
        $publicHolidays = json_decode($publicHolidaysResponse);

        while ($workingDays < 10) { $currentDate->addDay();

            if ($currentDate->isWeekday() && !$this->isPublicHoliday($currentDate, $publicHolidays)) {
            $workingDays++;
            echo '<option value="' . $currentDate->toDateString() . '">' . $currentDate->format('D d/m/Y') . '</option>';
            }
            }

            function isPublicHoliday($date, $publicHolidays)
            {
            foreach ($publicHolidays as $holiday) {
            if ($date->toDateString() === $holiday->date) {
            return true;
            }
            }
            return false;
            }
            @endphp
    </select>
    @error('collection.repair_date')
    <span class="text-xs" style="color: red; font-size:12px;">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3 mt-3 ">
    <label for="repair_slot">Select Slot</label>
    <select class="form-control form-select form-control-sm" wire:model="collection.repair_slot" id="repair_slot">
        <option>Select Slot</option>
        <option value="11am - 2pm">11am - 2pm</option>
        <option value="2pm - 5pm">2pm - 5pm</option>
        <option value="5pm - 8pm">5pm - 8pm</option>
    </select>
    @error('collection.repair_slot')
    <span class="text-xs" style="color: red; font-size:12px;">{{ $message }}</span>
    @enderror
</div>
<div class="mb-2">
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Write Note</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" wire:model="collection.repair_note" rows="3" name="repair_note" placeholder="Please write any comment...">
                </textarea>
        @error('collection.repair_note')
        <span class="text-xs" style="color: red; font-size:12px;">{{ $message }}</span>
        @enderror
    </div>

</div>

</div></div>
      
                <!--<img id="next-button" src="https://ik.imagekit.io/li8bg5tjv3/1.png?updatedAt=1715028228699" style="width: 150px; height: auto;" />-->
                <button type="submit"wire:click.prevent="submitForm"   class="button-27" style="width: 150px; height: auto; margin-left: auto;float:right;">Next</button>
            
      
</div>

    <style>
        .button-27 {
  appearance: none;
  background-color: #E54956;
  border: 2px solid #E54956;
  border-radius: 15px;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Roobert,-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-size: 16px;
  font-weight: 600;
  line-height: normal;
  margin: 0;
  min-height: 60px;
  min-width: 0;
  outline: none;
  padding: 16px 24px;
  text-align: center;
  text-decoration: none;
  transition: all 300ms cubic-bezier(.23, 1, 0.32, 1);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  width: 100%;
  will-change: transform;
}

.button-27:disabled {
  pointer-events: none;
}

.button-27:hover {
  box-shadow: #DC3545 0 8px 15px;
  transform: translateY(-2px);
}

.button-27:active {
  box-shadow: none;
  transform: translateY(0);
}
/* ============ THEME FOR COLLECTION ADDRESS FORM ============ */

/* Section + text defaults */
.row,
#resultContainer,
#resultContainer p{
  background: transparent !important;
  color: var(--color-text, #eaeaea) !important;
}

/* Labels */
.form-group label,
.mb-3 > label,
.form-label{
  color: var(--color-text, #eaeaea) !important;
  font-weight: 600;
}

/* Inputs / selects / textarea */
.form-control,
.form-select,
textarea.form-control{
  background:#000 !important;
  color: var(--color-text, #eaeaea) !important;
  border: 1px solid var(--color-border, rgba(255,255,255,.14)) !important;
  border-radius: 10px !important;
}
.form-control::placeholder,
textarea.form-control::placeholder{
  color: color-mix(in srgb, var(--color-text,#eaeaea), transparent 45%) !important;
}
.form-control:focus,
.form-select:focus,
textarea.form-control:focus{
  outline: none !important;
  box-shadow: 0 0 0 .2rem color-mix(in srgb, var(--color-primary,#EA1555), transparent 70%) !important;
  border-color: var(--color-primary, #EA1555) !important;
}

/* The select with found addresses */
#resultContainer select.form-select{
  background: var(--color-surface, #1a1a1a) !important;
  color: var(--color-text, #eaeaea) !important;
  border-color: var(--color-border, rgba(255,255,255,.14)) !important;
}

/* Error text */
.text-danger,
.text-xs{
  color: var(--color-primary, #EA1555) !important;
}

/* Primary button (Next) */
.button-27{
  background-color: #0E1113 !important;
  border: 2px solid var(--color-primary, #EA1555) !important;
  color: #fff !important;
  box-shadow: none !important;
}
.button-27:hover{
  box-shadow: 0 8px 15px color-mix(in srgb, var(--color-primary,#EA1555), transparent 70%) !important;
  transform: translateY(-2px);
}
.button-27:active{ box-shadow: none !important; transform: translateY(0); }

/* Small fix: kill any hard-coded white backgrounds inside this block */
.form-control.bg-white,
textarea.bg-white{
  background: #000 !important;
   border-color:  1px solid  var(--color-primary) !important;
}

/* Mobile spacing niceties */
@media (max-width: 576px){
  .form-group, .mb-3{ margin-bottom: .85rem !important; }
}
.bg-white{
      background-color: #0E1113 !important;
 border-color:  1px solid  var(--color-primary) !important;
}
/* === TARGET THE ACTUAL CARD BOX IN THIS SNIPPET === */
.row > .col-md-6.col-sm-12.col-12{
  background: transparent !important;
  background-color: transparent !important;
  background-image: none !important;

  border: 1px solid var(--color-primary) !important;
  border-radius: 12px !important;

  padding: 30px !important;
}

/* sometimes the background is on the first inner wrapper */
.row > .col-md-6.col-sm-12.col-12 > div{
  background: transparent !important;
  background-color: transparent !important;
  background-image: none !important;
}

/* if theme uses overlays */
.row > .col-md-6.col-sm-12.col-12::before,
.row > .col-md-6.col-sm-12.col-12::after{
  content: none !important;
  background: transparent !important;
}

/* responsive padding */
@media (max-width: 768px){
  .row > .col-md-6.col-sm-12.col-12{
    padding: 16px !important;
  }
}
   .bg-white {
    background-color: #000 !important;
    border-color: 1px solid var(--color-primary) !important;
}
  
    </style>
