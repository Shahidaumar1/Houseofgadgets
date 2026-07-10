<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="accessories" />
        <x-content>
            <livewire:admin.accessories.components.top-nav active="devices" />
            <div class="container">
                    <h3 class= "text-center pt-4">{{ $selectedCategory->name ?? '' }}</h3>
                <div class="d-flex align-items-center gap-4 justify-content-center my-4">
                    <livewire:admin.accessories.components.sub-nav :items="$items" />
                </div>    
                <div class="d-flex align-items-center gap-4 justify-content-between my-4">
                    <select class="form-select form-control" aria-label="Default select example" wire:model="selectedCatId" style="width:30%">
                        @forelse($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        @endforelse
                    </select>
                     @if ($target == 'Publish')
                    <button class="btn p-2" onclick="showM('add-buy-device')" style="border-radius: 5px; color: white; 
                    background-color: #20375E; pading: 10px">
                       
                        Create New
                    </button>
                    
                     @endif
                </div>

                <div class="d-flex justify-content-center gap-4  flex-wrap  " wire:sortable="updateOrderNumber">
                    @if ($target == 'Publish')
                      <div class="plus-card bg-white">
                               <div class="d-flex align-items-center  justify-content-center my-4">               
                                     <img src="https://ik.imagekit.io/4csyk445b/Rectangle%201.png?updatedAt=1712154034586" class="" style="height: 130px; width: 200px" />
                                </div>
                            <div class="d-flex align-items-center  justify-content-between p-2">
                                <h4 class="fw-bold">Allow Others</h4>
                                
                                    <div class="form-check form-switch">
                                    <input type="checkbox" role="switch" class="form-check-input border border-dark" @if ($selectedCategory) wire:change="toggleOthers({{ $selectedCategory->id }})" {{ $selectedCategory->others == true ? 'checked' : '' }} @endif>

                                    </div>
                                
                            </div>
                        </div>

                   
                    @endif
                    
                    @forelse($devices as $device)
                    <div style="cursor: move" class="card  rounded-4" wire:sortable.item="{{ $device->id }}" wire:key="device-{{ $device->id }}">

                        <div class="p-1 gap-1 d-flex justify-content-center align-items-center">
                            
                        <a href="{{ route('accessories-models', $device) }}">
                            <img src="{{ $device->file ?? '#' }}" class="" style="cursor: move; height: 150px; width: 200px" />
                        </a>
                        </div>
                        <div class=" d-flex justify-content-between align-items-center">
                            <div class="p-2 mt-1">
                                <h4 class="fw-bold text-center text-dark">{{ $device->name }}</h4>
                            </div>
                            <!--toggle button-->
                            <div class="form-check form-switch">
                                <input type="checkbox" role="switch" class="form-check-input border border-dark" wire:change="toggleStatus({{ $device->id }})" {{ $device->status == 'Publish' ? 'checked' : '' }}>
                            </div>
                            
                            <!--dropdown button -->
                            <div class="dropdown dropend" id="{{ uniqid() }}" wire:ignore>
                                <button class="btn btn-light dropdown-toggle bg-light border-0" type="button" id="{{ uniqid() }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="{{ uniqid() }}">
                                    <li>
                                        @if ($target != 'Junk')
                                        <a class="dropdown-item" href="javascirpt:void(0)" wire:click="selectDevice('{{ $device->id }}')">Edit</a>
                                        @endif
                                    </li>
                                    <li>
                                        @if ($target == 'Junk')
                                        <a class="dropdown-item" wire:click="restore('{{ $device->id }}')">Restore</a>
                                        @else
                                        <a class="dropdown-item" wire:click="softDelete('{{ $device->id }}')">Delete</a>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>  
                    </div>
                    @empty
                    <div class="plus-card d-flex justify-content-center align-items-center bg-white">
                        <i class="fa fa-times text-danger " style="font-size:40px;" aria-hidden="true"></i>
                        <h4 class="fw-bold">No Records !</h4>
                    </div>
                    @endforelse
                </div>

            </div>
        </x-content>

  <!----------------------------- footer-------------------------->
        <style>
        .button-sticky {
            height: 60px;
            color: white;
            font-family: sans-serif;
            font-size: 17px;
            line-height: 15px;
            text-align: center;
            position: fixed;
            bottom: -2px;
            z-index: 999;
            overflow-x: auto;
            width:100;
        }

        .home-btn:hover {
            color: orange;
        }

        .button-sticky .col-2 {
            margin-right: 10px;
            /* Adjust this value to set the desired gap */
        }

        .button-sticky .col-2:last-child {
            margin-right: 0;
            /* Remove margin from the last button to prevent extra space */
        }
        </style>

        <div class="button-sticky container bg-blue d-lg-none d-md-none">
            <div class="row justify-content-center">

                <div class="col-2  mt-4 ">
                    <a href="{{ route('accessories-categories') }}" class="text-white item "> Brands</a>
                </div>

                <div class="col-2  mt-4 ">
                    <a href="{{ route('accessories-devices') }}" class="text-white "> Models</a>
                </div>

                <div class="col-3  mt-4 ">
                    <a href="{{ route('accessories-models') }}" class="text-white  item "> Accessories</a>
                </div>

                <div class="col-3 mt-4">
                    <a href="{{ route('accessories-models-add-ons') }}" class="text-white  item "> Variations</a>
                </div>
            </div>
        </div>


    </div>
    {{-- OTHER MODALS --}}
    @if ($selectedCategory)
    <x-modal title="Add Device" id="add-buy-device">
        <livewire:admin.accessories.device.create :category="$selectedCategory" />
    </x-modal>
    @endif
    <x-modal title="Edit Device" id="edit-buy-device">
        <livewire:admin.accessories.device.edit />
    </x-modal>
</div>