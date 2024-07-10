<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorksCategory extends Model
{
    use SoftDeletes;
    protected $table = 'obras';

    protected $primaryKey = 'id';

    protected $fillable = [];

    /**
     * WorksCategory has many .
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function one_works()
    {
        // hasMany(RelatedModel, foreignKeyOnRelatedModel = worksCategory_id, localKey = id)
        return $this->hasOne(Works::class, 'type', 'id')->orderBy('id', 'DESC');
    }
}
