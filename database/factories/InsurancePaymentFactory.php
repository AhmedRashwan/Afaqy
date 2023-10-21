<?php

namespace Database\Factories;

use App\Models\InsurancePayment;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<InsurancePayment>
 */
class InsurancePaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(),
            'contract_date' => $this->faker->dateTime(),
            'expiration_date' => $this->faker->dateTime(),
            'amount' => $this->faker->randomFloat(2, 0, 100),
        ];
    }
}
