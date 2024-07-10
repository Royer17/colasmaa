<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Commission extends Model
{
    use SoftDeletes;
    
    protected $table = 'commissions';

    protected $primaryKey = 'id';
    
    protected $fillable = ['title', 'president', 'members', 'published'];
}
