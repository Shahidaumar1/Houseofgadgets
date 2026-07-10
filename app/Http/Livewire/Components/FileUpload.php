<?php

namespace App\Http\Livewire\Components;

use ImageKit\ImageKit;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;
    public $file;
    public $imageKitError = false;
    public $tempFileUrl;
    public $tempFileId;

    protected $rules = [
        'file' => 'required|mimes:jpg,png,jpeg',
    ];
    public function updated($property)
    {
        $this->validate();

        $file = $this->file->getRealPath();
        $fileName = $this->file->getClientOriginalName();
        $imageKit = new ImageKit(
            env('IMAGE_KIT_PUBLIC_KEY'),
            env("IMAGE_KIT_PRIVATE_KEY"),
            env("IMAGE_KIT_URL_ENDPOINT")
        );

        $uploadedFile = $imageKit->uploadFile([
            'file' => fopen($file, 'r'),
            'fileName' => $fileName,
            'customCoordinates' => "0,0,400,300",
        ]);

        if ($uploadedFile->result) {
            // dd($uploadedFile->result);
            $this->tempFileUrl = $uploadedFile->result->thumbnailUrl;
            $this->tempFileId = $uploadedFile->result->fileId;
            $this->emit('FileUploaded', $uploadedFile);
        } else {
            $this->imageKitError = true;
        }

    }

    public function deleteFile($id)
    {
        $imageKit = new ImageKit(
            "public_pFA/h6awLuiz+YdF1ZS5Wf+RMc8=",
            "private_EmtwrUzmKkajcxUfKRwmf3Gon0c=",
            "https://ik.imagekit.io/ynk15b5o3c",
            "http://localhost:8000"
        );
        $imageKit->deleteFile($id);
        $this->emit('FileDeleted');
    }

    protected $listeners = ['FileDeleted'];
    public function FileDeleted()
    {
        //
    }

    public function render()
    {

        return view('livewire.components.file-upload');
    }
}
