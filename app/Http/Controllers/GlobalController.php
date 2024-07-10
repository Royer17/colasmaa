<?php

namespace App\Http\Controllers;

use App\Service;
use App\Popup;
use App\Setting;
use App\InstitutionalDocument;
use App\Post;
use App\LastDocument;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;

class GlobalController extends Controller
{
    public function compose(View $view) {
 
        $now = Carbon::now()->format('Y-m-d');

        //$services = Service::wherePublished(1)->get();
        $setting = Setting::first();

        $services = Service::take(9)
            ->wherePublished(1)
            ->orderBy('order', 'ASC')
            ->get();

        $inst_documents = InstitutionalDocument::take(9)
            ->wherePublished(1)
            ->orderBy('id', 'DESC')
            ->get();

        $last_documents = LastDocument::take(9)
            ->orderBy('id', 'DESC')
            ->wherePublished(1)
            //->with('files')
            ->get();
        
        $news = Post::select(['in_id_informacion as id', 'vc_titulo_informacion as title', 'slug', 'foto as image', 'fecha_en as date'])
            ->orderBy('fecha_en', 'DESC')
            ->wherePublished(1)
            ->take(3)
            ->get();

        $last_popup = Popup::orderBy('id', 'DESC')
            ->where('visible', "SI")
            ->whereDate('finished_at', '>=', $now)
            ->get();

        $view->with('services', $services)
                ->with('setting', $setting)
                ->with('inst_documents', $inst_documents)
                ->with('last_documents', $last_documents)
                ->with('news', $news)
                ->with('last_popup', $last_popup);


    }

}
