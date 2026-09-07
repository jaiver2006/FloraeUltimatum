<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plague_symptom extends Model
{
    use HasFactory;

    protected $fillable = [
        'plague_id',
        'symptom_id',
    ];


    public function plague()
    {
        return $this->belongsTo(\App\Models\plague::class);
    }

    public function symptom()
    {
        return $this->belongsTo(\App\Models\symptom::class);
    }
}
