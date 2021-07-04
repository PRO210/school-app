<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->categories()->create(['CATEGORIA' => 'INFANTIL']);
        $tenant->categories()->create(['CATEGORIA' => '1 GRAU']);
        $tenant->categories()->create(['CATEGORIA' => '2 GRAU']);
        $tenant->categories()->create(['CATEGORIA' => 'FASE']);

    }
}
