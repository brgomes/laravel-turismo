<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        if (!auth()->user()->is_admin) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
