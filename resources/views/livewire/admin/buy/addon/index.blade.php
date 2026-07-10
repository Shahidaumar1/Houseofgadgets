<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="buy" />
        <x-content>
            <livewire:admin.buy.components.top-nav active="add-ons" />
            <div class="container my-4">
                <div class="text-center mb-3">
                    <strong>Select categeory,device and model to seee product specifications with
                        prices.
                    </strong>
                </div>
                
                
                <div class="row justify-content-between">
                <div class="col-lg-3 col-md-6 mb-3">
                    <select class="form-select" aria-label="Default select example" wire:model="selectedCatId">
                        @forelse($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <select class="form-select" aria-label="Default select example" wire:model="selectedDeviceId">
                        <option value="null">Select device</option>
                        @forelse($devices as $device)
                        <option value="{{ $device->id }}">{{ $device->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <select class="form-select" aria-label="Default select example" wire:model="selectedModelId">
                        @if ($selectedDeviceId)
                        <option value="null">Select model</option>
                        @forelse($models as $model)
                        <option value="{{ $model->id }}">{{ $model->name }}</option>
                        @empty
                        @endforelse
                        @endif
                    </select>
                </div>
                <div class="col-lg-3 col-md-6 mb-3 d-flex justify-content-center">
                    <button class="btn p-3" onclick="showM('add-model-spec')" style="border-radius: 20px; color: white; background-color: #20375E; padding: 10px">
                        Create New
                    </button>
                </div>

            </div>

            
                 

                <div>

                    <div class="d-flex  gap-4  flex-wrap table-responive  "style="overflow-x: auto;">


                        <table class="table   p-5 ">
                            <thead>
                                <tr style= "background-color: rgb(192, 192, 239);">
                                    <th style= "background-color: rgb(192, 192, 239);">#</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Image</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Memory Size</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Grade</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Color</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Price</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Quantity</th>
                                    <th style= "background-color: rgb(192, 192, 239);">imei</th>
                                    <th style= "background-color: rgb(192, 192, 239);">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($product_specs as $key => $product)
                                <tr>
                                    <th>{{ ++$key }}</th>
                                    <td style="min-width: 140px;">
                                        @if(json_decode($product->image) === null)
                                        <!-- Display single image -->
                                        <img src="{{ $product->image ?? 'https://ik.imagekit.io/qml3d7tgz/iphone_14_pro_space_black_3_RIm6bNsLt.png' }}" class="img-fluid" style="max-height: 50px;">
                                        @else
                                        <!-- Display image slider for multiple images -->
                                        <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach (json_decode($product->image) as $index => $image)
                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }} text-center">
                                                    <img src="{{ $image }}" class="img-fluid" style="max-height: 50px;" alt="Image {{ $index + 1 }}">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif
                                    </td>

                                    <td>{{ $product->memory_size ?? '....' }}</td>
                                    <td>{{ $product->grade }}</td>
                                    <td>{{ $product->color }}</td>
                                    @if ($editableProductSpecId == $product->id)
                                    <td><input style="width:30px; height:30px;" type="text" wire:keydown.enter="updateProductPrice('{{ $product->id }}')" wire:model.debounce.500="price" id="{{ $product->id }}" /></td>
                                    @else
                                    <td wire:click="toggleEditable('{{ $product->id }}')">£
                                        {{ $product->price }}
                                    </td>
                                    @endif
                                    @if ($editableProductSpecId == $product->id)

                                    <td>
                                <tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td><input type="number" wire:model.debounce.500="quantity" /></td>
                                    @if($selectedCatId==14)
                                </tr>
                                <tr>
                                    <th>IMEI </th>
                                    <td>
                                        @for($i = 0; $i
                                        < $quantity; $i++) <input class="mt-1" type="text" wire:model.debounce.500="imei.{{ $i }}" placeholder="IMEI {{ $i + 1 }}" oninput="validateIMEIs()" />
                                        @endfor
                                        <div wire:ignore>
                                            <div id="imeisError" class="text-danger"></div>
                                            <div id="imeisCount"></div>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="d-flex gap-2 cursor-pointer align-items-center" wire:click="updateProductQuantity('{{$product->id}}')">
                                            <i class="fa fa-plus text-success " style="font-size:20px;" aria-hidden="true"></i>
                                            <h4 class="fw-bold">Add Quantity</h4>
                                            <span wire:loading wire:target="updateProductQuantity">saving....</span>
                                        </div>
                                    </td>
                                </tr>
                                </td>
                                @endif
                                </tr>
                                @else
                                <td> {{ $product->quantity }} <span class="btn btn-success" wire:click="toggleEditable('{{ $product->id }}')">+</span>
                                </td>
                                @endif
                                <td>
                                    @if ($product->imei)
                                    @if (count(json_decode($product->imei))>=1)
                                    <select>

                                        @foreach (json_decode($product->imei) as $pimei)
                                        <option class="">{{ $pimei->status }} : {{ $pimei->imei }}</option>
                                        @endforeach
                                        <!-- <option class="bg-danger">Sold : 123456789012345</option> -->

                                    </select>

                                    @else
                                    No IMEI available
                                    @endif
                                    @endif
                                </td>
                                <td class="text-center">
                                    <i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true" wire:click="delete('{{ $product->id }}')"></i>
                                    <span class="mx-2"></span>
                                    <i class="fa fa-ellipsis-v cursor-pointer" aria-hidden="true" wire:click="editOrUpdateSpec('{{ $product->id }}')"></i>

                                </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">Record Not Found!</td>
                                </tr>
                                @endforelse


                            </tbody>
                        </table>



                    </div>

                </div>

            </div>


        </x-content>


    </div>
    {{-- OTHER MODALS --}}
    @if ($selectedModel)
    <x-modal title="Add Specification" id="add-model-spec" size="xl">
        <livewire:admin.buy.addon.add-spec :model="$selectedModelId" />
    </x-modal>
    @endif

    @if ($selectedModel)
    <x-modal title="Add Specfications Detail" id="add-model-more-spec" size="xl">
        <livewire:admin.buy.addon.more-spec :model="$selectedModelId" />
    </x-modal>
    @endif

</div>
<script>
    async function validateIMEIs() {
        const imeisInput = document.querySelectorAll('input[type="text"][placeholder^="IMEI"]');
        const imeisError = document.getElementById("imeisError");
        const imeisCount = document.getElementById("imeisCount");

        let isValid = true;
        let errorMessage = "";

        imeisInput.forEach(input => {
            const imei = input.value.trim();

            if (imei.length !== 15 || isNaN(imei)) {
                isValid = false;
                errorMessage += `IMEI must be exactly 15 digits\n`;
            } else if (!isValidIMEI(imei)) {
                isValid = false;
                errorMessage += `IMEI is not valid\n`;
            }
        });

        if (!isValid) {
            imeisError.textContent = errorMessage;
            imeisCount.textContent = "";
        } else {
            imeisError.textContent = "";
            imeisCount.textContent = `Valid IMEI`;
        }
    }

    function isValidIMEI(imei) {
        imei = imei.replace(/[^0-9]/g, ''); // Remove non-numeric characters
        if (!/^\d{15}$/.test(imei)) {
            return false;
        }

        const reversedImei = imei.split('').reverse().join('');
        let totalSum = 0;

        for (let i = 0; i < 15; i++) {
            let num = parseInt(reversedImei[i]);
            if (i % 2 === 1) {
                num *= 2;
                if (num > 9) {
                    num -= 9;
                }
            }
            totalSum += num;
        }

        return totalSum % 10 === 0;
    }
</script>