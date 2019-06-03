<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PolosRepository::class, \App\Repositories\PolosRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TemasRepository::class, \App\Repositories\TemasRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SubtemasRepository::class, \App\Repositories\SubtemasRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TipoPoloRepository::class, \App\Repositories\TipoPoloRepositoryEloquent::class);
        //:end-bindings:
    }
}
