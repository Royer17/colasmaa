<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModernizationController extends Controller
{
    public function municipalTaxes()
    {
        return view('pages.modernization.municipal-taxes');
    }

    public function buildingLicense()
    {
        return view('pages.modernization.building-license');
    }

    public function operatingLicense()
    {
        return view('pages.modernization.operating-license');
    }

    public function complaintsBook()
    {
        return view('pages.modernization.complaints-book');
    }
}
