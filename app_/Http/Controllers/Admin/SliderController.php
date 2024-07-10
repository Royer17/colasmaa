<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slide;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use App\Http\Requests\CreateSlideRequest;
use Auth;

class SliderController extends Controller {

	public function get_index(Request $request)
	{

        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-sliders')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }

		$categories = DB::table('obras')
			->where('deleted_at', NULL)
			->get(['id', 'titulo']);

		return View::make('admin.sliders.datatable', compact('categories'));
	}

	public function get_datatable(Request $request)
	{
		$role_id = $request->role_id;

		$result = DB::table('slide')
			->select('id_slide', 'titulo_slide', 'orden_slide', 'created_at' ,'img_slide', 'published')
			->where('deleted_at', NULL)
			->orderBy('orden_slide','ASC');

		return DataTables::of($result)
		->escapeColumns('Image', 'Actions')
		->addColumn('Image', function($model)
		{	
			// if ($model->date) {
			// 	return Date::parse($model->date)->format('d\/F\/Y');
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

		if ($request->hasFile('img_slide')) {
			$img = $request->file('img_slide');

			$filename = time().'.'.str_slug($img->getClientOriginalName()).'.'.$img->getClientOriginalExtension();
			//$img->move(public_path('img/banners'), $filename);
			$img->move(public_path(). "/img/banners/", $filename);

			$slide->img_slide = "/img/banners/".$filename;
		}

		$slide->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado correctamente', 'symbol' => 'success'], 200);
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

	if ($request->hasFile('img_slide')) {
		$img = $request->file('img_slide');

		if (file_exists($slide->img_slide)) {
			unlink($slide->img_slide);
		}

		$filename = time().'.'.str_slug($img->getClientOriginalName()).'.'.$img->getClientOriginalExtension();

		$img->move(public_path()."/img/banners/", $filename);
		$slide->img_slide = "/img/banners/".$filename;
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
