<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class ArchivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayPastas = [
            'A', 'A2', 'A3', 'A4', 'A5', 'B', 'B2', 'B3', 'B4', 'B5', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'J2', 'J3', 'J4', 'J5',
            'L', 'M', 'M2', 'M3', 'M4', 'M5', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
        ];

        $tenant = Tenant::first();

        foreach ($arrayPastas as $arrayPasta) {
            $tenant->archives()->create([
                'PASTA' => $arrayPasta,
                'CAPACIDADe' => '30',
                'CHEIA' => 'NAO'
            ]);
        }

    }
}
