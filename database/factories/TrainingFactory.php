<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
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
            'title' => fake() -> text(10),
            'start_date' => fake() -> date(),
            'end_date' => fake() -> date(),
            'hours_no' => rand(1, 1000),
            'ld_type' => fake() -> text(5),
            'sponsor' => fake() -> text(10),
        ];
    }
}
