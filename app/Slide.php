<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    use SoftDeletes;

    protected $table = 'slide';

    protected $primaryKey = 'id_slide';

    protected $fillable = ['titulo_slide', 'published'];
}
