<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="sell" />
        <x-content>
            <livewire:admin.sell.components.top-nav active="models" />
            <div class="container">
                <div class="d-flex justify-content-center gap-2 pt-2 pb-2">
                    <select aria-label="Default select example" wire:model="selectedCatId" style="width:140px">
                        <option>Select Device</option>
                        @forelse($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    <select aria-label="Default select example" wire:model="selectedDeviceId" style="width:140px">
                        <option>Select Brand</option>
                        @forelse($devices as $device)
                            <option value="{{ $device->id }}">{{ $device->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="my-4 ">
                    <livewire:admin.sell.components.sub-nav :items="$items" />
                </div>
                <div class="d-flex align-items-center gap-4 justify-content-center my-4">
                    <div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-2">
                                <i class="fa fa-square cursor-pointer {{ $activeView == 'card' ? 'text-success' : '' }}"
                                    aria-hidden="true" wire:click="activateView('card')"></i>
                                <i class="fa fa-list cursor-pointer {{ $activeView == 'list' ? 'text-success' : '' }}"
                                    aria-hidden="true" wire:click="activateView('list')"></i>
                            </div>
                        </div>
                    </div>

                    @if ($target == 'Publish')
                        <button class="btn p-2" onclick="showM('add-sell-model')"
                            style="border-radius: 5px; color: white;
                        background-color: #20375E; pading: 10px">
                            Create New </button>
                    @endif

                </div>


                {{-- card view --}}
                @if ($activeView == 'card')
                    <div>

                        {{-- <div class="d-flex justify-content-center gap-4  flex-wrap  ">

                            @forelse($models as $model)
                                <div class="card border-0 rounded-0  cursor-pointer">
                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                      <small class = "text-center pt-2" style = "color: #20375E;" > Width: 800px Height: 800px</small>

                                        <!--Drop down-->
                                        <div class="dropdown dropend" id="{{ uniqid() }}" wire:ignore>
                                            <button class="btn btn-light dropdown-toggle  border-0"
                                                type="button" id="{{ uniqid() }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="{{ uniqid() }}">
                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascirpt:void(0)"
                                                            wire:click="selectModel('{{ $model->id }}')">Edit</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascirpt:void(0)"
                                                            wire:click="setTopRated('{{ $model->id }}')">{{ $model->top_rated ? 'Unset Top Rated' : 'Set Top Rated' }}
                                                        </a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascirpt:void(0)"
                                                            wire:click="setNewArrival('{{ $model->id }}')">
                                                            {{ $model->new_arrival ? 'Unset New Arrival' : 'Set New Arrival' }}</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target == 'Junk')
                                                        <a class="dropdown-item"
                                                            wire:click="restore('{{ $model->id }}')">Restore</a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            wire:click="softDelete('{{ $model->id }}')">Delete</a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-2 d-flex justify-content-between align-items-center">

                                    <a href="{{ route('sell-models-add-ons') }}" class="position-relative">
                                        <img src="{{ $model->file ?? '#' }}" class="img-fluid"
                                            style="height: 100px; margin: 0px 50px;" />
                                    </a>

                                    </div>
                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <div class="p-2">
                                            <div class="position-absolute   bg-light rounded p-1"
                                                style="right:2px; top:2px;">
                                                <strong>{{ $model->price }}</strong>
                                            </div>
                                            <h4 class="fw-bold text-center text-dark">{{ $model->name }}</h4>
                                        </div>

                                      <!--toggle button-->
                                        @if ($target != 'Junk')
                                            <div class="form-check form-switch">
                                                <input type="checkbox" role="switch" class="form-check-input"
                                                    wire:change="toggleStatus({{ $model->id }})"
                                                    {{ $model->status == 'Publish' ? 'checked' : '' }}>
                                            </div>
                                        @endif
                                    </div>

                                </div>
                                @empty
                            <div class="d-flex justify-content-center align-items-center">
                               <div>
                                <h3 class="fw-bold text-center " style="color: darkblue">No Records !</h3>
                                <img src="https://ik.imagekit.io/4csyk445b/archivo_de_documento_no_encontrado__b%C3%BAsqueda_sin_resultado_concepto_ilustraci%C3%B3n_dise%C3%B1o_plano_vector_eps10__elemento_gr%C3%A1fico_moderno_para_p%C3%A1gina_de_inicio__interfaz_de_usuario_de_estado_vac%C3%ADo__infograf%202.png?updatedAt=1712404110308" class = "img-fluid" alt="No Recode icon">

                               </div>
                            </div>
                             @endforelse

                        </div> --}}

                        {{-- <div class="d-flex justify-content-center gap-4 flex-wrap sortable-sell">
                            @forelse($models as $model)
                                <div class="card border-0 rounded-0 cursor-pointer" data-id="{{ $model->id }}">
                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <small class="text-center pt-2" style="color: #20375E;">Width: 800px Height:
                                            800px</small>

                                        <!-- Dropdown -->
                                        <div class="dropdown dropend" id="{{ uniqid() }}" wire:ignore>
                                            <button class="btn btn-light dropdown-toggle border-0" type="button"
                                                id="{{ uniqid() }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="{{ uniqid() }}">
                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click="selectModel('{{ $model->id }}')">Edit</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click="setTopRated('{{ $model->id }}')">{{ $model->top_rated ? 'Unset Top Rated' : 'Set Top Rated' }}
                                                        </a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click="setNewArrival('{{ $model->id }}')">
                                                            {{ $model->new_arrival ? 'Unset New Arrival' : 'Set New Arrival' }}</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target == 'Junk')
                                                        <a class="dropdown-item"
                                                            wire:click="restore('{{ $model->id }}')">Restore</a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            wire:click="softDelete('{{ $model->id }}')">Delete</a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <a href="{{ route('sell-models-add-ons') }}" class="position-relative">
                                            <img src="{{ $model->file ?? '#' }}" class="img-fluid"
                                                style="height: 100px; margin: 0px 50px;" />
                                        </a>
                                    </div>

                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <div class="p-2">
                                            <div class="position-absolute bg-light rounded p-1"
                                                style="right:2px; top:2px;">
                                                <strong>{{ $model->price }}</strong>
                                            </div>
                                            <h4 class="fw-bold text-center text-dark">{{ $model->name }}</h4>
                                        </div>

                                        <!-- Toggle button -->
                                        @if ($target != 'Junk')
                                            <div class="form-check form-switch">
                                                <input type="checkbox" role="switch" class="form-check-input"
                                                    wire:change="toggleStatus({{ $model->id }})"
                                                    {{ $model->status == 'Publish' ? 'checked' : '' }}>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="d-flex justify-content-center align-items-center">
                                    <div>
                                        <h3 class="fw-bold text-center" style="color: darkblue">No Records !</h3>
                                        <img src="https://ik.imagekit.io/4csyk445b/archivo_de_documento_no_encontrado__b%C3%BAsqueda_sin_resultado_concepto_ilustraci%C3%B3n_dise%C3%B1o_plano_vector_eps10__elemento_gr%C3%A1fico_moderno_para_p%C3%A1gina_de_inicio__interfaz_de_usuario_de_estado_vac%C3%ADo__infograf%202.png?updatedAt=1712404110308"
                                            class="img-fluid" alt="No Record icon">
                                    </div>
                                </div>
                            @endforelse
                        </div>


                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
                        <script>
                            document.addEventListener('livewire:load', function() {
                                var el = document.querySelector('.sortable-sell');
                                var sortable = Sortable.create(el, {
                                    animation: 150,
                                    onEnd: function(evt) {
                                        var order = Array.from(el.children).map(function(child) {
                                            return child.getAttribute('data-id');
                                        });
                                        @this.call('updateOrder', order);
                                    },
                                });
                            });
                        </script>
 --}}




                        <div class="d-flex justify-content-center gap-4 flex-wrap sortable-sell">
                            @forelse($models as $model)
                                <div class="card border-0 rounded-0 cursor-pointer" data-id="{{ $model->id }}">
                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <small class="text-center pt-2" style="color: #20375E;">Width: 800px Height:
                                            800px</small>

                                        <!-- Dropdown -->
                                        <div class="dropdown dropend" id="{{ uniqid() }}" wire:ignore>
                                            <button class="btn btn-light dropdown-toggle border-0" type="button"
                                                id="{{ uniqid() }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="{{ uniqid() }}">
                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click="selectModel('{{ $model->id }}')">Edit</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click="setTopRated('{{ $model->id }}')">{{ $model->top_rated ? 'Unset Top Rated' : 'Set Top Rated' }}
                                                        </a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target != 'Junk')
                                                        <a class="dropdown-item" href="javascript:void(0)"
                                                            wire:click="setNewArrival('{{ $model->id }}')">
                                                            {{ $model->new_arrival ? 'Unset New Arrival' : 'Set New Arrival' }}</a>
                                                    @endif
                                                </li>
                                                <li>
                                                    @if ($target == 'Junk')
                                                        <a class="dropdown-item"
                                                            wire:click="restore('{{ $model->id }}')">Restore</a>
                                                    @else
                                                        <a class="dropdown-item"
                                                            wire:click="softDelete('{{ $model->id }}')">Delete</a>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <a href="{{ route('sell-models-add-ons') }}" class="position-relative">
                                            <img src="{{ $model->file ?? '#' }}" class="img-fluid"
                                                style="height: 100px; margin: 0px 50px;" />
                                        </a>
                                    </div>

                                    <div class="p-2 d-flex justify-content-between align-items-center">
                                        <div class="p-2">
                                            <div class="position-absolute bg-light rounded p-1"
                                                style="right:2px; top:2px;">
                                                <strong>{{ $model->price }}</strong>
                                            </div>
                                            <h4 class="fw-bold text-center text-dark">{{ $model->name }}</h4>
                                        </div>

                                        <!-- Toggle button -->
                                        @if ($target != 'Junk')
                                            <div class="form-check form-switch">
                                                <input type="checkbox" role="switch" class="form-check-input"
                                                    wire:change="toggleStatus({{ $model->id }})"
                                                    {{ $model->status == 'Publish' ? 'checked' : '' }}>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="d-flex justify-content-center align-items-center">
                                    <div>
                                        <h3 class="fw-bold text-center" style="color: darkblue">No Records !</h3>
                                        <img src="https://ik.imagekit.io/4csyk445b/archivo_de_documento_no_encontrado__b%C3%BAsqueda_sin_resultado_concepto_ilustraci%C3%B3n_dise%C3%B1o_plano_vector_eps10__elemento_gr%C3%A1fico_moderno_para_p%C3%A1gina_de_inicio__interfaz_de_usuario_de_estado_vac%C3%ADo__infograf%202.png?updatedAt=1712404110308"
                                            class="img-fluid" alt="No Record icon">
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
                        <script>
                            document.addEventListener('livewire:load', function() {
                                var el = document.querySelector('.sortable-sell');
                                var sortable = Sortable.create(el, {
                                    animation: 150,
                                    onEnd: function(evt) {
                                        var order = Array.from(el.children).map(function(child) {
                                            return child.getAttribute('data-id');
                                        });
                                        @this.call('updateOrder', order).then(function() {
                                            location.reload();
                                        });
                                    },
                                });
                            });
                        </script>



                    </div>
                @endif
                {{-- list view --}}
                @if ($activeView == 'list')
                    <div>
                        <div class="d-flex justify-content-end align-items-center">
                            <div class=" d-flex gap-2 cursor-pointer" onclick="showM('add-sell-model')">
                                <i class="fa fa-plus text-success " style="font-size:20px;" aria-hidden="true"></i>
                                <h4 class="fw-bold">Create new</h4>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-center gap-4  flex-wrap  ">
                            <table class="table  mx-auto p-5">
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
                                                    <input type="checkbox" role="switch" class="form-check-input"
                                                        wire:change="toggleStatus({{ $model->id }})"
                                                        {{ $model->status == 'Publish' ? 'checked' : '' }}
                                                        {{ $target == 'Junk' ? 'disabled' : '' }}>
                                                </div>
                                            </td>
                                            <td class="cursor-pointer">
                                                <div class="dropdown dropend" id="{{ uniqid() }}" wire:ignore>
                                                    <button class="btn btn-light dropdown-toggle bg-light border-0"
                                                        type="button" id="{{ uniqid() }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-h"></i>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="{{ uniqid() }}">
                                                        <li>
                                                            @if ($target != 'Junk')
                                                                <a class="dropdown-item" href="javascirpt:void(0)"
                                                                    wire:click="selectModel('{{ $model->id }}')">Edit</a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if ($target != 'Junk')
                                                                <a class="dropdown-item" href="javascirpt:void(0)"
                                                                    wire:click="setTopRated('{{ $model->id }}')">{{ $model->top_rated ? 'Unset Top Rated' : 'Set Top Rated' }}
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if ($target != 'Junk')
                                                                <a class="dropdown-item" href="javascirpt:void(0)"
                                                                    wire:click="setNewArrival('{{ $model->id }}')">
                                                                    {{ $model->new_arrival ? 'Unset New Arrival' : 'Set New Arrival' }}</a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            @if ($target == 'Junk')
                                                                <a class="dropdown-item"
                                                                    wire:click="restore('{{ $model->id }}')">Restore</a>
                                                            @else
                                                                <a class="dropdown-item"
                                                                    wire:click="softDelete('{{ $model->id }}')">Delete</a>
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
                    <a href="{{ route('sell-categories') }}" class="text-white item "> Devices</a>
                </div>

                <div class="col-2  mt-4 ">
                    <a href="{{ route('sell-devices') }}" class="text-white "> Brands</a>
                </div>

                <div class="col-2  mt-4 ">
                    <a href="{{ route('sell-models') }}" class="text-white  item "> Models</a>
                </div>

                <div class="col-2 mt-4">
                    <a href="{{ route('sell-models-add-ons') }}" class="text-white  item "> Addon</a>
                </div>
            </div>
        </div>

    </div>
    {{-- OTHER MODALS --}}
    @if ($selectedDevice)
        <x-modal title="Add Model" id="add-sell-model">
            <livewire:admin.sell.model.create :device="$selectedDevice" />
        </x-modal>
    @endif

    <x-modal title="Edit Model" id="edit-sell-model">
        <livewire:admin.sell.model.edit />
    </x-modal>


</div>
