<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Classification;
use App\Models\Solicitation;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class SolicitationController extends Controller
{

    public function __construct(Solicitation $solicitation, Classification $classification, Turma $turma, Aluno $aluno)
    {
        $this->solicitation = $solicitation;
        $this->classification = $classification;
        $this->turma = $turma;
        $this->aluno = $aluno;
    }
    /*
    Lista as transferências dos alunos e alimenta a view
     */
    public function index()
    {
        $solicitations = Solicitation::with(['transferencias', 'classifications', 'turmas'])->get();
        // foreach ($solicitations as $solicitation) {
        //     foreach ($solicitation->transferencias as $key => $aluno) {
        //         echo $solicitation->NOME . " : ";
        //         echo "$aluno->NOME " .  $aluno->pivot->turma_id . " / "  . $aluno->pivot->classification_id . " / " . $aluno->pivot->SOLICITANTE . $aluno->pivot->TRANSFERENCIA_STATUS;
        //         echo "<br>";
        //     }
        // }  "aluno_solicitation.id" => 4

        //dd($solicitations);
        $turmas = Turma::orderByDesc('ANO')->orderBy('TURMA', 'ASC')->get();
        $classifications = Classification::where('ORDEM_I', 'S')->get();
        $title = "Gerenciamento de Transferências";

        return view('solicitation.alunos.index', compact('title', 'solicitations', 'turmas', 'classifications'));
    }
    /*
    Recebe o que vem da index via get para solicitar outra transferência
    */
    public function create($uuid, $id)
    {
        // DB::enableQueryLog(); //dd(DB::getQueryLog());
        $aluno = $this->aluno->where('uuid', $uuid)->get()->first();
        $turma = $this->turma->where('id', $id)->get()->first();
        // $solicitations = Solicitation::with([
        //     'transferencias' => function ($query) use ($uuid) {
        //         $query->where('alunos.uuid', $uuid);
        //     },
        //     'turmas' => function ($query) use ($id) {
        //         $query->where('turma_id', $id);
        //     }
        // ])->get();
        /* Verifica se existe tranferências pendentes */
        $solicitations = DB::table('aluno_solicitation')->where('aluno_id', $aluno->id)->where('turma_id', $id)->where('TRANSFERENCIA_STATUS', 'PENDENTE')->get()->count();

        // $solicitations > 0 ? $disabled = 'disabled' :  $disabled = '';

        $title = 'Solicitações de Transferência';

        return view('solicitation.alunos.create', compact('title', 'aluno', 'solicitations', 'turma'));
    }
    /*
    Recebe os dados do create e envia para o store para gerar um pedido de transferência */
    public function store(Request $request)
    {
        if ($request->botao == 'salvar') {
            $attachTransferencias = $this->solicitation->attachTransferencia($request);
            if ($attachTransferencias) {
                return redirect()->action([SolicitationController::class, 'index'])->with('message', 'Operação Realizada com Sucesso!');
            }
        }
    }
    /*
    Recebe o que vem da index em json e devolve
      */
    public function edit(Request $request)
    {
        foreach ($request->id as $id) {
            $ids = explode('/', $id);
            $uuid_aluno = $ids[0];
            $id_turma = $ids[1];
            $id_aluno = $ids[2];
            $id_classificacao = $ids[3];
            //echo $uuid_aluno . " - " . $id_turma . " / " . $id_aluno . " - " . $id_classificacao;
        }
        $data = DB::table('aluno_solicitation')
            ->join('alunos', 'aluno_solicitation.aluno_id', '=', 'alunos.id')->where('alunos.id', $id_aluno)
            ->join('turmas', 'aluno_solicitation.turma_id', '=', 'turmas.id')->where('turmas.id', $id_turma)
            ->join('classifications', 'aluno_solicitation.classification_id', '=', 'classifications.id')->where('classifications.id', $id_classificacao)
            ->select('alunos.NOME', 'turmas.*', 'classification_id', 'aluno_solicitation.*')
            ->get();
        // dd($data);
        return Response::json($data);
    }

    /*
    Recebe o que vem da index pelo PUT e atualiza os dados da tranferência
      */
    public function update(Request $request)
    {
        $solicitations = $this->solicitation->upTransferencias($request);
        if ($solicitations) {
            return redirect()->route('transferencias.index')->with('message', 'Operações Realizadas com Sucesso!');
        }
    }
    /*
    Recebe o que vem da index pelo GET e deleta a tranferência
      */
    public function delete($uuid)
    {
        $solicitations = $this->solicitation->deleteTransferencias($uuid);
        if ($solicitations) {
            return redirect()->route('transferencias.index')->with('message', 'Operações Realizadas com Sucesso!');
        }
    }
    //
    //
}
