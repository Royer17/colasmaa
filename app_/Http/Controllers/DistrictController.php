<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function history()
    {
        $setting = Setting::first();
        return view('pages.district.history', compact('setting'));
    }
}
