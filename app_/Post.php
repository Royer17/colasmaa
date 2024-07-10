<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $table = 'info_informacion';

    protected $primaryKey = 'in_id_informacion';

    protected $fillable = ['vc_titulo_informacion', 'vc_resumen_informacion', 'tx_contenido_informacion', 'video', 'published'];
}
