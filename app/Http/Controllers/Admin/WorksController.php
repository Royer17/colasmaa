<?php

namespace App\Http\Controllers\Admin;

// use App\Entities\Category;
// use App\Entities\Content;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\CreateWorksRequest;
use App\Post;
use App\Utils\Helpers;
use App\Works;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use Auth;

class WorksController extends Controller {

	public function get_index(Request $request)
	{

        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-obras')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }


		$categories = DB::table('obras')
			->where('deleted_at', NULL)
			->get(['id', 'titulo']);

		return View::make('admin.works.datatable', compact('categories'));
	}

	public function get_datatable(Request $request)
	{
		$role_id = $request->role_id;

		$result = DB::table('obra')
			->join('obras', 'obra.type', '=', 'obras.id')
			->select('obra.id', 'obras.titulo as type' , 'obra.actividad as activity', 'obra.fechaini as date', 'obra.foto as photo', 'published')
			->where('obra.deleted_at', NULL)
			->orderBy('obra.id','DESC');

		// if ($request->category_id) {
		// 	$result = $result->where('info_informacion.categoria', $categoryId);
		// }

		return DataTables::of($result)
		->escapeColumns('Image', 'Actions')
		->addColumn('Image', function($model)
		{	
			if ($model->date) {
				return Date::parse($model->date)->format('d\/F\/Y');
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

					<button class='btn btn-danger btn-sm solsoConfirm' data-toggle='modal' data-title='Obra' title='Eliminar' value=$model->id OnClick='Eliminar(this);'>
					  <i class='fa fa-trash'></i>
					</button>";

        })->make();
	}

	public function store(CreateWorksRequest $request)
	{
		$data = $request->all();
		$works = new Works();
		$works->fill($data);
		$works->slug = str_slug($data['actividad']);
		$works->localizacion = "";
		$works->plazo = "";
		$works->responsable = "";
		$works->inspector = "";
		$works->descripcion = "";

		$works->foto1 = "";
		$works->foto1_path = "";
		$works->foto2 = "";
		$works->foto2_path = "";
		$works->foto3 = "";
		$works->foto3_path = "";
		$works->foto4 = "";
		$works->foto4_path = "";

		$works->foto = "";
		$works->foto_path = "";

		$now = Carbon::now();
		$works->fechaini = NULL;
		if ($request->fechaini) {
			$works->fechaini = Carbon::createFromFormat('d/m/Y', $request->fechaini)->format('Y-m-d');
		}

		$works->fechater = NULL;
		if ($request->fechater) {
			$works->fechater = Carbon::createFromFormat('d/m/Y', $request->fechater)->format('Y-m-d');
		}

		if ($request->hasFile('foto')) {
			$img = $request->file('foto');

			$filename = time().'00a.'.str_slug($img->getClientOriginalExtension());
			//$img->move(public_path('img/obras'), $filename);
			$img->move(public_path(). "/img/obras", $filename);
			$works->foto = "/img/obras/".$filename;

		}

		if ($request->hasFile('foto1')) {
			$img1 = $request->file('foto1');

			$filename1 = time().'11b.'.str_slug($img1->getClientOriginalExtension());
			//$img1->move(public_path('img/obras'), $filename1);
			$img1->move(public_path(). "/img/obras", $filename1);

			$works->foto1 = "/img/obras/".$filename1;

		}

		if ($request->hasFile('foto2')) {
			$img2 = $request->file('foto2');

  			$filename2 = time().'22c.'.str_slug($img2->getClientOriginalExtension());
			//$img2->move(public_path('img/obras'), $filename2);
			$img2->move(public_path(). "/img/obras", $filename2);
			$works->foto2 = "/img/obras/".$filename2;
		}

		$works->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se he creado correctamente la obra', 'symbol' => 'success'], 200);
	}

	public function show($id)
	{
		$works = DB::table('obra')->where('id', $id)
			->first();

		$works->fechaini_formatted = Carbon::createFromFormat('Y-m-d', $works->fechaini)->format('d/m/Y');

		$works->fechater_formatted = Carbon::createFromFormat('Y-m-d', $works->fechater)->format('d/m/Y');

		return response()->json($works);	
	}

 public function update($id, CreateWorksRequest $request)
 {
 	$data = $request->all();
 	$works = works::find($id);
 	
 	$works->fill($data);
	$works->slug = str_slug($data['actividad']);

	if ($request->hasFile('foto')) {
		$img = $request->file('foto');

		if (file_exists($works->foto)) {
			unlink($works->foto);
		}

		$filename = time().'00a.'.str_slug($img->getClientOriginalExtension());
		//$img->move(public_path('img/obras'), $filename);
		$img->move(public_path(). "/img/obras", $filename);

		$works->foto = "/img/obras/".$filename;

	}

	if ($request->hasFile('foto1')) {
			$img = $request->file('foto1');

			if (file_exists($works->foto1)) {
				unlink($works->foto1);
			}

		$filename = time().'11b.'.str_slug($img->getClientOriginalExtension());
		//$img->move(public_path('img/obras'), $filename);
		$img->move(public_path(). "/img/obras", $filename);
		$works->foto1 = "/img/obras/".$filename;

	}

	if ($request->hasFile('foto2')) {
		$img = $request->file('foto2');

 		if (file_exists($works->foto2)) {
			unlink($works->foto2);
		}

		$filename = time().'22c.'.str_slug($img->getClientOriginalExtension());
		//$img->move(public_path('img/obras'), $filename);
		$img->move(public_path(). "/img/obras", $filename);
		$works->foto2 = "/img/obras/".$filename;

	}
	
	$works->fechaini = NULL;
	if ($request->fechaini) {
		$works->fechaini = Carbon::createFromFormat('d/m/Y', $request->fechaini)->format('Y-m-d');
	}

	$works->fechater = NULL;
	if ($request->fechater) {
		$works->fechater = Carbon::createFromFormat('d/m/Y', $request->fechater)->format('Y-m-d');
	}

	$works->save();

	return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente la obra', 'symbol' => 'success'], 200);
}

	public function delete($id)
	{
		$works = Works::where('id', $id)->first();

		if (file_exists($works->foto)) {
			unlink($works->foto);
		}

		if (file_exists($works->foto1)) {
			unlink($works->foto1);
		}

		if (file_exists($works->foto2)) {
			unlink($works->foto2);
		}

		$works->delete();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente la obra', 'symbol' => 'success'], 200);
		
	}
}
