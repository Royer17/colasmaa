<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accountability extends Model
{
    use SoftDeletes;
    
    protected $table = 'accountability';

    protected $primaryKey = 'id';
    
    protected $fillable = ['title', 'description', 'url', 'published', 'slug'];


    public function files()
    {
        return $this->hasMany('App\Content', 'model_id')->whereModelType(1)
            ->whereType(3);
    }

}
