<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->colors()->create(['NOME' => 'BRANCA']);
        $tenant->colors()->create(['NOME' => 'PRETA']);
        $tenant->colors()->create(['NOME' => 'PARDA']);
        $tenant->colors()->create(['NOME' => 'AMARELA']);
        $tenant->colors()->create(['NOME' => 'INDÍGENA']);
        $tenant->colors()->create(['NOME' => 'OUTRAS']);
    }
}
