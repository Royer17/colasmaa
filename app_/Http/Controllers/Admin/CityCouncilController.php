<?php

namespace App\Http\Controllers\Admin;

use App\CityCouncil;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCityCouncilRequest;
use App\Schedule;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use Auth;

class CityCouncilController extends Controller {

	public function get_index(Request $request)
	{
        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-concejo-municipal')
            ->get()
            ->toArray();

        if (!count($permissions)) {
        	return redirect('/admin/dashboard');
        }


		return View::make('admin.city_council.datatable');
	}

	public function get_datatable(Request $request)
	{
		$role_id = $request->role_id;
		
		$result = DB::table('city_council')
			->select('id', 'position', 'name', 'email', 'published')
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

	public function store(CreateCityCouncilRequest $request)
	{

		$data = $request->except(['id', 'photo']);

		$city_council = new CityCouncil();
		$city_council->fill($data);
		
		if ($request->hasFile('photo')) {
            $file1 = $request->file('photo');

            //$file_name = $file1->getClientOriginalName().time();
            //Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
            //$url = Storage::disk('google')->url($file_name);
			$filename = time().str_slug($file1->getClientOriginalExtension());
			$file1->move(public_path(). "/img/city_council", $filename);
			$city_council->photo = "/img/city_council/".$filename;
        }

		$city_council->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se he creado correctamente', 'symbol' => 'success'], 200);
	}

	public function show($id)
	{
		$city_council = DB::table('city_council')->where('id', $id)
			->first();

		return response()->json($city_council);	
	}

 public function update($id, CreateCityCouncilRequest $request)
 {
 	$data = $request->except(['id', 'photo']);

 	$city_council = CityCouncil::find($id);
 	$city_council->fill($data);

 	if ($request->hasFile('photo')) {
        $file1 = $request->file('photo');

        if($city_council->photo)
        {
            // $val = explode('id=', $city_council->photo); 
            // $val = $val[1];
            // $val = explode('&', $val); 
            // $val = $val[0];
            // Storage::disk('google')->delete($val);
	 		if (file_exists($city_council->photo)) {
				unlink($city_council->photo);
			}

        }

        //$file_name = $file1->getClientOriginalName().time();

        //Storage::disk('google')->put($file_name, fopen($file1, 'r+'));
        //$url = Storage::disk('google')->url($file_name);
        //$city_council->photo = $url;
		$filename = time().str_slug($file1->getClientOriginalExtension());
		$file1->move(public_path(). "/img/city_council", $filename);
		$city_council->photo = "/img/city_council/".$filename;

    }


	$city_council->save();

	return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
}

	public function delete($id)
	{
		$city_council = CityCouncil::find($id);

		if($city_council->photo)
        {
            // $val = explode('id=', $city_council->photo); 
            // $val = $val[1];
            // $val = explode('&', $val); 
            // $val = $val[0];
            // Storage::disk('google')->delete($val);
	 		if (file_exists($city_council->photo)) {
				unlink($city_council->photo);
			}
        }

		$city_council->delete();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
		
	}
}
