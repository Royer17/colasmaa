<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    
    protected $table = 'permissions';

    protected $primaryKey = 'id';
    
    protected $fillable = [];


    public function user()
    {
        return $this->hasMany('App\PermissionUser', 'permission_id');
    }

    public function role()
    {
        return $this->hasMany('App\RolePermission', 'permission_id');
    }

}
