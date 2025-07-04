<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $stauts = $this->faker->randomElement(['B', 'P', 'V']);

        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(100, 20000),
            'status' => $stauts,
            'bill_date' => $this->faker->dateTimeThisDecade(),
            'paid_date' => $stauts == 'P' ? $this->faker->dateTimeThisDecade() : null
        ];
    }
}
