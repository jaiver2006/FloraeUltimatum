<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medication_treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'applied_dose',
        'treatment_id',
        'medicine_id',
    ];

    public function treatment()
    {
        return $this->belongsTo(\App\Models\treatment::class);
    }

    public function medicine()
    {
        return $this->belongsTo(\App\Models\medicine::class);
    }
}
