<div>
<livewire:components.mega-nav />
    <div>
        <section class="head-sell">
            <div class="container">

 


            </div>
        </section>
        
        
        
        <div class="container">

            <section class="fech">
                <div class="container">
                   <div class="row align-items-center">
    <!-- Arrow Icon (Aligned left, responsive) -->
    <div class="col-2 col-sm-1 myarrow">
        <a href="https://https://testing4.sellyourtechuk.com/guest-sell-device-types/3">
            <img src="https://ik.imagekit.io/b6iqka2sz/ali.png?updatedAt=1709054945643" alt="Image"
                class="img-fluid" style="max-width: 100%; height: auto;">
        </a>
    </div>

    <!-- Heading (Responsive text and alignment) -->
    <div class="col-10 col-sm-11">
        <div class="d-flex flex-wrap gap-2 p-3 rounded my-3 shadow-sm justify-content-center justify-content-md-start">
            <h1 class="fw-bold text-dark text-center text-md-start my-3">
                Choose Model Of <span class="text-danger">{{ $device->name ?? '' }} </span>
            </h1>
        </div>
    </div>
</div>


                    <!--<div class="conainer">-->
                    <!--        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-1 gx-0 gy-2">-->
                    <!--            @forelse($models as $model)-->
                    <!--            <div class="col">-->
                    <!--                <div class="card my-2 cursor-pointer align-items-center justify-content-cente pt-2">-->
                    <!--                    <a href="{{ route('guest-sell-model-detail', $model) }}">-->
                    <!--                        <img src="{{ $model->file ?? '' }}" class="img-fluid p-1" style="height:150px; width:150px;">-->
                    <!--                    </a>-->
                    <!--                    <div class="card-body">-->
                    <!-- Added Bootstrap text utility classes -->
                    <!--                        <h5 class="card-title text-center ">{{ $model->name }}</h5>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            @empty-->
                    <!--            <div class="col">-->
                    <!--                <span class="text-danger">Not Found</span>-->
                    <!--            </div>-->
                    <!--            @endforelse-->
                    <!--        </div>-->
                    <!--    </div>-->

<style>
    .shah {
        transition: border-color 0.3s ease-in-out !important;
        height: 250px !important;
    }
    .shah:hover {
        border-color: #dc3545 !important;
        box-shadow: 0 0 40px #dc3545 !important;
        cursor: pointer !important; 
    }
    
    
    
    
</style>

                    <div class="container  ">
                        

                        
                        
                        <!-- Search Bar -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id="modelSearch" class="form-control rounded-pill" placeholder="Search by Model Name">
                                    <button class="btn btn-outline-secondary rounded-pill" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                        
                        <div class="row row-cols-2   d-none d-md-flex d-lg-flex  row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-1 gx-0 gy-2" id="modelContainer">
    @forelse($models as $model)
    <div class="col model-card">
        <div class="card shah my-2 cursor-pointer align-items-center justify-content-center pt-2">
            <a href="{{ route('guest-sell-model-detail', $model) }}">
                  <div class="card-body">
                
                <img src="{{ $model->file ?? '' }}" class="card-img-top img-fluid p-1" style="max-height:150px; max-width:150px;">
                   <h6 class="card-title text-center text-lg-sm" style="font-size: 15px;">{{ $model->name }}</h6>
                
                </div>
            </a>

        </div>
    </div>
    @empty
    <div class="col">
        <span class="text-danger">Not Found</span>
    </div>
    @endforelse
</div>


<!----------------------------the phone screen-------------------------->
   <div class="row row-cols-2   d-md-none d-lg-none row-cols-sm-2 row-cols-md-4 row-cols-lg-6 g-1 gx-0 gy-2" id="modelContainer">
    @forelse($models as $model)
    <div class="col model-card">
        <div class="card my-2 cursor-pointer align-items-center justify-content-center pt-2">
            <a href="{{ route('guest-sell-model-detail', $model) }}">
                <img src="{{ $model->file ?? '' }}" class="card-img-top img-fluid p-1" style="max-height:150px; max-width:150px;">
            </a>
    <div class="card-body">
    <!-- Added Bootstrap text utility classes -->
    <h6 class="card-title text-center text-lg-sm" style="font-size: 12px;">{{ $model->name }}</h6>
</div>


        </div>
    </div>
    @empty
    <div class="col">
        <span class="text-danger">Not Found</span>
    </div>
    @endforelse
</div>



                    </div>

                    <!-- Include Font Awesome -->
                    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

                    <script>
                        // Function to handle model search
                        function searchModels() {
                            // Declare variables
                            var input, filter, models, modelCards, modelName, i;
                            input = document.getElementById('modelSearch');
                            filter = input.value.toUpperCase();
                            models = document.getElementById('modelContainer');
                            modelCards = models.getElementsByClassName('model-card');

                            // Loop through all model cards, and hide those that don't match the search query
                            for (i = 0; i < modelCards.length; i++) {
                                modelName = modelCards[i].getElementsByClassName("card-title")[0];
                                if (modelName.innerText.toUpperCase().indexOf(filter) > -1) {
                                    modelCards[i].style.display = "";
                                } else {
                                    modelCards[i].style.display = "none";
                                }
                            }
                        }

                        // Attach event listener to the search input
                        document.getElementById('modelSearch').addEventListener('keyup', searchModels);
                    </script>










                </div>
            </section>
            {{-- <section class=" mb-4">
                <div class="container bg-gray rounded-4 p-5">
                    <h1 class="fw-bold text-danger">Find your iphone Model </h1>
                    <p>Choose your iphone 13 pro model and memory size to see what it’s worth...</p>
                    <div class="card p-2">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/im2.webp?updatedAt=1697193847328"
                                            class="w-50">
                                    </div>
                                    <div class="card-body">
                                        <p>iphone 13 pro max</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/img2(13).jpg?updatedAt=1697193931991"
                                            class="w-50">
                                    </div>

                                    <div class="card-body">
                                        <p>iphone 13 pro </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/img3(11).png?updatedAt=1697193983509"
                                            class="w-50">
                                    </div>

                                    <div class="card-body">
                                        <p>iphone 11 pro</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/images.jpeg?updatedAt=1697194026960"
                                            class="w-50">
                                    </div>

                                    <div class="card-body">
                                        <p>iphone 12 pro max</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/img2(13).jpg?updatedAt=1697193931991"
                                            class="w-50">
                                    </div>
                                    <div class="card-body">
                                        <p>iphone 12 pro</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/img5(14).webp?updatedAt=1697198317015"
                                            class="w-50">
                                    </div>

                                    <div class="card-body">
                                        <p>iphone 14 pro</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/img6(14).webp?updatedAt=1697198360828"
                                            class="w-50">
                                    </div>
                                    <div class="card-body">
                                        <p>iphone 14 pro max</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/img7(15).webp?updatedAt=1697198405867"
                                            class="w-50">
                                    </div>
                                    <div class="card-body">
                                        <p>iphone 15 pro max</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/img10(12).jpg?updatedAt=1697198454545"
                                            class="w-50">
                                    </div>
                                    <div class="card-body">
                                        <p>iphone 14 pro max</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/img9(12).jpg?updatedAt=1697198504571"
                                            class="w-50">
                                    </div>
                                    <div class="card-body">
                                        <p>iphone 15 pro max</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 my-3">
                                <div class="card text-center p-3">
                                    <div class="text-center">
                                        <img src="https://ik.imagekit.io/phonelab2/img11(11).jpg?updatedAt=1697198565693"
                                            class="w-50">
                                    </div>
                                    <div class="card-body">
                                        <p>iphone 13 pro max</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <div class="container border rounded p-3 my-3">
                <h2 class="fw-bold">How do I sell my mobile phone?</h2>
                <p>{{ $siteSettings->buisness_name ?? '' }} has made selling your mobile phones surprisingly easy and
                    extremely fast. We know
                    you'll be
                    pleasantly surprised
                    with the brilliant prices we offer and we're absolutely sure you'll be amazed with the simplicity
                    and
                    speed of our
                    service.</p>
                <p>We’re here to help you recycle your phone. Whether you want to sell your iPhone to upgrade to the
                    latest
                    Apple
                    smartphone or want to trade in an old Android device for the latest Samsung.</p>
            </div>
        </div>
    </div>

</div>