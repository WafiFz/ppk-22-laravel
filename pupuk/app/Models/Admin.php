<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticable
{
    use HasFactory, HasApiTokens, Notifiable;
    // public $incrementing = false;
    protected $guard = 'admin';
    protected $fillable = [
        'id',
        'name',
        'username',
        'password',
        'phone_number',
        'profile_picture',
    ];
}
