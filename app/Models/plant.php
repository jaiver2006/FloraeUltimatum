<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'common_name',
        'common2_name',
        'common3_name',
        'common4_name',
        'scientific_name',
        'plant_description',
        'origin',
        'type',
        'size',
        'image_plant_id',
    ];

    public function gardens()
    {
        return $this->belongsToMany(\App\Models\garden::class);
    }

    public function plagues()
    {
        return $this->belongsToMany(\App\Models\plague::class, 'pest_plants', 'plant_id', 'plague_id');
    }

    public function care_records()
    {
        return $this->hasMany(\App\Models\care_record::class);
    }

    public function recommendations()
    {
        return $this->hasMany(\App\Models\recommendation::class);
    }

    public function warnings()
    {
        return $this->hasMany(\App\Models\warning::class);
    }

    public function image_plant()
    {
        return $this->belongsTo(\App\Models\image_plant::class, 'image_plant_id');
    }
}
