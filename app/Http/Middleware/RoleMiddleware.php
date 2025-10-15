<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role, $guard = 'web'): Response
    {
        // Check authentication for the specific guard
        if (!Auth::guard($guard)->check()) {
            // Redirect to login based on guard
            $loginRoute = $guard === 'employer' ? '/employer/login' : '/login';
            return redirect($loginRoute);
        }

        $user = Auth::guard($guard)->user();

        // Check role only for users (admins & normal users)
        if ($guard === 'web' && $user->role !== $role) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}

