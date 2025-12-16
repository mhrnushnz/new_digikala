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
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->redirectGuestsTo('/auth');        //زمانی که کاربر به صورت مهمان وارد شده بره به این صفحه ورودی نام صفحه نیست همون مسیری url عه
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
