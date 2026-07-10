<div>
    <div>
        <div class="d-flex">
            <livewire:admin.components.side-nave active="repair" />

            <x-content>
                <livewire:admin.repair.components.top-nav active="price" />

                <div class="container">
                    <div class="text-center my-3">
                        <h3>Select category, device, sub brand, series and model to see product specifications with prices.</h3>
                    </div>

                    <div class="row">
                        {{-- Master repairs button --}}
                        <div class="col-lg-3 col-md-6 mb-3 d-flex justify-content-center">
                            <a href="{{ route('repair-master-type') }}">
                                <button class="btn p-3" style="border-radius: 20px; color: white; background-color: #20375E;">
                                    Master Repairs
                                </button>
                            </a>
                        </div>

                        {{-- Category --}}
                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" wire:model="selectedCatId">
                                <option disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Brand / Device --}}
                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" wire:model="selectedDeviceId">
                                <option disabled selected>Select device</option>
                                @foreach($devices as $device)
                                    <option value="{{ $device->id }}">{{ $device->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Sub Brand --}}
                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" wire:model="selectedSubBrandId">
                                <option value="">Brand Level (No Sub Brand)</option>
                                <option value="all">All Sub Brands</option>
                                @foreach($subBrands as $sb)
                                    <option value="{{ $sb->id }}">{{ $sb->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Series --}}
                        <div class="col-lg-3 col-md-6 mb-3">
                            <select class="form-select" wire:model="selectedSeriesId">
                                <option value="">All Series</option>
                                @foreach($series as $ser)
                                    <option value="{{ $ser->id }}">{{ $ser->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Add new repair button --}}
                        <div class="col-lg-3 col-md-6 mb-3 d-flex justify-content-center">
                            <button class="btn p-3" onclick="showM('add-new-repair')" style="border-radius: 20px; color: white; background-color: #20375E;">
                                Add New Repair
                            </button>
                        </div>
                    </div>

                    <div style="overflow-x:auto;">
                        <div id="wrap" class="container">

                            <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

                            @if ($selectedDevice)
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{ $selectedDevice->name }}</th>
                                            @foreach ($selectedDevice->repair_types as $repairType)
                                                <th>{{ $repairType->name }}</th>
                                            @endforeach
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sortable-table-body">
                                        @foreach ($models as $model)
                                            <tr data-id="{{ $model->id }}">
                                                <td style="cursor: move;">
                                                    <i class="fas fa-arrows-alt me-2"></i> {{ $model->name }}
                                                </td>

                                                @foreach ($selectedDevice->repair_types as $repairType)
                                                    @php
                                                        $price = $model->prices->where('repair_type_id', $repairType->id)->first();
                                                    @endphp
                                                    <td>
                                                        @if ($price)
                                                            <livewire:repair.components.price-edit :key="uniqid()" :price="$price" />
                                                        @else
                                                            ....
                                                        @endif
                                                    </td>
                                                @endforeach
                                                <td>{{ $model->status }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif

                        </div>
                    </div>
                </div>
            </x-content>
        </div>

        {{-- Sticky bottom navbar for mobile --}}
        <div class="button-sticky container bg-blue d-lg-none d-md-none">
            <div class="row justify-content-center">
                <div class="col-2 mt-4"><a href="{{ route('repair-categories') }}" class="text-white item">Devices</a></div>
                <div class="col-2 mt-4"><a href="{{ route('repair-devices') }}" class="text-white item">Brands</a></div>
                <div class="col-2 mt-4"><a href="{{ route('repair-models') }}" class="text-white item">Models</a></div>
                <div class="col-2 mt-4"><a href="{{ route('repair-price') }}" class="text-white item">Repair</a></div>
            </div>
        </div>

        {{-- Modal for add/edit --}}
        @if ($selectedDevice)
            <x-modal title="Add Model" id="add-new-repair" size="xl">
                <livewire:admin.repair.repair-price.create :device="$selectedDevice" />
            </x-modal>
        @endif
        <x-modal title="Edit Model" id="edit-repair-model">
            <livewire:admin.repair.model.edit />
        </x-modal>
    </div>

    <style>
        tr[data-id] { cursor: move; }
        .dragging { opacity: 0.5; background: #f1f1f1; }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tbody = document.getElementById('sortable-table-body');
            if (!tbody) return;

            new Sortable(tbody, {
                animation: 150,
                onEnd: function () {
                    const orderedIds = Array.from(tbody.querySelectorAll('tr')).map(row => row.dataset.id);
                    Livewire.emit('updateRowOrder', orderedIds);
                }
            });
        });
    </script>
</div>
