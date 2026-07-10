<div>


    <div>

        <div class="d-flex">
            <livewire:admin.components.side-nave active="website-contents" />
            <x-content>

                <div class="container my-4">
                    <!-- resources/views/livewire/admin/website-contents/index.blade.php -->

                    <div class="d-flex d-md-none d-lg-none  align-items-center justify-content-start  mb-3  ">
                           
                                <a href="{{ route('buy-categories') }}" class="btn btn-primary float-end" style = "border-radius: 10px; color: white; background-color: red; padding: 10px; border:0px;">Back</a>
                    </div>
                    <h1 class="text-center bg-gray">Website Contents</h1>


                    <div class="d-flex align-items-center justify-content-center gap-4 mb-3  ">
                        <div class=" d-flex gap-2 cursor-pointer mt-3" wire:click="edit()">
                            <i class="fa fa-plus text-success " style="font-size:20px;" aria-hidden="true"></i>
                            <h4 class="fw-bold">Create new</h4>
                        </div>

                    </div>


                </div>
                <div class="container my-2 p-1">
                    <div class="d-flex flex-wrap justify-content-center">
                    <button class="btn selected-button m-1" wire:click="toggleSection('homePage')">Home Page</button>
                    <button class="btn selected-button m-1" wire:click="toggleSection('sellCategories')">Sell Categories</button>
                    <button class="btn selected-button m-1" wire:click="toggleSection('deviceTypes')">Device Types</button>
                    <button class="btn selected-button m-1" wire:click="toggleSection('repairCategories')">Repair Categories</button>
                    <button class="btn selected-button m-1" wire:click="toggleSection('repairCheckout')">Repair Checkout</button>
                    <button class="btn selected-button m-1" wire:click="toggleSection('termsAndConditions')">Terms & Conditions</button>
                    <button class="btn selected-button m-1" wire:click="toggleSection('privacyPolicy')">Privacy Policy</button>
                    <button class="btn selected-button m-1" wire:click="toggleSection('aboutUs')">About Us</button>
                    <a href="{{ route('themes.index') }}" class="btn theme-btn mt-3">
                    <span class="theme-btn__glow"></span>
                   <i class="fa fa-palette me-2"></i> Theme
                    </a>
                </div>

                    <hr>
                    @if ($page == 'homePage')
                        <section>
                            <nav class="navbar px-3 py-0  navbar-expand-lg navbar-light bg-light"
                                style="border-radius: 0px 0px 27px 27px;">
                                <livewire:components.logo />

                                <div class="collapse navbar-collapse" id="navbarSupportedContent" x-show="open"
                                    x-transition>
                                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                                        <!-- ------------------------sell-------- -->
                                        @if ($editableTextKey == 'mega_nav_sell')
                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                        @else
                                            <div wire:click="toggleEditableByKey('mega_nav_sell')" class="d-flex">
                                                <p class="btn {{ 'bg-danger text-white' }} "
                                                    style="border: none; font-weight: bold;" data-bs-toggle="collapse"
                                                    aria-expanded="false" aria-controls="collapseSellDevice">
                                                    {!! $webContent->mega_nav_sell !!} &nbsp;<i class="bi bi-chevron-down"></i>
                                                </p><i class="fa fa-edit text-success cursor-pointer"
                                                    onclick="editthis('mega_nav_sell')" aria-hidden="true"></i>Styling
                                            </div>
                                        @endif

                                        @if ($editableTextKey == 'mega_nav_buy')
                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                        @else
                                            <div wire:click="toggleEditableByKey('mega_nav_buy')" class="d-flex">
                                                <p class="btn {{ 'bg-danger text-white' }} "
                                                    style="border: none; font-weight: bold;" data-bs-toggle="collapse"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    {!! $webContent->mega_nav_buy !!} &nbsp;<i class="bi bi-chevron-down"></i>
                                                </p><i class="fa fa-edit text-success cursor-pointer"
                                                    onclick="editthis('mega_nav_buy')" aria-hidden="true"></i>Styling
                                            </div>
                                        @endif

                                        @if ($editableTextKey == 'mega_nav_repair')
                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                        @else
                                            <div wire:click="toggleEditableByKey('mega_nav_repair')" class="d-flex">
                                                <p class="btn {{ 'bg-danger text-white' }} "
                                                    style="border: none; font-weight: bold;" data-bs-toggle="collapse"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    {!! $webContent->mega_nav_repair !!} &nbsp;<i class="bi bi-chevron-down"></i>
                                                </p> <i class="fa fa-edit text-success cursor-pointer"
                                                    onclick="editthis('mega_nav_repair')" aria-hidden="true"></i>Styling
                                            </div>
                                        @endif

                                    </ul>


                            </nav>

                            <div class="col-lg-6 col-md-8 col-sm-6 card-home bg-white p-5 khu"
                                style="width: 100%; margin-top:146px; position: relative;">

                                @if ($editableTextKey == 'getstarted1')
                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                @else
                                    <div wire:click="toggleEditableByKey('getstarted1')" class="d-flex">
                                        <p> {!! $webContent->getstarted1 !!}</p><i class="fa fa-edit text-success cursor-pointer"
                                            onclick="editthis('getstarted1')" aria-hidden="true"></i>Styling
                                    </div>
                                @endif

                                @if ($editableTextKey == 'getstarted2')
                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                @else
                                    <div wire:click="toggleEditableByKey('getstarted2')" class="d-flex">
                                        <h1 class="animated" style="font-family: heading;">{!! $webContent->getstarted2 !!}</h1>
                                        </p><i class="fa fa-edit text-success cursor-pointer"
                                            onclick="editthis('getstarted2')" aria-hidden="true"></i>Styling
                                    </div>
                                @endif

                                @if ($editableTextKey == 'getstarted3')
                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                @else
                                    <div wire:click="toggleEditableByKey('getstarted3')" class="d-flex">
                                        <p>{!! $webContent->getstarted3 !!}</p> <i class="fa fa-edit text-success cursor-pointer"
                                            onclick="editthis('getstarted3')" aria-hidden="true"></i>Styling
                                    </div>
                                @endif

                                @if ($editableTextKey == 'getstarted_btn')
                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                @else
                                    <div wire:click="toggleEditableByKey('getstarted_btn')" class="d-flex">
                                        <a class="btn  px-5" href="#services"
                                            style="background:#585757;color:white">{!! $webContent->getstarted_btn !!}</a> <i
                                            class="fa fa-edit text-success cursor-pointer"
                                            onclick="editthis('getstarted_btn')" aria-hidden="true"></i>Styling
                                    </div>
                                @endif



                            </div>
                            <section class="device-Fixed" id="services">
                                <div class="container">
                                    @if ($editableTextKey == 'home_sec_1')
                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                    @else
                                        <div wire:click="toggleEditableByKey('home_sec_1')" class="d-flex">
                                            <h1 class="text-center my-3 bg-white p-2 rounded "
                                                style="font-family: heading;">{!! $webContent->home_sec_1 !!}</h1><i
                                                class="fa fa-edit text-success cursor-pointer"
                                                onclick="editthis('home_sec_1')" aria-hidden="true"></i>Styling
                                        </div>
                                    @endif


                                    <div class="row my-5">
                                        <div class="col-lg-4 col-md-6 my-2">
                                            <div class="card j">
                                                <img src="{{ asset('assets/kimges/sell-phone-online.jpg') }}"
                                                    class="img-fluid img-thumbnail ">
                                                <div class="card-body align-self-center">
                                                    @if ($editableTextKey == 'home_sell_btn')
                                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                    @else
                                                        <div wire:click="toggleEditableByKey('home_sell_btn')"
                                                            class="d-flex">
                                                            <h3>{!! $webContent->home_sell_btn !!}</h3> <i
                                                                class="fa fa-edit text-success cursor-pointer"
                                                                onclick="editthis('home_sell_btn')"
                                                                aria-hidden="true"></i>Styling
                                                        </div>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 my-2">
                                            <div class="card">
                                                <img src="{{ asset('assets/kimges/buycard.jpg') }}"
                                                    class=" img-fluid img-thumbnail Device ">
                                                <div class="card-body align-self-center">
                                                    @if ($editableTextKey == 'home_buy_btn')
                                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                    @else
                                                        <div wire:click="toggleEditableByKey('home_buy_btn')"
                                                            class="d-flex">
                                                            <h3>{!! $webContent->home_buy_btn !!}</h3> <i
                                                                class="fa fa-edit text-success cursor-pointer"
                                                                onclick="editthis('home_buy_btn')"
                                                                aria-hidden="true"></i>Styling
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 my-2 justify-content-center">
                                            <div class="card ">
                                                <img src="{{ asset('assets/kimges/repair.jpg') }}"
                                                    class="img-fluid img-thumbnail ">
                                                <div class="card-body align-self-center text-center">
                                                    @if ($editableTextKey == 'home_repair_btn')
                                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                    @else
                                                        <div wire:click="toggleEditableByKey('home_repair_btn')"
                                                            class="d-flex">
                                                            <h3>{!! $webContent->home_repair_btn !!}</h3> <i
                                                                class="fa fa-edit text-success cursor-pointer"
                                                                onclick="editthis('home_repair_btn')"
                                                                aria-hidden="true"></i>Styling
                                                        </div>
                                                    @endif
                                                    <h3 class="pl-3"></h3>
                                                </div>

                                            </div>
                                        </div><br><br>
                                        <div class="row d-flex alig-items-center mt-5">
                                            @if ($editableTextKey == 'home_aboutus')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('home_aboutus')" class="d-flex">
                                                    <h1 class="text-Black mt-4" data-aos="fade-up">
                                                        {!! $webContent->home_aboutus !!}</h1> <i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('home_aboutus')" aria-hidden="true"></i>Styling
                                                </div>
                                            @endif

                                            <div class="col-lg-12">
                                                <div class="row my-3 d-flex justify-content-around">
                                                    <div class="col-lg-5 col-md-5 my-2 box text-center"
                                                        data-aos="fade-up">
                                                        <img src="{{ asset('assets/img/d.png') }}" class="img-fluid">
                                                        @if ($editableTextKey == 'home_aboutus_box1_line1')
                                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                        @else
                                                            <div wire:click="toggleEditableByKey('home_aboutus_box1_line1')"
                                                                class="d-flex">
                                                                <h4 class="my-3">{!! $webContent->home_aboutus_box1_line1 !!}</h4> <i
                                                                    class="fa fa-edit text-success cursor-pointer"
                                                                    onclick="editthis('home_aboutus_box1_line1')"
                                                                    aria-hidden="true"></i>Styling
                                                            </div>
                                                        @endif
                                                        @if ($editableTextKey == 'home_aboutus_box1_line2')
                                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                        @else
                                                            <div wire:click="toggleEditableByKey('home_aboutus_box1_line2')"
                                                                class="d-flex">
                                                                <p>{!! $webContent->home_aboutus_box1_line2 !!}</p> <i
                                                                    class="fa fa-edit text-success cursor-pointer"
                                                                    onclick="editthis('home_aboutus_box1_line2')"
                                                                    aria-hidden="true"></i>Styling
                                                            </div>
                                                        @endif


                                                    </div>
                                                    <div class="col-lg-5 col-md-5 my-2 box text-center"
                                                        data-aos="fade-up">
                                                        <img src="{{ asset('assets/img/r.png') }}" class="img-fluid">
                                                        @if ($editableTextKey == 'home_aboutus_box2_line1')
                                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                        @else
                                                            <div wire:click="toggleEditableByKey('home_aboutus_box2_line1')"
                                                                class="d-flex">
                                                                <h4 class="py-3">{!! $webContent->home_aboutus_box2_line1 !!}</h4> <i
                                                                    class="fa fa-edit text-success cursor-pointer"
                                                                    onclick="editthis('home_aboutus_box2_line1')"
                                                                    aria-hidden="true"></i>Styling
                                                            </div>
                                                        @endif

                                                        @if ($editableTextKey == 'home_aboutus_box2_line2')
                                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                        @else
                                                            <div wire:click="toggleEditableByKey('home_aboutus_box2_line2')"
                                                                class="d-flex">
                                                                <p>{!! $webContent->home_aboutus_box2_line2 !!}</p><i
                                                                    class="fa fa-edit text-success cursor-pointer"
                                                                    onclick="editthis('home_aboutus_box2_line2')"
                                                                    aria-hidden="true"></i>Styling
                                                            </div>
                                                        @endif

                                                    </div>
                                                    <div class="col-lg-5 col-md-5 my-2 box text-center"
                                                        data-aos="fade-up">
                                                        <img src="{{ asset('assets/img/g.png') }}" class="img-fluid">
                                                        @if ($editableTextKey == 'home_aboutus_box3_line1')
                                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                        @else
                                                            <div wire:click="toggleEditableByKey('home_aboutus_box3_line1')"
                                                                class="d-flex">
                                                                <h4 class="py-3">{!! $webContent->home_aboutus_box3_line1 !!}</h4> <i
                                                                    class="fa fa-edit text-success cursor-pointer"
                                                                    onclick="editthis('home_aboutus_box3_line1')"
                                                                    aria-hidden="true"></i>Styling
                                                            </div>
                                                        @endif

                                                        @if ($editableTextKey == 'home_aboutus_box3_line2')
                                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                        @else
                                                            <div wire:click="toggleEditableByKey('home_aboutus_box3_line2')"
                                                                class="d-flex">
                                                                <p>{!! $webContent->home_aboutus_box3_line2 !!}</p> <i
                                                                    class="fa fa-edit text-success cursor-pointer"
                                                                    onclick="editthis('home_aboutus_box3_line2')"
                                                                    aria-hidden="true"></i>Styling
                                                            </div>
                                                        @endif

                                                    </div>
                                                    <div class="col-lg-5 col-md-5 my-2 box text-center"
                                                        data-aos="fade-up">
                                                        <img src="{{ asset('assets/img/b.png') }}" class="img-fluid">
                                                        @if ($editableTextKey == 'home_aboutus_box4_line1')
                                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                        @else
                                                            <div wire:click="toggleEditableByKey('home_aboutus_box4_line1')"
                                                                class="d-flex">
                                                                <h4 class="py-3">{!! $webContent->home_aboutus_box4_line1 !!}</h4> <i
                                                                    class="fa fa-edit text-success cursor-pointer"
                                                                    onclick="editthis('home_aboutus_box4_line1')"
                                                                    aria-hidden="true"></i>Styling
                                                            </div>
                                                        @endif

                                                        @if ($editableTextKey == 'home_aboutus_box4_line2')
                                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                        @else
                                                            <div wire:click="toggleEditableByKey('home_aboutus_box4_line2')"
                                                                class="d-flex">
                                                                <p>{!! $webContent->home_aboutus_box4_line2 !!}</p><i
                                                                    class="fa fa-edit text-success cursor-pointer"
                                                                    onclick="editthis('home_aboutus_box4_line2')"
                                                                    aria-hidden="true"></i>Styling
                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            < <div class="col-lg-8 text-center offset-lg-2" data-aos="fade-up">
                                                @if ($editableTextKey == 'home_aboutus_bottom_heading')
                                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                @else
                                                    <div wire:click="toggleEditableByKey('home_aboutus_bottom_heading')"
                                                        class="d-flex">
                                                        <p class="lead text-black pt-3">{!! $webContent->home_aboutus_bottom_heading !!}</p> <i
                                                            class="fa fa-edit text-success cursor-pointer"
                                                            onclick="editthis('home_aboutus_bottom_heading')"
                                                            aria-hidden="true"></i>Styling
                                                    </div>
                                                @endif

                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="container">
                                <div class="row my-5 d-flex align-items-center">
                                    <div class="col-lg-4">
                                        @if ($editableTextKey == 'home_compare_section')
                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                        @else
                                            <div wire:click="toggleEditableByKey('home_compare_section')" class="d-flex">
                                                <h1>{!! $webContent->home_compare_section !!}</h1><i
                                                    class="fa fa-edit text-success cursor-pointer"
                                                    onclick="editthis('home_compare_section')"
                                                    aria-hidden="true"></i>Styling
                                            </div>
                                        @endif

                                        @if ($editableTextKey == 'home_compare_description')
                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                        @else
                                            <div wire:click="toggleEditableByKey('home_compare_description')"
                                                class="d-flex">
                                                <p>{!! $webContent->home_compare_description !!}</p><i
                                                    class="fa fa-edit text-success cursor-pointer"
                                                    onclick="editthis('home_compare_description')"
                                                    aria-hidden="true"></i>Styling
                                            </div>
                                        @endif
                                        @if ($editableTextKey == 'home_compare_btn')
                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                        @else
                                            <div wire:click="toggleEditableByKey('home_compare_btn')" class="d-flex">
                                                <button class="btn  px-5"
                                                    style="background:#585757;color:white">{!! $webContent->home_compare_btn !!}</button><i
                                                    class="fa fa-edit text-success cursor-pointer"
                                                    onclick="editthis('home_compare_btn')" aria-hidden="true"></i>Styling
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-lg-4"><img src="{{ asset('assets/kimges/iphone14.jpg') }}"
                                            class="img-fluid"></div>
                                    <div class="col-lg-4"><img src="{{ asset('assets/kimges/phon.jpg') }}"
                                            class="img-fluid"></div>
                                </div>
                            </div>
                            <section class="Expert bg-danger">
                                <div class="container">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-5" data-aos="fade-up" data-aos-duration="1000">
                                            @if ($editableTextKey == 'home_expert_support_section')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('home_expert_support_section')"
                                                    class="d-flex">
                                                    <h1 class=" text-white display-2 p-4">{!! $webContent->home_expert_support_section !!}</h1><i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('home_expert_support_section')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif
                                            @if ($editableTextKey == 'home_expert_support_section_line1')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('home_expert_support_section_line1')"
                                                    class="d-flex">
                                                    <p class="lead text-white my-5">{!! $webContent->home_expert_support_section_line1 !!}</p> <i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('home_expert_support_section_line1')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif
                                            @if ($editableTextKey == 'home_expert_support_section_line2')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('home_expert_support_section_line2')"
                                                    class="d-flex">
                                                    <h5 class="h4"> {!! $webContent->home_expert_support_section_line2 !!} </h5> <i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('home_expert_support_section_line2')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif

                                        </div>
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-4" data-aos="fade-up" data-aos-duration="2000">
                                            <img src="{{ asset('assets/img/Rectangle 16.png') }}" class="img-fluid">
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>
                                    <div class="row my-4 d-flex justify-content-between">
                                        <div class="col-lg-3 col-md-5 box2 my-3 " data-aos="fade-up"
                                            data-aos-duration="1000">
                                            <a>
                                                <img src="{{ asset('assets/img/Send.png') }}" width="70px">
                                                @if ($editableTextKey == 'home_expert_support_section_btn1')
                                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                @else
                                                    <div wire:click="toggleEditableByKey('home_expert_support_section_btn1')"
                                                        class="d-flex">
                                                        <h2 class="mt-4 text-white">{!! $webContent->home_expert_support_section_btn1 !!}</h2><i
                                                            class="fa fa-edit text-success cursor-pointer"
                                                            onclick="editthis('home_expert_support_section_btn1')"
                                                            aria-hidden="true"></i>Styling
                                                    </div>
                                                @endif

                                            </a>
                                        </div>
                                        <div class="col-lg-3 col-md-5 box2 my-3" data-aos="fade-up"
                                            data-aos-duration="2000">
                                            <a>
                                                <img src="{{ asset('assets/img/bi.png') }}" width="70px">
                                                @if ($editableTextKey == 'home_expert_support_section_btn2')
                                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                @else
                                                    <div wire:click="toggleEditableByKey('home_expert_support_section_btn2')"
                                                        class="d-flex">
                                                        <h2 class="mt-4 text-white">{!! $webContent->home_expert_support_section_btn2 !!}</h2> <i
                                                            class="fa fa-edit text-success cursor-pointer"
                                                            onclick="editthis('home_expert_support_section_btn2')"
                                                            aria-hidden="true"></i>Styling
                                                    </div>
                                                @endif

                                            </a>
                                        </div>
                                        <div class="col-lg-3 box2 my-3" data-aos="fade-up" data-aos-duration="3000">
                                            <a>
                                                <img src="{{ asset('assets/img/Plus.png') }}" width="70px">
                                                @if ($editableTextKey == 'home_expert_support_section_btn3')
                                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                @else
                                                    <div wire:click="toggleEditableByKey('home_expert_support_section_btn3')"
                                                        class="d-flex">
                                                        <h2 class="mt-4 text-white">{!! $webContent->home_expert_support_section_btn3 !!}</h2><i
                                                            class="fa fa-edit text-success cursor-pointer"
                                                            onclick="editthis('home_expert_support_section_btn3')"
                                                            aria-hidden="true"></i>Styling
                                                    </div>
                                                @endif

                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </section>
                    @endif



                    @if ($page == 'sellCategories')
                        <section>


                            <h1 class="text-center bg-gray">Sell Catagories</h1>

                            <section class="head-sell my-5">
                                <div class="container">

                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-6 p-3">
                                            @if ($editableTextKey == 'sell_heading_1')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('sell_heading_1')" class="d-flex">
                                                    <p>{!! $webContent->sell_heading_1 !!}{{ $siteSettings->buisness_name ?? '' }}</p>
                                                    <i class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('sell_heading_1')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif
                                            @if ($editableTextKey == 'sell_heading_2')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('sell_heading_2')" class="d-flex">
                                                    <h1 style=" font-family: heading;">{!! $webContent->sell_heading_2 !!}</h1><i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('sell_heading_2')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif


                                            {{-- <input type="text" class="form-control my-2 w-75" placeholder="Search e.g.iphone 12"> --}}
                                            @if ($editableTextKey == 'sell_heading_3')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('sell_heading_3')" class="d-flex">
                                                    <p>{!! $webContent->sell_heading_3 !!}</p><i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('sell_heading_3')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif
                                            @if ($editableTextKey == 'sell_heading_4')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('sell_heading_4')" class="d-flex">
                                                    <p class="lead">{!! $webContent->sell_heading_4 !!}</p> <i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('sell_heading_4')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif

                                        </div>
                                        <div class="col-lg-6">
                                            <img src="https://ik.imagekit.io/2nuimwatr/online-seller-1.jpg?updatedAt=1698831017024"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="about">
                                <div class="container">
                                    @if ($editableTextKey == 'sell_heading_5')
                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                    @else
                                        <div wire:click="toggleEditableByKey('sell_heading_5')" class="d-flex">
                                            <h1 class="text-center " style="color: #E31E24">{!! $webContent->sell_heading_5 !!}</h1>
                                            <i class="fa fa-edit text-success cursor-pointer"
                                                onclick="editthis('sell_heading_5')" aria-hidden="true"></i>Styling
                                        </div>
                                    @endif

                                </div>
                            </section>
                            <section class="mobile">
                                <div class="container">
                                    <!--<h1>{!! $webContent->sell_heading_6 !!}</h1>-->
                                    <!--<p>{!! $webContent->sell_heading_7 !!}</p>-->
                                    
                                     <div class="container">
                                        @if ($editableTextKey == 'sell_heading_6')
                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                        @else
                                            <div wire:click="toggleEditableByKey('sell_heading_6')" class="d-flex">
                                                <h1 class="text-center " style="color: #E31E24">
                                                    {!! $webContent->sell_heading_6 !!}
                                                </h1>
                                                <i class="fa fa-edit text-success cursor-pointer"
                                                    aria-hidden="true"></i>Styling
                                            </div>
                                        @endif

                                    </div>

                                    <div class="container">
                                        @if ($editableTextKey == 'sell_heading_7')
                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                        @else
                                            <div wire:click="toggleEditableByKey('sell_heading_7')" class="d-flex">
                                                <p class="text-center " style="color:dark">
                                                    {!! $webContent->sell_heading_7 !!}
                                                </p>
                                                <i class="fa fa-edit text-success cursor-pointer"
                                                    aria-hidden="true"></i>Styling
                                            </div>
                                        @endif

                                    </div>

                                    
                                    
                                    
                                </div>
                            </section>

                            <section class="faq mb-5">
                                <div class="container">
                                    @if ($editableTextKey == 'sell_heading_8')
                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                    @else
                                        <div wire:click="toggleEditableByKey('sell_heading_8')" class="d-flex">
                                            <h1>{!! $webContent->sell_heading_8 !!}</h1><i
                                                class="fa fa-edit text-success cursor-pointer"
                                                onclick="editthis('sell_heading_8')" aria-hidden="true"></i>Styling
                                        </div>
                                    @endif
                                    @if ($editableTextKey == 'sell_heading_9')
                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                    @else
                                        <div wire:click="toggleEditableByKey('sell_heading_9')" class="d-flex">
                                            <p>{{ $siteSettings->buisness_name ?? '' }} {!! $webContent->sell_heading_9 !!}</p><i
                                                class="fa fa-edit text-success cursor-pointer"
                                                onclick="editthis('sell_heading_9')" aria-hidden="true"></i>Styling
                                        </div>
                                    @endif


                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="accordion-container 1   rounded-0">

                                                <input type="checkbox" class="accordion d-none " id="accordion-1">
                                                @if ($editableTextKey == 'sell_heading_10')
                                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                @else
                                                    <div wire:click="toggleEditableByKey('sell_heading_10')"
                                                        class="d-flex">
                                                        <label
                                                            class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom  text-center"
                                                            for="accordion-1">{!! $webContent->sell_heading_10 !!}</label> <i
                                                            class="fa fa-edit text-success cursor-pointer"
                                                            onclick="editthis('sell_heading_10')"
                                                            aria-hidden="true"></i>Styling
                                                    </div>
                                                @endif

                                                <div class="content card rounded-0 text-black bg-white m-0">
                                                    @if ($editableTextKey == 'sell_heading_11')
                                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                    @else
                                                        <div wire:click="toggleEditableByKey('sell_heading_11')"
                                                            class="d-flex">
                                                            <div style="font-size: 14px;"
                                                                class="rounded-0 text-black bg-white m-0">
                                                                {!! $webContent->sell_heading_11 !!}
                                                            </div><i class="fa fa-edit text-success cursor-pointer"
                                                                onclick="editthis('sell_heading_11')"
                                                                aria-hidden="true"></i>Styling
                                                        </div>
                                                    @endif

                                                </div>





                                            </div>

                                            <div class="accordion-container 3  rounded-0">

                                                <input type="checkbox" class="accordion d-none " id="accordion-3">
                                                @if ($editableTextKey == 'sell_heading_14')
                                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                @else
                                                    <div wire:click="toggleEditableByKey('sell_heading_14')"
                                                        class="d-flex">
                                                        <label
                                                            class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom  text-center"
                                                            for="accordion-3">{!! $webContent->sell_heading_14 !!}</label><i
                                                            class="fa fa-edit text-success cursor-pointer"
                                                            onclick="editthis('sell_heading_14')"
                                                            aria-hidden="true"></i>Styling
                                                    </div>
                                                @endif

                                                <div class="content card rounded-0 text-black bg-white m-0">
                                                    @if ($editableTextKey == 'sell_heading_15')
                                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                    @else
                                                        <div wire:click="toggleEditableByKey('sell_heading_15')"
                                                            class="d-flex">
                                                            <div style="font-size: 14px;"
                                                                class="rounded-0 text-black bg-white m-0">
                                                                {!! $webContent->sell_heading_15 !!}
                                                            </div> <i class="fa fa-edit text-success cursor-pointer"
                                                                onclick="editthis('sell_heading_15')"
                                                                aria-hidden="true"></i>Styling
                                                        </div>
                                                    @endif

                                                </div>





                                            </div>

                                            <div class="accordion-container 5  rounded-0">

                                                <input type="checkbox" class="accordion d-none " id="accordion-5">
                                                @if ($editableTextKey == 'sell_heading_18')
                                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                @else
                                                    <div wire:click="toggleEditableByKey('sell_heading_18')"
                                                        class="d-flex">
                                                        <label
                                                            class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom  text-center"
                                                            for="accordion-5">{!! $webContent->sell_heading_18 !!}</label><i
                                                            class="fa fa-edit text-success cursor-pointer"
                                                            onclick="editthis('sell_heading_18')"
                                                            aria-hidden="true"></i>Styling
                                                    </div>
                                                @endif

                                                <div class="content card rounded-0 text-black bg-white m-0">
                                                    @if ($editableTextKey == 'sell_heading_19')
                                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                    @else
                                                        <div wire:click="toggleEditableByKey('sell_heading_19')"
                                                            class="d-flex">
                                                            <div style="font-size: 14px;"
                                                                class="rounded-0 text-black bg-white m-0">
                                                                {!! $webContent->sell_heading_19 !!}
                                                            </div><i class="fa fa-edit text-success cursor-pointer"
                                                                onclick="editthis('sell_heading_19')"
                                                                aria-hidden="true"></i>Styling
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="accordion-container 2   rounded-0">

                                                <input type="checkbox" class="accordion d-none " id="accordion-2">
                                                @if ($editableTextKey == 'sell_heading_12')
                                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                @else
                                                    <div wire:click="toggleEditableByKey('sell_heading_12')"
                                                        class="d-flex">
                                                        <label
                                                            class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom  text-center"
                                                            for="accordion-2">{!! $webContent->sell_heading_12 !!}</label><i
                                                            class="fa fa-edit text-success cursor-pointer"
                                                            onclick="editthis('sell_heading_12')"
                                                            aria-hidden="true"></i>Styling
                                                    </div>
                                                @endif

                                                <div class="content card rounded-0 text-black bg-white m-0">
                                                    @if ($editableTextKey == 'sell_heading_13')
                                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                    @else
                                                        <div wire:click="toggleEditableByKey('sell_heading_13')"
                                                            class="d-flex">
                                                            <div style="font-size: 14px;"
                                                                class="rounded-0 text-black bg-white m-0">
                                                                {!! $webContent->sell_heading_13 !!}
                                                            </div> <i class="fa fa-edit text-success cursor-pointer"
                                                                onclick="editthis('sell_heading_13')"
                                                                aria-hidden="true"></i>Styling
                                                        </div>
                                                    @endif

                                                </div>





                                            </div>

                                            <div class="accordion-container 4   rounded-0">

                                                <input type="checkbox" class="accordion d-none " id="accordion-4">
                                                @if ($editableTextKey == 'sell_heading_16')
                                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                @else
                                                    <div wire:click="toggleEditableByKey('sell_heading_16')"
                                                        class="d-flex">
                                                        <label
                                                            class="label d-block p-2 bg-danger text-white cursor-pointer rounded-0 border-bottom  text-center"
                                                            for="accordion-4"> {!! $webContent->sell_heading_16 !!}</label> <i
                                                            class="fa fa-edit text-success cursor-pointer"
                                                            onclick="editthis('sell_heading_16')"
                                                            aria-hidden="true"></i>Styling
                                                    </div>
                                                @endif

                                                <div class="content card rounded-0 text-black bg-white m-0">
                                                    @if ($editableTextKey == 'sell_heading_17')
                                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                                    @else
                                                        <div wire:click="toggleEditableByKey('sell_heading_17')"
                                                            class="d-flex">
                                                            <div style="font-size: 14px;"
                                                                class="rounded-0 text-black bg-white m-0">
                                                                {!! $webContent->sell_heading_17 !!}
                                                            </div><i class="fa fa-edit text-success cursor-pointer"
                                                                onclick="editthis('sell_heading_17')"
                                                                aria-hidden="true"></i>Styling
                                                        </div>
                                                    @endif

                                                </div>





                                            </div>

                                        </div>










                                    </div>
                                </div>
                            </section>
                        </section>
                    @endif
                    @if ($page == 'deviceTypes')
                        <section>
                            <h1 class="text-center bg-gray">Sell/Device Types</h1>
                            <hr>
                            <section class="head-sell mt-5">
                                <div class="container">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-lg-6 p-3 mt-5">
                                            @if ($editableTextKey == 'brand_page_heading_1')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('brand_page_heading_1')"
                                                    class="d-flex">
                                                    <h1 style="font-family: heading; ">{!! $webContent->brand_page_heading_1 !!}</h1> <i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('brand_page_heading_1')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif
                                            @if ($editableTextKey == 'brand_page_heading_2')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('brand_page_heading_2')"
                                                    class="d-flex">
                                                    <p style="text-align: justify;">{!! $webContent->brand_page_heading_2 !!}</p> <i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('brand_page_heading_2')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif

                                        </div>
                                        <div class="col-lg-6 p-3 ">
                                            <img src="https://ik.imagekit.io/p2slevyg1/Best_Smartphones_US_2022-scaled.jpg?updatedAt=1698830519194"
                                                class="img-fluid">
                                        </div>

                                    </div>
                                </div>

                            </section>
                            <div class="container border rounded p-3 my-3">
                                @if ($editableTextKey == 'brand_page_heading_3')
                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                @else
                                    <div wire:click="toggleEditableByKey('brand_page_heading_3')" class="d-flex">
                                        <h2 class="fw-bold">{!! $webContent->brand_page_heading_3 !!}</h2><i
                                            class="fa fa-edit text-success cursor-pointer"
                                            onclick="editthis('brand_page_heading_3')" aria-hidden="true"></i>Styling
                                    </div>
                                @endif

                                @if ($editableTextKey == 'brand_page_heading_4')
                                    <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                @else
                                    <div wire:click="toggleEditableByKey('brand_page_heading_4')" class="d-flex">
                                        <p>{!! $webContent->brand_page_heading_4 !!}</p><i class="fa fa-edit text-success cursor-pointer"
                                            onclick="editthis('brand_page_heading_4')" aria-hidden="true"></i>Styling
                                    </div>
                                @endif

                            </div>
                        </section>
                    @endif
                    @if ($page == 'repairCategories')
                        <section>

                            <h1 class="text-center bg-gray">Repair Catagories</h1>
                            <hr>
                            <section class="device-type-head">
                                <div class="overlay"></div>
                                <div class="container">
                                    <div class="p-3 rounded-2 mt-5 d-flex justify-content-between align-items-center"
                                        style="background-color: #afafaf">
                                        <div class="d-flex flex-column">
                                            @if ($editableTextKey == 'repair_page_heading_1')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('repair_page_heading_1')"
                                                    class="d-flex">
                                                    <h1 class="text-black">{!! $webContent->repair_page_heading_1 !!}</h1><i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('repair_page_heading_1')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif
                                            @if ($editableTextKey == 'repair_page_heading_2')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('repair_page_heading_2')"
                                                    class="d-flex">
                                                    <span class="tagline text-black">{!! $webContent->repair_page_heading_2 !!}</span><i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('repair_page_heading_2')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif

                                        </div>

                                        <div class="d-flex justify-content-end align-items-center">
                                            {{-- <img
                            src="https://ik.imagekit.io/2nuimwatr/university-of-york-logo-3047BD6538-seeklogo.com.png?updatedAt=1699261188648"
                            style="width: 9rem; margin: 3px;" /> --}}
                                            <!--<h2 class=" mt-3 ml-3 " style="color: #da0a0a"><b>Students can get 10% Off on all repairs</b></h2>-->
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <section class="device-type-section">
                                <div class="container">
                                    <div class="phone-section">
                                        <div class="section-header text-center my-5 ">
                                            @if ($editableTextKey == 'repair_page_heading_3')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('repair_page_heading_3')"
                                                    class="d-flex">
                                                    <h1><sup></sup> {!! $webContent->repair_page_heading_3 !!}<sub></sub>
                                                    </h1><i class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('repair_page_heading_3')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif
                                            @if ($editableTextKey == 'repair_page_heading_4')
                                                <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                            @else
                                                <div wire:click="toggleEditableByKey('repair_page_heading_4')"
                                                    class="d-flex">
                                                    <p>{!! $webContent->repair_page_heading_4 !!}</p> <i
                                                        class="fa fa-edit text-success cursor-pointer"
                                                        onclick="editthis('repair_page_heading_4')"
                                                        aria-hidden="true"></i>Styling
                                                </div>
                                            @endif


                                        </div>


                                    </div>


                                </div>
                            </section>
                        </section>
                    @endif
                    @if ($page == 'termsAndConditions')
                        <section>
                            <div class="bg-color">

                                <div class="container">
                                    <div class="text-center py-5 w-75 mx-auto">
                                        @if ($editableTextKey == 'terms_and_conditions_heading')
                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                        @else
                                            <div wire:click="toggleEditableByKey('terms_and_conditions_heading')"
                                                class="d-flex">
                                                <h2 class="text-danger">{!! $webContent->terms_and_conditions_heading !!}</h2> <i
                                                    class="fa fa-edit text-success cursor-pointer"
                                                    onclick="editthis('terms_and_conditions_heading')"
                                                    aria-hidden="true"></i>Styling
                                            </div>
                                        @endif

                                    </div>
                                    @if ($editableTextKey == 'terms_and_conditions_text')
                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                    @else
                                        <div wire:click="toggleEditableByKey('terms_and_conditions_text')" class="d-flex">
                                            <span>{!! $webContent->terms_and_conditions_text !!}</span><i
                                                class="fa fa-edit text-success cursor-pointer"
                                                onclick="editthis('terms_and_conditions_text')"
                                                aria-hidden="true"></i>Styling
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </section>
                    @endif
                    @if ($page == 'repairCheckout')
                        <section>
                            <div class="container">
                                <div class="text-center my-4 p-3 rounded-3 " style="background-color: #afafaf">
                                    <h2>Mobile Screen Repair <br> </h2>
                                    <span class="tagline ">Let's book you in for treatment</span>

                                </div>
                                <div class="container">
                                    <section>
                                        <div class=" my-5  p-3">
                                            <div class="row  text-center">
                                                <div class="col-lg-4 text-start">

                                                    <h3>Pre-Repair Checklist</h3>
                                                    <p>(Stuff to know before your repair)</p>
                                                    <h4><b class="text-danger"> &#10003; How long?</b> We can do most
                                                        repairs within 1 hour. Please note in some circumstances it can take
                                                        longer
                                                    </h4>
                                                    <h4><b class="text-danger">&#10003; Part Used?</b> We use high-quality
                                                        replacement parts to ensure your device functions optimally. We
                                                        source parts from reputable suppliers and only use genuine
                                                        components when available.
                                                    </h4>
                                                    <h4> <b class="text-danger"> &#10003; Warranty? </b>Our repairs come
                                                        with a 12 month parts warranty. If an issue's arise within this
                                                        period, we'll fix at no cost
                                                    </h4>
                                                    <h4><b class="text-danger"> &#10003; Will my data be lost?</b>
                                                        We prioritize data privacy, making efforts to avoid data loss during
                                                        repairs. It's advisable to back up your important data before
                                                        sending your device.
                                                    </h4>
                                                    <h4><b class="text-danger">&#10003; Post Repair Advice?</b>
                                                        After repair, regularly back up data, update your device for
                                                        security, and reach out to our support for any concerns.</h4>
                                                    <h4><b class="text-danger">&#10003; What if you can’t fix my
                                                            device?</b>No charge if we can't repair your device. We'll
                                                        provide details on the issue and offer alternatives, including
                                                        returning your device as is.
                                                    </h4>
                                                    {{-- <h4><b class="text-danger">Need a lower priced screen?</b>
                            {{ $data['repair_type']->premium_screen ?? '' }}</h4> --}}
                                                    {{-- <p>Our {{ $data['modal']->name }} Premium Generic Screen Repair option might suit
                            you better</p> --}}
                                                </div>

                                                <div class="col-lg-4 mt-5">
                                                    <img src=" https://ik.imagekit.io/qml3d7tgz/iphone1_9JHn-8RLU.jpg"
                                                        style="height:400px; width:281px" />
                                                </div>
                                                <div class="col-lg-4 mt-5">
                                                    <p class="text-start">At "The Phone Lab," we strive to provide
                                                        top-notch mobile repair services, offering four convenient repair
                                                        options: in-store repair, post your device, collect and return
                                                        device, and fix at my address. For all repair types, except in-store
                                                        repair, online payment is required to ensure a smooth and secure
                                                        transaction process. <br />

                                                        Our commitment to transparency and your satisfaction is paramount.
                                                        As part of our Terms of Service and Conditions, we specify the
                                                        repair time and the parts used for your device, and outline the
                                                        conditions related to data loss and provide repair advice. In the
                                                        rare event that we can't fix your device, rest assured that we have
                                                        a clear response in place to address this situation.<br />

                                                        For in-store repair, we offer the flexibility of payment methods,
                                                        allowing you to choose between paying in-store or online, catering
                                                        to your preferences. Your trust in "The Phone Lab" is greatly
                                                        valued, and we look forward to providing you with efficient and
                                                        reliable mobile repair services.</p>


                                                </div>


                                            </div>


                                    </section>
                                </div>
                            </div>
                        </section>
                    @endif

                    @if ($page == 'termsAndConditions')
                        <section>
                            <div class="bg-color">

                                <div class="container">
                                    <div class="text-center py-5 w-75 mx-auto">
                                        @if ($editableTextKey == 'terms_and_conditions_heading')
                                            <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                        @else
                                            <div wire:click="toggleEditableByKey('terms_and_conditions_heading')"
                                                class="d-flex">
                                                <h2 class="text-danger">{!! $webContent->terms_and_conditions_heading !!}</h2> <i
                                                    class="fa fa-edit text-success cursor-pointer"
                                                    onclick="editthis('terms_and_conditions_heading')"
                                                    aria-hidden="true"></i>Styling
                                            </div>
                                        @endif

                                    </div>
                                    @if ($editableTextKey == 'terms_and_conditions_text')
                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                    @else
                                        <div wire:click="toggleEditableByKey('terms_and_conditions_text')" class="d-flex">
                                            <span>{!! $webContent->terms_and_conditions_text !!}</span><i
                                                class="fa fa-edit text-success cursor-pointer"
                                                onclick="editthis('terms_and_conditions_text')"
                                                aria-hidden="true"></i>Styling
                                        </div>
                                    @endif


                                </div>
                            </div>
                        </section>
                    @endif



                    @if ($page == 'privacyPolicy')
                        <section>
                            <div class="container">
                                <div class="text-center py-5 w-75 mx-auto">

                                    {!! $webContent->privacy_policy_heading !!} <i class="fa fa-edit text-success cursor-pointer"
                                        onclick="editthis('privacy_policy_heading')" aria-hidden="true"></i>Styling


                                </div>
                                <div class="card border-0 about-fone-card my-3 p-3">
                                    @if ($editableTextKey == 'privacy_policy_p')
                                        <textarea wire:keydown.enter="updateContentText({{ $contentId }})" wire:model.debounce.500="text"></textarea>
                                    @else
                                        <div wire:click="toggleEditableByKey('privacy_policy_p')" class="d-flex">
                                            {!! $webContent->privacy_policy_p !!} <i class="fa fa-edit text-success cursor-pointer"
                                                onclick="editthis('privacy_policy_p')" aria-hidden="true"></i>Styling
                                        </div>
                                    @endif
                                </div>


                            </div>

                        </section>
                    @endif

                    @if ($page == 'aboutUs')
                        <section>
                            <div class="bg-color">
                                <div class="container-fluid">

                                    <div class="text-center py-5 w-75 mx-auto">
                                        <h2 class="text-danger">About Us</h2>

                                    </div>
                                    <div class="card border-0 about-fone-card my-3 p-3">
                                        {{-- <h3>About Us</h3> --}}
                                        {{-- <hr> --}}
                                        <p class="lh-lg" style="text-align: justify; padding: 0px ">
                                            Your Trusted Mobile Phone Partner in the UK
                                            Welcome to MobileBitz, where innovation meets reliability in the world of mobile
                                            phones. As one of the largest mobile phone operators in the United Kingdom,
                                            MobileBitz has been at the forefront of providing comprehensive services,
                                            including buying, selling, and repairing mobile devices. With a commitment to
                                            quality and customer satisfaction, we have emerged as a trusted name in the
                                            industry, catering to the diverse needs of our valued customers.
                                            <br>
                                            <span style= "font-size:25px; font-weight:bolder;">Our journey</span><br>
                                            MobileBitz embarked on its journey with a vision to revolutionize the mobile
                                            phone retail landscape in the UK. Established with a passion for technology and
                                            a commitment to offering exceptional services, we have grown to become a key
                                            player in the mobile phone industry. Our journey is marked by a relentless
                                            pursuit of excellence, customer-centric approach, and a focus on staying ahead
                                            of the technological curve.<br>

                                            <span style= "font-size:25px; font-weight:bolder;">Comprehensive
                                                Services</span><br>


                                            <span style= "font-size:25px; font-weight:bolder;">1.Buy:</span><br>

                                            At MobileBitz, we understand that your mobile device is not just a gadget; it's
                                            an essential part of your daily life. Whether you are looking to upgrade to the
                                            latest model or sell your current device, we offer a seamless buying and selling
                                            experience. Our extensive range of new and pre-owned mobile phones ensures that
                                            you find the perfect device that suits your needs and budget.
                                            <br>
                                            <span style= "font-size:25px; font-weight:bolder;">2. Sell:</span><br>
                                            Looking to upgrade to the latest smartphone or simply want to part ways with
                                            your current device? MobileBitz provides a hassle-free selling experience. We
                                            offer competitive prices for your used mobile phones, ensuring that you get the
                                            best value for your device. Our transparent and fair evaluation process has made
                                            us a preferred choice for those looking to sell their mobile phones.<br>


                                            <span style= "font-size:25px; font-weight:bolder;">3. Repair::</span><br>
                                            We understand the frustration of a broken or malfunctioning mobile phone.
                                            MobileBitz is your go-to destination for reliable and prompt mobile phone
                                            repairs. Our skilled technicians are well-equipped to handle a wide range of
                                            issues, from screen replacements to battery repairs. With a commitment to
                                            quality repairs and genuine spare parts, we ensure that your device is in safe
                                            hands.<br>

                                            <span style= "font-size:29px; font-weight:bolder;">The MobileBitz Advantage
                                            </span><br>

                                            <span style= "font-size:25px; font-weight:bolder;">1. Expertise:
                                            </span><br>

                                            Our team of experts at MobileBitz possesses extensive knowledge and expertise in
                                            the mobile phone industry. From the latest technological trends to in-depth
                                            understanding of device functionalities, we are equipped to provide accurate
                                            information and solutions to our customers.<br>

                                            <span style= "font-size:25px; font-weight:bolder;">2. Wide Network:

                                            </span><br>

                                            With multiple stores across the UK, MobileBitz has built a wide network to cater
                                            to the diverse needs of customers. Whether you're in the heart of London or a
                                            smaller town, our presence ensures accessibility and convenience for all.
                                            <br>

                                            <span style= "font-size:25px; font-weight:bolder;">3. Quality Assurance:


                                            </span><br>


                                            Quality is at the core of everything we do at MobileBitz. Whether it's selling
                                            new devices, pre-owned phones, or repairing a malfunctioning device, we
                                            prioritize quality assurance. Our commitment to using genuine spare parts and
                                            employing skilled technicians sets us apart in the industry.
                                            <br>


                                            <span style= "font-size:25px; font-weight:bolder;">4. Customer-Centric
                                                Approach:


                                            </span><br>

                                            Our customers are at the center of our business. We strive to understand their
                                            needs, provide personalized solutions, and ensure a positive and satisfying
                                            experience. Our customer-centric approach has earned us the trust and loyalty of
                                            a growing customer base.
                                            <br>


                                            <span style= "font-size:25px; font-weight:bolder;">Community Engagement

                                            </span><br>

                                            At MobileBitz, we believe in giving back to the community that has supported us
                                            throughout our journey. We actively engage in community initiatives, supporting
                                            local causes and contributing to the well-being of the communities we serve. Our
                                            commitment goes beyond being just a mobile phone retailer; we aim to make a
                                            positive impact on society.
                                            <br>

                                            <span style= "font-size:25px; font-weight:bolder;">Embracing Sustainability

                                            </span><br>

                                            As a responsible business, MobileBitz is committed to environmental
                                            sustainability. We actively promote recycling initiatives, encouraging our
                                            customers to responsibly dispose of old devices. By participating in our
                                            recycling programs, customers not only contribute to a cleaner environment but
                                            also receive incentives for their eco-friendly efforts.
                                            <br>

                                            <span style= "font-size:25px; font-weight:bolder;">Looking Ahead


                                            </span><br>

                                            The future holds exciting possibilities for MobileBitz. We are committed to
                                            staying at the forefront of technological advancements, expanding our services,
                                            and continuing to provide innovative solutions to our customers. As we look
                                            ahead, our focus remains on delivering excellence, building lasting
                                            relationships, and being the go-to destination for all mobile phone needs in the
                                            UK.
                                            In conclusion, MobileBitz is not just a mobile phone store; it's a destination
                                            where technology meets trust. Whether you're buying, selling, or repairing a
                                            mobile device, you can rely on MobileBitz for a seamless and satisfying
                                            experience. Join us on our journey as we continue to redefine the mobile phone
                                            retail landscape in the United Kingdom.






                                            <a target="_blank" href="#">
                                                {{ $siteBranch->email ?? '' }}</a>.
                                        </p>
                                    </div>


                                </div>
                            </div>


                        </section>
                    @endif


                </div>

            </x-content>


        </div>
        {{-- OTHER MODALS --}}

        <x-modal title="Add Website Content" id="add-web-content" size="xl" class="">
            <livewire:admin.website-contents.add-web-content />
        </x-modal>

    </div>
    <script>
        // Listen for the 'contentAdded' event and refresh the table
        Livewire.on('contentAdded', () => {
            Livewire.emit('refreshTable');
        });

        function editMe(id) {
            Livewire.emit('contentId', id);
            showM('add-web-content');
        }

        function editthis(Key) {
            Livewire.emit('contentKey', Key);
            showM('add-web-content');
        }
    </script>
</div>
<style>
  /* rainbow animated border + soft glow */
  .theme-btn{
    position:relative;
    border:none;
    color:#fff;
    font-weight:700;
    border-radius:12px;
    padding:10px 18px;
    background:linear-gradient(90deg,#ff0055,#ff8a00,#ffee00,#00d084,#00b0ff,#7a00ff,#ff00c8,#ff0055);
    background-size:400% 100%;
    animation:themeGradient 6s linear infinite;
    box-shadow:0 6px 18px rgba(0,0,0,.15);
  }
  .theme-btn:hover{ transform:translateY(-1px); }
  .theme-btn__glow{
    position:absolute; inset:-2px; border-radius:14px; z-index:-1;
    background:inherit; filter:blur(10px); opacity:.35;
  }
  @keyframes themeGradient{ 0%{background-position:0% 50%} 100%{background-position:100% 50%} }
</style>

