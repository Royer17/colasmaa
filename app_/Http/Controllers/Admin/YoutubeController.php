<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVideoRequest;
use App\Youtube;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use Auth;

class YoutubeController extends Controller
{
    public function get_index(Request $request)
    {
        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-videos')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }

        return View::make('admin.videos.datatable');
    }

    public function get_datatable(Request $request)
    {
        $role_id = $request->role_id;

        $result = DB::table('youtube')
            ->select('id', 'video','titulo', 'created_at', 'published')
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

    public function store(CreateVideoRequest $request)
    {

        $data = $request->except([]);

        $video = new Youtube();
        $video->fill($data);

        $video->foto = "";
        if ($request->hasFile('foto')) {
            $file1 = $request->file('foto');

            //Storage::disk('google')->put($file1->getClientOriginalName(), fopen($file1, 'r+'));
            //$url = Storage::disk('google')->url($file1->getClientOriginalName());
            //$video->foto = $url;
            $filename = time().str_slug($file1->getClientOriginalExtension());
            $file1->move(public_path(). "/files/videos", $filename);
            $video->foto = "/files/videos/".$filename;
        }
        
        $video->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado correctamente', 'symbol' => 'success'], 200);
    }

    public function show($id)
    {
        $norma = DB::table('youtube')->where('id', $id)
            ->first();

        return response()->json($norma); 
    }

 public function update($id, CreateVideoRequest $request)
 {
    $data = $request->except(['nomfile']);

    //$data['fecha'] = Carbon::createFromFormat('d/m/Y', $data['fecha'])->format('Y-m-d');

    $video = Youtube::find($id);
        
    $video->fill($data);

    if ($request->hasFile('foto')) {
        $file1 = $request->file('foto');

        if($video->foto)
        {
            // $val = explode('id=', $video->foto); 
            // $val = $val[1];
            // $val = explode('&', $val); 
            // $val = $val[0];
            // Storage::disk('google')->delete($val);
            if (file_exists($video->foto)) {
                unlink($video->foto);
            }

        }

        // Storage::disk('google')->put($file1->getClientOriginalName(), fopen($file1, 'r+'));
        // $url = Storage::disk('google')->url($file1->getClientOriginalName());
        // $video->foto = $url;
        $filename = time().str_slug($file1->getClientOriginalExtension());
        $file1->move(public_path(). "/files/videos", $filename);
        $video->foto = "/files/videos/".$filename;

    }
    
    $video->save();

    return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
}

    public function delete($id)
    {
        $video = Youtube::where('id', $id)->first();
        
        if($video->foto)
        {
            if (file_exists($video->foto)) {
                unlink($video->foto);
            }
            
            // $val = explode('id=', $video->foto); 
            // $val = $val[1];
            // $val = explode('&', $val); 
            // $val = $val[0];
            // Storage::disk('google')->delete($val);
        }

        $video->delete();
        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
        
    }

}
