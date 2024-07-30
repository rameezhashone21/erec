<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class is_Company
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
        if (Auth::check()) {
            if (Auth::user()->status == 0) {
                Auth::logout();

                return redirect()->route('login')->with('error', 'Your Account is suspended, please contact Admin.');
            } elseif (Auth::user()->role == 'company') {
                if (Auth::user()->package_id != 0) {
                    return $next($request);
                } else {
                    return redirect()->route('subscription')->with('success', 'Wait for the admin approval please');
                }
            } else {
                // abort(401);
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }
}
