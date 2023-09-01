<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User, \App\Models\Customer, \App\Models\Loan, \App\Models\Installment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->has(Customer::factory()->count(3)
                ->has(Loan::factory()->count(1)
                ->state(function (array $attributes, Customer $customer) {
                    $total = (int) $attributes['amount'] + (($attributes['amount'] * $attributes['interest']) / 100);
                    return [
                        'user_id' => $customer->user_id,
                        'total' => (int) $total,
                        'remaining' => (int) $total,
                    ];
                })
                )
            )
        ->create();
    }
}
