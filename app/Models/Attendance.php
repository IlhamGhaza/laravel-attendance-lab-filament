<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'attendances';
    protected $fillable = [
        'user_detail_id',
        'room_id',
        'schedule_id',
        'shift_id',
        'date',
        'time_in',
        'time_out',
        'latlon_in',
        'latlon_out',
    ];
     public function userDetail()
    {
        return $this->belongsTo(UserDetail::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
}
