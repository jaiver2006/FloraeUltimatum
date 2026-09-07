<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class garden_plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'garden_id',
        'plant_id',
    ];

    public function garden()
    {
        return $this->belongsTo(\App\Models\garden::class);
    }

    public function plant()
    {
        return $this->belongsTo(\App\Models\plant::class);
    }
}
