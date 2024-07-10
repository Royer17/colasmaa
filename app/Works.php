<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Works extends Model
{
    use SoftDeletes;
    
    protected $table = 'obra';

    protected $primaryKey = 'id';

    protected $fillable = ['type', 'fechaini', 'actividad', 'programa', 'published'];

    /**
     * Works belongs to .
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
    	// belongsTo(RelatedModel, foreignKey = _id, keyOnRelatedModel = id)
    	return $this->belongsTo(WorksCategory::class, 'type', 'id');
    }


}
