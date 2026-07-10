<div class="container align-items-center">
    @error('error')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Payment failed!</strong> {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @enderror

    <div class="container d-flex justify-content-center">
        <button wire:click="createPayment" class="btn btn-{{ $color ?? '' }}" style="width: 180px;">
            <span class="p-2">
                Pay with PayPal
                @if ($loading)
                    <span>
                        <x-spinner color="black" />
                    </span>
                @endif
            </span>
        </button>
    </div>

    <!-- Hidden real checkbox (for Livewire or validation) -->
    <input id="agreeTermsHidden2" type="checkbox" style="display:none;">

    <!-- Custom styled checkbox + text -->
    <div style="display:flex; align-items:center; justify-content:center; gap:8px; margin-top:15px; font-size:15px;">
        <!-- Custom clickable box -->
        <div id="customAgreeBox2"
            role="button"
            aria-pressed="false"
            onclick="(function(){ 
                var hidden = document.getElementById('agreeTermsHidden2'); 
                hidden.checked = !hidden.checked; 
                hidden.dispatchEvent(new Event('change', {bubbles:true}));
                var box = document.getElementById('customAgreeBox2');
                if(hidden.checked){ 
                    box.style.backgroundColor = '#155B83'; 
                    box.innerHTML = '&#10003;'; 
                    box.setAttribute('aria-pressed','true'); 
                } else { 
                    box.style.backgroundColor = '#fff'; 
                    box.innerHTML = ''; 
                    box.setAttribute('aria-pressed','false'); 
                }
            })()"
            style="width:20px; height:20px; border:2px solid #888; border-radius:4px; display:inline-flex; align-items:center; justify-content:center; font-size:14px; color:#fff; cursor:pointer; user-select:none; background:#fff;">
        </div>

        <!-- Label with links -->
        <label for="agreeTermsHidden2" style="margin:0; font-size:15px; line-height:1.4; color:#333;">
            I agree to the&nbsp;
            <a href="{{ route('privacy-and-policy') }}" style="color:#007bff; font-weight:500; text-decoration:none;">
                Privacy Policy
            </a>
            &nbsp;and&nbsp;
            <a href="{{ route('terms-and-conditions') }}" style="color:#007bff; font-weight:500; text-decoration:none;">
                Terms &amp; Conditions
            </a>
        </label>
    </div>

    <!-- Initialize on load -->
    <script>
        (function(){
            var hidden = document.getElementById('agreeTermsHidden2');
            var box = document.getElementById('customAgreeBox2');
            if(!hidden || !box) return;
            if(hidden.checked){
                box.style.backgroundColor = '#155B83';
                box.innerHTML = '\u2713';
                box.setAttribute('aria-pressed','true');
            } else {
                box.style.backgroundColor = '#fff';
                box.innerHTML = '';
                box.setAttribute('aria-pressed','false');
            }
        })();
    </script>
</div>
