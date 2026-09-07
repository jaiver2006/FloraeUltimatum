<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class symptom extends Model
{
    use HasFactory;
        protected $fillable = [
        'name',
    ];
    public function plagues()
    {
        return $this->belongsToMany(\App\Models\plague::class,'plague_symptoms','symptom_id','plague_id');
    }
}
