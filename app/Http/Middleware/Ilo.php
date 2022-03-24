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
        if ($user->is_ilo == false && $user->is_admin == false && $user->is_super_admin == false) {
            abort(403, 'Permision Denied');
        }
        return $next($request);
    }
}
