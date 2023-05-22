<?php

namespace Database\Seeders;

use App\Models\FamilyBackground;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilyBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FamilyBackground::factory()->times(5)->create();
    }
}
