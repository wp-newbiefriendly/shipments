<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

trait ImageUploadTrait
{
    public function uploadImage($file, $path)
    {
        $name = uniqid('', true) . '.webp';

        // ImageManager v3 + GD driver
        $manager = new ImageManager(new Driver());

        $image = $manager->read($file)->toWebp(90);

        Storage::disk('public')->put("$path/$name", (string) $image);

        return $name;
    }
}
