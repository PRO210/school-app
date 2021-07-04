<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Turma;
use App\Models\Turno;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class TurmaController extends Controller
{
    private $repository, $category, $turno;

    public function __construct(Turma $turma, Category $category, Turno $turno)
    {
        $this->repository = $turma;
    }

    public function index()
    {
        $turmas = $this->repository->latest()->paginate(7);

        $title = 'Turmas';

        return view('turmas.index', compact('turmas', 'title'));
    }

    public function create()
    {
        $categories = Category::all();
        $turnos = Turno::all();
        $title = 'Cadastrar Nova Turma';

        return view('turmas.create', compact(['categories', 'turnos', 'title']));
    }

    public function store(Request $request)
    {
        try {
            $turma = $this->repository->create($request->all());

            return redirect()->route('turmas.index')->with('message', 'Operação Realizada com Sucesso!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Falha na operação!');
        }
    }


    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $turmas = $this->repository->search($request->filter);

        return view('turmas.index', ['turmas' => $turmas, 'filters' => $filters,]);
    }

    public function edit($id)
    {
        $turmas = $this->repository->find($id);
        $turnos = Turno::all();
        $categories = Category::all();
        $title = 'Editando : ' . $turmas->TURMA;

        return view('turmas.edit', compact('turmas', 'categories', 'turnos', 'title'));
    }

    public function update(Request $request, $id)
    {
        if ($request->botao == "excluir") {
            return redirect()->action('TurmaController@delete', ['id' => $id]);
        }

        $turma = $this->repository->where('id', $id)->first();

        $turma->update($request->except('_token', '_method'));

        return redirect()->action([TurmaController::class, 'index'])->with('message', 'Operação Realizada com Sucesso!');
    }

    public function delete($id)
    {
        $turma = $this->repository->with('alunos')->where('id', $id)->first();

        if ($turma->alunos->count() > 0) {
            return redirect()->back()->with('error', 'Existem Alunos vinculados a essa Turma, portanto não permitido Deletar');
        }

        $turma->delete();

        return redirect()->action([TurmaController::class,'index'])->with('message', 'Operação Realizada com Sucesso!');
    }
}
