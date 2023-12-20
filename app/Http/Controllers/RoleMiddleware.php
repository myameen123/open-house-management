<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Check if the user has at least one of the required roles
        if ($request->user() && $request->user()->hasRole($roles)) {
            return $next($request);
        }

        // Redirect or return a response for unauthorized access
        return response()->json(['error' => 'Unauthorized access'], 403);
    }
}