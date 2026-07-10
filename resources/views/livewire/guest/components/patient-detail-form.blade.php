<div>
    <style>
        .form-sec {
            width: 100%;
            float: left;
            display: block;
        }

        .custom-container {
            max-width: 1140px;
            margin: 0 auto;
        }

        .fomr-sec .heading-box small {
            font-size: 18px;
            font-family: 800;
            line-height: 24.59px;
            color: #EA1555;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            display: block;
            text-align: center;
        }

        .form-sec .heading-box h3 {
            font-size: 32px;
            text-align: center;
            line-height: 60px;
            font-weight: 700;
            color: #000;
            font-family: "Manrope", sans-serif;
            font-style: normal;
            margin: 0 !important;
            /*padding-bottom: 10px;*/
        }

        /*.form-sec form {*/
        /*    max-width: 620px;*/
        /*    width: 100%;*/
        /*    margin: 0 auto;*/
        /*    display: block;*/
        /*    box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.25);*/
        /*    padding: 10px;*/
        /*    border-radius: 10px;*/
        /*}*/
        
        .form-sec form {
    max-width: 620px;
    width: 100%;
    margin: 0 auto;
    display: block;
    box-shadow: 0px 0px 2px 0px rgba(0, 0, 0, 0.25);
    padding: 10px;
    border-radius: 10px;
    text-align: center;   
}

.form-sec form button {
    width: 160px;
    height: 65px;
    font-size: 23px;
    font-weight: 500;
    display: inline-flex;  
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    margin-top: 10px;
    border: 1px solid #EA1555;
    color: #fff;
    background-color: #EA1555;
    transition: 0.3s ease;
}


        .form-sec form input {
            color: rgba(0, 0, 0, 0.44);
            border: 1px solid rgba(210, 210, 210, 0.87);
            height: 50px;
            padding: 0 5px;
            font-size: 16px;
            line-height: rgba(210, 210, 210, 0.87);
            outline: none;
            border-radius: 10px;

        }

        .form-sec form input:focus {
            box-shadow: 0 0 40px #dc3545 !important;
            transition: 0.3s ease;
            outline: none;
            border: 1px solid #dc3545;

        }

        .form-sec form textarea {
            color: rgba(0, 0, 0, 0.44);
            border: 1px solid rgba(210, 210, 210, 0.87);
            padding: 10px;
            font-size: 16px;
            line-height: rgba(210, 210, 210, 0.87);
        }

        .form-sec form textarea:focus {
            box-shadow: 0 0 40px #dc3545 !important;
            transition: 0.3s ease;
            outline: none;
            border: 1px solid #dc3545;

        }

        /*.form-sec form button {*/
        /*    width: 126px;*/
        /*    height: 55px;*/
        /*    font-size: 20px;*/
        /*    line-height: 27.32px;*/
        /*    text-decoration: none;*/
        /*    font-weight: 500;*/
        /*    display: flex;*/
        /*    flex-direction: row;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*    border-radius: 10px;*/
        /*    transition: 0.3s ease;*/
        /*    font-family: "Manrope", sans-serif;*/
        /*    font-style: normal;*/
        /*    border: 1px solid #EA1555;*/
        /*    color: #fff;*/
        /*    margin-top: 10px;*/
        /*    background-color: #EA1555;*/

        /*}*/

        .form-sec form button:hover {
            color: #EA1555;
            background-color: #fff5;
        }


        @media(max-width:768px) {

            .form-sec .heading-box h3 {
                font-size: 25px;
                line-height: 32px;
                padding-bottom: 20px;
            }

            .form-sec form {
                padding: 20px;
            }

            .form-sec form button {
                height: 60px;
                width: 130px;
                border-radius: 5px;
                margin-top: 10px;
                font-size: 24px;
            }
        }

        @media(max-width: 548px) {
            .form-sec form input {
                border-radius: 5px;
                font-size: 16px;
                height: 50px;
            }  
            .form-sec form textarea{
                border-radius: 5px;
                font-size: 16px;
            }

            .form-sec form {
                padding: 20px;
            }
        }
        /* ================= THEME OVERRIDES (append at very end) ================= */

/* Page/section bg */
.form-sec{
  background: var(--color-background, #0f0f0f) !important;
}

/* Heading colors (note: original me 'fomr-sec' typo hai; yahan sahi selector) */
.form-sec .heading-box small{
  color: var(--color-primary, #EA1555) !important;
}
.form-sec .heading-box h3{
  color: var(--color-text, #eaeaea) !important;
}

/* Card form */
.form-sec form{
  background: var(--color-surface, #1a1a1a) !important;
  color: var(--color-text, #eaeaea) !important;
  border: 1px solid var(--color-border, rgba(255,255,255,.12)) !important;
  box-shadow: var(--shadow-sm, 0 2px 16px rgba(0,0,0,.35)) !important;
}

/* Inputs / Textarea */
.form-sec form input,
.form-sec form textarea{
  background: var(--color-surface, #1a1a1a) !important;
  color: var(--color-text, #eaeaea) !important;
  border: 1px solid var(--color-border, rgba(255,255,255,.14)) !important;
}
.form-sec form input::placeholder,
.form-sec form textarea::placeholder{
  color: color-mix(in srgb, var(--color-text), transparent 45%) !important;
}

/* Focus states */
.form-sec form input:focus,
.form-sec form textarea:focus{
  border: 1px solid var(--color-primary, #EA1555) !important;
  box-shadow: var(--shadow-lg, 0 0 18px rgba(0,0,0,.28)) !important;
}

/* Button */
.form-sec form button{
  background: var(--color-primary, #EA1555) !important;
  border-color: var(--color-primary, #EA1555) !important;
  color:black !important;
}
.form-sec form button:hover{
  background: transparent !important;
  color: var(--color-primary, #EA1555) !important;
}

/* Validation/error text */
.text-danger{ color: var(--color-primary, #EA1555) !important; }

/* Any hard-coded whites from utilities */
.bg-white{ background: var(--color-surface, #1a1a1a) !important; color: var(--color-text, #eaeaea) !important; }
.form-sec form{
    border-color:  1px solid  var(--color-primary) !important; background:transparent !important;
}
.form-sec form input, .form-sec form textarea{
      border-color:  1px solid  var(--color-primary) !important; background:transparent !important;
}
 .form-sec form input, .form-sec form textarea:hover{box-shadow:0 0 20px  var(--color-primary)!important; transition:.3s ease }
   html, body {
    background: #000 !important;
    max-width: 100vw !important;
    overflow-x: hidden !important;
  }

  /* This section/page wrapper */
  .form-sec {
    background: #000 !important;
  }

  /* If any wrapper tries to stay white/light, force black */
  .form-sec .custom-container,
  .form-sec [style*="background:#fff"],
  .form-sec [style*="background: #fff"],
  .form-sec [style*="background-color:#fff"],
  .form-sec [style*="background-color: #fff"],
  .form-sec [style*="background-color:white"],
  .bg-white {
    background: #000 !important;
  }

  /* ✅ Mobile safety: prevent horizontal scroll */
  @media (max-width: 576px) {
    html, body { overflow-x: hidden !important; max-width: 100vw !important; }
    .form-sec, .custom-container { max-width: 100vw !important; overflow-x: hidden !important; }
  }
    </style>

    <div class="form-sec">
        <div class="custom-container">
            <div class="heading-box">
                <small>Tell Us about Yourself</small>
                <h3>Customer Details</h3>
            </div>
            <form wire:submit.prevent="submitForm">
                <div class="form-box">
                    <label for="first_name" class="form-label fw-bold"></label>
                    <input type="text" class="form-control" id="first_name" placeholder="name"
                        wire:model.lazy="patient.name">
                    @error('patient.name')
                    <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                    @enderror

                    <label for="email" class="form-label fw-bold"></label>
                    <input type="email" class="form-control" id="email" placeholder="email"
                        wire:model.lazy="patient.email">
                    @error('patient.email')
                    <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                    @enderror

                    <label for="phone" class="form-label fw-bold "></label>
                    <input type="tel" class="form-control" id="phone" placeholder="phone number"
                        wire:model.lazy="patient.phone">
                    @error('patient.phone')
                    <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                    @enderror

                    <label for="repair_note" class="form-label fw-bold"></label>
                    <textarea id="repair_note" name="repair_note" rows="4" cols="20" class="form-control"
                        wire:model.lazy="patient.RepairNote" placeholder="Write text here"></textarea>
                    @error('patient.RepairNote')
                    <div class="text-danger" style="font-size: 12px;">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="mybutton-27 responsive-button payment-method" role="button">
                    Next
                </button>

                @if (Session::get('serviceType') == 'Repair')
                <script>
                    document.querySelector('.payment-method').addEventListener('click', function () {
                        // Trigger the accordion radio button
                        document.getElementById('cb4').checked = true;

                        // Optionally trigger the Livewire action or any other custom logic
                        document.getElementById('cb4').dispatchEvent(new Event('click'));
                    });

                    @endif
                </script>
            </form>

        </div>
    </div>

</div>