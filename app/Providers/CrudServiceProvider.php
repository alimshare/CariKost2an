<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Repositories\RoomRepository', 'App\Repositories\impl\RoomRepositoryImpl');
        $this->app->bind('App\Repositories\UserRepository', 'App\Repositories\impl\UserRepositoryImpl');
        $this->app->bind('App\Repositories\CreditHistoryRepository', 'App\Repositories\impl\CreditHistoryRepositoryImpl');
    }
}
