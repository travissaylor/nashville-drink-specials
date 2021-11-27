<?php

namespace App\Services\ImagePicker;

interface IImagePicker
{
    public function getRandomImageUrl(string $category = "abstract", string $orientation = "landscape"): string;
}