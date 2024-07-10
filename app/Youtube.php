<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Youtube extends Model
{
    use SoftDeletes;
    
    protected $table = 'youtube';

    protected $primaryKey = 'id';
    
    protected $fillable = ['video', 'titulo', 'published'];
}
