<?php

namespace Database\Seeders;

use App\Models\VoluntaryWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoluntaryWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VoluntaryWork::factory()->times(5)->create();
    }
}
