<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
    
    protected $table = 'tickets';

    protected $primaryKey = 'id';
    
    protected $fillable = [];

    public function ventanilla()
    {
        return $this->belongsTo('App\Commission', 'ventanilla_id');
    }

}
