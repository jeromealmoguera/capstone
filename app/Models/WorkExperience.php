<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'start_date',
        'end_date',
        'position',
        'department',
        'salary',
        'pay_grade',
        'appointment_status',
        'gov_service',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
