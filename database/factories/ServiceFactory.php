<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // ['vehicle_id', 'start_date', 'end_date', 'invoice_number', 'purchase_order_number', 'status', 'discount', 'tax', 'total']
        return [
            'vehicle_id' => Vehicle::factory(),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'invoice_number' => $this->faker->randomNumber(6),
            'purchase_order_number' => $this->faker->randomNumber(6),
            'status' => 'open',
            'discount' => $this->faker->randomFloat(2, 0, 100),
            'tax' => $this->faker->randomFloat(2, 0, 100),
            'total' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
