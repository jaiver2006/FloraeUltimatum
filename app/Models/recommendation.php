<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recommendation extends Model
{
    use HasFactory;

    protected $fillable = [
        'recommendation1',
        'recommendation2',
        'plant_id',
    ];

    public function plant()
    {
        return $this->belongsTo(\App\Models\plant::class);
    }
}
