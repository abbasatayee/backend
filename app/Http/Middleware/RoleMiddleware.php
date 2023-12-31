<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
    if (!auth()->check()) {
        return response()->json(['message' => 'unauthorized'], 401);
    }
    // Check if any of the user's roles match the allowed roles
    $userRoles = auth()->user()->role;
    // if (count(array_intersect($userRoles,$roles))) {
    if (in_array($userRoles,$roles)) {
        return $next($request);
    }
    
    return response()->json(['message' => 'Forbiden Resource'], 403);
    }

}
