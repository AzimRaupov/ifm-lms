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
        // Подключаем к web-группе
        $middleware->web([
            \App\Http\Middleware\SetLocale::class,
        ]);

        // Алиасы (для проверки ролей и т.п.)
        $middleware->alias([
            'is_teacher' => \App\Http\Middleware\IsTeacher::class,
        ]);

        // Куда редиректить после логина
        $middleware->redirectUsersTo(fn () => route('dashboard'));
    })
    ->withExceptions(function (Exceptions $exceptions) {

    })->create();
