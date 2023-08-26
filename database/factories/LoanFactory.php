<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'customer_id' => null,
            'amount' => $this->faker->randomFloat(0, 1000000, 100000000),
            'interest' => $this->faker->randomFloat(0, 1, 3),
            'status' => false,
            'start_date' => now(),
            'end_date' => \Carbon\Carbon::now()->addDays(30),
            'note' => $this->faker->text,
        ];
    }
}
