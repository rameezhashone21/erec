<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class is_User
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
        if(Auth::check())
        {
            if(Auth::user()->status == 5)
            {
                Auth::logout();
                
                return redirect()->route('login')->with('error', 'These credentials do not match our records.');
            }
            elseif(Auth::user()->role == 'user'){
                // dd(Auth::user()->candidate);
                // if(Auth::user()->package_id != 0)
                // {
                //     return $next($request);
                // }
                // else{
                //     return redirect()->route('subscription')->with('success', 'Wait for the admin approval please');
                // }
                if(Auth::user()->status == 1)
                {
                    $redirectTo = session()->get('before_login_url');
                        // dd($redirectTo);
                        if(!empty($redirectTo))
                        {
                            return redirect($redirectTo);
                        }
                        else
                        {
                            return $next($request);
                        }
                }
                elseif(Auth::user()->candidate == null)
                {
                    return $next($request);
                }
                else{
                    return redirect()->route('index')->with('success', 'Wait for the admin approval please');
                }
            }else{
                // abort(401);
                return redirect()->route('login');
            }
        }
        else{
            return redirect()->route('login');
        }
        // }else{
        //     return redirect()->route('candidates')->with('error', 'You need to signin first');
        // }
    }
}
