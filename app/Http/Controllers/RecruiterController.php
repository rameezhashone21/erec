<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Support\Str;

class RecruiterController extends Controller
{
    // public function index()
    // {
    //     return view('employers.index');
    // }

    public function store(Request $request)
    {
        // dd($request->toArray());
        $user = auth()->user();
        
        $rec = Recruiter::where('user_id', auth()->user()->id)->first();
        // dd($rec);
        // try{
        // DB::beginTransaction();
        if ($rec != null) {
            $rec = Recruiter::where('user_id', auth()->user()->id)->first();
            if ($request->has('name')) {
                $rec->name = $request->name;
                $rec->slug = Str::slug($request->name);

                $user->name = $request->name;
                $user->lname = $request->lastName;
                $user->save();
            }
            // dd($rec->toArray());
            if ($request->has('country_code')) {
                $rec->country_code = $request->country_code;
            }
            if ($request->has('lastName')) {
                $rec->lastName = $request->lastName;
            }
            if ($request->has('phone')) {
                $rec->phone = $request->phone;
            }
            if ($request->has('abn')) {
                $rec->abn = $request->abn;
            }
            if ($request->has('acn')) {
                $rec->acn = $request->acn;
            }
            if ($request->has('lat')) {
                $rec->lat = $request->lat;
            }
            if ($request->has('lng')) {
                $rec->lng = $request->lng;
            }
            if ($request->has('postal_code')) {
                $rec->postal_code = $request->postal_code;
            }
            if ($request->has('city')) {
                $rec->city = $request->city;
            }
            if ($request->has('country')) {
                $rec->country = $request->country;
            }
            if ($request->has('description')) {
                $rec->description = $request->description;
            }
            if ($request->has('address')) {
                $rec->address = $request->address;
            }
            if ($request->has('tagline')) {
                $rec->tagline = $request->tagline;
            }
            if ($request->terms == 1) {
                $rec->terms = $request->terms;
            } else {
                $rec->terms = 0;
            }

            if ($request->hasFile('avatar')) {
                $img = $request->avatar;

                $number = rand(1, 999);

                $numb = $number / 7;

                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath   = 'recruiterAvatar' . '/' . 'img/' . $filenamenew;
                $filename       = $img->move(public_path('storage/recruiterAvatar' . '/' . 'img'), $filenamenew);
                $rec->avatar = $filenamepath;
                $user = User::find(auth()->user()->id);
                $user->avatar = $filenamepath;
                $user->save();
                // dd($rec->toArray());
            }
            $rec->save();

            if ($request->hasFile('banner')) {
                $img = $request->banner;
                $number = rand(1, 999);
                $numb = $number / 7;
                $extension = $img->extension();
                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath = 'recruiterBanner' . '/' . 'img/' . $filenamenew;
                $filename = $img->move(public_path('storage/recruiterBanner' . '/' . 'img'), $filenamenew);

                $user = User::where('id', auth()->user()->id)->first();
                $user->banner = $filenamepath;
                $user->save();
            }
        } else {
            $user = auth()->user();
            $user->name = $request->name;
            $user->lname = $request->lastName;
            $user->save();

            $rec = new Recruiter;
            $rec->user_id       = auth()->user()->id;
            $rec->name          = $request->name;
            $rec->slug =         encrypt($request->email);
            $rec->country_code  = $request->country_code;
            $rec->phone         = $request->phone;
            $rec->abn           = $request->abn;
            $rec->lat           = $request->lat;
            $rec->lng           = $request->lng;
            $rec->postal_code   = $request->postal_code;
            $rec->city           = $request->city;
            $rec->country           = $request->country;
            $rec->acn           = $request->acn;
            $rec->description   = $request->description;
            $rec->address   = $request->address;
            $rec->tagline   = $request->tagline;
            if ($request->terms == 1) {
                $rec->terms = $request->terms;
            } else {
                $rec->terms = 0;
            }

            if ($request->hasFile('avatar')) {
                $img = $request->avatar;

                $number = rand(1, 999);

                $numb = $number / 7;

                $extension      = $img->extension();
                $filenamenew    = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath   = 'recruiterAvatar' . '/' . 'img/' . $filenamenew;
                $filename       = $img->move(public_path('storage/recruiterAvatar' . '/' . 'img'), $filenamenew);
                $rec->avatar = $filenamepath;
                $user = User::find(auth()->user()->id);
                $user->avatar = $filenamepath;
                $user->save();
                // dd($rec->toArray());
            }
            $rec->save();
            if ($request->hasFile('banner')) {
                $img = $request->banner;
                $number = rand(1, 999);
                $numb = $number / 7;
                $extension = $img->extension();
                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath = 'recruiterBanner' . '/' . 'img/' . $filenamenew;
                $filename = $img->move(public_path('storage/recruiterBanner' . '/' . 'img'), $filenamenew);

                $user = User::where('id', auth()->user()->id)->first();
                $user->banner = $filenamepath;
                $user->save();
            }
        }
        // DB::commit();
        if ($request->has('avatar')) {
            return $filenamepath;
        }
        return redirect()->route('dashboard')->with('success', 'Profile Updated Successfully!');
        // }
        // catch (\Throwable $e)
        // {
        //     DB::rollback();

        //     return back()->with('error', $e->getMessage());
        // }
        // return back()->with('error', 'Error in Update!');
    }
}
