<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (session('role') !== $role) {
            return redirect('/login')->with('error', 'Akses ditolak. Silakan login dengan role yang benar.');
        }

        return $next($request);
    }
}

