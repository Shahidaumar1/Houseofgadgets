<div class=" d-flex justify-content-between align-items-cente">
    <!-- -------change radio forms------ -->
  <style>
    .col-md-7 {
        width: 100%;
        height: 450px;
        background: #ffffff;
       
        border: 1px solid #cecece;
        border-radius: 15px;
        margin: auto; /* Center the container horizontally */
    }

    @media (max-width: 767px) {
        /* Apply styles for screens smaller than 768px (phones) */
        .col-md-7 {
            width: 100%;
           
        }
        .btn-success{
            margin-top:-20px;
        }
       
    }
</style>

   <div class=" col-md-12 " style="">
        <div id="paymentForm">
            


            <div class="">
                <label for="disabledSelect" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Name" wire:model.debounce.500="paypalDetail.account_name">
                @error('paypalDetail.account_name')
                <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class=" py-2">
                <label for="disabledSelect" class="form-label">Email Address</label>
                <input type="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Your Email Address" wire:model.debounce.500="paypalDetail.email">
                @error('paypalDetail.email')
                <span class="text-danger error">{{ $message }}</span>
                @enderror
            </div>
            <div class=" ">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        I agreed with Privacy Policy and Terms & Conditions.
                    </label>
                </div>
            </div>

           <div class="cursor-point align-items-center d-grid gap-2 p-4 col-12 justify-content-center">
    <button class="btn btn-success" wire:click="submit">Submit</button>
    @if ($loading)
        <span>Submitting...</span>
    @endif
</div>


        </div>
    </div>
</div>