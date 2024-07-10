<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Popup extends Model
{
    use SoftDeletes;

    protected $table = 'popup';

    protected $primaryKey = 'id';

    protected $fillable = ['enlace', 'visible', 'finished_at', 'published'];
}
