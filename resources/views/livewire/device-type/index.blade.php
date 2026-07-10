<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <div class="container">
        <div class="row" style="padding: 15px;">
            <div class="col-md-12 " style="display: flex;  justify-content: space-between; align-items: center;">
                <h2>Device Type</h2>
                <a href="{{ route('device-type-create') }}" class="btn btn-outline-dark">Create</a>
            </div>
        </div>
        <hr>
        <div class="row ml-3 mb-2 pb-0">
            <div class="col-12 col-md-4">
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
                                <th>Title</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($device_types as $key => $device_type)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $device_type->name }}</td>
                                    <td>
                                        <img src="{{ asset($device_type->image) }}" alt="{{ $device_type->title }}"
                                            height="50">
                                    </td>
                                    <td class="d-flex justify-content-center" style="width: 100%;">
                                        <a href="{{ route('device-type-edit', $device_type->id) }}"><i
                                                class="bi bi-pencil me-3"></i></a>
                                        <a href="javascitp:void(0)" wire:click="delete('{{ $device_type->id }}')"
                                            style="color: rgb(211, 64, 64)"><i class="bi bi-trash-fill"></i></a>
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
