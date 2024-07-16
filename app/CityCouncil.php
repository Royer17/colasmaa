<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CityCouncil extends Model
{
    use SoftDeletes;
    
    protected $table = 'city_council';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['position', 'name', 'email', 'published', 'commission_id'];
}
