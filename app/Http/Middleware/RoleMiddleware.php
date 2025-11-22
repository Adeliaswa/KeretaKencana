<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Cek apakah pengguna sudah login
        if (!Auth::check()) {
            // Jika belum, arahkan ke halaman login
            return redirect('/login'); 
        }

        // 2. Cek apakah role pengguna sesuai dengan yang diminta di route
        // Auth::user()->role akan bernilai 'admin' atau 'passenger'
        if (Auth::user()->role !== $role) {
            // Jika role tidak sesuai, tolak akses (Kode HTTP 403 Forbidden)
            abort(403, 'Akses ditolak. Role Anda tidak diizinkan mengakses halaman ini.');
        }

        // Jika lolos semua pengecekan, lanjutkan request
        return $next($request);
    }
}
