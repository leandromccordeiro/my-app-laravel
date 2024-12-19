<?php

use App\Http\Middleware\Test1;
use App\Http\Middleware\Test2;
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
        // $middleware->append(Test1::class); //aplica para todas as rotas.
        $middleware->appendtogroup('policia', [Test1::class, Test2::class]); //aplica para um grupo de rotas.
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
