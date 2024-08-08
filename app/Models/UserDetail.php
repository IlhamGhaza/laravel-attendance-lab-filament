<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_details';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'image',
        'date_of_birth',
        'phone',
        'gender',
        'address',
        'position',
    ];
   public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }

    public function reviewedAbsences()
    {
        return $this->hasMany(Absence::class, 'reviewed_by');
    }

}
