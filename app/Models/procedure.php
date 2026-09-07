<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class procedure extends Model
{
    use HasFactory;

    protected $fillable = [
        'step1',
        'step2',
        'step3',
        'step4',
        'treatment_id',
    ];

    public function treatment()
    {
        return $this->belongsTo(\App\Models\Treatment::class, 'treatment_id', 'id');
    }
}
