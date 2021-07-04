<?php

namespace Database\Seeders;

use App\Models\Documento;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class DocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->documents()->create(['NOME' => 'NASCIMENTO']);
        $tenant->documents()->create(['NOME' => 'CASAMENTO']);
        $tenant->documents()->create(['NOME' => 'RG']);
        $tenant->documents()->create(['NOME' => 'CPF']);
        $tenant->documents()->create(['NOME' => 'CNH']);
    }
}
