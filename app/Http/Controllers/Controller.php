<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function fix_new_tables()
    {
        $posts = Post::all();

        foreach ($posts as $key => $post) {
            $post->slug = str_slug($post->vc_titulo_informacion);
            $post->save();
        }

        return "ok";

    }

    public function index_for_landing()
    {
        $schedule = DB::table('schedule')
            ->select('id', 'type as name', 'subject as description', 'date')
            ->where('deleted_at', NULL)
            ->get();

        $schedule_arr = [];

        foreach ($schedule as $key => $sh) {
            $schedule_arr[] = array(
                'id' => $sh->id,
                'name' => $sh->name,
                'description' => $sh->description,
                'date' => Carbon::parse($sh->date)->format('Y/m/d'),
                'type' => 'event',
                'everyYear' => false,
            );
        }

        return $schedule_arr;
    }

    public function events_for_landingv2(Request $request)
    {
        $start = Carbon::parse($request->start)->format('Y-m-d');
        $end = Carbon::parse($request->end)->format('Y-m-d');

        $schedule = DB::table('schedule')
            ->select('id', 'type as name', 'subject as description', 'date')
            ->where('deleted_at', NULL)
            ->where('published', 1)
            ->whereDate('date', '>=', $start)
            ->whereDate('date', '<=', $end)
            ->get();

        $schedule_arr = [];

        foreach ($schedule as $key => $sh) {
            $schedule_arr[] = array(
                'id' => $sh->id,
                'title' => $sh->name,
                'description' => $sh->description,
                'start' => Carbon::parse($sh->date)->format('Y-m-d'),
                'end' => Carbon::parse($sh->date)->format('Y-m-d'),
                'type' => 'event',
                'everyYear' => false,
            );
        }

        return $schedule_arr;
    }



}
