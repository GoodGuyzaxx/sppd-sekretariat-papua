<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware -> alias([
            'checkrole' => CheckRole::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (NotFoundHttpException $e, $request) {
            if (!$request->is('api/*')) {
                return redirect('/');
            }
        });
        $exceptions->render(function (UnauthorizedException $e, $request) {
            if (!$request->is('api/*')) {
                return redirect('/');
            }
        });
    })->create();
