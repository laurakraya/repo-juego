<?php

namespace Contrareloj\Http\Middleware;

use Closure;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {  /*  dd($request->user()->role); */
        if ($request->user() && $request->user()->role <= 10)
        {
        return redirect('/');
        }

        return $next($request);
    }
}
