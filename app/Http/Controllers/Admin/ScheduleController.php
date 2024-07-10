<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateScheduleRequest;
use App\Schedule;
use App\Utils\Helpers;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use Illuminate\Support\Facades\Storage;
use Auth;

class ScheduleController extends Controller {

	public function get_index(Request $request)
	{
        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-agenda')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }

		return View::make('admin.schedule.datatable');
	}

	public function get_datatable(Request $request)
	{
		$role_id = $request->role_id;
		
		$result = DB::table('schedule')
			->select('id', 'date', 'type', 'published')
			->where('deleted_at', NULL);
			//->orderBy('idnoti','ASC');

		return DataTables::of($result)
		->escapeColumns('Image', 'Actions')
		->addColumn('Image', function($model)
		{	
			if ($model->date) {
				return Date::parse($model->date)->format('d \ F \ Y');
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

	public function store(CreateScheduleRequest $request)
	{

		$data = $request->except(['fecha', 'id']);
		$data['date'] = Carbon::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');

		$schedule = new Schedule();
		$schedule->fill($data);

		$schedule->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se he creado correctamente', 'symbol' => 'success'], 200);
	}

	public function show($id)
	{
		$schedule = DB::table('schedule')->where('id', $id)
			->first();

		$schedule->fecha_formatted = Carbon::parse($schedule->date)->format('d/m/Y');

		return response()->json($schedule);	
	}

 public function update($id, CreateScheduleRequest $request)
 {
 	$data = $request->except(['fecha', 'id']);

	$data['date'] = Carbon::createFromFormat('d/m/Y', $request->fecha)->format('Y-m-d');

 	$schedule = Schedule::find($id);
 	$schedule->fill($data);
	$schedule->save();

	return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
}

	public function delete($id)
	{
		$schedule = Schedule::where('id', $id)->first();
		$schedule->delete();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
		
	}

	public function index_for_landing()
	{
		$schedule = DB::table('schedule')
			->select('id', 'type as name', 'subject as description', 'date')
			->where('deleted_at', NULL)
			->get();

		$schedule_arr = [];

		foreach ($schedule as $key => $sh) {
			$schedule_arr[] = array(
				'id' => $sh->id,
				'name' => $sh->name,
				'description' => $sh->description,
				'date' => $sh->date,
				'type' => 'birthday',
				'everyYear' => false,
			);
		}

			//->orderBy('idnoti','ASC');
		return $schedule_arr;
	}
}
