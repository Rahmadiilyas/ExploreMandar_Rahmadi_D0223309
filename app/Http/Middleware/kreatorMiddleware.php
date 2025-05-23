<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class kreatorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'kreator') {
            return $next($request); // lanjutkan request
        }
        abort(403, 'Akses hanya untuk kreator.');
        // Jika bukan user dengan role 'pembeli', redirect ke halaman login
        return redirect('/login');
    }
}
