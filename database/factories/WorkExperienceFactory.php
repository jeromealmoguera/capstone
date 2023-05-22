<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkExperience>
 */
class WorkExperienceFactory extends Factory
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
            'start_date' => fake() -> date(),
            'end_date' => fake() -> date(),
            'position' => fake() -> text(10),
            'department' => fake() -> text(10),
            'salary' => rand(1, 100000),
            'pay_grade' => rand(1, 10),
            'appointment_status' => fake() -> text(10),
            'gov_service' => fake() ->text(10),
        ];
    }
}
