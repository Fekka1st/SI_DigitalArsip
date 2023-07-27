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
    public function handle($request, Closure $next, ...$roles)
{
    $user = $request->user();

    if (!$user) {
        // Pengguna belum login, arahkan ke halaman login
        return redirect()->route('login');
    }
    
    // Cek apakah role pengguna ada dalam daftar role yang diizinkan
    if (!in_array($user->role, $roles)) {
        abort(403, 'Unauthorized');
    }

    return $next($request);
}
}
