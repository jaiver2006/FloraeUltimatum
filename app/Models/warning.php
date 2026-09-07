<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warning extends Model
{
    use HasFactory;

    protected $fillable = [
        'warning1',
        'warning2',
        'plant_id',
    ];

    public function plant()
    {
        return $this->belongsTo(\App\Models\plant::class);
    }
}
