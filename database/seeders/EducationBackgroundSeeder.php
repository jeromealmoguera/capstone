<?php

namespace Database\Seeders;

use App\Models\EducationBackground;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EducationBackground::factory()->times(5)->create();
    }
}
