<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePopupRequest;
use App\Utils\Helpers;
use App\Popup;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Storage;
use Auth;

class PopupController extends Controller {

	public function get_index(Request $request)
	{

		$user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-popup')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }

		$categories = DB::table('obras')
			->where('deleted_at', NULL)
			->get(['id', 'titulo']);

		return View::make('admin.popups.datatable', compact('categories'));
	}

	public function get_datatable(Request $request)
	{
		$role_id = $request->role_id;

		$result = DB::table('popup')
			->select('imagen', 'enlace', 'id', 'visible', 'finished_at')
			->where('deleted_at', NULL)
			->orderBy('id','DESC');
			
		return DataTables::of($result)
		->escapeColumns('Image', 'Actions')
		->addColumn('Image', function($model)
		{	
			return Date::parse($model->finished_at)->format('d\/F\/Y');
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

					<button class='btn btn-danger btn-sm solsoConfirm' data-toggle='modal' data-title='Popup' title='Eliminar' value=$model->id OnClick='Eliminar(this);'>
					  <i class='fa fa-trash'></i>
					</button>";

        })->make();
	}

	public function store(CreatePopupRequest $request)
	{

		$data = $request->except('imagen');
		$data['finished_at'] = Carbon::createFromFormat('d/m/Y', $data['fecha'])->format('Y-m-d');
		
		$popup = new Popup();
		$popup->fill($data);
		$popup->published = 1;
		$popup->imagen = "";

		// if ($request->hasFile('imagen')) {
        //     $file1 = $request->file('imagen');

        //     $file_name = $file1->getClientOriginalName().time();

        //     Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
        //     $url = Storage::disk('google')->url($file_name);
        //     $popup->imagen = $url;
        // }

		if ($request->imagen != '') {
			$img = $request->imagen;
			
			$filename = time().'.'.str_slug($img->getClientOriginalExtension());
			$img->move(public_path(). "/img", $filename);
			$popup->imagen = "/img/".$filename;
		}

		$popup->save();
		
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se he creado correctamente', 'symbol' => 'success'], 200);
	}

	public function show($id)
	{
		$popup = DB::table('popup')->where('id', $id)
			->first();

		$popup->fecha_formatted = "";
	
		if ($popup->finished_at) {
			$popup->fecha_formatted = Carbon::parse($popup->finished_at)->format('d/m/Y');
		}

		return response()->json($popup);	
	}

	 public function update($id, CreatePopupRequest $request)
	 {
	 	$data = $request->except('imagen');
		$data['finished_at'] = Carbon::createFromFormat('d/m/Y', $data['fecha'])->format('Y-m-d');

	 	$popup = Popup::find($id);
	 	
	 	$popup->fill($data);

	    // if ($request->hasFile('imagen')) {
	    //     $file1 = $request->file('imagen');

	    //     if($popup->imagen)
	    //     {
	    //         $val = explode('id=', $popup->imagen); 
	    //         $val = $val[1];
	    //         $val = explode('&', $val); 
	    //         $val = $val[0];
	    //         Storage::disk('google')->delete($val);
	    //     }

        //     $file_name = $file1->getClientOriginalName().time();

	    //     Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
	    //     $url = Storage::disk('google')->url($file_name);
	    //     $popup->imagen = $url;
	    // }

		if ($request->imagen != '') {
			$img = $request->imagen;
	  							
			if (file_exists($popup->imagen)) {
				unlink($popup->imagen);
			}

			$filename = time().'.'.str_slug($img->getClientOriginalExtension());
			//$img->move(public_path('img'), $filename);
			$img->move(public_path(). "/img", $filename);
			$popup->imagen = "/img/".$filename;
		}

		$popup->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
	}

	public function delete($id)
	{
		$popup = Popup::where('id', $id)->first();

        // if($popup->imagen)
        // {
        //     $val = explode('id=', $popup->imagen); 
        //     $val = $val[1];
        //     $val = explode('&', $val); 
        //     $val = $val[0];
        //     Storage::disk('google')->delete($val);
        // }

		if (file_exists($popup->imagen)) {
			unlink($popup->imagen);
		}

		$popup->delete();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
		
	}

}
