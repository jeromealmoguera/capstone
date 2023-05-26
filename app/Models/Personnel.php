<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'birth_place',
        'gender',
        'civil_status',
        'citizenship',
        'blood_type',
        'height',
        'weight',
        'mobile_no',
        'tel_no',
        'home_street',
        'home_city',
        'home_province',
        'home_zip',
        'current_street',
        'current_city',
        'current_province',
        'current_zip',
        'ranks',
        'unit',
        'sub_unit',
        'station',
        'designation',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents(){

        return $this->hasMany(Document::class);
    }

    public function familyBackgrounds()
    {
        return $this->hasMany(FamilyBackground::class);
    }

    public function educationBackgrounds() {
        return $this->hasMany(EducationBackground::class);
    }

    public function eligibilities() {
        return $this->hasMany(Eligibility::class);
    }

    public function workExperiences() {
        return $this->hasMany(WorkExperience::class);
    }

    public function voluntaryWorks() {
        return $this->hasMany(VoluntaryWork::class);
    }

    public function trainings() {
        return $this->hasMany(Training::class);
    }
}
