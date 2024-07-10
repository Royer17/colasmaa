<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateMwConvocaRequest;
use App\MwConvoca;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Storage;
use Auth;

class MwConvocaController extends Controller {

	public function get_index(Request $request)
	{
        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-convocatorias')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }

		return View::make('admin.convocatorias.datatable');
	}

	public function get_datatable(Request $request)
	{
		$role_id = $request->role_id;

		$result = DB::table('mw_convoca')
			->select('idnoti', 'fecha', 'unidad', 'bases' ,'resultados', 'aptos', 'published')
			->where('deleted_at', NULL);
			//->orderBy('idnoti','ASC');

		return DataTables::of($result)
		->escapeColumns('Image', 'Actions')
		->addColumn('Image', function($model)
		{	
			if ($model->fecha) {
				return Date::parse($model->fecha)->format('d \ F \ Y');
			}	
			return "";
		})
		->addColumn('Actions', function($model) use ($role_id)
        {

        	if ($role_id == 3) {

				return "
							<button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->idnoti OnClick='Editar(this);'>
							<i class='fa fa-edit'></i>
							</button>";
        	}

			return "
					<button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->idnoti OnClick='Editar(this);'>
					<i class='fa fa-edit'></i>
					</button>

					<button class='btn btn-danger btn-sm solsoConfirm' data-toggle='modal' data-title='Slider' title='Eliminar' value=$model->idnoti OnClick='Eliminar(this);'>
					  <i class='fa fa-trash'></i>
					</button>";

        })->make();
	}

	public function store(CreateMwConvocaRequest $request)
	{

		$data = $request->except(['bases', 'resultados', 'aptos']);
		$data['fecha'] = Carbon::createFromFormat('d/m/Y', $data['fecha'])->format('Y-m-d');

		$convocatoria = new MwConvoca();
		$convocatoria->fill($data);
		$convocatoria->fechayhora = "";
		$convocatoria->ip = "";
		$convocatoria->fechayhora2 = "";
		$convocatoria->ip2 = "";
		$convocatoria->fechayhora3 = "";
		$convocatoria->ip3 = "";

		$convocatoria->bases = "";
		if ($request->hasFile('bases')) {
			$file1 = $request->file('bases');

			//Storage::disk('google')->put($file1->getClientOriginalName(), fopen($file1, 'r+'));
            //$url = Storage::disk('google')->url($file1->getClientOriginalName());
        	$filename = time().str_slug($file1->getClientOriginalExtension());
        	$file1->move(public_path(). "/files/convocatorias", $filename);
			$convocatoria->bases = "/files/convocatorias/".$filename;
		}

		$convocatoria->resultados = "";
		if ($request->hasFile('resultados')) {
			$file2 = $request->file('resultados');

			//Storage::disk('google')->put($file2->getClientOriginalName(), fopen($file2, 'r+'));
            //$url2 = Storage::disk('google')->url($file2->getClientOriginalName());
        	$filename = time().str_slug($file2->getClientOriginalExtension());
        	$file2->move(public_path(). "/files/convocatorias", $filename);
			$convocatoria->resultados = "/files/convocatorias/".$filename;
		}

		$convocatoria->aptos = "";
		if ($request->hasFile('aptos')) {
			$file3 = $request->file('aptos');

			//Storage::disk('google')->put($file3->getClientOriginalName(), fopen($file3, 'r+'));
            //$url3 = Storage::disk('google')->url($file3->getClientOriginalName());
            $filename = time().str_slug($file3->getClientOriginalExtension());
        	$file3->move(public_path(). "/files/convocatorias", $filename);
			$convocatoria->aptos = "/files/convocatorias/".$filename;
		}

		$convocatoria->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se he creado correctamente', 'symbol' => 'success'], 200);
	}

	public function show($id)
	{
		$convocatoria = DB::table('mw_convoca')->where('idnoti', $id)
			->first();

		$convocatoria->fecha_formatted = Carbon::parse($convocatoria->fecha)->format('d/m/Y');

		return response()->json($convocatoria);	
	}

 public function update($id, CreateMwConvocaRequest $request)
 {
 	$data = $request->except(['bases', 'resultados', 'aptos']);

	$data['fecha'] = Carbon::createFromFormat('d/m/Y', $data['fecha'])->format('Y-m-d');

 	$convocatoria = MwConvoca::find($id);
 		
 	$convocatoria->fill($data);

	if ($request->hasFile('bases')) {
		$file1 = $request->file('bases');

        // if($convocatoria->bases)
        // {
        //     $val = explode('id=', $convocatoria->bases); 
        //     $val = $val[1];
        //     $val = explode('&', $val); 
        //     $val = $val[0];
        //     Storage::disk('google')->delete($val);
        // }

		// Storage::disk('google')->put($file1->getClientOriginalName(), fopen($file1, 'r+'));
        // $url = Storage::disk('google')->url($file1->getClientOriginalName());
		$filename = time().str_slug($file1->getClientOriginalExtension());
        $file1->move(public_path(). "/files/convocatorias", $filename);
		$convocatoria->bases = "/files/convocatorias/".$filename;
	}

	if ($request->hasFile('resultados')) {
		$file2 = $request->file('resultados');

 		if($convocatoria->resultados)
        {
            // $val = explode('id=', $convocatoria->resultados); 
            // $val = $val[1];
            // $val = explode('&', $val); 
            // $val = $val[0];
            // Storage::disk('google')->delete($val);
        }

		// Storage::disk('google')->put($file2->getClientOriginalName(), fopen($file2, 'r+'));
        // $url2 = Storage::disk('google')->url($file2->getClientOriginalName());
		$filename = time().str_slug($file2->getClientOriginalExtension());
        $file2->move(public_path(). "/files/convocatorias", $filename);

		$convocatoria->resultados = "/files/convocatorias/".$filename;
	}

	if ($request->hasFile('aptos')) {
		$file3 = $request->file('aptos');

 		if($convocatoria->aptos)
        {
            // $val = explode('id=', $convocatoria->aptos); 
            // $val = $val[1];
            // $val = explode('&', $val); 
            // $val = $val[0];
            // Storage::disk('google')->delete($val);
        }

		// Storage::disk('google')->put($file3->getClientOriginalName(), fopen($file3, 'r+'));
        // $url3 = Storage::disk('google')->url($file3->getClientOriginalName());
        $filename = time().str_slug($file3->getClientOriginalExtension());
        $file3->move(public_path(). "/files/convocatorias", $filename);
		$convocatoria->aptos = "/files/convocatorias/".$filename;
	}
	$convocatoria->save();

	return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
}

	public function delete($id)
	{
		$convocatoria = MwConvoca::where('idnoti', $id)->first();

		if (file_exists($convocatoria->bases)) {
			unlink($convocatoria->bases);
		}

		if (file_exists($convocatoria->resultados)) {
			unlink($convocatoria->resultados);
		}

		if (file_exists($convocatoria->aptos)) {
			unlink($convocatoria->aptos);
		}

        // if($convocatoria->bases)
        // {
        //     $val = explode('id=', $convocatoria->bases); 
        //     $val = $val[1];
        //     $val = explode('&', $val); 
        //     $val = $val[0];
        //     Storage::disk('google')->delete($val);
        // }

        // if($convocatoria->resultados)
        // {
        //     $val = explode('id=', $convocatoria->resultados); 
        //     $val = $val[1];
        //     $val = explode('&', $val); 
        //     $val = $val[0];
        //     Storage::disk('google')->delete($val);
        // }

        // if($convocatoria->aptos)
        // {
        //     $val = explode('id=', $convocatoria->aptos); 
        //     $val = $val[1];
        //     $val = explode('&', $val); 
        //     $val = $val[0];
        //     Storage::disk('google')->delete($val);
        // }

		$convocatoria->delete();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
		
	}
}
