<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'title',
        'start_date',
        'end_date',
        'hours_no',
        'ld_type',
        'sponsor',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
