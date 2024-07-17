<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Permission;
use App\Schedule;
use App\User;
use App\Utils\Helpers;
use Auth;
use Carbon\Carbon;
use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;
use App\Commission;
use App\CityCouncil;

class UserController extends Controller {

	public function get_index(Request $request)
	{
        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-usuarios')
            ->get()
            ->toArray();

        if (!count($permissions)) {
        	return redirect('/admin/dashboard');
        }
        
		if ($user->role_id != 1) {
        	return redirect('/admin/dashboard');
        }

		$roles = DB::table('roles')
			->where('deleted_at', NULL)
			->get(['id', 'name']);

        $ventanillas = Commission::wherePublished(1)
        	->get(['id', 'title']);

        $offices = CityCouncil::wherePublished(1)
            ->get(['id', 'name']);

		return View::make('admin.users.datatable', compact('roles', 'ventanillas', 'offices'));
	}

	public function get_datatable(Request $request)
	{
		//$role_id = Auth::user()->role_id;
		
		//if ($role_id == 1) {
			$result = DB::table('users')
				->join('roles', 'users.role_id', '=', 'roles.id')
				->select('users.id', 'roles.name as role_id', 'users.name', 'users.email')
				->where('users.deleted_at', NULL);
		// } else {
		// 	$result = DB::table('users')
		// 		->select('id', 'role_id', 'name', 'email')
		// 		->where('id', Auth::user()->id)
		// 		->where('deleted_at', NULL);
		// }

		return DataTables::of($result)
		->escapeColumns('Actions')
		->addColumn('Actions', function($model)
        {

			return "
					<button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->id OnClick='Editar(this);'>
					<i class='fa fa-edit'></i>
					</button>

					<button class='btn btn-danger btn-sm solsoConfirm' data-toggle='modal' data-title='Slider' title='Eliminar' value=$model->id OnClick='Eliminar(this);'>
					  <i class='fa fa-trash'></i>
					</button>

					<form action='/admin/usuario/permisos' method='POST' target='_blank'>
						<input type='hidden' value=$model->id name='user_id'>
              			<button class='btn btn-sm' type='submit'>Permisos</button>
            		</form>";

        })->make();
	}

	public function store(CreateUserRequest $request)
	{

		$data = $request->except('password');


		if ($data['office_id'] && $data['ventanilla']) {
			$user_with_this_ventanilla = User::whereOfficeId($data['office_id'])
				->whereVentanilla($data['ventanilla'])
				->get();

			if ($user_with_this_ventanilla) {
				return response()->json(['success' => false, 'message' => 'Ya existe un usuario asignado a esa ventanilla.'], 400);
			}
		}

		$user = new User();
		$user->fill($data);
		$user->active = 0;
		$user->email = $data['username'];
		if ($request->password) {
			$user->password = bcrypt($request->password);
		}		
		// if ($request->hasFile('photo')) {
        //     $file1 = $request->file('photo');
		// 	$filename = time().str_slug($file1->getClientOriginalExtension());
		// 	$file1->move(public_path(). "/img/user", $filename);
		// 	$user->photo = "/img/user/".$filename;
        // }

		$user->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se he creado correctamente', 'symbol' => 'success'], 200);
	}

	public function show($id)
	{
		$user = DB::table('users')->where('id', $id)
			->first();

		return response()->json($user);	
	}

 public function update($id, CreateUserRequest $request)
 {
 	$data = $request->except('password');


	if ($data['office_id'] && $data['ventanilla']) {
		$user_with_this_ventanilla = User::whereOfficeId($data['office_id'])
			->whereVentanilla($data['ventanilla'])
			->where('id', '!=', $id)
			->get();

		if ($user_with_this_ventanilla) {
			return response()->json(['success' => false, 'message' => 'Ya existe un usuario asignado a esa ventanilla.'], 400);
		}
	}

 	$user = User::find($id);
	$user->email = $data['username'];
 	$user->fill($data);

 	if ($request->password) {
		$user->password = bcrypt($request->password);
 	}

 	// if ($request->hasFile('photo')) {
    //     $file1 = $request->file('photo');

    //     if($user->photo)
    //     {
	//  		if (file_exists($user->photo)) {
	// 			unlink($user->photo);
	// 		}
    //     }
        
	// 	$filename = time().str_slug($file1->getClientOriginalExtension());
	// 	$file1->move(public_path(). "/img/user", $filename);
	// 	$user->photo = "/img/user/".$filename;
    // }
	$user->save();

	return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
}

 public function update_profile($id, UpdateUserProfileRequest $request)
 {
 	$data = $request->except('password', 'role_id');

 	$user = User::find($id);
	$user->email = $data['username'];
 	$user->fill($data);

 	if ($request->password) {
		$user->password = bcrypt($request->password);
 	}

 	// if ($request->hasFile('photo')) {
    //     $file1 = $request->file('photo');

    //     if($user->photo)
    //     {
	//  		if (file_exists($user->photo)) {
	// 			unlink($user->photo);
	// 		}
    //     }
        
	// 	$filename = time().str_slug($file1->getClientOriginalExtension());
	// 	$file1->move(public_path(). "/img/user", $filename);
	// 	$user->photo = "/img/user/".$filename;
    // }
	$user->save();

	return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
}


	public function delete($id)
	{
		$user = User::find($id);

		// if($user->photo)
        // {

	 	// 	if (file_exists($user->photo)) {
		// 		unlink($user->photo);
		// 	}
        // }

		$user->delete();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
		
	}

	public function post_view_permissions(Request $request)
	{	
		$user = User::find($request->user_id);

		$permission_list = Permission::with(['user' => function($query) use($user) {
			$query->where('user_id', $user->id);
		}])->get();

		// $permission_list = DB::table('permissions')
		// 	->leftJoin('permission_user', 'permissions.id', '=', 'permission_user.permission_id')
		// 	->where('permission_user.user_id', $user->id)
		// 	->select(['permissions.name', 'permissions.id', 'permission_user.user_id'])
		// 	->get();

		return View::make('admin.users.permissions', compact('permission_list', 'user'));

	}

	public function get_view_permissions()
	{
		abord(404);
	}

	public function update_permissions($user_id, Request $request)
	{

		$user = User::find($user_id);

		$permissions = $request->permissions;

		$user->permissions()->sync($permissions);

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente los permisos', 'symbol' => 'success'], 200);

	}
}
