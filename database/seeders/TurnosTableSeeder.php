<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\Turno;
use Illuminate\Database\Seeder;

class TurnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

         $tenant->shifts()->create(['TURNO' => 'MATUTINO']);
         $tenant->shifts()->create(['TURNO' => 'VESPERTINO']);
         $tenant->shifts()->create(['TURNO' => 'NOTURNO']);
         $tenant->shifts()->create(['TURNO' => 'MATUTINO/VESPERTINO']);
         $tenant->shifts()->create(['TURNO' => 'VESPERTINO/NOTURNO']);
         $tenant->shifts()->create(['TURNO' => 'MATUTINO/VESPERTINO/NOTURNO']);
    }
}
