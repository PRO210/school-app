<?php

namespace Database\Seeders;

use App\Models\Solicitation;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class SolicitationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->solicitations()->create(['NOME' => 'TRANSFERENCIA', 'VALIDADE' => '', 'ORDEM_I' => 'S', 'ORDEM_II' => 'N', 'ORDEM_III' => 'N']);
    }
}
