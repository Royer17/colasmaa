<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LastDocument extends Model
{
    use SoftDeletes;
    
    protected $table = 'last_documents';

    protected $primaryKey = 'id';
    
    protected $fillable = ['title', 'slug', 'acronym', 'published', 'url', 'description'];

    public function files()
    {
        return $this->hasMany('App\Content', 'model_id')->whereModelType(2)
            ->whereType(2);
    }
}
