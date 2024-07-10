<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OperatingLicense extends Model
{
    use SoftDeletes;
    
    protected $table = 'operating_license';

    protected $primaryKey = 'id';
    
    protected $fillable = ['title', 'description'];
}
