<?php

namespace App\Providers;

use Yajra\DataTables\Html\Builder;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

     protected $repositories = [
        'App\Repository\Notification\NotificationRepositoryInterface' => 'App\Repository\Notification\NotificationRepository',
        'App\Repository\User\UserRepositoryInterface' => 'App\Repository\User\UserRepository',

    ];
    public function register(): void
    {
        foreach ($this->repositories as $interface => $implement) {
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
