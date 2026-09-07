<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class garden extends Model
{
    use HasFactory;
    
        protected $fillable = [
        'plant_classification',
        'plant_quantity',
        'creation_date',
    ];

    public function users()
    {
        return $this->hasMany(user::class);
    }

public function plants()
{
    return $this->belongsToMany(\App\Models\plant::class,'garden_plants','garden_id','plant_id');
}
}

