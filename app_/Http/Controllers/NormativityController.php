<?php

namespace App\Http\Controllers;

use App\LastDocument;
use App\Setting;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class NormativityController extends Controller
{
    public function mayoralResolutions()
    {
        $setting = Setting::first();

        return view('pages.normativity.mayoral-resolutions', compact('setting'));
    }

    public function allResolutions()
    {
        $setting = Setting::first();

        return view('pages.normativity.index', compact('setting'));
    }

    public function resolutions_datatable(Request $request)
    {

        $result = DB::table('normas')
            ->select('idnor', 'numdoc', 'fechaemi', 'nomfile', 'referenc', 'tipodocu')
            ->where('published', 1)
            ->where('deleted_at', NULL);

        if ($request->tipodocu) {
            $result = $result->where('tipodocu', $request->tipodocu);
        }

        return DataTables::of($result)
        ->escapeColumns('fecha_formatted')
        ->addColumn('fecha_formatted', function($model)
        {	
        	if ($model->fechaemi) {
            	return Date::createFromFormat('Y-m-d', $model->fechaemi)->format('d F Y');
        	}
        	return "";
            // return $this->getOneImage($model->id,3,1);
        })
        ->make();
    }

    public function last_documents_datatable(Request $request)
    {

        $result = DB::table('last_documents')
            ->select('id', 'title', 'acronym', 'slug', 'created_at')
            ->where('deleted_at', NULL);

        return DataTables::of($result)
        ->escapeColumns('file')
        ->addColumn('file', function($model)
        {      

            $document = LastDocument::with('files')->find($model->id)->toArray();

            if (count($document['files'])) {

                $content = "";

                foreach ($document['files'] as $ui => $file) {
                    $url = $file['url'];
                    $alt = $file['title'];

                    $content .= "<a target='_blank' href='$url' alt='$alt' title='$alt'>
                                  <img class='img-responsive' src='/img/pdf.png' width='50px'>
                                </a>";
                }

                return $content;

            }

            // if ($model->created_at) {
            //     return Date::createFromFormat('Y-m-d', $model->created_at)->format('d F Y');
            // }
            return "";
        })
        ->make();
    }


    public function mayoralDecrees()
    {
        $setting = Setting::first();

        return view('pages.normativity.mayoral-decrees', compact('setting'));
    }

    public function municipalOrdinances()
    {
        $setting = Setting::first();
        return view('pages.normativity.municipal-ordinances', compact('setting'));
    }

    public function municipalManagementResolutions()
    {
        $setting = Setting::first();

        return view('pages.normativity.municipal-management-resolutions', compact('setting'));
    }

    public function municipalCouncilAgreements()
    {
        $setting = Setting::first();

        return view('pages.normativity.municipal-council-agreements', compact('setting'));
    }

    public function otherDocuments()
    {
        $setting = Setting::first();

        return view('pages.normativity.other-documents', compact('setting'));
    }
}
