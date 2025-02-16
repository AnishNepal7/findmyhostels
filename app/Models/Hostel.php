<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    use HasFactory;
   
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
