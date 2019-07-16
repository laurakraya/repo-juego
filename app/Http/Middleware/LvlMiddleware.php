<?php

namespace Contrareloj\Http\Middleware;

use Closure;

class LvlMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   /* dd($request->lvlId); */
        if ($request->lvlId == 2 && $request->user() && $request->user()->score < 300)
        {
        return redirect('/ranking');
        }
        else if ($request->lvlId == 3 && $request->user() && $request->user()->score < 600)
        {
        return redirect('/ranking');
        }

        return $next($request);
    }
}
