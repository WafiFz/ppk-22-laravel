<?php

namespace App\Models;

use App\Models\Sampah;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // public $incrementing = false;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone_number',
        'profile_picture',
        'rt',
        'rw',
        'region'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // One to Many
    public function sampah()
    {
        return $this->hasMany(Sampah::class);
    }
}
