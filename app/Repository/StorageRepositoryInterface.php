<?php

namespace App\Repository;

use Illuminate\Contracts\Filesystem\Filesystem;

interface StorageRepositoryInterface
{
    /**
     * @param $disk
     * @return Filesystem
     */
    public function getDisk($disk): Filesystem;

    /**
     * @return string
     */
    public function storageDisk(): string;
}
