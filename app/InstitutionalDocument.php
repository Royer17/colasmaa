<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InstitutionalDocument extends Model
{
    use SoftDeletes;

    protected $table = 'institutional_documents';

    protected $primaryKey = 'id';
    
    protected $fillable = ['title', 'slug', 'acronym', 'published', 'description', 'url'];

    public function files()
    {
        return $this->hasMany('App\Content', 'model_id')->whereModelType(1)
            ->whereType(2);
    }
}
