<?php

namespace Database\Seeders;

use App\Models\Classification;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class ClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Classification::create(['STATUS' => 'CURSANDO', 'ORDEM_I', 'ORDEM_II', 'ORDEM_III']);
        $tenant = Tenant::first();

        $tenant->classifications()->create(['STATUS' => 'CURSANDO', 'ORDEM_II' => 'S']);
        $tenant->classifications()->create(['STATUS' => 'ADMITIDO_DEPOIS', 'ORDEM_II' => 'S']);
        $tenant->classifications()->create(['STATUS' => 'TRANSFERIDO']);
        $tenant->classifications()->create(['STATUS' => 'DESISTENTE']);
        $tenant->classifications()->create(['STATUS' => 'NAO_RENOVADO']);
        $tenant->classifications()->create(['STATUS' => 'APROVADO']);
        $tenant->classifications()->create(['STATUS' => 'REPROVADO']);
        $tenant->classifications()->create(['STATUS' => 'RECUPERACAO']);
    }
}
