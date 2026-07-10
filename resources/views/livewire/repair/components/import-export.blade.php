<div class="d-flex gap-2 align-items-center">
<div >
    <div class="mb-2">
        <x-alert />
    </div>
    <div class="d-flex  gap-5 items-center align-items-center">
     <div class=" d-flex gap-2">
       <div>
        <button type="button" onclick="document.getElementById('input-file').click()" class="btn btn-success">Import
            Products</button>
        <input type="file" id="input-file" wire:model="excel_file" hidden /><br>
        <span wire:loading wire:target="excel_file" class="ml-2">importing.....</span>
        @error('excel_file')
            <span style="color:red;" class="text-xs ml-2">{{ $message }}</span>
        @enderror
       </div>

       <div>
        <button type="button" wire:click="export"  class="btn btn-primary">Export
            Products</button>
        <br>
        <span wire:loading wire:target="export" class="ml-2">exporting.....</span>
        @error('export_excel_file')
            <span style="color:red;" class="text-xs ml-2">{{ $message }}</span>
        @enderror
       </div>
     </div>
     <div>
        <div class="d-flex justify-content-between ">

            @if($template)
            <div class="d-flex gap-3 items-center">
                <button type="button" wire:click="downloadTemplate" class="btn btn-primary">Download Template</button>
                <a href="javascitp:void(0)" wire:click="deleteTemplate" style="color: rgb(211, 64, 64)"><i class="bi bi-trash-fill"></i> </a><br>
                <span wire:loading wire:target="downloadTemplate" class="ml-2">downloading.....</span>
            </div>
            @else
            <span class="text-primary" style="cursor: pointer" onclick="document.getElementById('template-input').click()">Upload Template</span><br>
            <input type="file" wire:model="template_file" id="template-input" hidden/><br>
            <span wire:target="template_file" wire:loading class="ml-2">uploading.....</span>
            @error('template_file')
                <span style="color:red;" class="text-xs ml-2">{{ $message }}</span>
            @enderror
            @endif
        </div>
     </div>
    </div>
</div>


</div>
