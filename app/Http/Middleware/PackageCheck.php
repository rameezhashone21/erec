<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PackageCheck
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

            if (auth()->user()->role == 'company' || auth()->user()->role == 'rec') {
                // dd('ok');
                if (Auth::user()->package->id == 21) {
                    $package_expiry = Auth::user()->package_expiry;
                    // $postCheck = \App\Models\Posts::where('comp_id', auth()->user()->company->id)
                    //     ->where('created_at', '>=', $package_expiry)
                    //     ->get();
                    if (auth()->user()->package_expiry >= Carbon::today()) {
                        if (auth()->user()->posts_count > 0) 
                        {
                            return $next($request);
                        }
                        else
                        {
                            return back()->with('errorModal', 'You need to upgrade your package');
                        }
                        
                    }
                    else 
                    {
                        if (auth()->user()->posts_count > 0) {
                            $current = \Carbon\Carbon::now();
                            $userUpdate = auth()->user();
                            $userUpdate->package_expiry = $current->addMonth()->format('Y-m-d');
                            $userUpdate->save();
                            return $next($request);
                        }
                        else
                        {
                            $current = \Carbon\Carbon::now();
                            $userUpdate = auth()->user();
                            $userUpdate->posts_count = auth()->user()->package->no_of_posts;
                            $userUpdate->total_no_of_posts = auth()->user()->package->no_of_posts;
                            $userUpdate->package_expiry = $current->addMonth()->format('Y-m-d');
                            $userUpdate->save();
                            return $next($request);

                        }
                    }
                    // dd(count($postCheck));
                    // dd('ok');
                    // dd(auth()->user()->posts_count);
                } else {

                    if (Auth::user()->package_id != 0) {
                        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

                        $customerdata = $stripe->subscriptions->retrieve(
                            Auth::user()->package_buy_stripe_token,
                            []
                        );
                        if ($customerdata->status == "trialing" || $customerdata->status == "paid" || $customerdata->status == "active") {
                            if (auth()->user()->posts_count > 0) {
                                if (auth()->user()->package_expiry <= Carbon::today()) {
                                    $user = auth()->user();
                                    $user->posts_count = $user->posts_count + auth()->user()->package->no_of_posts;
                                    $user->package_expiry = date("Y-m-d H:i:s", $customerdata->current_period_end);
                                    // dd($user->toArray());
                                    $user->save();

                                } 
                                return $next($request);
                                // dd($customerdata->toArray());
                            } else {
                                if (auth()->user()->package_expiry <= Carbon::today()) {
                                    $user = auth()->user();
                                    $user->posts_count = $user->posts_count + auth()->user()->package->no_of_posts;
                                    $user->package_expiry = date("Y-m-d H:i:s", $customerdata->current_period_end);
                                    // dd($user->toArray());
                                    $user->save();

                                    return $next($request);
                                } else {
                                    return back()->with('errorModal', 'You need to upgrade your package');
                                }
                                return back()->with('errorModal', 'You need to upgrade your package');
                            }
                        } else {
                            return back()->with('errorModal', 'You need to upgrade your package');
                        }
                    } else {
                        return back()->withStatus("You need to upgrade your package first..");
                    }
                }
            }
            // else {
            //     return $next($request);
            // }

        }
    }
}
