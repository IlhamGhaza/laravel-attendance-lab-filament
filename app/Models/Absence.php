<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Absence extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'absences';
    protected $fillable = [
        'user_detail_id',
        'date',
        'reason',
        'reason',
        'proof_document',
        'status',
        'reviewed_by',
    ];
      public function userDetail()
    {
        return $this->belongsTo(UserDetail::class, 'user_detail_id');
    }

    public function reviewedBy()
    {
        return $this->belongsTo(UserDetail::class, 'reviewed_by');
    }
}
