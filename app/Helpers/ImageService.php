<?php

namespace App\Helpers;

use ImageKit\ImageKit;

class ImageService
{


    public static function upload($file)
    {

        try {
            $kit = new ImageKit(
                env('IMAGE_KIT_PUBLIC_KEY'),
                env('IMAGE_KIT_PRIVATE_KEY'),
                env('IMAGE_KIT_URL_ENDPOINT')
            );

            $uploadFile = $kit->uploadFile([
                'file' => fopen($file->getRealPath(), 'r'),
                'fileName' => $file->getClientOriginalName()
            ]);
            return $uploadFile->result;
        } catch (\Throwable $th) {
            abort(422, $th->getMessage());
        }
    }

}