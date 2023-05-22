<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EligibilityFactory extends Factory
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
            'title' => fake()->title(5),
            'rating' => fake()->text(10),
            'exam_date' => fake()-> date(),
            'location' => fake() -> text(10),
            'license' => fake() -> text(5),
            'validity_period' => fake() -> date(),
        ];
    }
}
