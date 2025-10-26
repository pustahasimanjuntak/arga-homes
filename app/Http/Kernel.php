<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Configuration\Middleware;

class Kernel extends HttpKernel
{
    /**
     * Define your application's middleware aliases and groups.
     */
    protected function middleware(Middleware $middleware): void
    {
        $middleware->alias([
            'admin' => \App\Http\Middleware\AdminMiddleware::class,
        ]);

        // lo juga bisa tambahin alias lain di sini
        // 'auth' => \App\Http\Middleware\Authenticate::class,
        // 'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    }
}
