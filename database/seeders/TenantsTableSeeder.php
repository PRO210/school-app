<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '23882706000120',
            'email' => 'schoolTi@hotmail.com',
            'name' => 'SchoolTi',
            'url' => 'school-Ti',
            'ATO' => 'N° 7658 em 08/10/81',
            'DO' => '1981-10-09',
            'ENDERECO' => 'RUA DOM ADALBERTO SOBRAL',
            'CEP' => '55260-000',
            'ESTADO' => 'PERNAMBUCO',
            'CIDADE' => 'PESQUEIRA',
            'CADASTRO' => 'M-500028',
            'INEP' => '26049716',
        ]);

    }
}

