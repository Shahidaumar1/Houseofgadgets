<div>
    <input type="file" class="form-control" wire:model="file" />
    @error('file')
        <span class="text-sm text-danger">{{ $message }}</span>
    @enderror

    <span wire:loading wire:target="file">Uploading....</span>
    @if ($imageKitError)
        <span class="text-sm text-danger">Error: when uploading image on ImageKit server. It can be ImageKit not
            allowing
            your
            IP to upload
            image or internet connectivity</span>
    @endif
</div>
