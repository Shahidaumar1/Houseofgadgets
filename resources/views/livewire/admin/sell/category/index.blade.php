<div>
    <div class="d-flex" style = "background-color: whitesmoke;">
        <livewire:admin.components.side-nave active="sell" />
        <x-content>
            <livewire:admin.sell.components.top-nav active="categories" />
            <div class="container">
                <div class="mt-5">
                    <livewire:admin.sell.components.sub-nav :items="$items" />
                </div>
                                <div class="d-flex justify-content-end align-items-center ">

                    @if ($target == 'Publish')
                    <button class="btn mt-2" onclick="showM('add-sell-cat')" style="border-radius: 5px; color: white; 
                    background-color: #20375E; pading: 10px">
                       
                        Create New
                    </button>
                    
                     @endif

                </div>
                <div>
                    <div class="d-flex mb-5 justify-content-center gap-4  flex-wrap mt-5">
                    
                        @forelse($categories as $category)
                            <div class="card rounded-4 border-0 cursor-pointer">
                                <div class = "d-flex justify-content-center align-items-center p-1">
                                <a href="{{ route('sell-devices', $category) }}">
                                    <img src="{{ $category->file ?? '#' }}" class="img-fluid"
                                        style="height: 150px; width: 200px" />
                                </a>
                                </div>
                                <div class = "d-flex justify-content-between align-items-center">
                                    <div class="p-2">
                                        <h4 class="fw-bold text-center text-dark">{{ $category->name }}</h4>
                                    </div>
                                 <div class="form-check form-switch">
                                        <input type="checkbox" role="switch" class="form-check-input"
                                            wire:change="toggleStatus({{ $category->id }})"
                                            {{ $category->status == 'Publish' ? 'checked' : '' }}>
                                    </div>
                                     <div class="dropdown dropend" id="{{ $rand }}" wire:ignore>
                                        <button class="btn btn-light dropdown-toggle bg-light border-0" type="button"
                                            id="{{ $rand }}" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="{{ $rand }}">
                                            <li>
                                                @if ($target != 'Junk')
                                                    <a class="dropdown-item" href="javascirpt:void(0)"
                                                        wire:click="selectCat('{{ $category->id }}')">Edit</a>
                                                @endif
                                            </li>
                                            <li>
                                                <span class="dropdown-item"
                                                    wire:click="addConditionText('{{ $category->id }}')">Add Condition Text</span>
                                        </li>
                                            <li>
                                                @if ($target == 'Junk')
                                                    <a class="dropdown-item"
                                                        wire:click="restore('{{ $category->id }}')">Restore</a>
                                                @else
                                                    <a class="dropdown-item"
                                                        wire:click="softDelete('{{ $category->id }}')">Delete</a>
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
            <a href="{{ route('sell-devices') }}" class="text-white  item"> Brands</a>
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
    <x-modal title="Add Category" id="add-sell-cat">
        <livewire:admin.sell.category.create />
    </x-modal>
    <x-modal title="Add Condition Text" id="add-condition-text" size="lg">
        <livewire:admin.sell.category.condition-text />
    </x-modal>
    @if ($selectedCat)
        <x-modal title="Edit Category" id="edit-sell-cat">
            <livewire:admin.sell.category.edit />
        </x-modal>
    @endif

</div>
