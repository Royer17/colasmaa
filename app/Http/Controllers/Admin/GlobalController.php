<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GlobalController extends Controller
{
    public function compose(View $view) {

        $user = Auth::user();

        $permissions = DB::table('permission_user')
            ->where('user_id', $user->id)
            ->join('permissions', 'permission_user.permission_id', '=', 'permissions.id')
            ->select(['permissions.slug'])
            ->pluck('permissions.slug')
            ->toArray();

        $view->with('permissions', $permissions);
    }

}
