<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\Contracts\ContaRepositoryInterface', 'App\Repositories\ContaRepository');
        $this->app->bind('App\Repositories\Contracts\CategoriaRepositoryInterface', 'App\Repositories\CategoriaRepository');
        $this->app->bind('App\Repositories\Contracts\TransacaoRepositoryInterface', 'App\Repositories\TransacaoRepository');
        $this->app->bind('App\Repositories\Contracts\UserRepositoryInterface', 'App\Repositories\UserRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
