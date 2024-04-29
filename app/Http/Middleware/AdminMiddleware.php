<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Session::get('isAdmin')) {
            return redirect('/admin/login');
        }

        return $next($request);
    }
}
