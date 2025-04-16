<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'hostel_id',
        'room_type',
        'price',
        'available',
        'description',
        'image',
    ];
    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'room_facility');
    }
}
