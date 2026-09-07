<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicine_name',
        'medicine_type',
        'medicine_description',
        'suggested_dose',
        'instructions',
    ];

    public function treatments()
{
    return $this->belongsToMany(\App\Models\treatment::class,'medication_treatments','medicine_id','treatment_id');
}

}