<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FamilyBackground>
 */
class FamilyBackgroundFactory extends Factory
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
            'name' => fake() ->name(),
            'relationship' => fake() -> text(10),
            'occupation' => fake() -> text(10),
            'employer' => fake() -> name(),
            'business_address' => fake() -> address(),
        ];
    }
}
