<?php

namespace App\Repository\Eloquent;

use App\Repository\CommentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}
