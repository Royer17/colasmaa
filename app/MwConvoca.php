<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MwConvoca extends Model
{
    use SoftDeletes;
    
    protected $table = 'mw_convoca';

    protected $primaryKey = 'idnoti';
    
    protected $fillable = ['unidad', 'fecha', 'referencia', 'published'];
}
