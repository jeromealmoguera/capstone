<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationBackground>
 */
class EducationBackgroundFactory extends Factory
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
            'acad_level' => fake()->text(5),
            'school_name' => fake() -> text(10),
            'course' => fake() -> text(5),
            'start_year' => fake() -> date(),
            'end_year' => fake() -> date(),
            'unit_earned' => rand(1, 10),
            'grad_year' => fake() -> date(),
            'acad_honors' => fake() -> text(5),
        ];
    }
}
