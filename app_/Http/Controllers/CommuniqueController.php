<?php

namespace App\Http\Controllers;

use App\Popup;
use App\Setting;
use Illuminate\Http\Request;

class CommuniqueController extends Controller
{
    public function index()
    {
    	$popups = Popup::orderBy('id', 'DESC')
    		->paginate(6);

        $setting = Setting::first();

        return view('pages.communiques.index', compact('popups', 'setting'));
    }

    public function detail($id)
    {
    	$popup = Popup::find($id);
    	$other_popups = [];

    	if ($popup) {
			$other_popups = Popup::where('id', '!=', $popup->id)
				->orderBy('id', 'DESC')
				->take(3)
    			->get();
    	}

        $setting = Setting::first();

        return view('pages.communiques.detail', compact('other_popups', 'popup', 'setting'));
    }
}
