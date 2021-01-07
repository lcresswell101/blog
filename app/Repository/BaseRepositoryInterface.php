<?php

namespace App\Repository;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepositoryInterface
 * @package App\Repository
 */
interface BaseRepositoryInterface
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @return bool|null
     */
    public function delete(): ?bool;

    /**
     * @param $id
     * @return BaseRepository
     */
    public function find($id): BaseRepository;

    /**
     * @param string $condition
     * @param string $operator
     * @param $value
     * @return BaseRepository
     */
    public function where(string $condition, string $operator, $value): BaseRepository;

    /**
     * @return mixed
     */
    public function get();

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param array $relationship
     * @return BaseRepository
     */
    public function with(array $relationship): BaseRepository;

    /**
     * @return BaseRepository
     */
    public function first(): BaseRepository;
}
