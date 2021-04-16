<?php


namespace App\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ImageService
{
    public function saveImage(UploadedFile $image, string $directory)
    {
        $filename = $image->hashName();
        $file = Image::make($image)->orientate();
        if ($file->height() > 600) {
            $file->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $file->encode();
        Storage::put("$directory/$filename", $file);
        $file->destroy();
        return $filename;
    }
}
