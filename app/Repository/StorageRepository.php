<?php

namespace App\Repository;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

class StorageRepository  implements StorageRepositoryInterface
{
    protected $model, $storage;

    public function __construct(Storage $model)
    {
        $this->model = $model;
    }

    /**
     * @param $disk
     * @return Filesystem
     */
    public function getDisk($disk): Filesystem
    {
        return $this->model::disk($disk);
    }

    /**
     * @return string
     */
    public function storageDisk(): string
    {
        return 'public';
    }
}
