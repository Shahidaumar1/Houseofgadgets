<div>

    <div class="container align-items-center"
    style="">
    @if ($success)
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>You payment successfully charged. Admin will contact you soom.</p>
            <hr>
            <p class="mb-0">Whenever you need to, You can contact with us.</p>

        </div>
    @endif
    @error('error')
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Payment failed!</strong> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    <form id="payment-form" class='w-100'>
        @csrf
        <div style="position:relative;top:2px;" class="d-flex gap-2 flex-column">

            <div style="margin-left:10px" id="card-element" wire:ignore></div>
            <div style="margin-left:10px" id="card-errors" role="alert"></div>
            <button style="margin-left:10px" type="submit" class="btn btn-{{ $color ?? '' }}"
                @if ($loading || $price == 0) disabled @endif>
                <div class="d-flex gap-3 justify-content-center align-itemes-center ">
                    Submit Payment
                    @if ($loading)
                        <span>
                            <x-spinner color="white" />
                        </span>
                    @endif
                </div>
            </button>
        </div>

    </form>
    <div class="form-check ">
        <input class="form-check-input" type="checkbox" value="" style="transform: scale(0.8);" id="flexCheckChecked" checked />

        <label style="" class="form-check-label" for="flexCheckChecked"><a href="{{ route('privacy-and-policy') }}">I Agree to
                Privacy Policy</a> And <a href="{{ route('terms-and-conditions') }}">Terms & Conditions</a></label>
    </div>

    <div>
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe('{{ $public_key }}');
            var elements = stripe.elements();
            var card = elements.create('card', {
                style: {
                    base: {
                        fontSize: '16px',
                        shadow: '1px solid black',
                        padding: '5px;'
                    },
                },
            });

            card.mount('#card-element');
            var form = document.getElementById('payment-form');



            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Show any errors to the user.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Token created successfully
                        livewire.emit('tokenCreated', result.token.id);
                        // Send the token to your server for payment processing.
                    }
                });
            });
        </script>

    </div>
</div>



</div>
<style>
    .bu{
        min-height:300px; max-width:550px; background: #ffffff 0% 0% no-repeat padding-box;box-shadow: 0px 3px 6px #ff070729;border: 1px solid #cecece;border-radius: 15px;
    }

    }
</style>
