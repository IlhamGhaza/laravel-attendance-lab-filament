<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lab extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'labs';
    protected $fillable = [
        'lab_name',
        'lab_description',
        'lab_image'
    ];

      public function rooms()
    {
        return $this->hasMany(Room::class, 'lab_id');
    }
}
