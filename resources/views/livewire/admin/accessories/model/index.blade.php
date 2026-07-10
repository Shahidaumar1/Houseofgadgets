<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="accessories" />
        <x-content>
            <livewire:admin.accessories.components.top-nav active="models" />
            <div class="container">
                <div class="d-flex justify-content-center gap-2 mt-4">
                    <select aria-label="Default select example" wire:model="selectedCatId" style="width:130px">
                        <option>Select Device</option>
                        @forelse($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    <select aria-label="Default select example" wire:model="selectedDeviceId" style="width:130px">
                        <option>Select Brand</option>
                        @if($devices)
                        @forelse($devices as $device)
                        <option value="{{ $device->id }}">{{ $device->name }}</option>
                        @empty
                        @endforelse
                        @endif
                    </select>
                </div>
                <div class="d-flex align-items-center gap-4 justify-content-center my-4">
                    <div>

                    <livewire:admin.accessories.components.sub-nav :items="$items" />

                </div>
                
                </div>
                <div class="d-flex align-items-center gap-4 justify-content-center my-4">
                 @if ($target == 'Publish')
                    <button class="btn mt-2" onclick="showM('add-buy-model')" style="border-radius: 5px; color: white; 
                    background-color: #20375E; pading: 10px">
                       
                        Create New
                    </button>
                    
                     @endif
                     
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-2">
                                <i class="fa fa-square cursor-pointer {{ $activeView == 'card' ? 'text-success' : '' }}" aria-hidden="true" wire:click="activateView('card')"></i>
                                <i class="fa fa-list cursor-pointer {{ $activeView == 'list' ? 'text-success' : '' }}" aria-hidden="true" wire:click="activateView('list')"></i>
                            </div>
                        </div>
                    </div>

                {{-- card view --}}
                @if ($activeView == 'card')
                <div>

                    <div class="d-flex justify-content-center gap-4  flex-wrap  " wire:sortable="updateOrderNumber">
                      
                        @forelse($models as $model)
                        <div style="cursor: move" 
                        class="card border-0 rounded-4 " wire:sortable.item="{{ $model->id }}" wire:key="model-{{ $model->id }}">
                            <div class="p-2 d-flex justify-content-between align-items-center">
                                @if ($target != 'Junk')
                                <div class="form-check form-switch">
                                    <input type="checkbox" role="switch" class="form-check-input" wire:change="toggleStatus({{ $model->id }})" {{ $model->status == 'Publish' ? 'checked' : '' }}>
                                </div>
                                @endif
                                <div class="dropdown dropend" id="{{ uniqid() }}" wire:ignore>
                                    <button class="btn btn-light dropdown-toggle bg-light border-0" type="button" id="{{ uniqid() }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-h"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="{{ uniqid() }}">
                                        <li>
                                            @if ($target != 'Junk')
                                            <a class="dropdown-item" href="javascirpt:void(0)" wire:click="selectModel('{{ $model->id }}')">Edit</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($target != 'Junk')
                                            <a class="dropdown-item" href="javascirpt:void(0)" wire:click="setTopRated('{{ $model->id }}')">{{ $model->top_rated ? 'Unset Top Rated' : 'Set Top Rated' }}
                                            </a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($target != 'Junk')
                                            <a class="dropdown-item" href="javascirpt:void(0)" wire:click="setNewArrival('{{ $model->id }}')">
                                                {{ $model->new_arrival ? 'Unset New Arrival' : 'Set New Arrival' }}</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($target == 'Junk')
                                            <a class="dropdown-item" wire:click="restore('{{ $model->id }}')">Restore</a>
                                            @else
                                            <a class="dropdown-item" wire:click="softDelete('{{ $model->id }}')">Delete</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <a href="{{ route('accessories-models-add-ons') }}" class="position-relative">
                                <img src="{{ $model->file ?? '#' }}" class="img-fluid" style="cursor: move; height: 100px; margin: 0px 62px;" />
                                <div class="p-2">
                                    <div class="position-absolute   bg-light rounded p-1" style="right:2px; top:2px;">
                                        <strong>{{ $model->price }}</strong>
                                    </div>
                                    <h4 class="fw-bold text-center text-dark">{{ $model->name }}</h4>
                                </div>
                            </a>
                        </div>
                        @empty
                        <div class="plus-card">
                            <i class="fa fa-times text-danger " style="font-size:40px;" aria-hidden="true"></i>
                            <h4 class="fw-bold">No Records !</h4>
                        </div>
                        @endforelse

                    </div>

                </div>
                @endif
                {{-- list view --}}
                @if ($activeView == 'list')
                <div>
                    <div class="d-flex justify-content-end align-items-center">
                        <div class=" d-flex gap-2 cursor-pointer" onclick="showM('add-buy-model')">
                            <i class="fa fa-plus text-success " style="font-size:20px;" aria-hidden="true"></i>
                            <h4 class="fw-bold">Create new</h4>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex justify-content-center gap-4  flex-wrap  ">
                        <table class="table mx-auto p-5">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $model)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $model->name }}</td>
                                    <td>
                                        <img src="{{ $model->file ?? '#' }}" style="width: 2rem" />
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox" role="switch" class="form-check-input" wire:change="toggleStatus({{ $model->id }})" {{ $model->status == 'Publish' ? 'checked' : '' }} {{ $target == 'Junk' ? 'disabled' : '' }}>
                                        </div>
                                    </td>
                                    <td class="cursor-pointer">
                                        <div class="dropdown dropend" id="{{ uniqid() }}" wire:ignore>
                                            <button class="btn btn-light dropdown-toggle bg-light border-0" type="button" id="{{ uniqid() }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-ellipsis-h"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="{{ uniqid() }}">
                                                <li>
                                                    @if ($target != 'Junk')
                                                    <a class="dropdown-item" href="javascirpt:void(0)" wire:click="selectModel('{{ $model->id }}')">Edit</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target != 'Junk')
                                                    <a class="dropdown-item" href="javascirpt:void(0)" wire:click="setTopRated('{{ $model->id }}')">{{ $model->top_rated ? 'Unset Top Rated' : 'Set Top Rated' }}
                                                    </a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target != 'Junk')
                                                    <a class="dropdown-item" href="javascirpt:void(0)" wire:click="setNewArrival('{{ $model->id }}')">
                                                        {{ $model->new_arrival ? 'Unset New Arrival' : 'Set New Arrival' }}</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target == 'Junk')
                                                    <a class="dropdown-item" wire:click="restore('{{ $model->id }}')">Restore</a>
                                                    @else
                                                    <a class="dropdown-item" wire:click="softDelete('{{ $model->id }}')">Delete</a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">Record Not Found!</td>
                                </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>

                </div>
                @endif
            </div>
        </x-content>


    </div>
    {{-- OTHER MODALS --}}
    @if ($selectedDevice)
    <x-modal title="Add Model" id="add-buy-model">
        <livewire:admin.accessories.model.create :device="$selectedDevice" />
    </x-modal>
    @endif

    <x-modal title="Edit Model" id="edit-buy-model">
        <livewire:admin.accessories.model.edit />
    </x-modal>


</div>
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
