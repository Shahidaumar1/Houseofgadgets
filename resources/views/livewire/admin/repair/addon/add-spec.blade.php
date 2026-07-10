<div>

    <div class="d-flex justify-content-center gap-4  flex-wrap  ">
        <table class="table mx-auto p-5">
            <thead>
                <tr>
                    <th>{{ $model->name ?? '' }}</th>
                    <th colspan="7">Select specificatoin and price</th>


                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Memory Size</th>
                    @forelse($memory_sizes as $memory_size)
                        <td class="rounded cursor-pointer border border-dark {{ $selectedMemorySize == $memory_size ? 'bg-success text-white' : 'bg-light' }} "
                            wire:click="selectMemorySize('{{ $memory_size }}')">
                            {{ $memory_size }}
                        </td>
                    @empty
                    @endforelse

                </tr>
                <tr>
                    <th>Condition</th>
                    @forelse($conditions as $condition)
                        <td class=" rounded cursor-pointer border border-dark {{ $selectedCondition == $condition ? 'bg-success text-white' : 'bg-light' }} "
                            wire:click="selectCondition('{{ $condition }}')">
                            {{ $condition }}
                        </td>
                    @empty
                    @endforelse
                </tr>
                <tr>
                    <th>Colors</th>
                    @forelse($colors as $color)
                        <td class="rounded cursor-pointer border border-dark {{ $selectedColor == $color ? 'bg-success text-white' : 'bg-light' }} "
                            wire:click="selectColor('{{ $color }}')">
                            {{ $color }}
                        </td>
                    @empty
                    @endforelse
                </tr>

                <tr>
                    <th>Network/unlocked</th>

                    <td>
                        <div class="form-check form-switch">
                            <input type="checkbox" role="switch" class="form-check-input border border-dark"
                                wire:change="toggleNetworkUnlocked" id="{{ $rand . 'nu' }}" />
                        </div>
                    </td>

                </tr>
                <tr>
                    <th>Account/cleared</th>
                    <td>
                        <div class="form-check form-switch">
                            <input type="checkbox" role="switch" class="form-check-input border border-dark"
                                wire:change="toggleAccountCleared" id="{{ $rand . 'ac' }}" />
                        </div>
                    </td>
                </tr>


            </tbody>
        </table>
        @error('error')
            <span class="text-sm text-danger">{{ $message }}</span>
        @enderror

    </div>
    <div class=" d-flex justify-content-between my-3 align-items-center bg-light ">
        <div class=" d-flex gap-2 cursor-pointer " wire:click="clear">
            <i class="fa fa-times text-dark " style="font-size:20px;" aria-hidden="true"></i>
            <h4 class="fw-bold">Clear</h4>
        </div>
        @if ($selectedMemorySize && $selectedCondition && $selectedColor)
            <div>
                <input type="text" placeholder="Enter Price" wire:model.debounce.500="price" />
            </div>

            <div class="d-flex gap-2 cursor-pointer" wire:click="save" id="{{ $rand }}">
                <i class="fa fa-plus text-success " style="font-size:20px;" aria-hidden="true"></i>
                <h4 class="fw-bold">Add Price</h4>
            </div>
        @endif
    </div>

    <table class="table mx-auto p-5 table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Memory Size</th>
                <th scope="col">Condition</th>
                <th scope="col">Color</th>
                <th scope="col">N/Unlocked</th>
                <th scope="col">A/Clear</th>
                <th scope="col">Price</th>


            </tr>
        </thead>
        <style>
            tabel .product {
                overflow: auto;
                height: 100px;
            }
        </style>
        <tbody>

            @forelse ($product_specs as $key => $product)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $product->memory_size }}</td>
                    <td>{{ $product->condition }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->network_unlocked ? 'Yes' : 'NO' }}</td>
                    <td>{{ $product->account_cleared ? 'Yes' : 'NO' }}</td>
                    <td>{{ $product->price }} $</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Record Not Found!</td>
                </tr>
            @endforelse


        </tbody>
    </table>

</div>
