<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateServiceRequest;
use App\Service;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use Auth;

class ServiceController extends Controller
{
    public function get_index(Request $request)
    {
        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-servicios')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }

        return View::make('admin.services.datatable');
    }

    public function get_datatable(Request $request)
    {
        $role_id = $request->role_id;

        $result = DB::table('services')
            ->select('id', 'title', 'created_at', 'published')
            ->where('deleted_at', NULL);

        return DataTables::of($result)
        ->escapeColumns('Image', 'Actions')
        ->addColumn('Image', function($model)
        {   
            if ($model->created_at) {
                return Date::parse($model->created_at)->format('d \ F \ Y');
            }   
            return "";
        })
        ->addColumn('Actions', function($model) use ($role_id)
        {

            if ($role_id == 3) {

                return "
                            <button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->id OnClick='Editar(this);'>
                            <i class='fa fa-edit'></i>
                            </button>";
            }

            return "
                    <button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->id OnClick='Editar(this);'>
                    <i class='fa fa-edit'></i>
                    </button>

                    <button class='btn btn-danger btn-sm solsoConfirm' data-toggle='modal' data-title='Slider' title='Eliminar' value=$model->id OnClick='Eliminar(this);'>
                      <i class='fa fa-trash'></i>
                    </button>";

        })->make();
    }

    public function store(CreateServiceRequest $request)
    {
        $data = $request->except(['icon']);

        $service = new Service();
        $service->fill($data);
        $service->slug = str_slug($data['title']);
        $service->foto1 = "";
        $service->foto1_path = "";
        $service->foto2 = "";
        $service->foto2_path = "";
        $service->foto3 = "";
        $service->foto3_path = "";

        $service->icon = "";
        $service->icon_path = "";

        if ($request->hasFile('icon')) {
            $file1 = $request->file('icon');

            //$path = time().$file1->getClientOriginalName();

            // Storage::disk('google')->put($path, fopen($file1, 'r+'));
            // $url = Storage::disk('google')->url($path);
            $filename = time().str_slug($file1->getClientOriginalExtension());
            //$img2->move(public_path('img/obras'), $filename2);
            $file1->move(public_path(). "/img/services", $filename);

            $service->icon = "/img/services/".$filename;
            //$service->icon_path = $path;
        }
        
        $service->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado correctamente', 'symbol' => 'success'], 200);
    }

    public function show($id)
    {
        $service = DB::table('services')->where('id', $id)
            ->first();

        return response()->json($service); 
    }

 public function update($id, CreateServiceRequest $request)
 {
    $data = $request->except(['icon']);

    $service = Service::find($id);
        
    $service->fill($data);
    $service->slug = str_slug($data['title']);

    if ($request->hasFile('icon')) {
        $file1 = $request->file('icon');

        // if($service->icon)
        // {
        //     $val = explode('id=', $service->icon); 
        //     $val = $val[1];
        //     $val = explode('&', $val); 
        //     $val = $val[0];
        //     Storage::disk('google')->delete($val);
        // }
    
        //$path = time().$file1->getClientOriginalName();

        //Storage::disk('google')->put($path, fopen($file1, 'r+'));
        //$url = Storage::disk('google')->url($path);
        $filename = time().str_slug($file1->getClientOriginalExtension());
        $file1->move(public_path(). "/img/services", $filename);

        $service->icon = "/img/services/".$filename;
        //$service->icon_path = $path;
    }
    
    $service->save();

    return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
}

    public function delete($id)
    {
        $service = Service::where('id', $id)->first();
        

        if (file_exists($service->icon)) {
            unlink($service->icon);
        }

        //if($service->icon_path)
        //{
            // $val = explode('id=', $service->foto); 
            // $val = $val[1];
            // $val = explode('&', $val); 
            // $val = $val[0];
            //Storage::disk('google')->delete($service->icon_path);
        //}

        $service->delete();
        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
        
    }

}
