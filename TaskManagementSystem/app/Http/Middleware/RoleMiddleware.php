<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user && $user->roles->pluck('name')->intersect($roles)->count()) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
