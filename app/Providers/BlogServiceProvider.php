<?php

namespace App\Providers;

use App\Services\BlogService;
use App\Services\Impl\BlogServiceImpl;
use Illuminate\Support\ServiceProvider;
class BlogServiceProvider extends ServiceProvider 
{
    // public array $singeltons = [
    //     BlogService::class => BlogServiceImpl::class,
    // ];

    // public function provides()
    // {
    //     return [
    //         BlogService::class,
    //     ];
    // }
  

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(BlogService::class, BlogServiceImpl::class);
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
