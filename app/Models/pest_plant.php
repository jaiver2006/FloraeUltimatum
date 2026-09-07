<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pest_plant extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'pest_status',
        'plant_id',
        'plague_id',
    ];

    public function plague()
    {
        return $this->belongsTo(\App\Models\plague::class);
    }

    public function plant()
    {
        return $this->belongsTo(\App\Models\plant::class);
    }

    public function treatments()
    {
        return $this->hasMany(\App\Models\treatment::class);
    }
}
