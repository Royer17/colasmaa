<?php

namespace App\Http\Controllers;

use App\InstitutionalDocument;
use App\Setting;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class InstitutionalDocumentController extends Controller
{
    public function get_view($acronym)
    {

        $document = InstitutionalDocument::whereAcronym($acronym)
            ->with('files')
            ->first();

        $setting = Setting::first();

        return view('pages.docs.doc', compact('document', 'setting'));
    }
}
