<div style="font-family: 'Segoe UI', Roboto, 'Helvetica Neue', 'Noto Sans', 'Liberation Sans', Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji';">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <h2>Update</h2>
            </div>
        </div>
        <hr>
        <div class="row" style="display: flex;  justify-content: center; align-items: center;width:100%;height:70vh;">
            <div class="col-md-6 mx-auto mb-2">
                <x-alert />
                <form wire:submit.prevent="update" method="POST">

                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" name="name" wire:model.defer="device_type.name" class="form-control"
                            id="title" placeholder="Device Type">
                        @error('device_type.name')
                            <span style="color:red " class="text-xs">{{ $message }}</span>
                        @enderror


                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        {{-- <input type="file" name="image" wire:model="image" class="form-control" id="image" placeholder="image" accept="image/*" > --}}
                        <livewire:components.file-upload :key="uniqid()" />
                        @error('image')
                            <span style="color:red" class="text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit"> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
