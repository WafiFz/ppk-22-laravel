<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sampah extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = [
        'id',
        'name',
        'phone_number',
        'address',
        'address_notes',
        'sampah_category',
        'schedule_pickup',
        'status',
        'status_description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
