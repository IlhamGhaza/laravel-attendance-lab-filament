<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use HasFactory, SoftDeletes;
    protected $tables = 'shifts';
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
    ];
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'shift_id');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'shift_id');
    }
}
