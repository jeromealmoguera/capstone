<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VoluntaryWork>
 */
class VoluntaryWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'personnel_id' => rand(1, 20),
            'org_name' => fake() -> text(10),
            'org_address' => fake() -> address(),
            'start_date' => fake() -> date(),
            'end_date' => fake() -> date(),
            'hours_no' => rand(1,1000),
            'position' => fake() -> text(10),
        ];
    }
}
