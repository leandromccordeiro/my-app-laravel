<?php

use App\Exceptions\InvalidOrderException;
use App\Http\Middleware\Test1;
use App\Http\Middleware\Test2;
use App\Exceptions\ProductNotFoundException;
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
        // $middleware->web(append: [Test1::class, Test2::class]); //aplica para todas as rotas web.
        // $middleware->api(append: [Test2::class, Test2::class]); //aplica para todas as rotas api.
        // caso queira dar um apelido para o middleware, basta usar o método alias.
        $middleware->alias([
            'test1' => Test1::class,
            'test2' => Test2::class,    
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // $exceptions->dontReport(InvalidOrderException::class); //não reporta a exceção e não loga
        // $exceptions->report(function(InvalidOrderException $exception) {
        //     dd("Invalid Order Exception");
        // }); //loga a exceção        
        
        $exceptions->render(function(InvalidOrderException $exception) {
            return response()->view(view:'errors.invalid-order', status:500);
        }); //renderiza a view de erro.
        // dd('x');


        // $exceptions->report(function(ProductNotFoundException $exception) {
        //     dd("Product not found");
        // }); //loga a exceção        
        
        $exceptions->render(function(ProductNotFoundException $exception) {
            return response()->json(['message' => 'Product not found'], status:404);
        }); //loga a exceção

    })->create();
