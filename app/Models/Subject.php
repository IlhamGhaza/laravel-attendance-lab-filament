<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'subjects';
    protected $fillable = ['subject_name', 'department_id'];

     public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'subject_id');
    }
}
