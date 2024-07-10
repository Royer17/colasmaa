<?php

namespace App\Http\Controllers\Admin;

use App\CityCouncil;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;

class SettingController extends Controller
{

    public function update($id, Request $request)
    {
        $data = $request->except(['photo']);

        $record = Setting::find($id);
        $record->fill($data);

        if ($request->hasFile('photo')) {
            //$file1 = $request->file('photo');

            if($record->photo)
            {
                if (file_exists($record->photo)) {
                    unlink($record->photo);
                }

                // $val = explode('id=', $record->photo); 
                // $val = $val[1];
                // $val = explode('&', $val); 
                // $val = $val[0];
                // Storage::disk('google')->delete($val);
            }

            //$file_name = $file1->getClientOriginalName().time();

            //Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
            //$url = Storage::disk('google')->url($file_name);
            $photo = $request->file('photo');
            $filename_photo = time().time().str_slug($photo->getClientOriginalExtension());

            $photo->move(public_path() . '/imagenes/muniestique/', $filename_photo);
            $path = '/imagenes/muniestique/' . $filename_photo;

            $record->photo = $path;
        }

       if ($request->hasFile('organization_chart')) {
            //$file1 = $request->file('organization_chart');

            if($record->organization_chart)
            {

                if (file_exists($record->organization_chart)) {
                    unlink($record->organization_chart);
                }

                // $val = explode('id=', $record->organization_chart); 
                // $val = $val[1];
                // $val = explode('&', $val); 
                // $val = $val[0];
                // Storage::disk('google')->delete($val);
            }

            //$file_name = $file1->getClientOriginalName().time();

            //Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
            //$url = Storage::disk('google')->url($file_name);
            $organization_chart = $request->file('organization_chart');
            $filename_organization_chart = time().time().str_slug($organization_chart->getClientOriginalExtension());

            $organization_chart->move(public_path() . '/imagenes/muniestique/', $filename_organization_chart);
            $path = '/imagenes/muniestique/' . $filename_organization_chart;

            $record->organization_chart = $path;
        }

        if ($request->hasFile('cover')) {
            //$file_cover = $request->file('cover');

            if($record->cover)
            {
                if (file_exists($record->cover)) {
                    unlink($record->cover);
                }
                // $val = explode('id=', $record->cover); 
                // $val = $val[1];
                // $val = explode('&', $val); 
                // $val = $val[0];
                // Storage::disk('google')->delete($val);
            }

            //$file_name = $file_cover->getClientOriginalName().time();

            //Storage::disk('google')->put($file_name, fopen($file_cover, 'r+'));
            //$url = Storage::disk('google')->url($file_name);

            $cover = $request->file('cover');
            $filename_cover = time().time().str_slug($cover->getClientOriginalExtension());
            $cover->move(public_path() . '/imagenes/muniestique/', $filename_cover);
            $path = '/imagenes/muniestique/' . $filename_cover;

            $record->cover = $path;
        }

        $record->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
    }

    public function update_city_council(Request $request)
    {
        
        $ids = $request->id;
        $position = $request->position;
        $name = $request->name;
        $email = $request->email;
        //$photo = $request->file('photo');

        if ($ids) {
            foreach ($ids as $key => $id) {

                if ($id != 0) {
                    //old ones
                    $record = CityCouncil::find($id);
                    $record->position = $position[$key];
                    $record->name = $name[$key];
                    $record->email = $email[$key];
                    $record->save();

                    if ($request->hasFile('photo_'.$key)) {
                        //$file1 = $request->file('nomfile');
                        $file1 = $request->file('photo_'.$key);

                        if($record->photo)
                        {
                            if (file_exists($record->photo)) {
                                unlink($record->photo);
                            }
                            
                            // $val = explode('id=', $record->photo); 
                            // $val = $val[1];
                            // $val = explode('&', $val); 
                            // $val = $val[0];
                            // Storage::disk('google')->delete($val);
                        }

                        //$cover = Input::file('cover');
                        $filename = time().time().str_slug($file1->getClientOriginalExtension());
                        $file1->move(public_path() . '/imagenes/muniestique/', $filename);
                        $path = '/imagenes/muniestique/' . $filename;

                        //$file_name = $file1->getClientOriginalName().time();

                        //Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
                        //$url = Storage::disk('google')->url($file_name);
                        $record->photo = $path;
                    }
                    $record->save();

                } else {
                    //new ones
                    $record = new CityCouncil();
                    $record->position = $position[$key];
                    $record->name = $name[$key];
                    $record->email = $email[$key];
                    $record->save();

                    if ($request->hasFile('photo_'.$key)) {
                        //$file1 = $request->file('nomfile');
                        $file1 = $request->file('photo_'.$key);
                        //$file_name = $file1->getClientOriginalName().time();

                        //Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
                        //$url = Storage::disk('google')->url($file_name);
                        $filename = time().time().str_slug($file1->getClientOriginalExtension());
                        $file1->move(public_path() . '/imagenes/muniestique/', $filename);
                        $path = '/imagenes/muniestique/' . $filename;

                        $record->photo = $path;
                    }
                    $record->save();

                }
            }


        }

    }
}
