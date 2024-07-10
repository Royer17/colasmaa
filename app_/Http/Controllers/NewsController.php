<?php

namespace App\Http\Controllers;

use App\Post;
use App\Setting;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
    	$news = Post::select(['in_id_informacion as id', 'vc_titulo_informacion as title', 'slug', 'created_at', 'foto as image'])
    		->orderBy('fecha_en', 'DESC')
            ->where('published', 1)
    		->paginate(15);

        $setting = Setting::first();


        return view('pages.news.index', compact('news', 'setting'));
    }

    public function detail($slug)
    {
    	$news = Post::whereSlug($slug)->first();
    	$other_news = [];
    	if ($news) {
			$other_news = Post::where('in_id_informacion', '!=', $news->in_id_informacion)
				->orderBy('in_id_informacion', 'DESC')
				->take(3)
    			->get();
    	}

        $setting = Setting::first();


        return view('pages.news.detail', compact('news', 'other_news', 'setting'));
    }
}
