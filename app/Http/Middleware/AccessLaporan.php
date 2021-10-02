<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessLaporan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if($user->hasRole('administrator') || $user->hasRole('access_pusat') || $user->hasRole('access_laporan')) {
            return $next($request);
        } else {
            flash('Akun anda belum diberikan akses ke halaman tersebut. Silakan hubungi admin')->error();
            return redirect('/dashboard');
        }
    }
}
