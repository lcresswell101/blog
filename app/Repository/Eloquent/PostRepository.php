<?php

namespace App\Repository\Eloquent;

use App\Models\Post;
use App\Repository\PostRepositoryInterface;

/**
 * Class PostRepository
 * @package App\Repository\Eloquent
 */
class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    /**
     * PostRepository constructor.
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }
}
