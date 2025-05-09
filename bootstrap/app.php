<?php

// use App\Http\Middleware\userMiddleware;

use App\Http\Middleware\adminMiddleware;
use App\Http\Middleware\kreatorMiddleware;
use App\Http\Middleware\pembeliMiddleware;
use App\Http\Middleware\userMiddleware;
// use App\Http\Middleware\userMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'userMiddleware'=>userMiddleware::class,
            'kreatorMiddleware'=>kreatorMiddleware::class,
        'pembeliMiddleware'=> pembeliMiddleware::class,
        'adminMiddleware'=> adminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
