<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alunos</title>
    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <link rel="stylesheet" href="{{ url('css/css2.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        .paddingButton {
            border-color: aliceblue;
            padding: 4px !important;
        }

        .table td,
        .table th {
            padding: 4px !important;
        }

        .checkbox {
            display: inline-block;
        }

        svg {
            display: inline;
        }

        #pModal {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }

    </style>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}

    <link rel="stylesheet" href='{{ url('bootstrap-4/css/bootstrap.min.css') }}'>

    <script src='{{ url('js/jquery-3.5.1.js') }}' type="text/javascript"></script>
    <script src='{{ url('bootstrap-4/js/popper.min.js') }}' type="text/javascript"></script>
    <script src='{{ url('bootstrap-4/js/bootstrap.min.js') }}' type="text/javascript"></script>

    <script src="{{ url('js/alunos/index.js') }}"></script>
</head>

<body>

    @include('layouts.navigation')

    @include('includes.alerts')
    {{-- <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('alunos.index') }}" class="active">Alunos</a></li>
   </ol> --}}
    <div class="grid grid-flow-row auto-rows-max md:auto-rows-min m-4">

        <form action="{{ route('alunos.search') }}" method="POST" class="form-inline">
            @csrf
            <h4><b>Alunos :</b> &nbsp;</h4>
            <a href="{{ route('alunos.create') }}" class="btn btn-outline-success "><b>Adicionar</b></a>&nbsp;
            <input type="search" name="filter" placeholder="Procure pelo Nome:" class="form-control"
                value="{{ $filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-outline-dark mx-2 px-4">Filtrar</button>
        </form>
    </div>

    <form action="{{ route('turmas.aluno.edit.bloco') }}" method="POST" class="">
        @csrf

        <div class="grid grid-flow-row auto-rows-max md:auto-rows-min m-4">

            @if ($alunosCont >0)
                <button type='subimit' class='btn btn-outline-info mb-4' id="btEditBloc" disabled title="Marque ao menos uma das caixinha para liberar esse botão."><b>Editar em Bloco</b></button>
            @endif

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 50px !important">
                            @if ($alunosCont >0)
                                <span><input type='checkbox' id="selecionar"></span>
                            @endif
                        </th>
                        <th>Nome</th>
                        <th>NASCIMENTO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alunos as $aluno)
                        <tr>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-success paddingButton"
                                        data-toggle="dropdown">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear-fill"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 0 0-5.86 2.929 2.929 0 0 0 0 5.858z" />
                                        </svg>
                                    </button>

                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('alunos.edit', ['uuid' => $aluno->uuid]) }}"
                                            target='_self' title='Alterar o Cadastro'>
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil "
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" />
                                                <path fill-rule="evenodd"
                                                    d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z" />
                                            </svg><b>&nbsp;&nbsp;&nbsp;&nbsp;Alterar o Cadastro</b>
                                        </a>
                                        <a class="dropdown-item"
                                            href="{{ route('turmas.aluno.show', ['uuid' => $aluno->uuid]) }}"
                                            target='_self' title='Incluir na Turma'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
                                                <path
                                                    d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z" />
                                            </svg>
                                            <span class='glyphicon glyphicon-pencil ' aria-hidden='true'>&nbsp;</span>
                                            <b>Incluir/Retirar Turma</b>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td> &nbsp;<span><input type='checkbox' name='aluno_selecionado[]' class='checkbox'
                                        value='{{ $aluno->uuid }}/{{ $turma->id ?? '' }}'>
                                </span>&nbsp;<span>{{ $aluno->NOME }}</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($aluno->NASCIMENTO)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </form>
    <div class="card-footer">
        @if (isset($filters))
            {!! $alunos->appends($filters)->links() !!}
        @else
            {!! $alunos->links() !!}
        @endif
    </div>
</body>

</html>
