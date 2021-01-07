<?php

namespace App\Repository;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Repository\Eloquent
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @return bool|null
     * @throws Exception
     */
    public function delete(): ?bool
    {
        return $this->model->delete();
    }

    /**
     * @param $id
     * @return BaseRepository
     */
    public function find($id): BaseRepository
    {
        $this->model = $this->model->find($id);

        return $this;
    }

    /**
     * @param string $condition
     * @param string $operator
     * @param $value
     * @return $this
     */
    public function where(string $condition, string $operator, $value): BaseRepository
    {
        $this->model = $this->model->where($condition, $operator, $value);

        return $this;
    }

    /**
     * @return mixed
     */
    public function get()
    {
       return $this->model->get();
    }

    /**
     * @return Collection|Model[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @param array $relationship
     * @return BaseRepository
     */
    public function with(array $relationship): BaseRepository
    {
        $this->model = $this->model->with($relationship);

        return $this;
    }

    /**
     * @return $this
     */
    public function first(): BaseRepository
    {
        $this->model = $this->model->first();

        return $this;
    }
}
