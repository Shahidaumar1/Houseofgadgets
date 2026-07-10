<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">

    @if ($form_type == 'fix_form' && $codePrice != null)
        <div class="form-check" style="margin-left: 10%; color:black;">
            <input class="form-check-input" type="checkbox" checked disabled />
            <label class="form-check-label" for="flexCheckIndeterminate">
                *Fix At My Address Device Surcharge*: £ {{ $codePrice }}
            </label>

        </div>
    @elseif($form_type == 'collection_form' && $codePrice != null)
        <div class="form-check" style="margin-left: 10%; color:black;">
            <input class="form-check-input" type="checkbox" checked disabled />
            <label class="form-check-label" for="flexCheckIndeterminate">
                *Collect My Device Surcharge*: £ {{ $codePrice }}
            </label>

        </div>
    @endif
</div>
 <!--<h4 class="fw-bold mt-3 mb-3" >Please post your device to this address</h4>-->