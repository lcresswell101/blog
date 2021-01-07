<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Repository\ImageRepositoryInterface;

class ImageController extends Controller
{
    private $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function destroy($imageId)
    {
        $this->imageRepository->deleteImage($imageId);
    }
}
