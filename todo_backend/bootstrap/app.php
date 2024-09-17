<?php

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
        $middleware->statefulApi();
        $middleware->validateCsrfTokens(except: [
            '/tasks',
            '/tasks/*/delete',
            '/tasks/*/update',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
