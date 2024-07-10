<?php

namespace App\Http\Controllers\Admin;

use App\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateLastDocumentRequest;
use App\LastDocument;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use Auth;

class LastDocumentController extends Controller
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
            ->where('permissions.slug', 'ver-otros-documentos-importantes')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }

        return View::make('admin.last_documents.datatable');
    }

    public function get_datatable(Request $request)
    {
        $role_id = $request->role_id;
        
        $result = DB::table('last_documents')
            ->select('title', 'acronym', 'created_at', 'id', 'published')
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

    public function store(CreateLastDocumentRequest $request)
    {
        $data = $request->except(['files', 'files_title']);

        $document = new LastDocument();
        $document->fill($data);
        $document->slug = str_slug($data['title']);
        $document->save();

        if ($request->hasFile('file')) {
            $files = $request->file('file');
            $files_title = $request->name;

            foreach ($files as $key => $file) {

                $content = new Content();
                $content->title = $files_title[$key];
                $content->model_type = 2;
                $content->model_id = $document->id;
                $content->type = 2;

                // Storage::disk('google')->put($file->getClientOriginalName(), fopen($file, 'r+'));
                // $url = Storage::disk('google')->url($file->getClientOriginalName());
                // $content->url = $url;
                $filename = time().time().str_slug($file->getClientOriginalName()).".".$file->getClientOriginalExtension();
                $file->move(public_path(). "/files/documents", $filename);
                $content->url = "/files/documents/".$filename;

                $content->save();
            }
        }

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado correctamente', 'symbol' => 'success'], 200);
    }

    public function show($id)
    {   
        $document = LastDocument::with('files')->find($id);
        return $document;
    }

 public function update($id, CreateLastDocumentRequest $request)
 {

    $data = $request->except(['files', 'files_title']);

    $document = LastDocument::find($id);
    $document->fill($data);
    $document->slug = str_slug($data['title']);
    $document->save();

    if ($request->hasFile('file')) {
        $files = $request->file('file');
        $files_title = $request->name;

        foreach ($files as $key => $file) {

            $content = new Content();
            $content->title = $files_title[$key];
            $content->model_type = 2;
            $content->model_id = $document->id;
            $content->type = 2;

            // Storage::disk('google')->put($file->getClientOriginalName(), fopen($file, 'r+'));
            // $url = Storage::disk('google')->url($file->getClientOriginalName());
            // $content->url = $url;
            //$filename = time().time().str_slug($file->getClientOriginalExtension());
            $filename = time().time().str_slug($file->getClientOriginalName()).".".$file->getClientOriginalExtension();

            $file->move(public_path(). "/files/documents", $filename);
            $content->url = "/files/documents/".$filename;
            $content->save();
        }
    }

    return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
}

    public function delete($id)
    {
        $document = LastDocument::find($id);

        $contents = Content::whereModelType(2)
            ->whereModelId($document->id)
            ->whereType(2)
            ->delete();

        $document->delete();
        
        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
        
    }

}
