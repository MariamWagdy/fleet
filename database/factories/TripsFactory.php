<?php

namespace Database\Factories;

use App\Models\Buses;
use App\Models\Cities;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TripsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $source_city_id = Cities::inRandomOrder()->first()->id;
        $destination_city_id = Cities::whereNotIn('id', [$source_city_id])->inRandomOrder()->first()->id;

        $departure_time = Carbon::createFromTimestamp(fake()->dateTimeBetween($startDate = '+2 days', $endDate = '+1 week')->getTimeStamp());
        $arrival_time = Carbon::createFromFormat('Y-m-d H:i:s', $departure_time)->addHours(fake()->numberBetween(1, 8));

        return [
            'trip_number' => 't-' . fake()->unique()->numberBetween(1, 999),
            'source_city_id' => $source_city_id,
            'destination_city_id' => $destination_city_id,
            'bus_id' => Buses::inRandomOrder()->first()->id,
            'departure_time' => $departure_time,
            'arrival_time' => $arrival_time,
            'is_available' => true
        ];
    }
}
