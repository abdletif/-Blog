<?php

namespace App\Providers;

use App\Models\Post;
use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;
use App\Http\Composer\View\CardComposer;
use App\Http\Composer\View\PostComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('home',PostComposer::class);

        view()->composer("partials.sidebar",CardComposer::class);

        Post::observe(PostObserver::class);
    }
}
