<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $userRole = Auth::user()->role;
        if ($userRole === $role) {
            return $next($request);
        }
        return redirect()->route("dashboard");
    }
}
