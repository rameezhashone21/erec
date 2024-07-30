<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class is_Admin
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

        // if (Auth::user()) {
        //     $authRole = Auth::user()->hasRole($role);
        //     $authlevel = $authRole ? Auth::user()->level() : false;
      
        //     if ($authlevel == 'admin') {
        //       
        //     } else if ($authlevel == 'company') {
        //       return $next($request);
        //     }else if ($authlevel == 'rec') {
        //         return $next($request);
        //     }  else if ($authlevel == 'user') {
        //         return $next($request);
        //     } else {
        //      
        //     }
        //   }
        //   return redirect('/');

        if(Auth::check())
        {
            if(Auth::user()->role == 'admin'){
                return $next($request);
            }else{
                abort(401);
            }
        }
        else{
            return redirect()->route('login');
        }


    }
}
