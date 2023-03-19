<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Buses, Trips, User, Seats};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $this->call([CitiesSeeder::class]);
        User::factory()->create([
            'name' => 'Mariam',
            'email' => 'mariam.wagdy92@gmail.com',
        ]);
        Buses::factory(10)->create();
        Trips::factory(10)->create();
        $this->call([SeatsSeeder::class]);
    }
}
