<div>
    <div class="mb-3">
        <label for="key" class="form-label">Key: <sub>no space</sub> </label>
        <input type="text" wire:model="key" name="key" class="form-control" />
        @error('key') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3" wire:ignore>
        <label for="content" class="form-label">Content: <sub>*required</sub></label>
        <textarea wire:model.debounce.500="content" id="editor" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description: <sub>optional</sub></label>
        <input type="text" wire:model="description" class="form-control" />
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="float-end mt-3">
        <button type="submit" class="btn btn-primary" wire:click="save">
            {{ $editing ? 'Update' : 'Save' }}
            <span wire:loading wire:target='save'>
                <x-spinner />
            </span>
        </button>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
<script>
    let editorInstance = null;

    function createEditor() {
        if (editorInstance) {
            editorInstance.destroy().then(() => {
                // console.log('Editor destroyed.');
                initializeNewEditor();
            });
        } else {
            initializeNewEditor();
        }
    }

    function initializeNewEditor() {

        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                editorInstance = editor;
                editor.model.document.on('change:data', () => {
                    @this.set('content', editor.getData());
                });
            })
            .catch(error => {
                console.error(error);
            });
    }


    // createEditor();
    Livewire.on('AddContent', (content) => {
        if (editorInstance) {
            editorInstance.setData(@this.get('content'));
        }
        createEditor();
    });
</script>