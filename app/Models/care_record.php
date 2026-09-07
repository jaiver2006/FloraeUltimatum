<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class care_record extends Model
{
    use HasFactory;

    protected $fillable = [
        'care_date',
        'plant_care_id',
        'plant_id',
    ];

    public function plant_care()
    {
        return $this->belongsTo(\App\Models\plant_care::class);
    }

    public function plant()
    {
        return $this->belongsTo(\App\Models\plant::class);
    }
}
