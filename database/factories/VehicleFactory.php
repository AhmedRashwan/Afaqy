<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'plate_number' => $this->faker->randomNumber(6),
            'imei' => $this->faker->randomNumber(6),
            'vin' => $this->faker->randomNumber(6),
            'year' => $this->faker->randomNumber(4),
            'license' => $this->faker->randomNumber(6),
        ];
    }
}
