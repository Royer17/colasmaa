<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use SoftDeletes;
    
    protected $table = 'schedule';

    protected $primaryKey = 'id';
    
    protected $fillable = ['subject', 'date', 'type', 'published'];
}
