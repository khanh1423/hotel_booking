<?php

namespace App\Providers;

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
        $this->app->singleton(
            \App\Repositories\Role\RoleRepositoryInterface::class,
            \App\Repositories\Role\RoleRepository::class
        );
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Attribute\AttributeRepositoryInterface::class,
            \App\Repositories\Attribute\AttributeRepository::class
        );
        $this->app->singleton(
            \App\Repositories\RoomType\RoomTypeRepositoryInterface::class,
            \App\Repositories\RoomType\RoomTypeRepository::class
        );
        $this->app->singleton(
            \App\Repositories\Room\RoomRepositoryInterface::class,
            \App\Repositories\Room\RoomRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
