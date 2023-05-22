<?php

namespace Database\Seeders;

use App\Models\Eligibility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EligibilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eligibility::factory()->times(5)->create();
    }
}
