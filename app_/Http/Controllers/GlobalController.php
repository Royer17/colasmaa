<?php

namespace App\Http\Controllers;

use App\Service;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class GlobalController extends Controller
{
    public function compose(View $view) {

        $services = Service::wherePublished(1)->get();
        $setting = Setting::first();

        $view->with('services', $services)
                ->with('setting', $setting);

    }

}
