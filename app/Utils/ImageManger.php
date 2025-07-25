<?php

namespace App\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageManger
{

    public function uploadImages($images, $model, $disk): void
    {
        foreach ($images as $image) {

            $file_name = $this->generateImageName($image);
            $this->storeImageInLocal($image, '/', $file_name, $disk);

            $model->images()->create([
                'file_name' => $file_name,
            ]);
        }
    }

    public function uploadSingleImage($path, $image, $disk)
    {
        $file_name = $this->generateImageName($image);
        self::storeImageInLocal($image, $path, $file_name, $disk);
        return $file_name;
    }

    public function generateImageName($image): string
    {
        return Str::uuid() . time() . $image->getClientOriginalExtension();
    }

    private function storeImageInLocal($image, $path, $file_name, $disk): void
    {
        $image->storeAs($path, $file_name, ['disk' => $disk]);
    }

    public function deleteImageFromLocal($image_path): void
    {
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }

    }

}
