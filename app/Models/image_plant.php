<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_plant extends Model
{
    use HasFactory;
    protected $guarded = [
        'urlFoto'
    ];

    public function plants()
    {
        return $this->hasOne(\App\Models\plant::class);
    }
}
