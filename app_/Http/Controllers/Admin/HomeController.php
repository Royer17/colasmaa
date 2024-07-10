<?php

namespace App\Http\Controllers\Admin;

use App\CityCouncil;
use App\Commission;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Auth;
use DB;

class HomeController extends Controller
{
    public function dashboard_view()
    {
        $setting = Setting::first();
        //$city_councils = CityCouncil::all();
        //$commissions = Commission::all();

        $user = Auth::user();
        
        $configuration_permission = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-configuracion')
            ->get()
            ->toArray();

        return view('admin.blank_page', compact('setting', 'configuration_permission'));
    }
}
