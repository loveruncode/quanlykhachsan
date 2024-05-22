<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider{

    protected $service = [
         'App\Services\Notify\NotificationServiceInterface' => 'App\Services\Notify\NotificationService'
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
        //
    }

}
