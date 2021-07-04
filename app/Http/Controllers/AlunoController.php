<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Color;
use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    private $repository;

    public function __construct(Aluno $aluno, Documento $documento, Color $colors)
    {
        $this->repository = $aluno;
        // $this->classificacao = $classificacao;
        $this->documento = $documento;
        $this->color = $colors;
    }

    public function index()
    {
        $alunos = $this->repository->latest()->orderBy('NOME', 'ASC')->paginate(8);
        //$alunos = DB::table('alunos')->orderBy('NOME', 'ASC')->paginate(8);
        $alunosCont = $this->repository->all()->count();

        return view('alunos.index', compact('alunos', 'alunosCont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = $this->color->all();

        return view('alunos.create', ['title' => 'Area de Cadastro', 'colors']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $nome = $request->NOME;
            $tokens = explode(' ', $nome);
            $primeiro_nome = '';
            if (count($tokens) > 0) {
                $primeiro_nome = $tokens[0];
            }

            $data = $request->all();
            //Usei o TenantTrait para fazer isso automático
            //$data['tenant_id'] = auth()->user()->tenant_id;
            $data['PRIMEIRO_NOME'] = $primeiro_nome;
            // $data['password'] = bcrypt($data['password']); // encrypt password
            $aluno = $this->repository->create($data);
            return redirect()->route('alunos.index')->with('message', 'Operação Realizada com Sucesso!');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Falha na operação!');
        }
        // return redirect()->action('Alunos\AlunoController@cursando', ['id' => '0'])->with('msg', 'Alterações Salvas com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $aluno = $this->repository->where('uuid', $uuid)->firstOrFail();

        $documentos = $this->documento->all();

        $colors = $this->color->all();

        $title = ' Atualizar : ' . $aluno->PRIMEIRO_NOME;

        return view('alunos.edit', compact('aluno', 'documentos', 'colors', 'title'));
    }

    /*
   Recebe o quem vem do edit
   */
    public function update(Request $request, $uuid)
    {
        try {
            $alunos = $this->repository->where('uuid', $uuid)->firstOrFail();

            $backup = $this->repository->find($alunos->id);

            $alunos->update($request->except('_token', '_method'));

            $backup_update = $this->repository->find($alunos->id);

            $result = array_diff_assoc($backup_update->toArray(), $backup->toArray());
            $campo = "";
            $campo_final = "";

            foreach ($result as $nome_campo => $valor) {
                if ($backup[$nome_campo] == "") {
                    $backup[$nome_campo] = "Vazio";
                }
                if ($valor == "") {
                    $valor = "Vazio";
                }
                $campo .= "$nome_campo = De $backup[$nome_campo] para $valor / ";
            }
            $campo_final = "Alterou o(s) Campo(s) de " . $backup['NOME'] . " em : $campo ";

            $usuario = Auth::user()->id;
            DB::table('aluno_log')->insert(
                ['aluno_id' => $alunos->id, 'ACAO' => 'EDITAR', 'ACAO_DETALHES' => $campo_final, 'user_id' => $usuario,]
            );

            return redirect()->route('alunos.index')->with('message', 'Operações Realizadas com Sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Falha na operação!');
        }
    }



    public function destroy($id)
    {
        //
    }
    //
    //
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $alunosCont = $this->repository->all()->count();

        $alunos = $this->repository->search($request->filter);

        return view('alunos.index', [
            'alunos' => $alunos,
            'filters' => $filters,
            'alunosCont' => $alunosCont
        ]);
    }

    //
    //
}
