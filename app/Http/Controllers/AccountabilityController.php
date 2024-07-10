<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Accountability;
use Illuminate\Http\Request;

class AccountabilityController extends Controller
{
    public function get_index()
    {

        $accountability = Accountability::wherePublished(1)->with('files')->get();
        
        return view('pages.accountability', compact('accountability'));
    }
}
