<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eligibility extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'title',
        'rating',
        'exam_date',
        'location',
        'license',
        'validity_period',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
