<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Free',
            'url' => 'f-r-e-e',
            'price' => 0.00,
            'description' => 'Grátis',
        ]);
        Plan::create([
            'name' => 'Businers',
            'url' => 'b-u-s-i-n-e-r-s',
            'price' => 499.99,
            'description' => 'Plano Empresarial',
        ]);
    }
}
