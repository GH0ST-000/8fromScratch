<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()?->username != 'lukino'){
            abort(403);
        }
        return $next($request);
    }
}
