<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Personnel>
 */
class PersonnelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->text(10),
            'last_name' => fake()->lastName(),
            'birth_date' => fake()->date(),
            'birth_place' => fake()->address(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'civil_status' => fake()->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'citizenship' => fake()->text(10),
            'blood_type' => fake()->randomElement(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']),
            'height' =>rand(1, 50),
            'weight' =>rand(1, 1000),
            'mobile_no' =>fake()->phoneNumber(11),
            'tel_no' =>fake()->phoneNumber(),
            'home_street' => fake() -> streetAddress(),
            'home_city' => fake()-> city(),
            'home_province' => fake() -> address(),
            'home_zip' => rand(1000, 9000),
            'current_street' => fake() -> streetAddress(),
            'current_city' => fake() -> city(),
            'current_province' => fake() ->address(),
            'current_zip' => rand(1000, 9000),
            'ranks' =>fake()->randomElement( ['Patrolman', 'Patrolwoman', 'Police Corporal', 'Police Staff Sergeant', 'Police Master Sergeant', 'Police Senior Master Sergeant', 'Police Chief Master Sergeant', 'Police Executive Master Sergeant', 'Police Lieutenant','Police Captain', 'Police Lieutenant Colonel', 'Police Colonel', 'Police Brigadier General', 'Police Major General', 'Police Lieutenant General', 'Police General']),
            'unit' => 'Region 3 Police Office',
            'sub_unit' => 'Pampanga Provincial Police Office',
            'station' => 'Apalit Municipal Police Station',
            'designation' => fake()->text(10),
            'status'=>fake()->randomElement(['Active', 'Inactive']),
            'user_id' =>rand(1, 20),
        ];
    }
}
