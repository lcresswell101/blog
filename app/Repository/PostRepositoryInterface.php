<?php

namespace App\Repository;

use App\Http\Requests\PostRequest;
use App\Models\User;

interface PostRepositoryInterface
{
    /**
     * @param User $user
     * @param PostRequest $attributes
     * @return mixed
     */
    public function createPost(User $user, PostRequest $attributes);
}
