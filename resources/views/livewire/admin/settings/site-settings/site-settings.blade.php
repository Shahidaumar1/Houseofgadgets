<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="settings" />
        <x-content>
            <livewire:admin.settings.components.top-nav active="site-settings" />

            <div class="container my-5">

                <div class="row">
                    <div class="col-md-6 text-center">
                        <div>

                            <img style="max-width: 210px; height: 61px;" id="selectedImage" wire:ignore src="{{asset($siteSetting->logo)}}" alt="web site logo" />
                        </div>

                             <div class="btn btn-primary btn-rounded mt-3" style="background-color: #E4E7E9; color :black; border: 1px solid #212059;padding : 10px 56px">
                           
                            <label class="form-label m-1"  for="customFile1"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                              <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                            </svg>  Choose Logo</label>
                            <input type="file" wire:model="logo" class="form-control d-none" id="customFile1" name="logo" accept="image/*" onchange="displaySelectedImage(event, 'selectedImage')" />
                            <span wire:loading wire:target="file">loading...</span>
                        </div>

                    </div>
                    
                    <div class="col-md-6 text-center">
                        <div>
                            <img style="max-width: 60px;" id="selectedFav" wire:ignore src="{{ asset($siteSetting->favicon) }}" alt="web site Favicon" />
                        </div>
                        <div class="btn btn-primary btn-rounded mt-3" style="background-color: #E4E7E9; color :black; border: 1px solid #212059;padding : 10px 56px">
                                <label class="form-label  m-1" for="customFile">
                                  
                                Choose fav  
                                 <div class="tooltip-container">
                                    <span class="tooltip-trigger">
                                         <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                </svg> 
                                    </span>
                                    <div class="tooltip-content" style="border-radius: 30px;    min-width: 200px;">
                                    <p>What’s Fav</p>
                                    <img src="https://ik.imagekit.io/4csyk445b/Screenshot%202024-04-05%20154440.png?updatedAt=1712320570090"
                                        alt="Tooltip Image">
                                    <p> image displayed next to 
                                    <br> the page title in the
                                    <br>browser tab</p>
                                    
                                </div>
                                </div>
                                </label>
                            <input type="file" class="form-control d-none" wire:model="favicon" id="customFile" name="fav" accept="image/*" onchange="displaySelectedFav(event, 'selectedFav')" />
                            <span wire:loading wire:target="file">loading...</span>
                        </div>
                    </div>

                </div>

                <script>
                    function displaySelectedImage(event, elementId) {
                        const selectedImage = document.getElementById(elementId);
                        const fileInput = event.target;

                        if (fileInput.files && fileInput.files[0]) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                selectedImage.src = e.target.result;
                            };

                            reader.readAsDataURL(fileInput.files[0]);
                        }
                    }

                    function displaySelectedFav(event, elementId) {
                        const selectedFav = document.getElementById(elementId);
                        const fileInput = event.target;

                        if (fileInput.files && fileInput.files[0]) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                selectedFav.src = e.target.result;
                            };

                            reader.readAsDataURL(fileInput.files[0]);
                        }
                    }
                    
                </script>
            </div>

                @csrf
                <div class=" mt-5">
                
                    <div class="row justify-content-center" >
                        <div class="col-md-4">
                            <label for="buisness_name" class="form-label">Buisness Name:</label>
                            <input type="text" wire:model="siteSetting.buisness_name" class="form-control" id="buisness_name" placeholder="Enter Buisness Name">
                        </div>
                        <div class="col-md-4">
                            <label for="website_url" class="form-label">Website URL:</label>
                            <input type="url" wire:model="siteSetting.website_url" class="form-control" id="website_url" placeholder="Enter Website URL">
                        </div>
                        <div class="col-md-4">
        <label for="whatsapp_number" class="form-label">WhatsApp Number:</label>
        <input type="text" wire:model="siteSetting.whatsapp_number" class="form-control" id="whatsapp_number" placeholder="e.g. +447123456789">
    </div>

 <!-- Adding Repair Time and Warranty Boxes -->
                <div class="row mt-3 justify-content-center">
                    <div class="col-md-4">
                        <label for="repair_time" class="form-label">Repair Time (in minutes):</label>
                        <input type="text" wire:model="siteSetting.repair_time" class="form-control" id="repair_time" placeholder="Enter Repair Time">
                        @error('siteSetting.repair_time') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="warranty" class="form-label">Warranty:</label>
                        <input type="text" wire:model="siteSetting.warranty" class="form-control" id="warranty" placeholder="Enter Warranty">
                        @error('siteSetting.warranty') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div> 
                
                    </div>

                
                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="fb_link" class="form-label">Facebook Link:</label>
                            <input type="url" wire:model="siteSetting.fb_link" class="form-control" id="fb_link" placeholder="Enter Facebook Link">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.fb_link_status" id="fb_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="fb_link_status">Status</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="insta_link" class="form-label">Instagram Link:</label>
                            <input type="url" wire:model="siteSetting.insta_link" class="form-control" id="insta_link" placeholder="Enter Instagram Link">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.insta_link_status" id="insta_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="insta_link_status">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="linkedin_link" class="form-label">LinkedIn Link:</label>
                            <input type="url" wire:model="siteSetting.linkedin_link" class="form-control" id="linkedin_link" placeholder="Enter LinkedIn Link">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.linkedin_link_status" id="linkedin_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="linkedin_link_status">Status</label>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="twitter_link" class="form-label">Twitter Link:</label>
                            <input type="url" wire:model="siteSetting.twitter_link" class="form-control" id="twitter_link" placeholder="Enter Twitter Link">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.twitter_link_status" id="twitter_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="twitter_link_status">Status</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="tiktok_link" class="form-label">TikTok Link:</label>
                            <input type="url" wire:model="siteSetting.tiktok_link" class="form-control" id="tiktok_link" placeholder="Enter TikTok Link">
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.tiktok_link_status" id="tiktok_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="tiktok_link_status">Status</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="snapchat_link" class="form-label">Snapchat Link:</label>
                            <input type="url" wire:model="siteSetting.snapchat_link" class="form-control" id="snapchat_link" placeholder="Enter Snapchat Link">
                            <div class="form-check form-switch mt-2">
                                <label class="form-check-label">Status</label>
                                <input class="form-check-input" type="checkbox" role="switch" wire:model="siteSetting.snapchat_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                            </div>
                        </div>
                        <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="google_map_profile_link" class="form-label">Google Map Profile Link:</label>
                            <input type="url" wire:model="siteSetting.google_map_profile_link" class="form-control" id="google_map_profile_link" placeholder="Enter Google Map Profile Link">
                            @error('siteSetting.google_map_profile_link') <span class="text-danger">{{ $message }}</span> @enderror
                            <div class="form-check form-switch mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="siteSetting.google_map_profile_link_status" id="google_map_profile_link_status" data-toggle="switch" data-on-text="On" data-off-text="Off">
                                <label class="form-check-label" for="google_map_profile_link_status">Status</label>
                            </div>
                        </div>
                    </div>
                   <!-- Google Reviews Settings -->
<!--<div class="row mt-3 justify-content-center">-->
<!--    <div class="col-md-8">-->
<!--        <div class="card">-->
<!--            <div class="card-header">-->
<!--                <h5>Google Reviews Settings</h5>-->
<!--            </div>-->
<!--            <div class="card-body">-->
<!--                <div class="form-group">-->
<!--                    <label>Rating (1-5)</label>-->
<!--                    <div class="star-rating">-->
<!--                        @for($i = 1; $i <= 5; $i++)-->
<!--                            <span class="star {{ $i <= $siteSetting->google_rating ? 'filled' : '' }}" -->
<!--                                  wire:click="setRating({{ $i }})">★</span>-->
<!--                        @endfor-->
<!--                    </div>-->
<!--                    <input type="hidden" wire:model="siteSetting.google_rating">-->
<!--                    <small>Current: {{ $siteSetting->google_rating ?? 5.0 }} stars</small>-->
<!--                </div>-->
                
<!--                <div class="form-group mt-3">-->
<!--                    <label>Review Count</label>-->
<!--                    <input type="number" wire:model="siteSetting.google_reviews_count" class="form-control" min="0">-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
                    <!-- Repeat the above structure for other fields -->
                    
                    
{{-- ===== Slider Manager (Home Hero) ===== --}}
<h4 class="mt-5 mb-3">Homepage Slider</h4>
<livewire:admin.slides.manage-slides />


{{-- ===== Google Reviews (Homepage Banner) ===== --}}
<livewire:admin.settings.google-reviews.manage-google-reviews />



                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-8">
                            <label for="map_link" class="form-label">Map Link:</label>
                            <textarea rows="10" wire:model="siteSetting.map_link" class="form-control" id="map_link" placeholder="Enter Map Embedded code"></textarea>
                        </div>
                    </div>
                </div>


                <div class="container mt-3 pb-5">
                    <form wire:submit.prevent="updateSiteSettings">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <!--javeria code-->
                            <button type="submit" class="btn btn-primary">Update Site Settings</button>

                            <span wire:loading wire:target="updateSiteSettings">saving....</span>
                        </div>
                        <div class="col-auto">
                            @php
                            $firstBranch = \App\Models\Branch::first();
                            $hasBranches = $firstBranch !== null;
                            @endphp

                            <a href="{{ $hasBranches ? route('edit-branches', ['branchId' => $firstBranch->id]) : route('create-branches') }}" class="text-white item m-1">
                                <button type="button" class="btn btn-primary">
                                    {{ $hasBranches ? 'Edit Main Branch' : 'Create Main Branch' }}
                                </button>
                            </a>
                        </div>
                        </form>
                    </div>

                </div>
                <script>
                    $(function() {
                        $('[data-toggle="switch"]').bootstrapSwitch();
                    });
                </script>
            </form>

            <div class="m-4">{!! $siteSetting->map_link !!}
            </div>
                                           <div class="row mt-3 justify-content-center">
                                 <livewire:admin.manage-emails />

                 </div>
        </x-content>

    </div>


</div>
<style>
.button-sticky {
    height: 60px;
    color: white;
    font-family: sans-serif;
    font-size: 15px;
    line-height: 15px;
    text-align: center;
    position: fixed !important;
    bottom: -2px;
    z-index: 999;
    width: 100%;
 
}

/* Frontend display */
.rating-stars {
    color: #FFD700;
    letter-spacing: 2px;
}

.review-section {
    font-size: 16px;
    font-weight: bold;
}

/* Admin controls */
.star-rating {
    font-size: 24px;
    cursor: pointer;
}
.star-rating .star {
    color: #ccc;
    transition: color 0.2s;
}
.star-rating .star.filled {
    color: orange;
}

.home-btn:hover {
    color: orange;
}
.button-sticky .col-2 {
    margin-right: 5px; /* Adjust this value to set the desired gap */
}
.tooltip-container {
    position: relative;
    display: inline-block;
}

.tooltip-content {
    visibility: hidden;
    position: absolute;
    z-index: 1;
    background-color: #334155; /* Changed background color */
    padding: 10px;
    border: 1px solid #ccc;
    color: white;
    top: calc(100% + 10px); /* Position the tooltip 10px below the icon */
    left: 50%; /* Position the tooltip horizontally centered */
    transform: translateX(-50%); /* Center the tooltip horizontally */
}

.tooltip-content img {
    max-width: 200px; /* Adjust as needed */
    border-radius: 10px;
}

.tooltip-container:hover .tooltip-content {
    visibility: visible;
}

/*.form-control{*/
/*    border:0px;*/
/*}*/


</style>
<div class="button-sticky container bg-blue d-lg-none d-md-none">
    <div class="row ">

        <div class="col-2  mt-4 ml-1">
            <a href="{{ route('payment-methods-settings') }}" class="text-white item "> Payment</a>
     
     
        </div>

        <div class="col-2  mt-4 ">
            <a href="{{ route('site-settings') }}" class="text-white  item "> site-settings</a>
        
        </div>

        <div class="col-2  mt-4 ">
            <a href="{{ route('branches-settings') }}" class="text-white  item "> Branches</a>
        </div>

        <div class="col-2 mt-4">
            <a href="{{ route('create-branches') }}" class="text-white  item ">Create</a>
        </div>
        <div class="col-2 mt-4">
            <a href="{{ route('services-settings') }}" class="text-white  item ">Services</a>
        </div>
    </div>
</div>
