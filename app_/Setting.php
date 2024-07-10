<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    
    protected $table = 'settings';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['major', 'description', 'vision', 'mission', 'address', 'reference', 'web_title', 'email', 'phone', 'schedule_days', 'schedule_hours', 'history'];
}
