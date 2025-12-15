<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Commission;

class CityCouncil extends Model
{
    use SoftDeletes;
    
    protected $table = 'city_council';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['position', 'name', 'email', 'published', 'commission_id', 'icon'];

    public function commission()
    {
        return $this->belongsTo(Commission::class, 'commission_id', 'id');
    }
}
