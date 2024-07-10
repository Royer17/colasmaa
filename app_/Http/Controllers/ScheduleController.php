<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Schedule;
use App\Setting;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {

        $setting = Setting::first();
        
        return view('pages.schedule', compact('setting'));
    }
}
