<?php

namespace App\Repository;

use App\Http\Requests\PostRequest;
use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ImageRepository extends StorageRepository implements ImageRepositoryInterface
{
    protected $model;

    public function __construct(Image $model, Storage $storage)
    {
        parent::__construct($storage);

        $this->model = $model;
    }


    public function createImage(Model $model, string $path, PostRequest $attributes)
    {
        $path = $attributes->file('photo')->store($path, ['disk' => $this->storageDisk()]);

        $model->image()->create([
            'url' => $path
        ]);
    }

    /**
     * @param int $imageId
     */
    public function deleteImage(int $imageId)
    {
        $image = $this->model->find($imageId);

        $this->getDisk($this->storageDisk())->delete($image->path);

        $image->delete();
    }
}
