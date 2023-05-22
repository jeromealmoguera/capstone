<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PersonnelSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(FamilyBackgroundSeeder::class);
        $this->call(EducationBackgroundSeeder::class);
        $this->call(EligibilitySeeder::class);
        $this->call(WorkExperienceSeeder::class);
        $this->call(VoluntaryWorkSeeder::class);
        $this->call(TrainingSeeder::class);
    }
}
