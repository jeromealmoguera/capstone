<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'personnel_id',
        'file_name',
        'document_type',
        'issued_date',
        'file_path'
    ];

    protected $casts = [
        'issued_date' => 'date'
    ];

    public function personnel() 
    {
        return $this->belongsTo(Personnel::class);
    }
}
