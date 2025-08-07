<?php

namespace Database\Seeders;

use App\Models\Petition;
use App\Models\User;
use Database\Factories\PetitionFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Petition::factory(50)->create();
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call([
        //     CustomerSeeder::class,
        // ]);
    }
}
