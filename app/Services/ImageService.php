<?php
namespace App\Services;

use Spatie\Image\Image;

class ImageService
{
    public function resizeImage($path, $width, $height, $savePath)
    {
        Image::load($path)
            ->width($width)
            ->height($height)
            ->save($savePath);
    }

    public function applyEffects($path, $savePath)
    {
        Image::load($path)
            ->sepia()
            ->blur(50)
            ->save($savePath);
    }
}
