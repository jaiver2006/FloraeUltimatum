<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity_historie extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_description',
        'registration_date',
        'garden_plant_id',
    ];

    public function garden_plant()
    {
        return $this->belongsTo(\App\Models\garden_plant::class);
    }
}
