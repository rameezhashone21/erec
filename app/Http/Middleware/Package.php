<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Package
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
            if (auth()->user()->stripe_id !== 0) {
                if (package_id !== 0) {
                    if (auth()->user()->package_expiry <  Carbon::today()) {
                        if (auth()->user()->total_no_of_posts !== 0) {
                            return $next($request);
                        }
                    } else {
                        return redirect()->route('subscription');
                    }
                }
            }
        }
    }
}
