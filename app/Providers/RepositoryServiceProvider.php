<?php

namespace App\Providers;

use App\Repository\CommentRepositoryInterface;
use App\Repository\BaseRepository;
use App\Repository\CommentRepository;
use App\Repository\ImageRepository;
use App\Repository\ImageRepositoryInterface;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Repository\BaseRepositoryInterface;
use App\Repository\PostRepositoryInterface;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(PostRepositoryInterface::class, PostRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
