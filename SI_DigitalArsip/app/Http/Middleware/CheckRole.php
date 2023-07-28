<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
           return response()->json(['message' => 'tidak bisa mengakses, karena anda bukan bagian role '.$role]);
        }

        return $next($request);
    }
}
