<?php

namespace App\Repository;

interface UserRepositoryInterface
{
    /**
     * @param string $model
     * @param $id
     * @return mixed
     */
    public function favourite(string $model, $id);

    /**
     * @param string $model
     * @return mixed
     */
    public function getFavourites(string $model)
}
