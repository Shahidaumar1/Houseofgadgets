<div>
    <div wire:ignore >
        <textarea wire:model.debounce.500="content" id="{{$target}}"  ></textarea>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            ClassicEditor
                .create(document.querySelector('#{{$target}}'))
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('content', editor.getData());
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });

    </script>

</div>
