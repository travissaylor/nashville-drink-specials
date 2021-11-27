<?php

namespace App\Services\ImagePicker;

use MarkSitko\LaravelUnsplash\UnsplashFacade;

class UnsplashImagePicker implements IImagePicker
{
    public function getRandomImageUrl(string $category = "abstract", string $orientation = "landscape"): string
    {
        dd(UnsplashFacade::randomPhoto()
        ->orientation($orientation)
        ->term($orientation)
        ->toJson()
        ->urls
        ->raw);
        return UnsplashFacade::randomPhoto()
            ->orientation($orientation)
            ->term($orientation)
            ->toJson()
            ->urls
            ->raw;
    }
}
