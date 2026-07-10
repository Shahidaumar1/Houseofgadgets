<div class="container" style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    @if (!$page == 'create')
        <div class="row">
            <div class="col-md-12" style="display: flex;  justify-content: space-between; align-items: center;">
                <h2>Repair</h2>
                <a href="{{ route('repair-master') }}" class="btn btn-outline-dark">Master Repair Types</a>
            </div>
        </div>
        <hr>
    @endif
    <div id="wrap">
        <div class="container">
            @if (!$page == 'create')
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-end">
                        <a href="{{ route('repair-create') }}" class="btn btn-outline-dark">Add New Repair</a>
                    </div>
                </div>
            @endif

            <div class="row ml-0 mb-2">
                <label>Select Device Type </label>
                <select class="form-select" aria-label="Default select example" id="searchCat" style="width:20rem;"
                    class="ml-2 mb-2" wire:model="selectedDeviceTypeId">
                    <option disabled>Select Device Type</option>
                    @foreach ($device_types as $device_type)
                        <option value="{{ $device_type->id }}">{{ $device_type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
            <table class="table table-striped table-bordered" id="table_id">
                <thead>
                    @if ($selectedDeviceType)
                        <tr wire:sortable="updateTaskOrder">
                            <th>{{ $selectedDeviceType->name }}</th>
                            @foreach ($selectedDeviceType->repair_types as $repair_type)
                                <td style="cursor: move" wire:sortable.handle
                                    wire:sortable.item="{{ $repair_type->id }}"
                                    wire:key="repair-{{ $repair_type->id }}">
                                    <div class="d-flex justify-content-between align-items-center">
                                        {{ $repair_type->name }}
                                        <span class="fas fa-arrows-alt"></span>
                                    </div>
                                    {{-- <livewire:repair.components.order-number :devicetype="$selectedDeviceType" :repairtype="$repair_type"/> --}}
                                </td>
                            @endforeach
                        </tr>
                    @endif
                    @foreach ($modals as $modal)
                        <tr>
                            <td>{{ $modal->name }}</td>
                            @foreach ($selectedDeviceType->repair_types as $repairType)
                                @if ($price = $modal->prices->where('repair_type_id', $repairType->id)->first())
                                    <td>
                                        <livewire:repair.components.price-edit :key="uniqid()" :price="$price" />

                                    </td>
                                @else
                                    <td>....</td>
                                @endif
                            @endforeach


                        </tr>
                    @endforeach

                </thead>

                <tbody>


                </tbody>


            </table>
        </div>
    </div>
</div>
