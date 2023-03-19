<?php

namespace Database\Seeders;

use App\Models\Buses;
use App\Models\Seats;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($j = 0; $j < 10; $j++) {
            $bus_id = Buses::inRandomOrder()->first()->id;
            $raw = [
                'is_reserved' => false,
                'bus_id' => $bus_id,
            ];
            for ($i = 1; $i <= 12; $i++) {
                $raw['seat_number'] = 's-' . $i;
                Seats::create($raw);
            }
        }
    }
}
