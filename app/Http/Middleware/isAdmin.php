<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user())
        {
            if (auth()->user()->role_id==1) {
                return $next($request);
            }
            else
            {
                return back()->with('error','You Have No Permissions To Accesss This Page');
            }
        }
    }
}


