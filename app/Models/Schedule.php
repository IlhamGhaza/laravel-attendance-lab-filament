<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory,SoftDeletes;
    protected $tables = 'schedules';
    protected $fillable = [
        'user_detail_id',
        'room_id',
        'subject_id',
        'department_id',
        'day_of_week',
        'shift_id',
        'start_time',
        'end_time',
    ];
    public function userDetail()
    {
        return $this->belongsTo(UserDetail::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
