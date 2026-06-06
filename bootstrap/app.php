<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
//panggil check login yang ada di folder app/libraries
use App\Libraries\CheckLogin;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //penerapan library proteksi halaman
        $middleware->alias([
            'checklogin' => CheckLogin::class,
        ]);
        //end penerapan
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
