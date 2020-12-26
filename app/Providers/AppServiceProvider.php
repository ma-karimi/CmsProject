<?php

namespace App\Providers;

use App\Repository\PostRepository;
use App\Repository\PostRepositoryInterFace;
use App\Repository\UserRepository;
use App\Repository\UserRepositroyInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositroyInterface::class,UserRepository::class);
        $this->app->bind(PostRepositoryInterFace::class,PostRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
