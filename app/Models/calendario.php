<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calendario extends Model
{
    use HasFactory;

    protected $fillable = [
        'care_record_id',
        'garden_id',
    ];

    public function care_record()
    {
        return $this->belongsTo(\App\Models\care_record::class);
    }

    public function garden()
    {
        return $this->belongsTo(\App\Models\garden::class);
    }
}

