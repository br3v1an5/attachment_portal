<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Ilo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ($user->user_role == 'Super Admin') {
            return $next($request);
        }
        if ($user->user_role != 'Ilo') {
            abort(403, 'Permision Denied');
        }
        return $next($request);
    }
}
