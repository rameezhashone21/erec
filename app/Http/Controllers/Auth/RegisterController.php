<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Welcome;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Candidate;
use App\Models\Company;
use App\Models\Recruiter;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Crypt;
use App\Mail\JobApply;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data['name'].'-'.$data['lname']);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', 'max:255', 'unique:user'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'  => ['required', 'In:user,rec,company'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // dd($data);
        // $photo = fopen($request->file, 'r');
        // // dd($photo);
        // $res = Http::attach(
        //     'attachment', file_get_contents($photo), 'photo.jpg'
        // )->post( 'https://hoyhoyibiza.com/api/contact', [
        //     'name'      => $request->name,
        //     ''   => $request->surname,
        //     'email'     => $request->email,
        // ]);
        // dd($data);
        $new_id = 0;
        $type = 0;
        if ($data['role'] == "user") {
            // $url = "https://api.e-rec.com.au/api/create/user";
            $url = "https://api.e-rec.com.au/api/create/user";
            $res = Http::post($url, [
                'name' => $data['name'],
                'lname' => $data['lname'],
                'email' => $data['email']
            ]);
            $response = $res->json();
            // dd($response);
            if(isset($response["id"]))
            {
                $new_id = $response["id"];
                $type = $response["u_type"];
            }
        }
        $user = User::create([
            'name' => $data['name'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'new_user_id' => $new_id,
            'new_user_type' => $type,
            'password' => Hash::make($data['password']),
            'role'  => $data['role'],

        ]);

        $newuser = User::where('email', $user['email'])->first();
        $newuser->notify(new NewUserNotification($newuser));

        $user->new_user_id = $new_id;
        $user->new_user_type = $type;
        $user->save();
        $email = $user['email'];
        $name = $user['name'].' '.$user['lname'];
        // dd($user->toArray());
        // $slug = Str::slug($data['name'] . $newuser['new_user_id'] . $data['lname']);
        $hello = Crypt::encrypt($data['email']);
        $slug = substr($hello, 2, 30);

        if ($data['role'] == 'user') {
            $user->status = 1;
            $user->save();
            $cand = new Candidate;
            $cand->user_id          = $user->id;
            $cand->first_name       = $data['name'];
            $cand->slug = $slug;
            $cand->last_name        = $data['lname'];
            $cand->email            = $data['email'];
            $cand->save();
        } elseif ($data['role'] == 'company') {
            $comp = new Company;
            $comp->user_id      = $user->id;
            $comp->name         = $data['name'];
            $comp->slug = $slug;
            $comp->save();
        } elseif ($data['role'] == 'rec') {
            $rec = new Recruiter;
            $rec->user_id       = $user->id;
            $rec->name          = $data['name'];
            $rec->slug = $slug;
            $rec->save();
        }
        $mail = Mail::to($email)->send(new Welcome($email, $name));

        // dd($user->toArray());

        return $user;
    }
}
