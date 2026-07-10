<div>
    <div class="d-flex">
        <livewire:admin.components.side-nave active="repair" />
        <x-content>
            <livewire:admin.repair.components.top-nav active="add-ons" />
            <div class="container my-4">
                <div class="text-center mb-3">
                    <strong>Select categeory,device and model to seee product specifications with
                        prices.
                    </strong>
                </div>
        <div class="d-flex align-items-center justify-content-center gap-4 mb-3">
    <div class="col">
        <select class="form-select" aria-label="Default select example" wire:model="selectedCatId">
            <option>Select Category</option>
            @forelse($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @empty
            @endforelse
        </select>
    </div>
    <div class="col">
        <select class="form-select" aria-label="Default select example" wire:model="selectedDeviceId">
            <option>Select device</option>
            @forelse($devices as $device)
                <option value="{{ $device->id }}">{{ $device->name }}</option>
            @empty
            @endforelse
        </select>
    </div>
    <div class="col">
        <select class="form-select" aria-label="Default select example" wire:model="selectedModelId">
            <option>Select model</option>
            @if ($selectedDeviceId)
                @forelse($models as $model)
                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                @empty
                @endforelse
            @endif
        </select>
    </div>
    <div class="col-12 mt-3">
        <div class="d-flex gap-2 cursor-pointer" onclick="showM('add-repair-model-spec')">
            <i class="fa fa-plus text-success" style="font-size:20px;" aria-hidden="true"></i>
            <h4 class="fw-bold">Create new</h4>
        </div>
    </div>
</div>


                <div>

<div class="d-flex justify-content-center gap-4 flex-wrap table-responive">
    <div style="overflow-x: auto; width: 100%;">
        <table class="table table-striped p-5 shadow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Memory Size</th>
                    <th>Condition</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>N/Unlocked</th>
                    <th>A/Cleared</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($product_specs as $key =>  $product)
                <tr>
                    <th>{{ ++$key }}</th>
                    <td>{{ $product->memory_size }}</td>
                    <td>{{ $product->condition }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->price }} $</td>
                    <td>{{ $product->network_unlocked ? 'Yes' : 'NO' }}</td>
                    <td>{{ $product->account_cleared ? 'Yes' : 'NO' }}</td>
                    <td>
                        <i class="fa fa-trash text-danger cursor-pointer" aria-hidden="true" wire:click="delete('{{ $product->id }}')"></i>
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
            <a href="{{ route('repair-categories') }}" class="text-white item  "> Devices</a>
        </div>

        <div class="col-2  mt-4 ">
            <a href="{{ route('repair-devices') }}" class="text-white  item "> Brands</a>
        </div>

        <div class="col-2  mt-4 ">
            <a href="{{ route('repair-models') }}" class="text-white  item "> Models</a>
        </div>

        <div class="col-2 mt-4">
            <a href="{{ route('repair-price') }}"
                    class=" text-white p-3 item  ">Repair</a>
        </div>
    </div>
</div>

    </div>
    {{-- OTHER MODALS --}}
    @if ($selectedModel)
        <x-modal title="Add Model" id="add-repair-model-spec" size="lg">
            <livewire:admin.repair.addon.add-spec :model="$selectedModelId" />
        </x-modal>
    @endif

</div>
