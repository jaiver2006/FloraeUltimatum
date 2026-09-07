<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plant_care extends Model
{
    use HasFactory;

    protected $fillable = [
        'watering',
        'light',
        'temperature',
        'fertilization',
        'plant_id',
    ];

    public function care_records()
    {
        return $this->hasMany(\App\Models\care_record::class);
    }

    public function plant()
    {
        return $this->belongsTo(\App\Models\plant::class);
    }
}
