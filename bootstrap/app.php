<?php

use App\Http\Middleware\CheckLoginMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use League\Flysystem\ChecksumProvider;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
         $middleware->alias([
            'checklogin' => \App\Http\Middleware\CheckLoginMiddleware::class,
            'cors' =>\App\Http\Middleware\CorsMiddleware::class,
         ]);
         $middleware->validateCsrfTokens(except: [
            'api/*',  
            'stripe/*',
            'http://example.com/foo/bar',
            'http://example.com/foo/*',
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
