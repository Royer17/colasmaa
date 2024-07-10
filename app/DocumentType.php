<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentType extends Model
{
    use SoftDeletes;
    
    protected $table = 'document_types';

    protected $primaryKey = 'id';
    
    protected $fillable = ['name', 'slug', 'description'];

    public function normas() {
        return $this->hasMany('App\Norma', 'tipodocu');
    }

}
