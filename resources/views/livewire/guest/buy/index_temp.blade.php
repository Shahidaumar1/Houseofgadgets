<div>
    <div>
        <!-- --------------------------top bar----------------- -->
        <livewire:components.top-bar />
        <!-- --------------------navbar--------------------- -->
        <livewire:components.mega-nav />
        <!-- --------------search filter-------- -->

        <div class="container ">
            {{-- search filter --}}
            <div class="row">
                <div class="d-flex my-3 align-items-center justify-content-center  ">

                    <div class="col-lg-6 col-md-4">
                        <form class="d-flex " role="search">
                            <div class="wrapper">
                                <div class="search_box khuram">
                                    <div class="d-flex gap-2 ">
                                        <div class="dropdown ">

                                            <select class="form-control categories-k rounded-pill "
                                                wire:model="selectedCategoryId">

                                                <option class="text-center font-weight-bold kh" value="All">All</option>
                                                @forelse($categories as $key => $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @empty
                                                    <option value="">Not Found!</option>
                                                @endforelse


                                            </select>
                                        </div>
                                        <div class="search_field ">
                                            <input type="text" class="form-control rounded-pill" placeholder="Search"
                                                wire:model.debounce.500="search">
                                            {{-- <i class="bi bi-search "></i> --}}

                                            <img class="bi" src="{{ asset('assets/kimges/icon.webp') }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        {{-- devices --}}
        <div class="d-flex gap-2 justify-content-center mb-4 ">
            @if ($selectedCategoryId != 'All')
                @forelse ($devices as $device)
                    <div class="bubble logo1 bg-light cursor-pointer {{ $selectedDevice && $selectedDevice->id == $device->id ? 'border border-success border-2 ' : '' }}"
                        wire:click="selectDevice('{{ $device->id }}')"><img src="{{ $device->file ?? '#' }}"
                            alt=""></div>
                @empty
                    <div>Not Found !</div>
                @endforelse
            @endif


        </div>

        {{-- left card filter with right models data --}}
        <section class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="d-flex justify-content-end">
                        <a class="text-primary cursor-pointer" wire:click="clearFilter">Clear Filter</a>
                    </div>
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2"> Memory Sizes</h3>
                        <div class="p-2">
                            @foreach ($memory_sizes as $memory_size)
                                <div class="form-check">
                                    <input {{ $selectedMemorySize == $memory_size ? 'checked' : '' }}
                                        class="form-check-input" type="radio" name="memory_size"
                                        value="{{ $memory_size }}"
                                        wire:click="filterByMemorySize('{{ $memory_size }}')">
                                    <label class="form-check-label">
                                        {{ $memory_size }}
                                    </label>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <section>
                        <div class="box card my-2">
                            <h3 class="bg-danger text-white  p-2"> Grade</h3>
                            <div class="p-2">
                                @foreach ($grades as $key => $g)
                                    <div class="form-check">
                                        <input {{ $selectedGrade == $g ? 'checked' : '' }} class="form-check-input"
                                            type="radio" name="grade" value="{{ $g }}"
                                            wire:click="filterByGrade('{{ $g }}')">
                                        <label class="form-check-label">
                                            {{ $g }}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </section>

                    <!-- ---------------Color-------- -->

                    <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2"> Color</h3>
                        <div class="p-2">
                            @foreach ($colors as $color)
                                <div class="form-check">
                                    <input {{ $selectedColor == $color ? 'checked' : '' }} class="form-check-input"
                                        type="radio" name="color" value="{{ $color }}"
                                        wire:click="filterByColor('{{ $color }}')">
                                    <label class="form-check-label">
                                        {{ $color }}
                                    </label>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <!-- -------------------------price----------- -->
                    <div class="box card my-2">
                        <h3 class="bg-danger text-white  p-2"> PRICE</h3>
                        <div class="p-2">
                            <label for="customRange1" class="form-label">£0</label>
                            <input type="range" class="form-range" id="customRange1" min="0" max="12000"
                                wire:model="price">
                            <span style="float:right;">£ {{ $price ?? '12000' }}</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="d-flex flex-wrap gap-4">

                        @forelse($models as $model)
                            <a href="{{ route('guest-buy-product-specs', $model['id']) }}">
                                <div class="card pt-1 align-items-center justify-content-center text-center">
                                    <img src="{{ $model['file'] ?? '#' }}" class="img-fluid p-3"
                                        style="height:172px;width:172px" />
                                    <div class="card-body" style="width: 172px;">
                                        <!-- Set a specific width for text container -->
                                        <h4>{{ $model['name'] }}</h4>
                                        <span class="btn btn-danger">View Details</span>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <span>Not Found!</span>
                        @endforelse
                    </div>
                </div>

            </div>

        </section>




    </div>
    <section class="sabscrib ">
        <div class="container d-flex flex-wrap  justify-content-between align-items-center ">
            <div class="left">
                <h2>Join Our Newsletter Now</h2>
                <p>Register now to get updates</p>
            </div>
            <div class="right">
                <input type="text" placeholder="Enter your email address" class="form-control">
                <button>SUBSCRIBE</button>
            </div>
        </div>
    </section>



</div>
<style>
   .kh {
  font-weight: 900 !important;
}

    
</style>
