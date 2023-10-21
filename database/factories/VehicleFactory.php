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
            'plate_number' => $this->faker->unique()->randomNumber(6),
            'imei' => $this->faker->unique()->randomNumber(6),
            'vin' => $this->faker->unique()->randomNumber(6),
            'year' => $this->faker->year(),
            'license' => $this->faker->unique()->randomNumber(6),
        ];
    }
}
