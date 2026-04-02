<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //public function handle(Request $request, Closure $next): Response

    //I am using variadic parameters for multiple roles
    public function handle($request, Closure $next, ...$roles)
    {
        //dd(optional(auth()->user()->role)->name, $roles);
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // Check if user's role matches any allowed roles
        if (!in_array(optional($user->role)->name, $roles)) {
            abort(403, 'Access denied');
        }
            return $next($request);
        }
}
