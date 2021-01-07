<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserRepository
 * @package App\Repository\Eloquent
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param string $model
     * @param $id
     * @return mixed
     */
    public function favourite(string $model, $id)
    {
        return $this->model->{$model}()->attach($id);
    }

    /**
     * @param string $model
     * @return mixed
     */
    public function getFavourites(string $model)
    {
        return $this->model->{$model}()->get()->pluck('id');
    }
}
