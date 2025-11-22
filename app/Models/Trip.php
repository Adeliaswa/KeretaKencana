<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    // Kolom yang diizinkan untuk diisi (digunakan oleh P3 dan P1)
    protected $fillable = [
        'user_id', 
        'driver_id', 
        'pickup_location', 
        'destination_location', 
        'estimated_distance', 
        'status', 
        'total_cost'
    ];
    
    // Relasi ke Penumpang (User)
    public function passenger()
    {
        // Trip belongs to a User (sebagai Passenger)
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Driver
    public function driver()
    {
        // Trip belongs to a Driver
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}