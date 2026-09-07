<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_plague extends Model
{
    use HasFactory;
    protected $guarded = [
        'urlFoto'
    ];
    public function plague()
    {
        return $this->hasMany(\App\Models\plague::class, 'image_plague_id');
    }
}
