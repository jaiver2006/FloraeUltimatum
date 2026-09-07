<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'status',
        'description',
        'plague_id',
    ];

    public function pest_plant()
    {
        return $this->belongsTo(\App\Models\pest_plant::class);
    }

    public function medicines()
    {
        return $this->belongsToMany(\App\Models\medicine::class, 'medication_treatments', 'treatment_id', 'medicine_id');
    }

    public function plague()
    {
        return $this->belongsTo(\App\Models\plague::class);
    }
    public function procedure()
    {
        return $this->HasOne(\App\Models\procedure::class);
    }
}
