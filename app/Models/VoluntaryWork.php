<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoluntaryWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'org_name',
        'org_address',
        'start_date',
        'end_date',
        'hours_no',
        'position',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
