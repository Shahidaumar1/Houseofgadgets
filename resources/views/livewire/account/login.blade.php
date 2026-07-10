<div class="mx-auto pt-5 cus-width">
    <div class="container">
        <div class="position-relative">
            <img src="https://www.transparentpng.com/thumb/shape/7wHXSo-red-shape-wonderful-picture-images.png" />
            <h5 class="acc-login-text fs-4 fw-bold position-absolute text-white text-center">Account Login</h5>
        </div>

        <div>
            <form>
                <section>
                    <div class="mb-3">
                        <label class="form-label" id="labelText">Username or email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            wire:model.debounce.500="email" />
                        <div id="emailHelp" class="form-text" style="color:white;">
                            We'll never share your email with anyone else.
                        </div>
                        @error('email')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" id="labelText">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="exampleInputPassword1" wire:model.debounce.500="password" />
                            <div id="togglePassword" class="password-toggle position-absolute" onclick="togglePasswordVisibility()">
                                <span id="passwordToggleText" class="text-muted">Show</span>
                                <i class="bi bi-eye-slash" id="passwordIcon"></i>
                            </div>
                        </div>
                        @error('password')
                            <span class="text-danger text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input custom-checkbox" id="exampleCheck1" wire:model="remember_me" />
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>

                    <button id="button" type="button" class="btn text-white" style="background-color: #da0a0a" wire:click="login">
                        <span class="d-flex gap-2 align-items-center justify-content-center">
                            Login
                            <span wire:loading wire:target='login'>
                                <x-spinner />
                            </span>
                        </span>
                    </button>
                    <button class="btn btn-danger" type="reset">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </button>

                    <p id="p1">Or Continue With</p>
                    <div class="icons d-flex justify-content-around align-items-center p-2">
                        <button id="btnG">
                            <a href="" id="a1"><img id="google" style="height:20px; width:20px;" src="https://static.vecteezy.com/system/resources/previews/013/948/549/original/google-logo-on-transparent-white-background-free-vector.jpg" /> Google</a>
                        </button>
                        <button id="btnG">
                            <a href="" id="a2"><img id="facebook" style="height:20px; width:20px;" src="https://icons.iconarchive.com/icons/paomedia/small-n-flat/256/social-facebook-icon.png" /> Facebook</a>
                        </button>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>

<style>
    .cus-width {
        width: 40%;
    }

    @media screen and (max-width: 767px) {
        .cus-width {
            width: 100%;
        }
    }

    /* Position the toggle button inside the password box */
    .password-toggle {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .password-toggle span {
        font-size: 0.8rem;
        margin-right: 5px;
    }

    .password-toggle i {
        font-size: 1.2rem;
    }

    /* Add responsiveness for toggle text and icon */
    @media screen and (max-width: 576px) {
        .password-toggle span {
            font-size: 0.9rem;
        }
        .password-toggle i {
            font-size: 1.3rem;
        }
    }

    /* Custom checkbox styles */
    .custom-checkbox:checked {
        background-color: #007bff; /* Blue background when checked */
        border-color: #007bff; /* Blue border color when checked */
    }

    .custom-checkbox:checked:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
    }

    /* Make the checkbox look nicer with a blue tick */
    .custom-checkbox:checked::before {
        content: '\2713'; /* Checkmark character */
        color: white;
        font-size: 1.1rem;
        line-height: 1.1rem;
        text-align: center;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }

    /* Adding a custom style for checkbox appearance */
    .custom-checkbox {
        width: 1.5rem;
        height: 1.5rem;
        border-radius: 0.25rem;
        border: 2px solid #ced4da;
        background-color: #fff;
        position: relative;
    }
</style>

<script>
    // Toggle password visibility
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('exampleInputPassword1');
        const passwordIcon = document.getElementById('passwordIcon');
        const passwordToggleText = document.getElementById('passwordToggleText');

        // Toggle password type
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;

        // Toggle icon between eye and eye-slash
        passwordIcon.classList.toggle('bi-eye');
        passwordIcon.classList.toggle('bi-eye-slash');

        // Toggle text between "Show" and "Hide"
        if (passwordInput.type === 'password') {
            passwordToggleText.textContent = 'Show';
        } else {
            passwordToggleText.textContent = 'Hide';
        }
    }
</script>
