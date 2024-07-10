<?php

namespace App\Http\Controllers;

use App\InstitutionalDocument;
use App\LastDocument;
use App\Post;
use App\Popup;
use App\Service;
use App\Works;
use App\DocumentType;
use App\Setting;
use App\WorksCategory;
use App\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PageController extends Controller
{
    public function home()
    {
    	$news = Post::select(['in_id_informacion as id', 'vc_titulo_informacion as title', 'slug', 'foto as image', 'fecha_en as date'])
    		->orderBy('fecha_en', 'DESC')
            ->wherePublished(1)
    		->take(3)
    		->get();

        $calls = DB::table('mw_convoca')
            ->orderBy('idnoti', 'DESC')
            ->where('deleted_at', NULL)
            ->wherePublished(1)
            ->take(3)
            ->get();
            
        $resolutions = DB::table('normas')
            ->orderBy('idnor', 'DESC')
            ->where('deleted_at', NULL)
            ->wherePublished(1)
            ->take(3)
            ->get();

        $works_categories = WorksCategory::with(['one_works' => function($query){
            $query->wherePublished(1);
        }])->get();

        $sliders = DB::table('slide')
            ->orderBy('orden_slide', 'ASC')
            ->where('deleted_at', NULL)
            ->wherePublished(1)
            ->get();

        $now = Carbon::now()->format('Y-m-d');

        $modals_to_show = DB::table('popup')
            ->where('visible', "SI")
            ->where('deleted_at', NULL)
            ->orderBy('id', 'DESC')
            ->whereDate('finished_at', '>=', $now)
            ->get();

        $services = Service::take(15)
            ->wherePublished(1)
            ->orderBy('order', 'ASC')
            ->get();

        $inst_documents = InstitutionalDocument::take(8)
            ->wherePublished(1)
            ->orderBy('id', 'DESC')
            ->get();

        $last_documents = LastDocument::take(8)
            ->orderBy('id', 'DESC')
            ->wherePublished(1)
            //->with('files')
            ->get();

        $last_popup = Popup::orderBy('id', 'DESC')
            ->where('visible', "SI")
            ->whereDate('finished_at', '>=', $now)
            ->get();

        $videos = Youtube::take(3)
            ->wherePublished(1)
            ->orderBy('id', 'DESC')
            ->get();

        foreach ($videos as $key => $video) {
            $video->identifier = explode('=', $video->video)[1];
        }

        $setting = Setting::first();

        $notice_images = DB::table('info_informacion')
            ->orderBy('fecha_en', 'DESC')
            ->where('published', 1)
            ->where('deleted_at', NULL)
            ->take(20)
            ->get(['foto', 'foto1', 'foto2']);

        $works = Works::wherePublished(1)
            ->get();

        $document_types = DocumentType::wherePublished(1)
            ->get(['id', 'slug', 'name']);

        return view('pages.home', compact('news', 'calls', 'resolutions', 'works_categories', 'sliders', 'modals_to_show', 'services', 'inst_documents', 'last_documents', 'setting', 'videos', 'last_popup', 'notice_images', 'works', 'document_types'));
    }

    public function transparencyPortal()
    {
        return view('pages.transparency-portal');
    }

    public function virtualMpv()
    {
        return view('pages.mesa_partes');
    }

    public function convocatoria_view()
    {   

        $setting = Setting::first();

        $query = DB::table('mw_convoca')
            ->orderBy('idnoti', 'DESC')
            ->where('deleted_at', NULL)
            //->take(3)
            ->get();

        return view('pages.convocatoria.convocatoria', compact('query', 'setting'));
    }
}
