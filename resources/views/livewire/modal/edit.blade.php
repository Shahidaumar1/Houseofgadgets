<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h2>Update Modal</h2>
            </div>
        </div>
        <hr>
        <div class="row"
            style="display: flex;  justify-content: space-between; align-items: center;width:100%;height:70vh;">
            <div class="col-md-6 mx-auto mb-2">
                <x-alert />
                <form wire:submit.prevent="update" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="image">Device Type</label>
                        <select class="form-select" style="width: 100%" aria-label="Default select example"
                            wire:model="modal.device_type_id" name="company_id" required>
                            <option value="">Select Device Type</option>
                            @foreach ($device_types as $device_type)
                                <option value="{{ $device_type->id }}">{{ $device_type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" wire:model.defer="modal.name" class="form-control"
                            id="title" placeholder="type modal name">
                        @error('modal.name')
                            <span style="color:red " class="text-xs">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="form-group">
                        <label for="image">Modal Image</label>
                        <livewire:components.file-upload :key="uniqid()" />
                        @error('image')
                            <span style="color:red" class="text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit" {{ $image ? '' : 'disabled' }}> Update
                            Modal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
