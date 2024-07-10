<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use App\Http\Requests\RoleRequest;
use DB;
use Auth;
use Illuminate\Support\Facades\View;
use DataTables;
use App\Permission;

class RoleController extends Controller
{
    public function get_index(Request $request)
    {
        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->where('permissions.slug', 'ver-roles')
            ->get()
            ->toArray();

        if (!count($permissions)) {
            return redirect('/admin/dashboard');
        }
       
        return View::make('admin.roles.datatable');
    }

    public function get_datatable(Request $request)
    {
        $role_id = $request->role_id;
        
        $result = DB::table('roles')
            ->select('id', 'name', 'description')
            ->where('deleted_at', NULL);

        return DataTables::of($result)
		->escapeColumns('Actions')
        ->addColumn('Actions', function($model)
        {
            // if ($role_id == 3) {

            //     return "
            //                 <button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->id OnClick='Editar(this);'>
            //                 <i class='fa fa-edit'></i>
            //                 </button>";
            // }

            return "<button class='btn btn-primary btn-sm solsoShowModal' data-toggle='tooltip' title='Editar' value=$model->id OnClick='Editar(this);'>
                    <i class='fa fa-edit'></i>
                    </button>
                    <button class='btn btn-danger btn-sm solsoConfirm' data-toggle='modal' data-title='Slider' title='Eliminar' value=$model->id OnClick='Eliminar(this);'>
                      <i class='fa fa-trash'></i>
                    </button>
                    <form action='/admin/role/permisos' method='POST' target='_blank'>
                        <input type='hidden' value=$model->id name='role_id'>
                        <button class='btn btn-sm' type='submit'>Permisos</button>
                    </form>";
        })->make();
    }

    public function store(RoleRequest $request)
    {
        $data = $request->except(['id']);
        $data['slug'] = str_slug($data['name']);
        $role = new Role();
        $role->fill($data);
        $role->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado correctamente', 'symbol' => 'success'], 200);
    }

    public function show($id)
    {
        $role = DB::table('roles')->where('id', $id)
            ->first();

        return response()->json($role); 
    }

    public function update($id, RoleRequest $request)
    {
        $data = $request->except(['id']);
        $data['slug'] = str_slug($data['name']);

        $role = Role::find($id);
        $role->fill($data);
        $role->save();

        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente', 'symbol' => 'success'], 200);
    }

    public function delete($id)
    {
        $users_with_this_role = DB::table('users')
            ->where('deleted_at', NULL)
            ->get()->toArray();

        if (count($users_with_this_role)) {
            return response()->json(['title' => 'Advertencia', 'message' => 'Existen usuarios asignados a ese rol.', 'symbol' => 'false'], 400);
        }

        $role = Role::find($id);
        $role->delete();
        return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado correctamente', 'symbol' => 'success'], 200);
       
    }

	public function post_view_permissions(Request $request)
	{	
		$role = Role::find($request->role_id);

		$permission_list = Permission::with(['role' => function($query) use($role) {
			$query->where('role_id', $role->id);
		}])->get();

		// $permission_list = DB::table('permissions')
		// 	->leftJoin('permission_user', 'permissions.id', '=', 'permission_user.permission_id')
		// 	->where('permission_user.user_id', $user->id)
		// 	->select(['permissions.name', 'permissions.id', 'permission_user.user_id'])
		// 	->get();

		return View::make('admin.roles.permissions', compact('permission_list', 'role'));

	}
    
	public function get_view_permissions()
	{
		abord(404);
	}

	public function update_permissions($role_id, Request $request)
	{
		$role = Role::find($role_id);
		$permissions = $request->permissions;
		$role->permissions()->sync($permissions);

        $users_of_this_role = User::whereRoleId($role_id)
            ->get();

        foreach ($users_of_this_role as $key => $user) {
		    $user->permissions()->sync($permissions);
        }

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha actualizado correctamente los permisos', 'symbol' => 'success'], 200);

	}

}
