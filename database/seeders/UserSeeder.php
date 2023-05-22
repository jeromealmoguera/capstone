<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 20 regular users
        $regularUsers = User::factory()->times(20)->create();

        // Create the admin user
        $adminUser = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        // Assign the 'admin' role to the admin user
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $adminUser->assignRole($adminRole);
        }

        // Assign the 'user' role to the regular users
        $userRole = Role::where('name', 'user')->first();
        if ($userRole) {
            foreach ($regularUsers as $user) {
                $user->assignRole($userRole);
            }
        }
    }
}
