@extends('layouts.app')

@section('content')

    <style>
        .paddingButton {
            border-color: aliceblue;
            padding: 0px;
        }

        .table td,
        .table th {
            padding: 8px;
        }

        .checkbox {
            display: inline-block;
        }

    </style>

    <ol class="breadcrumb">
        <button class="btn btn-warning btVer mx-2" type="button" id="1" value="turmas">Turmas</button>
        <button class="btn btn-success btVer mx-2" type="button" id="2" value="transferencias">Transferências</button>

        <form action="{{ route('turmas.aluno.update.bloco') }}" method="POST" class="form form-inline">
            @csrf
    </ol>
    <div class="card">
        <div class="card-header">
            <!-- <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}"> -->
            <!-- <button class="btn btn-warning" value="turmas">Turmas</button> -->
        </div>

        <div class="card-body">
            <div class="row justify-content-center divTurmas " id="turmas" style="display: none">
                <fieldset class="col-sm-12 col-md-12 px-6 ">
                    <legend>
                        <select name="turma_id" id="" class="form-control ">
                            @foreach ($turmas as $turma)
                                <option value="{{ $turma->id }}">
                                    {{ $turma->TURMA }} {{ $turma->UNICO }} ({{ $turma->TURNO }}) -
                                    {{ \Carbon\Carbon::parse($turma->ANO)->format('Y') }}
                                </option>
                            @endforeach
                        </select>
                    </legend>
                    <div class="row">
                        <label for="" class="col-sm-2 control-label">Ouvinte:</label>
                        <div class="col-sm-4">
                            <select name="OUVINTE" id="" class=" form-control">
                                <option value="NAO" selected>NÃO</option>
                                <option value="SIM">SIM</option>
                            </select>
                        </div>
                        <label for="" class="col-sm-2 control-label">Status:</label>
                        <div class="col-sm-4">
                            <select name="classification_id" id="" class=" form-control">
                                @foreach ($classificacoes as $classificacao)
                                    <option value="{{ $classificacao->id }}">{{ $classificacao->STATUS }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for="" class="col-sm-2 control-label">Declaração:</label>
                        <div class="col-sm-4">
                            <select name="DECLARACAO" id="turmasDecl" class=" form-control">
                                <option value="NAO" selected>NÃO</option>
                                <option value="SIM">SIM</option>
                            </select>
                        </div>
                        <label for="" class="col-sm-2 control-label turmasDecl">Data:</label>
                        <div class="col-sm-4">
                            <input type="date" name="DECLARACAO_DATA"  class="form-control turmasDecl">
                        </div>

                    </div>
                    <br>
                    <div class="row turmasDecl">
                        <label for="" class="col-sm-2 control-label">Responsável:</label>
                        <div class="col-sm-10">
                            <input type="text" name="DECLARACAO_RESPONSAVEL" class=" form-control" placeholder="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for="" class="col-sm-2 control-label">Transferência:</label>
                        <div class="col-sm-4">
                            <select name="TRANSFERENCIA" id="turmasTransf" class=" form-control">
                                <option value="NAO" selected>NÃO</option>
                                <option value="SIM">SIM</option>
                            </select>
                        </div>
                        <label for="" class="col-sm-2 control-label turmasTransf">Data:</label>
                        <div class="col-sm-4 turmasTransf">
                            <input type="date" name="TRANSFERENCIA_DATA" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row turmasTransf">
                        <label for="" class="col-sm-2 control-label">Responsável:</label>
                        <div class="col-sm-10">
                            <input type="text" name="TRANSFERENCIA_RESPONSAVEL" class=" form-control" placeholder="">
                        </div>
                    </div>
                    <br>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm">
                                <button type="submit" name="salvar" value="salvar"
                                    class="btn btn-outline-warning btn-block " onclick=" return confirmar() "
                                    title="Selecione ao menos uma turma">
                                    <b>Adicionar / Salvar</b>
                                </button>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <br>
            <div class="row justify-content-center divTurmas" id="transferencias" style="display: none;">
                <fieldset class="col-sm-12 col-md-12 px-6 transferecias rounded border-green-600 pb-3">
                    <legend class="bg-white border-green-600 rounded font-weight-bold w-auto text-black">
                        Solicitações de Transferências
                    </legend>
                    <div class="row">
                        <label for="" class="col-sm-2 control-label text-right font-weight-bold">Transferir:</label>
                        <div class="col-sm-4">
                            <button class="btn btn-outline-success acoes mx-2" type="submit" onclick="return confirmar()"
                                value="transferencias" name="botao">
                                Salvar as Mudanças
                            </button>
                        </div>
                    </div>
                </fieldset>
            </div>
            <br>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>NASCIMENTO</th>
                        <th>TURMA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alunos as $aluno)
                        @foreach ($aluno->turmas as $Key => $turma)
                        @endforeach
                        <tr>
                            <td>
                                <span><input type='checkbox' checked name='aluno_selecionado[]' class='checkbox'
                                        value='{{ $aluno->uuid }}/{{ $turma->id }}/{{ $aluno->id }}'></span>
                                &nbsp;<span>{{ $aluno->NOME }}</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($aluno->NASCIMENTO)->format('d/m/Y') }}</td>
                            <td>{{ $turma->TURMA }} {{ $turma->UNICO }} ({{ $turma->TURNO }}) -
                                {{ \Carbon\Carbon::parse($turma->ANO)->format('Y') }}</td>

                        </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        </form>
    </div>

    <div style="margin-bottom: 60px;">
        <input type="hidden" id="usuario" value="{{ Auth::user()->name }}">
    </div>

    <!--Div Turmas-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btVer').click(function() {
                var id = $(this).attr("id");
                var val = $(this).val();
                if (!$(this).hasClass("ver")) {
                    $('.btVer').each(function() {
                        if ($(this).hasClass("ver")) {
                            $(this).removeClass("ver");
                            var val_antigo = $(this).val();
                            $("#" + val_antigo + "").toggle(2000);
                            return false;
                        }
                    })
                    $("#" + id + "").addClass("ver");
                    $("#" + val + "").toggle(2000);
                } else {
                    $("#" + id + "").removeClass("ver");
                    $("#" + val + "").toggle(2000);
                }
            });
        });
    </script>
    <!--Div TurmasTransferências-->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".turmasTransf").hide();
            $('#turmasTransf').change(function() {
                if ($('#transferencia').val() == 'NAO') {
                    $(".turmasTransf").toggle(2000);
                } else {
                    $(".turmasTransf").toggle(2000);
                }
            });
        });
    </script>
    <!--Div TurmasDeclar-->
    <script type="text/javascript">
        $(document).ready(function() {
            $(".turmasDecl").hide();
            $('#turmasDecl').change(function() {
                if ($('#turmasDecl').val() == 'NAO') {
                    $(".turmasDecl").toggle(2000);
                } else {
                    $(".turmasDecl").toggle(2000);
                }
            });
        });
    </script>
    <style>
        fieldset {
            /* background-color: rgba(111, 66, 193, 0.3); */
            border-radius: 4px;
            border: 1px solid #ffc107;
            padding-bottom: 12px;
        }

        legend {
            background-color: #fff;
            border: 1px solid #ffc107;
            border-radius: 4px;
            color: var(--purple);
            font-size: 17px;
            font-weight: bold;
            padding: 3px 5px 3px 7px;
            width: auto;
        }

    </style>

@stop
