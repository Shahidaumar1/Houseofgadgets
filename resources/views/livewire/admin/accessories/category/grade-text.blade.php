<div>
    <div class="mb-2">
        <strong>{{$category->name ?? ''}}</strong>
    </div>
    <div class="d-flex gap-2">
        <div class=" border-gray rounded-lg p-1 border cursor-pointer {{$selectedGrade  == 'A' ? 'bg-success text-white' : 'bg-gray'}}" wire:click="selectGrade('A')">Grade A</div>
        <div class=" border-gray rounded-lg p-1 border cursor-pointer {{$selectedGrade  == 'B' ? 'bg-success text-white' : 'bg-gray'}}" wire:click="selectGrade('B')">Grade B</div>
        <div class=" border-gray rounded-lg p-1 border cursor-pointer {{$selectedGrade  == 'C' ? 'bg-success text-white' : 'bg-gray'}}" wire:click="selectGrade('C')">Grade C</div>
    </div>
    <div class="my-3">
        <div>
            <h4>Enter Grade {{$selectedGrade}} Text</h4>
            <div>

                <div wire:ignore>
                    <textarea wire:model.debounce.500="content" id="gradeEditor"></textarea>
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
                            .create(document.querySelector('#gradeEditor'))
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
                    Livewire.on('editorGradeChanged', (content) => {
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
        <button type="button" class="bg-blue text-white" wire:click="save" wire:loading.attr="disabled" wire:target="file">
            Save Changes
            <span wire:loading wire:target='save'>
                <x-spinner />
            </span>
        </button>
    </div>

</div>
