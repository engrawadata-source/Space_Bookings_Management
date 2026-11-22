<?php

use App\Http\Middleware\CustomerMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AdminEmployeeMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
         $middleware->alias([
        'customer' => CustomerMiddleware::class,
        'admin' => AdminMiddleware::class,
        'admin.employee' => AdminEmployeeMiddleware::class,
    ]);
     $middleware->redirectGuestsTo(fn () => route('login.form'));## if unauth user try to request => will take him to login form
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
