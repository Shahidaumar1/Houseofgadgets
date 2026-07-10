<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="sell" />
        <x-content>
            <livewire:admin.sell.components.top-nav active="devices" />
            <div class="container pb-5">
                
                    <h3 class = "text-center pt-3">{{ $selectedCategory->name ?? '' }}</h3>
                <div class="d-flex align-items-center gap-4 justify-content-center my-4 gap-0-sm">
                    <livewire:admin.sell.components.sub-nav :items="$items" />
                    <!-- dropdown for seearch-->
                </div>
                <div class="d-flex justify-content-center align-items-center gap-2 pb-2">
                    <select class="form-select form-control" aria-label="Default select example" wire:model="selectedCatId"
                        style="width:130px">
                        @forelse($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    

                    @if ($target == 'Publish')
                    <button class="btn p-2" onclick="showM('add-sell-device')" style="border-radius: 5px; color: white; 
                    background-color: #20375E; pading: 10px">
                       
                        Create New
                    </button>
                     @endif

                </div>
                <div class="d-flex justify-content-center gap-4  flex-wrap  ">
                       @if ($target == 'Publish')
                    <div class="plus-card bg-white">
                   <div class="d-flex align-items-center  justify-content-center my-4">               
                         <img src="https://ik.imagekit.io/4csyk445b/Rectangle%201.png?updatedAt=1712154034586" class="img-fluid" style="height: 130px; width: 200px" />
                    </div>
                              <div class="d-flex align-items-center  justify-content-between p-2">
                                <h4 class="fw-bold">Allow Others</h4>
                        
                                    <div class="form-check form-switch">
                                                <input type="checkbox" role="switch" class="form-check-input border border-dark"
                                                @if ($selectedCategory) wire:change="toggleOthers({{ $selectedCategory->id }})"
                                                {{ $selectedCategory->others == true ? 'checked' : '' }} @endif>                        
                                    </div>
                        
                            </div>
                    </div>
                    @endif
                     @forelse($devices as $device)
                    <div class=" bg-white cursor-pointer">
                        <div class="p-2 d-flex justify-content-center align-items-center">
                            <a href="{{ route('sell-models', $device) }}">
                                <img src="{{ $device->file ?? '#' }}" class=""
                                    style="height: 150px; width: 200px" />
                              
                            </a>
                        
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center p-2 pb-0">
                              <div class="p-2">
                                    <h4 class="fw-bold text-center text-dark">{{ $device->name }}</h4>
                                </div>
                            <!--check button -->
                            <div class="form-check form-switch">
                            <input type="checkbox" role="switch" class="form-check-input border border-dark"
                                        wire:change="toggleStatus({{ $device->id }})"
                                        {{ $device->status == 'Publish' ? 'checked' : '' }}>
                                        </div>
                            
                            <!--dropdown button -->
                             <div class="dropdown dropend" id="{{ uniqid() }}" wire:ignore>
                                    <button class="btn btn-light dropdown-toggle bg-light border-0" type="button"
                                        id="{{ uniqid() }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="{{ uniqid() }}">
                                        <li>
                                            @if ($target != 'Junk')
                                                <a class="dropdown-item" href="javascirpt:void(0)"
                                                    wire:click="selectDevice('{{ $device->id }}')">Edit</a>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($target == 'Junk')
                                                <a class="dropdown-item"
                                                    wire:click="restore('{{ $device->id }}')">Restore</a>
                                            @else
                                                <a class="dropdown-item"
                                                    wire:click="softDelete('{{ $device->id }}')">Delete</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                        
                        
                        
                            
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
    overflow-x:auto;
}

.home-btn:hover {
    color: orange;
}
.button-sticky .col-2 {
    margin-right: 10px; /* Adjust this value to set the desired gap */
}

.button-sticky .col-2:last-child {
    margin-right: 0; /* Remove margin from the last button to prevent extra space */
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
    @if ($selectedCategory)
        <x-modal title="Add Device" id="add-sell-device">
            <livewire:admin.sell.device.create :category="$selectedCategory" />
        </x-modal>
    @endif
    <x-modal title="Edit Device" id="edit-sell-device">
        <livewire:admin.sell.device.edit />
    </x-modal>


</div>
<style>
    @media (max-width: 576px) {
        .gap-0-sm {
            gap: 0 !important;
        }
    }
</style>