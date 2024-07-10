<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{

    use SoftDeletes;

    protected $table = 'services';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['title', 'description', 'published', 'order', 'url'];
}
