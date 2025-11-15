<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
     protected $fillable = [
        'user_id',
        'phoneNumber',
        'houseNumber',
        'numberOfResidents',    
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
