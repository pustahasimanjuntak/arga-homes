<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // If not logged in or user is not admin (check common attributes: is_admin boolean or role string)
        if (!$user || (! ($user->is_admin ?? false) && (($user->role ?? '') !== 'admin'))) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}