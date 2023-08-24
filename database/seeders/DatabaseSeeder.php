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
                ->has(Loan::factory()->count(3)
                ->state(function (array $attributes, Customer $customer) {
                    return ['user_id' => $customer->user_id];
                })
                    // ->has(Installment::factory()->count(3)
                    // ->state(function (array $attributes, Loan $loan) {
                    //     return ['user_id' => $loan->user_id];
                    // })
                    // )
                )
            )
        ->create();
    }
}
