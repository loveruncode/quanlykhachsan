<?php

namespace App\Providers;

use App\Composer\NotifyComposer;
use App\Composer\UserComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerView extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
       View::composer('components.notify', NotifyComposer::class);
       View::composer('profile.profile', UserComposer::class);
    }
}
