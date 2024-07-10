<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tribute extends Model
{
    use SoftDeletes;
    
    protected $table = 'tributes';

    protected $primaryKey = 'id';
    
    protected $fillable = ['title', 'description'];
}
