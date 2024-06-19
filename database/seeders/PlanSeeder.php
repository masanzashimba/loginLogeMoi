<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'title' => 'Monthly',
            'slug' => 'monthly',
            'stripe_id' => 'price_1PHxsCBuRzcFfsWqlqz8shvT'
        ]);

        Plan::create([
            'title' => 'yearly',
            'slug' => 'yearly',
            'stripe_id' => 'price_1PHxsCBuRzcFfsWqMNY85ivj'
        ]);

        Plan::create([
            'title' => 'life_time',
            'slug' => 'life_time',
            'stripe_id' => 'price_1PHxsCBuRzcFfsWql0XjQkTo'
        ]);
    }
}
