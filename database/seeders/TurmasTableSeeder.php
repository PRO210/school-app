<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\Turma;
use Illuminate\Database\Seeder;

class TurmasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

         $tenant->classes()->create([
            'TURMA' => '1 ANO', 'TURMA_EXTRA' => 'NAO', 'CATEGORIA' => '1 GRAU', 'TURNO' => 'MATUTINO', 'UNICO' => 'A',
            'TURMA_STATUS' => 'ATIVA', 'ANO' => '2021-02-05', 'TURMA_IDADE_MINIMA' => '6'
        ]);
         $tenant->classes()->create([
            'TURMA' => '1 ANO', 'TURMA_EXTRA' => 'NAO', 'CATEGORIA' => '1 GRAU', 'TURNO' => 'VESPERTINO', 'UNICO' => 'B',
            'TURMA_STATUS' => 'ATIVA', 'ANO' => '2021-02-05', 'TURMA_IDADE_MINIMA' => '6'
        ]);
         $tenant->classes()->create([
            'TURMA' => '2 ANO', 'TURMA_EXTRA' => 'NAO', 'CATEGORIA' => '1 GRAU', 'TURNO' => 'MATUTINO', 'UNICO' => 'A',
            'TURMA_STATUS' => 'ATIVA', 'ANO' => '2021-02-05', 'TURMA_IDADE_MINIMA' => '7'
        ]);
         $tenant->classes()->create([
            'TURMA' => '2 ANO', 'TURMA_EXTRA' => 'NAO', 'CATEGORIA' => '1 GRAU', 'TURNO' => 'VESPERTINO', 'UNICO' => 'B',
            'TURMA_STATUS' => 'ATIVA', 'ANO' => '2021-02-05', 'TURMA_IDADE_MINIMA' => '7'
        ]);
         $tenant->classes()->create([
            'TURMA' => 'CRECHE', 'TURMA_EXTRA' => 'NAO', 'CATEGORIA' => 'INFANTIL', 'TURNO' => 'VESPERTINO', 'UNICO' => 'B',
            'TURMA_STATUS' => 'ATIVA', 'ANO' => '2021-02-05', 'TURMA_IDADE_MINIMA' => '3'
        ]);
         $tenant->classes()->create([
            'TURMA' => 'PRE I', 'TURMA_EXTRA' => 'NAO', 'CATEGORIA' => 'INFANTIL', 'TURNO' => 'VESPERTINO', 'UNICO' => 'B',
            'TURMA_STATUS' => 'ATIVA', 'ANO' => '2021-02-05', 'TURMA_IDADE_MINIMA' => '4'
        ]);
         $tenant->classes()->create([
            'TURMA' => 'PRE II', 'TURMA_EXTRA' => 'NAO', 'CATEGORIA' => 'INFANTIL', 'TURNO' => 'VESPERTINO', 'UNICO' => 'B',
            'TURMA_STATUS' => 'ATIVA', 'ANO' => '2021-02-05', 'TURMA_IDADE_MINIMA' => '5'
        ]);
         $tenant->classes()->create([
            'TURMA' => 'CRECHE', 'TURMA_EXTRA' => 'NAO', 'CATEGORIA' => 'INFANTIL', 'TURNO' => 'MATUTINO', 'UNICO' => 'A',
            'TURMA_STATUS' => 'ATIVA', 'ANO' => '2021-02-05', 'TURMA_IDADE_MINIMA' => '3'
        ]);
         $tenant->classes()->create([
            'TURMA' => 'PRE I', 'TURMA_EXTRA' => 'NAO', 'CATEGORIA' => 'INFANTIL', 'TURNO' => 'MATUTINO', 'UNICO' => 'A',
            'TURMA_STATUS' => 'ATIVA', 'ANO' => '2021-02-05', 'TURMA_IDADE_MINIMA' => '4'
        ]);
         $tenant->classes()->create([
            'TURMA' => 'PRE II', 'TURMA_EXTRA' => 'NAO', 'CATEGORIA' => 'INFANTIL', 'TURNO' => 'MATUTINO', 'UNICO' => 'A',
            'TURMA_STATUS' => 'ATIVA', 'ANO' => '2021-02-05', 'TURMA_IDADE_MINIMA' => '5'
        ]);
    }
}
