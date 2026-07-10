<div>
    <div class="d-flex" style="background-color: whitesmoke; height: 130vh">
        <livewire:admin.components.side-nave active="accessories" />
        <x-content>
            <livewire:admin.accessories.components.top-nav active="categories" />
            <div class="container">
                <div class="mt-5">
                    <livewire:admin.accessories.components.sub-nav :items="$items" />
                </div>
                <div class="d-flex justify-content-end align-items-center ">

                    @if ($target == 'Publish')
                    <button class="btn mt-2" onclick="showM('add-buy-cat')" style="border-radius: 5px; color: white; 
                    background-color: #20375E; pading: 10px">
                       
                        Create New
                    </button>
                    
                     @endif

                </div>
                <div>
                    <div class="d-flex justify-content-center gap-4  flex-wrap mt-5" wire:sortable="updateOrderNumber">
                        
                        @forelse($categories as $index => $category)
                        <div style="cursor: move" class="card border-0 rounded-4 a" wire:sortable.item="{{ $category->id }}" wire:key="category-{{ $category->id }}">
                            <div class="p-2 d-flex justify-content-center align-items-center">
                              <a href="{{ route('accessories-devices', $category) }}">
                                <img src="{{ $category->file ?? '#' }}" class="img-fluid" style="cursor: move; height: 150px; width: 200px" />
                            </a>
                            </div>
                             <div class="p-2 d-flex justify-content-between align-items-center">
                                <div class="p-2">
                                    <h4 class="fw-bold text-center text-dark">{{ $category->name }}</h4>
                                </div>
  
                                <!--toggel button -->
                                <div class="form-check form-switch">
                                    <input type="checkbox" role="switch" class="form-check-input" wire:change="toggleStatus({{ $category->id }})" {{ $category->status == 'Publish' ? 'checked' : '' }}>
                                </div>
                                <!--dropdown-->
                                <div class="dropdown dropend" id="{{ $rand }}" wire:ignore>
                                    <button class="btn btn-light dropdown-toggle bg-light border-0" type="button" id="{{ $rand }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="{{ $rand }}">
                                        <li>
                                            @if ($target != 'Junk')
                                            <a class="dropdown-item" href="javascirpt:void(0)" wire:click="selectCat('{{ $category->id }}')">Edit</a>
                                            @endif
                                        </li>
                                        <li>
                                            <span class="dropdown-item" wire:click="addGradeText('{{ $category->id }}')">Add Grade Text</span>
                                        </li>
                                        <li>
                                            @if ($target == 'Junk')
                                            <a class="dropdown-item" wire:click="restore('{{ $category->id }}')">Restore</a>
                                            @else
                                            <a class="dropdown-item" wire:click="softDelete('{{ $category->id }}')">Delete</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        @empty
                        <div class="plus-card">
                            <i class="fa fa-times text-danger " style="font-size:40px;" aria-hidden="true"></i>
                            <h4 class="fw-bold">No Records !</h4>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </x-content>


    </div>
    {{-- OTHER MODALS --}}
    <x-modal title="Add Category" id="add-buy-cat">
        <livewire:admin.accessories.category.create />
    </x-modal>

    <x-modal title="Add Grades Text" id="add-grade-text" size="lg">
        <livewire:admin.accessories.category.grade-text />
    </x-modal>
    @if ($selectedCat)
    <x-modal title="Edit Category" id="edit-buy-cat">
        <livewire:admin.accessories.category.edit />
    </x-modal>
    @endif

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
