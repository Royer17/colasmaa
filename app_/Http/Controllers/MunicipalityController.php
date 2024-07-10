<?php

namespace App\Http\Controllers;

use App\CityCouncil;
use App\Commission;
use App\Setting;
use Illuminate\Http\Request;

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
}
