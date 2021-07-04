<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Solicitation extends Model
{
    // protected $table = 'details_plan';

    use HasFactory;

    protected $fillable = ['NOME', 'TRANSFERENCIA', 'VALIDADE', 'ORDEM_I', 'ORDEM_II', 'ORDEM_III'];

    /*
    Inseri as solcitações de transferências dos alunos  na tabela aluno_solicitation
     */
    public function transferencias()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_solicitation')->withPivot([
            'uuid', 'aluno_id', 'turma_id', 'classification_id', 'TRANSFERENCIA_STATUS', 'SOLICITANTE', 'DATA_SOLICITACAO',
            'TRANSFERENCIA_STATUS', 'DATA_TRANSFERENCIA_STATUS'
        ]);
    }
    //
    public function classifications()
    {
        return $this->belongsToMany(Classification::class,  'aluno_solicitation');
    }
    public function turmas()
    {
        return $this->belongsToMany(Turma::class,  'aluno_solicitation');
    }
    //  Essa função traz o aluno com vinculo em alguma turma/Inseri os alunos pelo que vem do create para o store do SolicitationController
    public function attachTransferencia($request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->aluno_selecionado as $id) {
                $ids = explode('/', $id);
                $turma_id = $ids[1];
                //Recuperando a Turma
                $turma = Turma::findOrFail($turma_id);
                //Atualiza os dados na tabela alunoturma
                $aluno = Aluno::findOrFail($ids[2]);
                $aluno->turmas()->updateExistingPivot($ids[1], ['classification_id' => 3, 'updated_at' => NOW()]);
                /*    Valida a Data */
                if (empty($request->DATA_SOLICITACAO)) {
                    $request->DATA_SOLICITACAO = $data = date('Y-m-d');
                }
                //      Valida o Requerente
                if (empty($request->SOLICITANTE)) {
                    $request->SOLICITANTE = Auth::user()->name;
                }
                //Inserindo da Tabela Pivot AlunoClassificacaos//
                $uuid = Str::uuid();
                $attachTransferencias = Solicitation::findOrFail(1);
                $attachTransferencias->transferencias()
                    ->attach($ids[2], [
                        'uuid' => $uuid, 'turma_id' => $turma_id, 'classification_id' => 3, 'TURMA_ANO' => $turma->ANO, 'SOLICITANTE' => $request->SOLICITANTE,
                        'DATA_SOLICITACAO' => $request->DATA_SOLICITACAO, 'TRANSFERENCIA_STATUS' => 'PENDENTE'
                    ]);
            }
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha nas operações!');
        }
    }
    //  Essa função traz todos os alunos com vinculo em alguma turma/Inseri os alunos pelo que vem do create para o update do TurmaAlunoController
    public function attachTransferencias($request)
    {
        DB::beginTransaction();
        try {
            // DB::enableQueryLog();dd(DB::getQueryLog());
            foreach ($request->aluno_selecionado as $id) {
                $ids = explode('/', $id);
                $turma_id = $ids[1];
                //Recuperando a Turma
                $turma = Turma::findOrFail($turma_id);
                dd($turma);
                //Atualiza os dados na tabela alunoturma
                $aluno = Aluno::findOrFail($ids[2]);
                $aluno->turmas()->updateExistingPivot($ids[1], ['classification_id' => 3, 'updated_at' => NOW()]);
                //O solicitante por enquanto é o usuário logado
                $solicitante = Auth::user()->name;
                //Inserindo da Tabela Pivot AlunoClassificacaos//
                $uuid = Str::uuid();
                $attachTransferencias = Solicitation::findOrFail(1);
                $attachTransferencias->transferencias()
                    ->attach($ids[2], [
                        'uuid' => $uuid, 'turma_id' => $turma_id, 'classification_id' => 3, 'TURMA_ANO' => $turma->ANO, 'SOLICITANTE' => $solicitante, 'DATA_SOLICITACAO' => now(), 'TRANSFERENCIA_STATUS' => 'PENDENTE'
                    ]);
            }
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->back()->with('error', 'Falha nas operações!');
        }
    }
    /*
    Recebe o que vem da index pelo PUT e atualiza os dados da tranferência
    */
    public function upTransferencias($request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->aluno_selecionado as $key => $value) {
                $ids = explode('/', $value);
                $uuid_pivot = $ids[0];
                $id_turma = $ids[1];
                $id_aluno = $ids[2];
                $id_classificacao = $ids[3];
                // Backup da Tabel da Pivot
                $solicitation_backup = DB::table('aluno_solicitation')->where('uuid', $uuid_pivot)->get();;
                //     Limpando os vinculos  da Tabela Pivot
                //         $solicitation_delete = DB::table('aluno_solicitation')->where('aluno_id',$id_aluno)->where('turma_id', $id_turma)->where('aluno_classificacao_id', $id_classificacao)->delete();
                //      Recuperando os dados da Turma
                $turma = Turma::find($id_turma);
                //      Recuperando os dados do Aluno
                $aluno = Aluno::find($id_aluno);
                //      Recuperar o Nome do Status Antigo
                $status_antigo_id = Classification::find($id_classificacao);
                $status_antigo_nome = $status_antigo_id->STATUS;

                $solicitations = DB::table('aluno_solicitation')->where('uuid', $uuid_pivot)
                    ->update([
                        'SOLICITANTE' => $request->SOLICITANTE, 'TRANSFERENCIA_STATUS' => $request->TRANSFERENCIA_STATUS, 'DATA_TRANSFERENCIA_STATUS' => $request->DATA_TRANSFERENCIA_STATUS, 'DECLARACAO' => $request->DECLARACAO,
                        'RESPONSAVEL_DECLARACAO' => $request->RESPONSAVEL_DECLARACAO, 'DATA_DECLARACAO' => $request->DATA_DECLARACAO, 'TRANSFERENCIA' => $request->TRANSFERENCIA, 'TRANSFERENCIA' => $request->TRANSFERENCIA,
                        'RESPONSAVEL_TRANSFERENCIA' => $request->RESPONSAVEL_TRANSFERENCIA, 'DATA_TRANSFERENCIA' => $request->DATA_TRANSFERENCIA, 'REGISTRADO' => $request->REGISTRADO, 'NUMERO' => $request->NUMERO
                    ]);
            }
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', 'Falha na operação!');
        }
    }
    /*
    Recebe o que vem da index pelo GET e deleta a tranferência
      */
    public function deleteTransferencias($uuid)
    {
        DB::beginTransaction();
        try {
            // Backup da Tabel da Pivot
            $solicitation_backup = DB::table('aluno_solicitation')->where('uuid', $uuid)->get();
            foreach ($solicitation_backup as $value) {
                foreach ($value as $key => $solicitation_dados) {
                    if ($key == "aluno_id") {
                        $aluno_id = $solicitation_dados;
                    }
                    if ($key == "turma_id") {
                        $turma_id = $solicitation_dados;
                    }
                    if ($key == "classification_id") {
                        $classification_id = $solicitation_dados;
                    }
                }
            }
            //Limpando os vinculos  da Tabela Pivot
            $solicitation_delete = DB::table('aluno_solicitation')->where('uuid', $uuid)->delete();
            //Recuperando os dados da Turma
            $turma = Turma::find($turma_id);
            //Recuperando a Data do Censo
            // $escola = $this->escola->find(1);
            $data_atual = date('Y-m-d');
            $classification_id = ($data_atual <= '2021-03-30') ? "1" : "2";
            //Recuperando os dados do Aluno e fazendo o update na turma
            $aluno = Aluno::find($aluno_id);
            $aluno->turmas()->updateExistingPivot($turma_id, ['classification_id' => $classification_id, 'updated_at' => NOW()]);
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return redirect()->back()->with('error', 'Falha na operação!');
        }
    }




















    //
    //
}
