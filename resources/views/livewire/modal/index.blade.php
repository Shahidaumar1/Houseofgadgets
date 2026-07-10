<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3" style="display: flex;  justify-content: space-between; align-items: center;">
                <h2>Modal</h2>
                <a href="{{ route('modal-create') }}" class="btn btn-outline-dark">Add Modal</a>
            </div>
        </div>
        <hr>
        <div class="row ml-3 mb-2 pb-0">
            <div class="col-4">
                <x-alert />
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                            <tr class="table-secondary">
                                <th>Id</th>
                                <th>Modal</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group ">
                                        <label for="image">Select Device Type to view Modals</label>
                                        <select class="form-select" style="width: 100%"
                                            aria-label="Default select example" wire:model="selectedDeviceType"
                                            name="company_id" required>
                                            <option value="" disabled>Select Device Type</option>
                                            @foreach ($device_types as $device_type)
                                                <option value="{{ $device_type->id }}">{{ $device_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @foreach ($modals as $key => $modal)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $modal->name }}</td>
                                    <td>
                                        <img src="{{ asset($modal->image) }}" alt="{{ $modal->title }}" height="50">
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('modal-edit', $modal->id) }}"><i
                                                class="bi bi-pencil me-3"></i></a>
                                        <a href="javascitp:void(0)" wire:click="delete('{{ $modal->id }}')"
                                            style="color: rgb(211, 64, 64)"><i class="bi bi-trash-fill"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
