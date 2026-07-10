<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Terms & Conditions/ Policies</h2>
            </div>
        </div>
        <hr>
        <div class="row" style="display: flex;  justify-content: center; align-items: center;width:100%;height:70vh;">
            <div class="col-md-6 mx-auto">
                <x-alert />

                <div>
                    <div class="form-group">

                        <div class="form-group">
                            <label for="title" class="mb-3 fw-bold">Update Terms & Conditions</label>
                            <textarea wire:model.debounce.500="data.terms" name="description" class="form-control tinymce-editor hidden"
                                id="mytextarea" placeholder="Enter Terms and conditions" style="height: 10rem;"></textarea>
                        </div>
                        @error('data.terms')
                            <span style="color:red " class="text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">

                        <div class="form-group">
                            <label for="title" class="mb-3 fw-bold">Policies</label>
                            <textarea wire:model.debounce.500="data.policies" name="description" class="form-control tinymce-editor hidden"
                                id="mytextarea" placeholder="Enter Policies" style="height: 10rem;"></textarea>
                        </div>
                        @error('data.policies')
                            <span style="color:red " class="text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
