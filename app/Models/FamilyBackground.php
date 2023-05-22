<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'name',
        'relationship',
        'occupation',
        'employer',
        'business_address'
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class);
    }
}
