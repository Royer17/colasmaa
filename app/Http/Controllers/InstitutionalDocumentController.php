<?php

namespace App\Http\Controllers;

use App\InstitutionalDocument;
use App\LastDocument;
use App\Setting;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class InstitutionalDocumentController extends Controller
{
    public function get_viewv0($acronym)
    {

        $document = InstitutionalDocument::whereAcronym($acronym)
            ->with('files')
            ->first();

        $setting = Setting::first();

        return view('pages.docs.doc', compact('document', 'setting'));
    }

    public function get_view($slug)
    {

        $document = InstitutionalDocument::whereSlug($slug)
            ->with('files')
            ->first()
            ->toArray();

        $files = $document['files'];
        $setting = Setting::first();

        return view('pages.favorites', compact('document', 'setting', 'files'));
    }

    public function get_view_links($slug)
    {

        $document = LastDocument::whereSlug($slug)
            ->with('files')
            ->first()
            ->toArray();

        $files = $document['files'];
        $setting = Setting::first();

        return view('pages.links', compact('document', 'setting', 'files'));
    }

}
