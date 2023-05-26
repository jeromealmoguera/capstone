<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_id',
        'submission_date',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
