<?php

namespace Workbench\Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Workbench\App\Models\User;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Liquid Glass Admin',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        if (User::count() <= 1) {
            User::factory()->count(20)->create();
            User::factory()->unverified()->count(6)->create();
        }
    }
}
