<div>

    <div>
        <h3>{{ $model->name ?? '' }} ({{ $product_spec->memory_size ?? '' }}) </h3>
        <div class="d-flex justify-content-center my-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link cursor-pointer  {{ $editor == 'Detail' ? 'active text-success' : '' }}"
                        aria-current="page" wire:click="toggleEditor('Detail')">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cursor-pointer  {{ $editor == 'Specification' ? 'active text-success' : '' }}"
                        aria-current="page" wire:click="toggleEditor('Specification')">Specification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cursor-pointer  {{ $editor == 'Warranty' ? 'active text-success' : '' }}"
                        aria-current="page" wire:click="toggleEditor('Warranty')">Warranty</a>
                </li>

            </ul>
        </div>

        <div>
            <h4>Enter {{ $editor }}</h4>
            <div>


                <div wire:ignore>
                    <textarea wire:model.debounce.500="content" id="editor"></textarea>
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
                    Livewire.on('editorTypeChanged', (content) => {
                        if (editorInstance) {
                            editorInstance.setData(@this.get('content'));
                        }
                        createEditor();
                    });
                </script>
            </div>

            @error('detail')
                <span class="text-xs text-danger">{{ $message }}</span>
            @enderror
        </div>

    </div>


    <div class="float-end mt-3 ">
        <button type="button" class="bg-blue text-white" wire:click="save">
            Save Changes
            <span wire:loading wire:target='save'>
                <x-spinner />
            </span>
        </button>
    </div>



</div>
