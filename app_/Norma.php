<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Norma extends Model
{
    use SoftDeletes;
    
    protected $table = 'normas';

    protected $primaryKey = 'idnor';
    
    protected $fillable = ['tipodocu', 'fechaemi', 'numdoc', 'referenc', 'published'];
}
