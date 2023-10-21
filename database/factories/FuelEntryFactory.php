<?php

namespace Database\Factories;

use App\Models\FuelEntry;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FuelEntry>
 */
class FuelEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //['vehicle_id', 'entry_date', 'volume', 'cost']
        return [
            'vehicle_id' => Vehicle::factory(),
            'entry_date' => $this->faker->dateTime(),
            'volume' => $this->faker->randomFloat(2, 0, 100),
            'cost' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
