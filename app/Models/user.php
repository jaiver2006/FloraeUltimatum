<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'second_name',
        'first_lastname',
        'second_lastname',
        'email',
        'password',
        'role',
        'garden_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function garden()
    {
        return $this->belongsTo(Garden::class);
    }
}
