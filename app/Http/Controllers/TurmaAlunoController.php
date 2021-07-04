<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Classification;
use App\Models\Solicitation;
use App\Models\Turma;

// use Illuminate\Support\Facades\DB;

class TurmaAlunoController extends Controller
{
    private $aluno, $turma, $classification;

    public function __construct(Turma $turma, Aluno $aluno, Classification $classification, Solicitation $solicitation)
    {
        $this->turma = $turma;
        $this->aluno = $aluno;
        $this->classification = $classification;
        $this->solicitation = $solicitation;
        // $this->alunoTurma = $alunoTurma;
    }

    public function index()
    {
        $alunoTurmas = $this->aluno->correntTurmas();

        $classifications = $this->classification->get();

        return view('turmas.alunos.index', compact('alunoTurmas', 'classifications'));
    }

    // DB::enableQueryLog();
    // dd(DB::getQueryLog());

    public function show($uuid)
    {
        $alunoTurmas = $this->aluno->with(['turmas'])->where('uuid', $uuid)->get();

        $aluno = $this->aluno->where('uuid', $uuid)->first();

        $turmas = $aluno->turmasAvailable();

        $classificacoes = $this->classification->where('ORDEM_I', 'S')->get();
        $classifications = Classification::where('ORDEM_II', 'S')->get();

        return view('turmas.alunos.show', compact('turmas', 'alunoTurmas', 'aluno', 'classificacoes', 'classifications'));
    }
    /**
     * Lista as turmas em que o aluno está matriculao podendo inserir ou remover o mesmo.
     */
    public function edit(Request $request)
    {

        $alunos = $this->aluno->correntAlunos($request);
        $turmas = Turma::orderByDesc('ANO')->orderBy('TURMA', 'ASC')->get();
        $classificacoes = Classification::all()->where('ORDEM_II', 'S');
        $marcar = "";
        return view('turmas.alunos.edit', compact('alunos', 'marcar', 'turmas', 'classificacoes'));
    }
    /**
     * Atualiza os vínculos das turmas e alunos em Bloco(vários)
     */
    public function update(Request $request)
    {
        if ($request->botao == "transferencias") {

            $attachTransferencias = $this->solicitation->attachTransferencias($request);
            if ($attachTransferencias) {
                return redirect()->action([SolicitationController::class, 'index'])->with('message', 'Operação Realizada com Sucesso!');
            }
        }
        $update = $this->aluno->updateAttach($request);
        if ($update) {
            return redirect()->action([TurmaAlunoController::class, 'index'])->with('message', 'Operação Realizada com Sucesso!');
        }
    }
    /**
     * Atualiza os vínculos das turmas e alunos
     */
    public function attachTurmasAluno(Request $request, $uuid)
    {
        $aluno = $this->aluno->where('uuid', $uuid)->first();

        if ($request->salvar == "salvar") {
            $attach = $this->aluno->attach($request, $aluno);
            if ($attach) {
                return redirect()->action([TurmaAlunoController::class, 'show'], ['uuid' => $uuid])->with('message', 'Operação Realizada com Sucesso!');
            } else {
                return redirect()->back()->with('error', 'Falha nas operações!');
            }
        } else {
            $detach = $this->aluno->detach($request, $aluno);
            if ($detach) {
                return redirect()->action([TurmaAlunoController::class, 'show'], ['uuid' => $uuid])->with('message', 'Operação Realizada com Sucesso!');
            } else {
                return redirect()->back()->with('error', 'Falha nas operações!');
            }
            // return redirect()->route('turmas.aluno.show', [$uuid])->with('message', 'Operação Realizada com Sucesso!');
        }
    }
    /*
    * Exporta o PDF da matricula do aluno
         */
    public function PdfMatricula($uuid, $id)
    {

        $aluno = $this->aluno->where('uuid', $uuid)->get()->first();
        $turma = $this->turma->where('id', $id)->get()->first();
        $escola = ['NOME' => 'ESCOLA MUNICIPAL TABELIÃO RAUL GALINDO SOBRINHO', 'INEP' => '26049716', 'CADASTRO' => 'M-500028', 'CNPJ' => '13691.368/0001-95',
            'DO' => '1981-10-08', 'ATO' => 'N° 7658 em 08/10/81', 'DATA_MATRITULA_VALIDA' => '2021-03-31', 'DATA_CENSO' => '2021-05-29',
            'ENDERECO' => 'Rua Dr. Francisco Simões,S/N,Centro', 'CIDADE' => '5071', 'ESTADO' => '16', 'CEP' => '552600-00', 'EMAIL' => 'tabeliaoraul2017@gmail.com'];

        // $pdf::Image(URL::to("src/images/timbreCDDOC.png"),10,6,30)

        include 'alunoPdfMatricula.php';
    }
    //
    //
}
