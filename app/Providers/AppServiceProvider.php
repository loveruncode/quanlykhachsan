<?php

namespace App\Providers;


use Yajra\DataTables\Html\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    protected $service = [
        'App\Services\Notify\NotificationServiceInterface' => 'App\Services\Notify\NotificationService',
        'App\Services\User\UserServiceInterface' => 'App\Services\User\UserService',
        'App\Services\Room\RoomServiceInterface' => 'App\Services\Room\RoomService',
        'App\Services\Food\FoodServiceInterface' => 'App\Services\Food\FoodService',
        'App\Services\Post\PostServiceInterface' => 'App\Services\Post\PostService'


    ];
    public function register(): void
    {
        foreach ($this->service as $interface => $implement) {
            $this->app->singleton($interface, $implement);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::useVite();
    }
}
