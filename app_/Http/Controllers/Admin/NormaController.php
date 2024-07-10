<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateNormaRequest;
use App\Norma;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use Auth;

class NormaController extends Controller
{
    public function dashboard_view()
    {
        return view('admin.blank_page');
    }

    public function get_index(Request $request)
    {
        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-normas')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }


        $document_types = DB::table('tdocumento')
            ->select(['iddoc as id', 'detalle as name'])
            ->get();

        return View::make('admin.normas.datatable', compact('document_types'));
    }

    public function get_datatable(Request $request)
    {
        $role_id = $request->role_id;

        $result = DB::table('normas')
            //->join('tdocumento', 'normas.tipodocu', '=', 'tdocumento.iddoc')
            ->select('normas.idnor', 'normas.tipodocu as detalle','normas.fechaemi', 'normas.numdoc', 'normas.nomfile', 'normas.published')
            ->where('normas.deleted_at', NULL);

        return DataTables::of($result)
        ->escapeColumns('Image', 'Actions')
        ->addColumn('Image', function($model)
        {   
            if ($model->fechaemi) {
                return Date::createFromFormat('Y-m-d', $model->fechaemi)->format('d \ F \ Y');
            }   
            return "";
        })
        ->addColumn('Actions', function($model) use ($role_id)
        {

            if ($role_id == 3) {

                return "
                            <button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->idnor OnClick='Editar(this);'>
                            <i class='fa fa-edit'></i>
                            </button>";
            }

            return "
                    <button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->idnor OnClick='Editar(this);'>
                    <i class='fa fa-edit'></i>
                    </button>

                    <button class='btn btn-danger btn-sm solsoConfirm' data-toggle='modal' data-title='Slider' title='Eliminar' value=$model->idnor OnClick='Eliminar(this);'>
                      <i class='fa fa-trash'></i>
                    </button>";

        })->make();
    }

    public function store(CreateNormaRequest $request)
    {

        $data = $request->except(['nomfile']);
        $data['fechaemi'] = Carbon::createFromFormat('d/m/Y', $data['fechaemi'])->format('Y-m-d');

        $norma = new Norma();
        $norma->fill($data);
        $norma->depeorig = 3;
        $norma->visitas = 0;
        $norma->digitador = "";
        $norma->anno = Carbon::now()->format('Y');
        $norma->detalle = "";

        $norma->nomfile = "";
        if ($request->hasFile('nomfile')) {
            $file1 = $request->file('nomfile');

            //$file_name = str_slug($file1->getClientOriginalName()).time();
            //Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
            //$url = Storage::disk('google')->url($file_name);
            //$filename = time().str_slug($file1->getClientOriginalExtension());
            $filename = time().str_slug($file1->getClientOriginalName()).".".$file1->getClientOriginalExtension();

            $file1->move(public_path(). "/files/norma", $filename);
            $norma->nomfile = "/files/norma/".$filename;
        }
        
        $norma->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado correctamente', 'symbol' => 'success'], 200);
    }

    public function show($id)
    {
        $norma = Norma::find($id);
        $norma->fecha_formatted = Carbon::parse($norma->fechaemi)->format('d/m/Y');
        return response()->json($norma); 
    }

 public function update($id, CreateNormaRequest $request)
 {
    $data = $request->except(['nomfile']);
    $data['fechaemi'] = Carbon::createFromFormat('d/m/Y', $data['fechaemi'])->format('Y-m-d');

    $norma = Norma::find($id);
        
    $norma->fill($data);

    if ($request->hasFile('nomfile')) {
        $file1 = $request->file('nomfile');

        if($norma->nomfile)
        {
            // $val = explode('id=', $norma->nomfile); 
            // $val = $val[1];
            // $val = explode('&', $val); 
            // $val = $val[0];
            // Storage::disk('google')->delete($val);
            if (file_exists($norma->nomfile)) {
                unlink($norma->nomfile);
            }
        }

        // Storage::disk('google')->put($file1->getClientOriginalName(), fopen($file1, 'r+'));
        // $url = Storage::disk('google')->url($file1->getClientOriginalName());
        // $norma->nomfile = $url;
        $filename = time().str_slug($file1->getClientOriginalName()).".".$file1->getClientOriginalExtension();
        $file1->move(public_path(). "/files/norma", $filename);
        $norma->nomfile = "/files/norma/".$filename;

    }
    
    $norma->save();

    return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
}

    public function delete($id)
    {
        $norma = Norma::where('idnor', $id)->first();

        if (file_exists($norma->nomfile)) {
            unlink($norma->nomfile);
        }

        // if($norma->nomfile && substr($norma->nomfile, 0, 8) == "https://")
        // {
        //     $val = explode('id=', $norma->nomfile); 
        //     $val = $val[1];
        //     $val = explode('&', $val); 
        //     $val = $val[0];
        //     Storage::disk('google')->delete($val);
        // }

        $norma->delete();
        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
        
    }

}
