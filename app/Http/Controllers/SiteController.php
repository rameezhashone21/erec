<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SiteController extends Controller
{
    //
    public function index()
    {
        $siteSetting = SiteSetting::first();
        return view("adminpanel.pages.site_setting.index",compact("siteSetting"));
    }
    public function store(Request $request)
    {
        $siteSetting = SiteSetting::first();
        if($siteSetting != null)
        {
            $siteSetting->tax_rate = $request->tax_rate;
            $siteSetting->save();
        }
        else
        {
            SiteSetting::create($request->all());
        }
        return redirect()->back();
    }
}
