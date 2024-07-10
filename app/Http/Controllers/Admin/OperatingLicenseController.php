<?php

namespace App\Http\Controllers\Admin;

use App\Commission;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCommissionRequest;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;

class OperatingLicenseController extends Controller {

    public function get_index(Request $request)
    {
        return View::make('admin.commissions.datatable');
    }

    public function get_datatable(Request $request)
    {
        $role_id = $request->role_id;
        
        $result = DB::table('commissions')
            ->select('id', 'title', 'president')
            ->where('deleted_at', NULL);

        return DataTables::of($result)
        ->escapeColumns('Image', 'Actions')
        ->addColumn('Image', function($model)
        {   
            return;
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

    public function store(CreateCommissionRequest $request)
    {
        $data = $request->except(['id']);

        $commission = new Commission();
        $commission->fill($data);
        $commission->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se he creado correctamente', 'symbol' => 'success'], 200);
    }

    public function show($id)
    {
        $commission = DB::table('commissions')->where('id', $id)
            ->first();

        return response()->json($commission); 
    }

 public function update($id, CreateCommissionRequest $request)
 {
    $data = $request->except(['id', 'photo']);

    $commission = Commission::find($id);
    $commission->fill($data);
    $commission->save();

    return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
}

    public function delete($id)
    {
        $commission = Commission::find($id);

        $commission->delete();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
        
    }
}
