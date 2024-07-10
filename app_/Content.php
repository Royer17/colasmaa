<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;
    
    protected $table = 'contents';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['title', 'url', 'model_type', 'model_id', 'type'];
}
