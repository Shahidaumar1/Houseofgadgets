<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="sell" />
        <x-content>
            <livewire:admin.sell.components.top-nav active="add-ons" />
            <div class="container my-4">
                <div class="text-center mb-3">
                    <strong>Select categeory,device and model to seee product specifications with
                        prices.
                    </strong>
                </div>

                @php
                    $network_images = [
                        'Vodafone' => 'https://ik.imagekit.io/li8bg5tjv3/jjjj-removebg-preview.png?updatedAt=1715001265394',
                        'o2' => 'https://ik.imagekit.io/li8bg5tjv3/o2.png?updatedAt=1714988339664',
                        'Smarty' =>
                            'https://ik.imagekit.io/li8bg5tjv3/khuram.png?updatedAt=1714995835796',
                        'EE' =>
                            'https://ik.imagekit.io/li8bg5tjv3/EE_logo.svg-removebg-preview.png?updatedAt=1715001352027',
                        'Asda' => 'https://ik.imagekit.io/li8bg5tjv3/3-removebg-preview.png?updatedAt=1714996032103',
                        'Tesco' =>
                            'https://images.rawpixel.com/image_png_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTEwL3JtNTM1YmF0Y2gyLXF1ZXN0aW9uLTAyLnBuZw.png',
                    ];
                @endphp


                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-3"> <!-- Adjust column width based on screen size -->
                        <div>
                            <select class="form-select" aria-label="Select Category" wire:model="selectedCatId">
                                <option>Select Category</option>
                                @forelse($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div>
                            <select class="form-select" aria-label="Select device" wire:model="selectedDeviceId">
                                <option>Select device</option>
                                @forelse($devices as $device)
                                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">
                        <div>
                            <select class="form-select" aria-label="Select model" wire:model="selectedModelId">
                                <option>Select model</option>
                                @if ($selectedDeviceId)
                                    @forelse($models as $model)
                                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                                    @empty
                                    @endforelse
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3">

                        <div class="d-flex flex-column align-items-center justify-content-center gap-4">
                            <button class="btn p-3" onclick="showM('add-sell-model-spec')"
                                style="border-radius: 20px; color: white;
                    background-color: #20375E; pading: 5px">

                                Create New
                            </button>


                        </div>
                    </div>
                </div>


                <!--<div>-->
                <!--    <div class="d-flex gap-4 flex-wrap table-responsive ">-->
                <!--        <div class="table-container " style="overflow-x: auto; width: 100%;">-->
                <!--            <table class="table  p-5 mb-5 shadow">-->
                <!--                <thead>-->
                <!--                    <tr style = "background-color:#c0c0ef">-->
                <!--                        <th>#</th>-->
                <!--                        <th>Image</th>-->
                <!--                        <th>Memory Size</th>-->
                <!--                        <th>Condition</th>-->
                <!--                        <th>Price</th>-->
                <!--                        @if ($tabletMode || $mobileMode)-->
                <!--                            <th>N/Unlocked</th>-->
                <!--                        @endif-->
                <!--                        <th>Actions</th>-->
                <!--                    </tr>-->
                <!--                </thead>-->
                <!--                <tbody>-->
                <!--                    @forelse ($product_specs as $key => $product)-->
                <!--                        <tr>-->
                <!--                            <th>{{ ++$key }}</th>-->
                <!--                            <td><img src="{{ $product->image ?? 'https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png' }}"-->
                <!--                                    style="height:40px; width:50px;" /></td>-->
                <!--                            <td>{{ $product->memory_size ?? '....' }}</td>-->
                <!--                            <td>{{ $product->condition }}</td>-->
                <!--                            @if ($editableProductSpecId == $product->id)-->
                <!--                                <td><input style="width:30px; height:30px;" type="text"-->
                <!--                                        wire:keydown.enter="updateProductPrice('{{ $product->id }}')"-->
                <!--                                        wire:model.debounce.500="price" id="{{ $product->id }}" />-->
                <!--                                </td>-->
                <!--                            @else-->
                <!--                                <td wire:click="toggleEditable('{{ $product->id }}')">£-->
                <!--                                    {{ $product->price }}</td>-->
                <!--                            @endif-->
                <!--                            @if ($mobileMode || $tabletMode)-->
                <!--                                <td>{{ $product->network_unlocked ? 'Yes' : 'NO' }}</td>-->
                <!--                            @endif-->
                <!--                            <td>-->
                <!--                                <i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true"-->
                <!--                                    wire:click="delete('{{ $product->id }}')"></i>-->
                <!--                            </td>-->
                <!--                        </tr>-->
                <!--                    @empty-->
                <!--                        <tr>-->
                <!--                            <td colspan="9">Record Not Found!</td>-->
                <!--                        </tr>-->
                <!--                    @endforelse-->
                <!--                </tbody>-->
                <!--            </table>-->
                <!--        </div>-->

                <!--    </div>-->


                <!--</div>-->
                <div>
    <div class="table-container" style="overflow-x: auto; width: 100%;">
        <table class="table p-5 mb-5 shadow">
            <thead>
                <tr style="background-color:#c0c0ef">
                    <th>#</th>
                    <th>Image</th>
                    <th>Memory Size</th>
                    <th>Condition</th>
                    <th>Price</th>
                    @if ($tabletMode || $mobileMode)
                        <th>Network Image</th> <!-- Include network image -->
                    @endif
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product_specs as $key => $product)
                    <tr>
                        <th>{{ ++$key }}</th>
                        <td><img src="{{ $product->image ?? 'https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png' }}"
                                style="height:40px; width:50px;" /></td>
                        <td>{{ $product->memory_size ?? '....' }}</td>
                        <td>{{ $product->condition }}</td>
                        <td>£ {{ $product->price }}</td>
                        @if ($tabletMode || $mobileMode)
                            <td>
                                @if (isset($network_images[$product->network_unlocked])) <!-- Check if the network has an image -->
                                    <img src="{{ $network_images[$product->network_unlocked] }}" 
                                         alt="{{ $product->network_unlocked }}" 
                                         style="width: 30px; height: 30px;" />
                                @else
                                    N/A <!-- Fallback if there's no image -->
                                @endif
                            </td>
                        @endif
                        <td>
                            <i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true"
                               wire:click="delete('{{ $product->id }}')"></i>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Record Not Found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
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
    @if ($selectedModel)
        <x-modal title="Add  Specs" id="add-sell-model-spec" size="xl">
            <livewire:admin.sell.addon.add-spec :model="$selectedModelId" />
        </x-modal>
    @endif

</div>
