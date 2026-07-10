@php
use App\Models\FormStatus;
$formStatuses = FormStatus::where('name', 'services')->first();
@endphp

@php
  $siteSetting = \App\Models\SiteSetting::first();
@endphp


<div>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/09d3c3a997.js" crossorigin="anonymous"></script>


    <style>
    body,.custom-repair-tabs{
        background-color:#000 !important;
    }
        /* === Theme-aware Repair Tabs === */
.custom-repair-tabs{width:100%;display:block;padding:5px 15px 72px 5px;}
.cust-container{max-width:1140px;margin:0 auto;}
a{text-decoration:none;color:var(--color-text);}

/* Prev/Next buttons */
.go-back-btn,.go-next-btn{
  width:160px;height:65px;border-radius:5px;cursor:pointer;font-size:25px;
  display:flex;align-items:center;justify-content:center;text-align:center;
  font:700 16px/27px "Manrope",sans-serif;
  background:var(--color-primary);color:black; :border:1px solid var(--color-primary);
  transition:.25s ease;
}
.go-next-btn{margin:30px auto 15px auto; font-size:22px;}
.go-back-btn:hover{background:var(--color-surface);color:var(--color-primary);}

/* Step tabs (breadcrumb) */
.custom-repair-tabs .repair-tabs-main{
  list-style:none;padding:0;margin:0 0 70px;
  display:flex;justify-content:space-evenly;align-items:center;
}
.repair-tabs-main li a{
  width:250px;height:50px;display:flex;align-items:center;justify-content:center;
  font:700 16px/1 "Manrope",sans-serif;color:var(--color-text);text-decoration:none;
  background:color-mix(in srgb, var(--color-text), transparent 87%);
  border:1px solid color-mix(in srgb, var(--color-text), transparent 75%);
  clip-path:polygon(78% 0%,100% 50%,78% 100%,0% 100%,18% 49%,0% 0%);
  transition:.2s ease;
}
.repair-tabs-main .breadcrumb-item+.breadcrumb-item::before{display:none;}
.repair-tabs-main li a.active{
  background:var(--color-primary);color:black;border-color:var(--color-primary);
}

/* Headings */
.custom-repair-tabs .heading-box small{
  display:block;text-align:center;color:var(--color-primary);
  font:800 18px/24.59px "Manrope",sans-serif;
}
.custom-repair-tabs .heading-box h3{
  margin:0;text-align:center;color:var(--color-text);
  font:700 32px/60px "Manrope",sans-serif;
}

/* Repair detail card */
.repair-detail{
  max-width:967px;width:100%;margin:0 auto;gap:40px;align-items:center;
  display:grid;grid-template-columns:1.6fr 1fr;
  background:transparent !important;
    border:1px solid var(--color-primary);
  box-shadow:0 0 4px rgba(0,0,0,.25);
  padding:10px;
}
.repair-detail .detail-box ul{list-style:none;padding:0;margin:0;}
.repair-detail .detail-box ul li{
  display:flex;padding:20px 0;border-bottom:1px solid color-mix(in srgb, var(--color-text), transparent 86%);
  font:16px "Manrope",sans-serif;color:var(--color-text);
}
.repair-detail .detail-box ul li:last-child{border:0;}
.repair-detail .detail-box ul li strong{width:140px;}
.repair-detail .detail-box ul li span{color:color-mix(in srgb, var(--color-text), transparent 66%);}
.repair-detail figure{max-width:271px;}
.repair-detail figure img{width:100%;height:100%;object-fit:contain}

/* ====== Responsive ====== */
@media (max-width:1100px){
  .repair-tabs-main li a{width:190px;height:56px;font-size:14px;}
}
@media (max-width:991px){
  .repair-detail{gap:30px;padding:20px 30px;}
  .repair-detail .detail-box ul li{padding:15px 0;font-size:16px;}
  .go-back-btn,.go-next-btn{width:130px;height:60px;font-size:22px;line-height:16px;}
}
@media (max-width:800px){
  .repair-tabs-main{overflow:auto;gap:12px;padding-bottom:6px;}
  .repair-tabs-main li a{width:150px;height:41px;font-size:12px;white-space:nowrap;}
}
@media (max-width:768px){
  .custom-repair-tabs{padding:40px 15px;}
  .custom-repair-tabs .repair-tabs-main{margin-bottom:40px;}
  .custom-repair-tabs .heading-box h3{font-size:25px;line-height:32px;padding-bottom:40px;}
  .repair-detail{grid-template-columns:1fr;}
  .repair-detail figure{max-width:271px;margin:0 auto;grid-row-start:1;}
}
@media (max-width:540px){
  .repair-detail{gap:30px;padding:20px 15px;}
  .repair-detail .detail-box ul li{padding:11px 0;font-size:14px;}
}
@media (max-width:450px){
  .repair-detail .detail-box ul li strong{flex:0 0 40%;width:100%;}
}
.go-next-btn:hover{
    color:black !important;
}
    </style>

    <section class="custom-repair-tabs">
        <div class="cust-container">
            <!-- go back btn -->
            <a id="back-button" class="go-back-btn"><i class="fa-solid fa-chevron-left pe-2"
                    style="font-size: 10px;"></i> Go Back</a>
            <!-- Nav tabs -->
            <ul class="breadcrumb-thread repair-tabs-main" id="form-navigation">
                <li class="breadcrumb-item" style="margin: 0;">
                    <a href="#" data-step="0">Repair Info</a>
                </li>
                <li class="breadcrumb-item" style="margin: 0;">
                    <a href="#" data-step="1">Select Repair</a>
                </li>
                <li class="breadcrumb-item" style="margin: 0;">
                    <a href="#" data-step="2">Personal Detail</a>
                </li>
                <li class="breadcrumb-item" style="margin: 0;">
                    <a href="#" data-step="3">Book Repair</a>
                </li>
            </ul>
            <div id="multi-step-form">
                <div id="repair-info-section" class="form-step">
                    <div class="heading-box">
                        <small>Description</small>
                        <h3>Repair Description</h3>
                    </div>

                    <!-- repair device detail -->
                    <div class="device-repair-detail">
                        <div class="repair-detail">
                            <div class="detail-box">
                                <ul>
                                    <li><strong>Model:</strong> <span>{{ $data['modal']['name'] }}</span></li>
                                    <li><strong>Repair Time : </strong> <span>{{ $siteSetting?->repair_time ?: 'Not Available' }}</span></li>
                                    <li><strong>Warranty :</strong> <span>{{ $siteSetting?->warranty ?: 'Not Available' }}</span></li>
                                    <li><strong>Repair Type:</strong> <span>{{ $data['repair_type']['name'] }}</span>
                                    </li>
                                    <li><strong>Total Price:</strong> <span> £ {{$data['repair_price'] ?? 'N/A'}}</span></li> 
                                    

                                </ul>
                            </div>
                            <figure>
                                <img src="{{ asset($data['modal']['file']) ?? 'https://ik.imagekit.io/qml3d7tgz/iphone1_9JHn-8RLU.jpg' }}"
                                    alt="">
                            </figure>
                        </div>

                    </div>
                    <a id="next-button" class="go-next-btn ms-auto mt-3 mt-md-5"> Next <i
                            class="fa-solid fa-chevron-right ps-2" style="font-size: 10px;"></i></a>
                </div>
                <!-- Form Section Part 1 (Initial Hidden) -->
                <section id="form-section-1" class="form-step" style="display:none;">
                     <div class="row justify-content-center">
                            <!-- Patient Detail Form Column -->
                               <div>
                                    <livewire:guest.components.patient-detail-form :key="uniqid()" />
                                </div>
                        </div>
                </section>

                <!-- Form Section Part 2 (Initial Hidden) -->
                <section id="form-section-2" class="form-step bg-white" style="display:none;">
                            <!-- Form Toggle Column -->
                             <div style="background-color:white; ">
                                    <livewire:guest.components.form-toggle :data="$data" :key="uniqid()" />
                            </div>
                </section>

                <!-- Book Repair Component (Initial Hidden) -->
                <section id="book-repair-section" class="form-step" style="display:none;">
                    <livewire:guest.components.book-repair :data="$data" :key="uniqid()" />
                </section>

            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            const steps = ['repair-info-section', 'form-section-2', 'form-section-1', 'book-repair-section'];
            let currentStep = {{ $currentStep }};
            let formCompleted = [true, false, false, false]; // Initialize with `true` for intro section and `false` for others

            function showStep(stepIndex) {
                $('.form-step').hide();
                $('#' + steps[stepIndex]).show();

                if (stepIndex === 0 || stepIndex === 1) {
                    $('#back-button').hide();
                } else {
                    $('#back-button').show();
                }
                if (stepIndex == 3) {
                    $('#heading').hide();
                }

                if (stepIndex === 1 || stepIndex === 2 || stepIndex === 3) {
                    $('#next-button').hide();
                } else {
                    $('#next-button').show();
                    $('#next-button').prop('disabled', !formCompleted[stepIndex]);
                    if (!formCompleted[stepIndex]) {
                        $('#next-button').hide(); // Hide the Next button if the form is not validated
                    } else {
                        $('#next-button').show(); // Show the Next button if the form is validated
                    }
                }

                // Update navigation bar
                $('#form-navigation .breadcrumb-item a').removeClass('active');
                $('#form-navigation .breadcrumb-item a[data-step="' + stepIndex + '"]').addClass('active');
            }

            function moveToNextStep() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            }

            $('#back-button').click(function () {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            $('#next-button').click(function () {
                moveToNextStep();
            });

            $('#form-navigation .breadcrumb-item a').click(function (e) {
                e.preventDefault();
                const stepIndex = $(this).data('step');
                if (stepIndex <= currentStep) {
                    currentStep = stepIndex;
                    showStep(currentStep);
                }
            });

            Livewire.on('formSubmitted', function () {
                formCompleted[currentStep] = true;
                moveToNextStep();
            });

            Livewire.on('formInvalid', function () {
                formCompleted[currentStep] = false;
                showStep(currentStep);
            });

            // Initial display setup
            showStep(currentStep);
        });

        document.addEventListener('livewire:load', function () {
            Livewire.on('formShown', function () {
                // Hide the grid container when a form is shown
                document.querySelector('.grid-container').style.display = 'none';
            });
        });

        function toggleContent() {
            var moreContent = document.getElementById("moreContent");
            var toggleButton = document.getElementById("toggleButton");

            if (moreContent.style.display === "none") {
                moreContent.style.display = "block";
                toggleButton.textContent = "See Less";
            } else {
                moreContent.style.display = "none";
                toggleButton.textContent = "See More";
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/livewire/2.x/livewire.js"></script>








</div>