<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\CompanyCategory;
use App\Models\CompanyFeatures;
use App\Models\User;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        // dd($request->toArray());
        $comp = Company::where('user_id', auth()->user()->id)->first();
        if ($comp != null) {
            $compFea = CompanyFeatures::where('com_id', $comp->id)->get();
        }
        // dd($comp['features'][1]->toArray());
        try {
            DB::beginTransaction();
            if ($comp != null) {
                // dd($compFea->toArray());
                $comp = Company::where('user_id', auth()->user()->id)->first();
                if ($request->has('name')) {
                    $comp->name = $request->name;
                    $comp->slug = Str::slug($request->name);

                    $user->name = $request->name;
                    $user->save();
                }
                if ($request->has('country_code')) {
                    $comp->country_code = $request->country_code;
                }
                if ($request->has('phone')) {
                    $comp->phone = $request->phone;
                }
                if ($request->has('abn')) {
                    $comp->abn = $request->abn;
                }
                if ($request->has('acn')) {
                    $comp->acn = $request->acn;
                }
                if ($request->has('lat')) {
                        // dd('lat');
                    $comp->lat = $request->lat;
                }
                if ($request->has('lng')) {
                        // dd('lng');
                    $comp->lng = $request->lng;
                }
                if ($request->has('postal_code')) {
                        // dd('postal_code');
                    $comp->postal_code = $request->postal_code;
                }
                if ($request->has('city')) {
                        // dd('city');
                    $comp->city = $request->city;
                }
                if ($request->has('country')) {
                            // dd('country');
                    $comp->country = $request->country;
                }
                if ($request->has('description')) {
                    $comp->description = $request->description;
                }
                if ($request->has('cSizeFrom')) {
                    $comp->cSizeFrom = $request->cSizeFrom;
                }
                if ($request->has('tagline')) {
                    $comp->tagline = $request->tagline;
                }
                if ($request->has('address')) {
                    $comp->headQuarter = $request->address;
                }
                if ($request->has('terms')) {
                    $comp->terms = $request->terms;
                } else {
                    $comp->terms = 0;
                }
                if ($request->hasFile('logo')) {
                    $img = $request->logo;
                    $number = rand(1, 999);
                    $numb = $number / 7;
                    $extension = $img->extension();
                    $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                    $filenamepath = 'companyLogo' . '/' . 'img/' . $filenamenew;
                    $filename = $img->move(public_path('storage/companyLogo' . '/' . 'img'), $filenamenew);
                    $comp->logo = $filenamepath;
                    $user = User::find(auth()->user()->id);
                    $user->avatar = $filenamepath;
                    $user->save();
                }
                // dd($comp->toArray());
                $comp->save();
                if ($request->hasFile('banner')) {
                    $img = $request->banner;
                    $number = rand(1, 999);
                    $numb = $number / 7;
                    $extension = $img->extension();
                    $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                    $filenamepath = 'companyBanner' . '/' . 'img/' . $filenamenew;
                    $filename = $img->move(public_path('storage/companyBanner' . '/' . 'img'), $filenamenew);

                    $user = User::where('id', auth()->user()->id)->first();
                    $user->banner = $filenamepath;
                    $user->save();
                }
                if ($request->has('category')) {
                    // dd($request->category);
                    $fea = CompanyFeatures::where('com_id', $comp->id)->get();
                    $fea->each->delete();
                    foreach ($request->category as $key => $pro) {
                        $proExp = CompanyFeatures::create([
                            "com_id" => $comp->id,
                            "comp_cat_id" => $pro,
                        ]);
                    }
                }
                $comp->save();
            } else {

                $user = auth()->user();
                $user->name = $request->name;
                $user->save();

                $comp = new Company;
                $comp->user_id = auth()->user()->id;
                $comp->name = $request->name;
                $comp->slug = Str::slug($request->name);
                $comp->country_code = $request->country_code;
                $comp->phone = $request->phone;
                $comp->abn = $request->abn;
                $comp->cSizeFrom = $request->cSizeFrom;
                $comp->tagline = $request->tagline;
                $comp->address = $request->address;
                $comp->acn = $request->acn;
                $comp->lat           = $request->lat;
                $comp->lng           = $request->lng;
                $comp->postal_code   = $request->postal_code;
                $comp->city           = $request->city;
                $comp->country           = $request->country;
                $comp->description = $request->description;
                $comp->terms = $request->terms;

                if ($request->hasFile('logo')) {
                    $img = $request->logo;
                    $number = rand(1, 999);
                    $numb = $number / 7;
                    $extension = $img->extension();
                    $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                    $filenamepath = 'companyLogo' . '/' . 'img/' . $filenamenew;
                    $filename = $img->move(public_path('storage/companyLogo' . '/' . 'img'), $filenamenew);
                    $comp->logo = $filenamepath;
                    $user = User::find(auth()->user()->id);
                    $user->avatar = $filenamepath;
                    $user->save();
                }
                $comp->save();
                if ($request->hasFile('banner')) {
                    $img = $request->banner;
                    $number = rand(1, 999);
                    $numb = $number / 7;
                    $extension = $img->extension();
                    $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                    $filenamepath = 'companyBanner' . '/' . 'img/' . $filenamenew;
                    $filename = $img->move(public_path('storage/companyBanner' . '/' . 'img'), $filenamenew);

                    $user = User::where('id', auth()->user()->id)->first();
                    $user->banner = $filenamepath;
                    $user->save();
                }
                // $compFea =new CompanyFeatures;
                // dd($request->toArray());
                if ($request->has('category')) {
                    foreach ($request->category as $key => $pro) {
                        $proExp = CompanyFeatures::create([
                            "com_id" => $comp->id,
                            "comp_cat_id" => $pro,
                        ]);
                        // dd($proExp);
                    }
                }
                $comp->save();
            }
            DB::commit();

            if ($request->has('logo')) {
                return $filenamepath;
            }

            return redirect()->route('company.dashboard')->with('success', 'Profile Updated Successfully!');
        } catch (\Throwable $e) {
            // dd($e);
            DB::rollback();

            return back()->with('error', $e->getMessage());
        }
        // return back()->with('error', 'Error in Update!');
    }
}
