<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PembimbingSiswaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna memiliki peran "pembimbing-siswa"
        if (auth()->user() && auth()->user()->hasRole('pembimbing-siswa')) {
            // Pengguna hanya bisa melihat data
            return redirect()->route('pembimbing.siswa.dashboard');
        }

        return $next($request);
    }
}
