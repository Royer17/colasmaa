<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Support\Facades\View;
use App\Permission;

class AtencionController extends Controller
{
    public function get_index(Request $request)
    {
        $user = Auth::user();

        // $permissions = DB::table('permission_user')
        //     ->where('user_id', $user->id)
        //     ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
        //     ->select(['permissions.slug'])
        //     ->where('permissions.slug', 'ver-roles')
        //     ->get()
        //     ->toArray();

        // if (!count($permissions)) {
        //     return redirect('/admin/dashboard');
        // }
       
        return View::make('admin.atencion.index');
    }

}
