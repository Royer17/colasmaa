<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorksController extends Controller
{
    public function index(Request $request)
    {
    	$works = Works::select(['id', 'actividad', 'slug', 'fechaini', 'foto', 'fechater'])
            ->wherePublished(1)        
    		->orderBy('id', 'DESC');


        if ($request->tipo) {
            $type = DB::table('obras')
                ->where('detalle', $request->tipo)
                ->first();

            if ($type) {
                $works = $works->whereType($type->id);
            }
        }

    	$works = $works->paginate(6);

        return view('pages.works.index', compact('works'));
    }

    public function detail($slug)
    {
    	$works = Works::whereSlug($slug)->first();
    	$other_works = [];
    	if ($works) {
			$other_works = Works::where('id', '!=', $works->id)
				->orderBy('id', 'DESC')
				->take(3)
    			->get();
    	}

        return view('pages.works.detail', compact('works', 'other_works'));
    }
}
