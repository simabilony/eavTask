<?php
namespace App\Services;

use Spatie\Image\Image;

class ImageService
{
    public function resizeImage($image, $width = 200, $height = 300)
    {
        Image::load($image->path())
            ->width($width)
            ->height($height)
            ->save();
    }

    public function applyEffects($path, $savePath)
    {
        Image::load($path)
            ->sepia()
            ->blur(50)
            ->save();
    }
}
