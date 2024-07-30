<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Auth;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {

        $user = Socialite::driver('google')->stateless()->user();

        // dd($user);
        if (isset($user)) {

            $userlogin = User::where('email', '=', $user->email)->first();

            // dd($userlogin);

            if (isset($userlogin)) {


                // dd($userlogin);

                if (($userlogin->role == 'user') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/user');

                } elseif (($userlogin->role == 'admin') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/admin');

                } elseif (($userlogin->role == 'rec') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/recruiter');

                } elseif (($userlogin->role == 'company') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/company');

                } else {

                    // dd('bro');

                    return redirect('/login')->with('message', 'Sorry your Profile in not actived yet!!');

                }

            } else {
                // dd('ok');

                $names = explode(' ', $user->name);
                $myuserlogin = User::create([
                    'name' => $names[0],
                    'lname' => $names[1],
                    'status' => 1,
                    'email' => $user->email,
                    'password' => Hash::make('Hashone'),
                    'role' => 'user',
                ]);

                Auth::login($myuserlogin);
                return redirect('/user');
                // return redirect('/login')->with('message', 'Sorry your Profile in not actived yet!!');

            }

        } else {

            return "user variable not found";

        }

        return "not found";

    }

    public function redirectToLinkedin()
    {
        // dd(Socialite::driver('linkedin')->redirect());
        return Socialite::driver('linkedin')->redirect();
    }


    public function handleLinkedinCallback()
    {

        if (!empty(Socialite::driver('linkedin')->user()))
        {
            $user = Socialite::driver('linkedin')->user();
            // $accessToken = $user->token;
            dd($user);
        }
        // $user = Socialite::driver('linkedin')->stateless()->user();

        // dd($user->name);

        if (isset($user)) {

            $userlogin = User::where('email', '=', $user->email)->first();

            // dd($userlogin);

            if (isset($userlogin)) {


                // dd($userlogin);

                if (($userlogin->role == 'user') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/user');

                } elseif (($userlogin->role == 'admin') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/admin');

                } elseif (($userlogin->role == 'rec') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/recruiter');

                } elseif (($userlogin->role == 'company') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/company');

                } else {

                    // dd('bro');

                    return redirect('/login')->with('message', 'Sorry your Profile in not actived yet!!');

                }

            } else {

                $names = explode(' ', $user->name);
                $myuserlogin = User::create([
                    'name' => $names[0],
                    'lname' => $names[1],
                    'email' => $user->email,
                    'status' => 1,
                    'password' => Hash::make('Hashone'),
                    'role' => 'user',
                ]);

                Auth::login($myuserlogin);
                return redirect('/user');

            }

        } else {

            return "user variable not found";

        }

        return "not found";

    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleFacebookCallback()
    {

        $user = Socialite::driver('facebook')->stateless()->user();

        // dd($user);
        if (isset($user)) {

            $userlogin = User::where('email', '=', $user->email)->first();

            // dd($userlogin);

            if (isset($userlogin)) {


                // dd($userlogin);

                if (($userlogin->role == 'user') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/user');

                } elseif (($userlogin->role == 'admin') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/admin');

                } elseif (($userlogin->role == 'rec') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/recruiter');

                } elseif (($userlogin->role == 'company') && ($userlogin->status == 1)) {

                    Auth::login($userlogin);

                    return redirect('/company');

                } else {

                    // dd('bro');

                    return redirect('/login')->with('message', 'Sorry your Profile in not actived yet!!');

                }

            } else {

                $names = explode(' ', $user->name);
                $myuserlogin = User::create([
                    'name' => $names[0],
                    'lname' => $names[1],
                    'email' => $user->email,
                    'status' => 1,
                    'password' => Hash::make('Hashone'),
                    'role' => 'user',
                ]);

                Auth::login($myuserlogin);
                return redirect('/user');

            }

        } else {

            return "user variable not found";

        }

        return "not found";

    }
}
