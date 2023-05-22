<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationBackground extends Model
{
    use HasFactory;

    protected $fillable = [
    'personnel_id',
    'acad_level',
    'school_name',
    'course',
    'start_year',
    'end_year',
    'unit_earned',
    'grad_year',
    'acad_honors',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }

}
