<!-- -------change radio forms------ -->
    <style>
      .col-7 {
    width: 100%;
    height: 450px;
    background: #ffffff 0% 0% no-repeat padding-box;
   
    border: 1px solid #cecece;
    border-radius: 15px;
}

@media (max-width: 767px) {
    .col-7 {
        width: 100%;
    }
    .btn-success{
        margin-top:-20px;
    }
    
}

    </style>
<div class="">
    <div class=" col-7" style="">
        <div id="paymentForm">
            <h3 class="text-center  fw-bold">Bank Transfer</h3>

            <div class="">
                <label for="disabledSelect" class="form-label">Account Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Account Title" wire:model.debounce.500="bank.account_title">
                @error('bank.account_title')
                <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>

            <div class="">
                <label for="disabledSelect" class="form-label">Account Number</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Enter Account Number" wire:model.debounce.500="bank.account_number">
                @error('bank.account_number')
                <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <label for="disabledSelect" class="form-label">Bank Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Bank Name" wire:model.debounce.500="bank.name">
                @error('bank.name')
                <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>

            <div class="">
                <label for="disabledSelect" class="form-label">Soft Code</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Soft Code" wire:model.debounce.500="bank.sort_code">
                @error('bank.sort_code')
                <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">
                        Agree with Privacy Policy Terms & Conditions
                    </label>
                </div>
            </div>

            <div class="cursor-point align-items-center d-grid  col-12 justify-content-center">

                <button class="btn btn-success" wire:click="submit">Submit</button>
                @if ($loading)
                <span>Submiting...</span>
                @endif

            </div>
        </div>
    </div>
</div>