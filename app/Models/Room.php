<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'rooms';
    protected $fillable = [
        'lab_id',
        'code_room',
        'building_room',
        'floor_room',
        'room_name',
        'latitude',
        'longitude',
        'status'
    ];
    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'room_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'room_id');
    }
}
