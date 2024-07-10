<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Youtube;
use App\Setting;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Youtube::orderBy('created_at', 'DESC')
            ->paginate(4);

        $setting = Setting::first();
        return view('pages.videos.index', compact('videos', 'setting'));
    }


}
