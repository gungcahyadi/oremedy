<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use File;

class MyImage
{
    public function saveImage(UploadedFile $photo, $title)
    {
        $fileName = str_slug($title).'-at-bali-tourism-college-'.str_random(3).'.' . $photo->guessClientExtension();
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'front'. DIRECTORY_SEPARATOR . 'images';
        $photo->move($destinationPath, $fileName);
        return $fileName;
    }

    public function deleteImage($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'front'. DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR .$filename;
        return File::delete($path);
    }
}