<div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/09d3c3a997.js" crossorigin="anonymous"></script>

    <!-- Top Bar Component -->
    <livewire:components.top-bar />

    <!-- Mega Navigation Component with white theme -->
    <section class="bg-pink-linear">
        <livewire:components.mega-nav theme="white" />

        <!-- Introduction Section -->
        <div class="container">
            <div class="text-center my-4 p-3 rounded-3">
                <h2>{{ $data['repair_type']->name }} on your <br>
                    <span class="text-danger">{{ $data['modal']->name }}</span>
                </h2>
                <span class="tagline">{!! $webContent->repair_page5_heading1 !!}</span>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <div x-data="{ currentStep: 0, steps: ['repair-info-section', 'grid-section', 'form-section-1', 'form-section-2', 'book-repair-section', 'tile-1-section', 'tile-2-section', 'tile-3-section', 'tile-4-section'] }">
        <div class="container">
            <!-- Pre-Repair Checklist and Service Information -->
            <section id="repair-info-section" x-show="currentStep === 0">
                <div class="my-5 p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="my-4 p-3 rounded-3">
                                <h2><span class="text-danger">{{ $data['modal']->name }} Repairs </span></h2>
                                <p><span class="text-danger">What if you can't fix my device?</span> No charge if we can't repair your device. <br>We'll provide details on the issue and offer alternatives, <br> including returning your device as is.</p>
                                <h1 class="text-danger">{{ $data['modal']->name }} <br> {{$data['repair_type']->name}}</h1>
                            </div>
                        </div>
                        <!-- Checklist Column -->
                        <div class="col-lg-4 text-start">
                            <h3 class="text-danger">{{ $data['modal']->name }} {{$data['repair_type']->name}}</h3>
                            <div><br></div>
                            <h4><b class="text-danger">&#10003; How long?</b> {{ $data['repair_type']->duration ?? '' }}</h4>
                            <h4><b class="text-danger">&#10003; Part Used?</b> {{ $data['repair_type']->part_used ?? '' }}</h4>
                            <h4><b class="text-danger">&#10003; Warranty?</b> {{ $data['repair_type']->warranty ?? '' }}</h4>
                            <h4><b class="text-danger">&#10003; Will my data be lost?</b> {{ $data['repair_type']->data_loss ?? '' }}</h4>
                            <h4><b class="text-danger">&#10003; Post Repair Advice?</b> {!! $data['repair_type']->advice ?? '' !!}</h4>
                            <h4><b class="text-danger">&#10003; What if you can’t fix my device?</b> {!! $data['repair_type']->no_fix_no_fee ?? '' !!}</h4>
                        </div>

                        <!-- Device Image Column -->
                        <div class="col-lg-2 mt-5">
                            <img src="{{ asset($data['modal']->file) ?? 'https://ik.imagekit.io/qml3d7tgz/iphone1_9JHn-8RLU.jpg' }}" style="height:400px; width:281px" />
                        </div>
                    </div>
                </div>
            </section>

            <!-- Grid Section -->
            <section id="grid-section" x-show="currentStep === 1">
                <div class="bg-white">
                    <div class="grid-heading">
                        <h3 class="text-center text-danger">What way would you like us to fix your device?</h3>
                        <p class="text-center">If your iPhone 14 Plus is damaged, we understand that you would want this repaired in no time so you... <span class="text-danger">Read More</span></p>
                    </div>
                    <div class="grid-container" role="grid">
                        @if ($formStatuses[0]->$formService)
                            <div class="grid-item">
                                <a href="#" @click.prevent="currentStep = 5">
                                    <div class="icon-container text-danger">
                                        <i class="fas fa-store"></i>
                                    </div>
                                    <div class="option-label text-dark">Store Repair</div>
                                    <div class="option-description">Choose from one of our 40 nationwide locations.</div>
                                </a>
                            </div>
                        @endif
                        @if ($formStatuses[1]->$formService)
                            <div class="grid-item">
                                <a href="#" @click.prevent="currentStep = 6">
                                    <div class="icon-container text-danger">
                                        <i class="fas fa-mail-bulk"></i>
                                    </div>
                                    <div class="option-label text-dark">Postal Repair</div>
                                    <div class="option-description">No stores close to you? Send your device to us!</div>
                                </a>
                            </div>
                        @endif
                        @if ($formStatuses[2]->$formService && $data['service'] != 'Buy')
                            <div class="grid-item">
                                <a href="#" @click.prevent="currentStep = 7">
                                    <div class="icon-container text-danger">
                                        <i class="fas fa-truck"></i>
                                    </div>
                                    <div class="option-label text-dark">Collect My Device</div>
                                    <div class="option-description">We'll pick up your device for repair and return it to you afterward.</div>
                                </a>
                            </div>
                        @endif
                        @if ($formStatuses[3]->$formService && $data['device']['name'] != 'Apple iPad' && $data['service'] == 'Repair')
                            <div class="grid-item">
                                <a href="#" @click.prevent="currentStep = 8">
                                    <div class="icon-container text-danger">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="option-label text-dark">Fix At My Address</div>
                                    <div class="option-description">Our technicians will visit your residence to repair your mobile device.</div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

            <!-- Form Section Part 1 (Initial Hidden) -->
            <section id="form-section-1" x-show="currentStep === 2" style="display:none;">
                <div>
                    <div class="row justify-content-center">
                        <!-- Patient Detail Form Column -->
                        <div class="col-12 col-lg-12 rounded p-4">
                            <div>
                                <livewire:guest.components.patient-detail-form :key="uniqid()" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Form Section Part 2 (Initial Hidden) -->
            <section id="form-section-2" class="bg-white" x-show="currentStep === 3" style="display:none;">
                <div class="container">
                    <div class="row">
                        <!-- Form Toggle Column -->
                        <div class="col-lg-12">
                            <div class="bg-pink-linear rounded p-4">
                                <livewire:guest.components.form-toggle :data="$data" :key="uniqid()" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Book Repair Component (Initial Hidden) -->
            <section id="book-repair-section" x-show="currentStep === 4" style="display:none;">
                <livewire:guest.components.book-repair :data="$data" :key="uniqid()" />
            </section>

            <!-- Tile 1 Section (Store Repair) -->
            <section id="tile-1-section" x-show="currentStep === 5" style="display:none;">
                <livewire:guest.components.store-repair-form :key="uniqid()" />
            </section>

            <!-- Tile 2 Section (Postal Repair) -->
            <section id="tile-2-section" x-show="currentStep === 6" style="display:none;">
                <livewire:guest.components.postal-repair-form :key="uniqid()" />
            </section>

            <!-- Tile 3 Section (Collect My Device) -->
            <section id="tile-3-section" x-show="currentStep === 7" style="display:none;">
                <livewire:guest.components.collect-device-form :key="uniqid()" />
            </section>

            <!-- Tile 4 Section (Fix At My Address) -->
            <section id="tile-4-section" x-show="currentStep === 8" style="display:none;">
                <livewire:guest.components.fix-at-address-form :key="uniqid()" />
            </section>
        </div>

        <!-- Navigation Buttons -->
        <div class="container mt-4">
            <div class="d-flex justify-content-between">
                <button class="btn btn-primary" @click="if(currentStep > 0) currentStep--" :disabled="currentStep === 0">Back</button>
                <button class="btn btn-primary" @click="if(currentStep < steps.length - 1) currentStep++" :disabled="currentStep === steps.length - 1">Next</button>
            </div>
        </div>
    </div>
</div>
