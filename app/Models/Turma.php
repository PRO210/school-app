<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use TenantTrait;

    protected $fillable = ['TURMA', 'TURMA_EXTRA', 'CATEGORIA', 'TURNO', 'UNICO', 'TURMA_STATUS', 'ANO', 'TURMA_IDADE_MINIMA'];

    use HasFactory;

    public function search($filter = null)
    {
        $results = $this->where('TURMA', 'LIKE', "%{$filter}%")
            ->paginate(7);

        return $results;
    }
    /*
     Traz os alunos cadastrados na turma
    */
    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_turma')->withPivot([
            'OUVINTE', 'classification_id', 'turma_id', 'aluno_id',
            'DECLARACAO', 'DECLARACAO_DATA', 'DECLARACAO_RESPONSAVEL', 'TRANSFERENCIA', 'TRANSFERENCIA_DATA', 'TRANSFERENCIA_RESPONSAVEL'
        ]);
    }
}
