<?php

namespace App\Http\Controllers;

use App\CityCouncil;
use App\Commission;
use App\Setting;
use Illuminate\Http\Request;
use DB;

class MunicipalityController extends Controller
{
    public function missionVision()
    {
        $setting = Setting::first();

        return view('pages.municipality.mission-and-vision', compact('setting'));
    }

    public function mayor()
    {
        $setting = Setting::first();

        return view('pages.municipality.mayor', compact('setting'));
    }

    public function cityCouncil()
    {
        $city_councils = CityCouncil::wherePublished(1)->get();
        $setting = Setting::first();
        return view('pages.municipality.city-council', compact('city_councils', 'setting'));
    }

    public function commissions()
    {
        $setting = Setting::first();
        $commissions = Commission::wherePublished(1)
            ->get();
        return view('pages.municipality.commissions', compact('setting', 'commissions'));
    }

    public function officials()
    {
        $setting = Setting::first();
        return view('pages.municipality.officials', compact('setting'));
    }

    public function organizationChart()
    {
        $setting = Setting::first();
        return view('pages.municipality.organization-chart', compact('setting'));
    }

    public function phoneBook()
    {
        $setting = Setting::first();
        return view('pages.municipality.phone-book', compact('setting'));
    }

    public function officials_view()
    {
        $setting = Setting::first();
        $officials = $setting->officials;
        return view('pages.municipality.officials', compact('officials'));

    }

    public function directory_view()
    {
        $setting = Setting::first();
        $directory = $setting->directory;
        return view('pages.municipality.directory', compact('directory'));

    }

    public function planning_and_organization_view()
    {
        $setting = Setting::first();
        $planning_and_organization = $setting->planning_and_organization;
        return view('pages.municipality.planning_and_organization', compact('planning_and_organization'));

    }

    public function directives_view()
    {
        $setting = Setting::first();
        $directives = $setting->directives;
        return view('pages.municipality.directives', compact('directives'));

    }

    public function photos_gallery_view()
    {
        $notice_images = DB::table('info_informacion')
            ->orderBy('fecha_en', 'DESC')
            ->where('published', 1)
            ->where('deleted_at', NULL)
            ->take(20)
            ->get(['foto', 'foto1', 'foto2']);

        return view('pages.municipality.gallery', compact('notice_images'));

    }
}
