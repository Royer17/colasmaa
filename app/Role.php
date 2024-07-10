<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    
    protected $table = 'roles';

    protected $primaryKey = 'id';
    
    protected $fillable = ['name', 'description', 'slug'];

    public function users() {
        return $this->hasMany('App\User', 'role_id');
    }

    public function permissions() {
        return $this->belongsToMany('App\Permission', 'role_permission', 'role_id', 'permission_id');
    }
}
