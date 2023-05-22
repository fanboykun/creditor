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
            'amount' => $this->faker->randomFloat(2, 1000000, 100000000),
            'interest' => $this->faker->randomFloat(2, 0, 100),
            'total' => $this->faker->randomFloat(2, 1000000, 100000000),
            'paid' => $this->faker->randomFloat(2, 0, 100000000),
            'remaining' => $this->faker->randomFloat(2, 0, 100000000),
            'status' => $this->faker->boolean,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'note' => $this->faker->text,
        ];
    }
}
