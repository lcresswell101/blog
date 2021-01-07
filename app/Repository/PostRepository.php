<?php

namespace App\Repository;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * @param User $user
     * @param PostRequest $attributes
     * @return Model|mixed
     */
    public function createPost(User $user, PostRequest $attributes): Model
    {
        return $user->posts()->create($attributes->validated());
    }
}
