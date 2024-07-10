<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DocumentType;
use App\Http\Requests\DocumentTypeRequest;
use DB;
use Auth;
use Illuminate\Support\Facades\View;
use DataTables;

class DocumentTypeController extends Controller
{
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
       
        return View::make('admin.document_types.datatable');
    }

    public function get_datatable(Request $request)
    {    
        $result = DB::table('document_types')
            ->select('id', 'name', 'description')
            ->where('deleted_at', NULL);

        return DataTables::of($result)
		->escapeColumns('Actions')
        ->addColumn('Actions', function($model)
        {
            return "<button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->id OnClick='Editar(this);'>
                    <i class='fa fa-edit'></i>
                    </button>
                    <button class='btn btn-danger btn-sm solsoConfirm' data-toggle='modal' data-title='Slider' data-name='$model->name' title='Eliminar' value=$model->id OnClick='Eliminar(this);'>
                      <i class='fa fa-trash'></i>
                    </button>";
        })->make();
    }

    public function store(DocumentTypeRequest $request)
    {
        $data = $request->except(['id']);
        $data['slug'] = str_slug($data['name']);
        $document_type = new DocumentType();
        $document_type->fill($data);
        $document_type->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado correctamente: '.$document_type->name, 'symbol' => 'success'], 200);
    }

    public function show($document_type_id)
    {
        $document_type = DB::table('document_types')->where('id', $document_type_id)
            ->first();

        return response()->json($document_type); 
    }

    public function update($document_type_id, DocumentTypeRequest $request)
    {
        $data = $request->except(['id']);
        $data['slug'] = str_slug($data['name']);

        $document_type = DocumentType::find($document_type_id);
        $document_type->fill($data);
        $document_type->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente: '.$document_type->name, 'symbol' => 'success'], 200);
    }

    public function delete($document_type_id)
    {

        $document_type = DocumentType::find($document_type_id);

        $normas_with_this_document_type = DB::table('normas')
            ->where('tipodocu', $document_type_id)
            ->where('deleted_at', NULL)
            ->get()->toArray();

        if (count($normas_with_this_document_type)) {
            return response()->json(['title' => 'Advertencia', 'message' => "No se ha podido eliminar. $document_type->name está asignado a una o más normas.", 'symbol' => 'false'], 400);
        }

        $temp_name = $document_type->name;
        $document_type->delete();
        return response()->json(['title' => 'Operación Exitosa', 'message' => "Se ha eliminado correctamente: $temp_name", 'symbol' => 'success'], 200);
       
    }

}
