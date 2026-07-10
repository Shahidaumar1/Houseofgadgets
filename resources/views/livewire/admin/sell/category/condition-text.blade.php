<div>
    <div class="mb-2">
        <strong>{{$category->name ?? ''}}</strong>
    </div>
    <div class="d-flex gap-2">
        <div class=" border-gray rounded-lg p-1 border cursor-pointer {{$selectedCondition  == 'Excellent' ? 'bg-success text-white' : 'bg-gray'}}" wire:click="selectGrade('Excellent')">Excellent</div>
        <div class=" border-gray rounded-lg p-1 border cursor-pointer {{$selectedCondition  == 'Good' ? 'bg-success text-white' : 'bg-gray'}}" wire:click="selectGrade('Good')">Good</div>
        <div class=" border-gray rounded-lg p-1 border cursor-pointer {{$selectedCondition  == 'Fair' ? 'bg-success text-white' : 'bg-gray'}}" wire:click="selectGrade('Fair')">Fair</div>
        <div class=" border-gray rounded-lg p-1 border cursor-pointer {{$selectedCondition  == 'Faulty' ? 'bg-success text-white' : 'bg-gray'}}" wire:click="selectGrade('Faulty')">Faulty</div>
        <div class=" border-gray rounded-lg p-1 border cursor-pointer {{$selectedCondition  == 'Poor' ? 'bg-success text-white' : 'bg-gray'}}" wire:click="selectGrade('Poor')">Poor</div>
    </div>
    <div class="my-3">
        <div>
            <h4>Enter  {{$selectedCondition}} Condition Text</h4>
            <div>

                <div wire:ignore>
                    <textarea wire:model.debounce.500="content" id="conditionEditor"></textarea>
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
                            .create(document.querySelector('#conditionEditor'))
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
                    Livewire.on('editorConditionChanged', (content) => {
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
