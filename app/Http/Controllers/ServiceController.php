<?php

namespace App\Http\Controllers;

use App\Service;
use App\Setting;
use App\LastDocument;
use App\InstitutionalDocument;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function get_view($slug)
    {   
        $service = Service::whereSlug($slug)->first();

        return view('pages.services.citizen-security', compact('service'));
    }

    public function citizenSecurity()
    {
        $setting = Setting::first();

        return view('pages.services.citizen-security', compact('setting'));
    }

    public function codisec()
    {
        $setting = Setting::first();

        return view('pages.services.codisec', compact('setting'));
    }

    public function glassOfMilk()
    {
        $setting = Setting::first();

        return view('pages.services.glass-of-milk', compact('setting'));
    }

    public function demuna()
    {
        $setting = Setting::first();

        return view('pages.services.demuna', compact('setting'));
    }

    public function sports()
    {

        $setting = Setting::first();

        return view('pages.services.sports', compact('setting'));
    }

    public function civilRegistration()
    {

        $setting = Setting::first();

        return view('pages.services.civil-registration', compact('setting'));
    }

    public function civilDefense()
    {

        $setting = Setting::first();

        return view('pages.services.civil-defense', compact('setting'));
    }

    public function itse()
    {
        $setting = Setting::first();

        return view('pages.services.itse', compact('setting'));
    }

    public function sisfoh()
    {
        $setting = Setting::first();

        return view('pages.services.sisfoh', compact('setting'));
    }

    public function get_index(Request $request)
    {
        $categories = DB::table('obras')
            ->where('deleted_at', NULL)
            ->get(['id', 'titulo']);

        return View::make('admin.sliders.datatable', compact('categories'));
    }

    public function get_datatable(Request $request)
    {
        $role_id = $request->role_id;

        $result = DB::table('slide')
            ->select('id_slide', 'titulo_slide', 'orden_slide', 'created_at' ,'img_slide')
            ->where('deleted_at', NULL)
            ->orderBy('orden_slide','ASC');

        return DataTables::of($result)
        ->escapeColumns('Image', 'Actions')
        ->addColumn('Image', function($model)
        {   
            // if ($model->date) {
            //  return Date::parse($model->date)->format('d\/F\/Y');
            // }    
            return "";
        })
        ->addColumn('Actions', function($model) use ($role_id)
        {

            if ($role_id == 3) {

                return "
                            <button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->id_slide OnClick='Editar(this);'>
                            <i class='fa fa-edit'></i>
                            </button>";
            }

            return "
                    <button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->id_slide OnClick='Editar(this);'>
                    <i class='fa fa-edit'></i>
                    </button>

                    <button class='btn btn-danger btn-sm solsoConfirm' data-toggle='modal' data-title='Slider' title='Eliminar' value=$model->id_slide OnClick='Eliminar(this);'>
                      <i class='fa fa-trash'></i>
                    </button>";

        })->make();
    }

    public function store(CreateSlideRequest $request)
    {

        $data = $request->except('img_slide');

        $slide = new Slide();
        $slide->fill($data);

        $slide->orden_slide = "";
        $slide->visitas = 0;
        $slide->anno = 0;
        $slide->mes = 0;
        $slide->dia = 0;
        $slide->hora = 0;

        if ($request->orden_slide) {
            $slide->orden_slide = $request->orden_slide;
        }

        if ($request->img_slide != '') {
            $img = $request->img_slide;

            $filename = time().'.'.$img->getClientOriginalExtension();
            //$img->move(public_path('img/banners'), $filename);
            $img->move(public_path(). "img/banners", $filename);

            $slide->img_slide = "img/banners/".$filename;
        }

        $slide->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se he creado correctamente', 'symbol' => 'success'], 200);
    }

    public function show($id)
    {
        $slide = DB::table('slide')->where('id_slide', $id)
            ->first();

        return response()->json($slide);    
    }

    public function update($id, CreateSlideRequest $request)
    {
        $data = $request->except('img_slide');
        $slide = Slide::find($id);
            
        $slide->fill($data);

        $slide->orden_slide = "";

        if ($request->orden_slide) {
            $slide->orden_slide = $request->orden_slide;
        }

        if ($request->img_slide != '') {
                $img = $request->img_slide;
                    
                if (file_exists($slide->img_slide)) {
                    unlink($slide->img_slide);
                }

                $filename = time().'.'.$img->getClientOriginalExtension();
                $img->move(public_path('img/banners'), $filename);

                $slide->img_slide = "img/banners/".$filename;
        }

        $slide->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
    }

    public function delete($id)
    {
        $slide = Slide::where('id_slide', $id)->first();
        
        if (file_exists($slide->img_slide)) {
            unlink($slide->img_slide);
        }

        $slide->delete();
        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
        
    }

}
