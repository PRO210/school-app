@extends('layouts.app')

@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('turmas.index') }}" class="active">Turmas</a></li>
</ol>

<div class="container-fluid">
    <form action="{{route('turmas.update',$turmas->id)}}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group row ">
            <label for="" class="col-sm-1 col-form-label">Nome</label>
            <div class="col-sm-5">
                <input type="text" value="{{$turmas->TURMA}}" name="TURMA" id="" class="form-control" placeholder="" required>
            </div>
            <label for="" class="col-sm-1 col-form-label">Único</label>
            <div class="col-sm-5">
                <input type="text" value="{{$turmas->UNICO}}" name="UNICO" id="" class="form-control" placeholder="" required>
            </div>
        </div>

        <div class="form-group row ">
            <label for="" class="col-sm-1 col-form-label">Turno</label>
            <div class="col-sm-5">
                <select name="TURNO" id="" class=" form-control">
                    @foreach($turnos as $turno)
                    @if($turno->TURNO == "$turmas->TURNO")
                    <option value="{{$turno->TURNO}}" selected>{{$turno->TURNO}}</option>
                    @else
                    <option value="{{$turno->TURNO}}">{{$turno->TURNO}}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <label for="" class="col-sm-1 col-form-label">Categoria</label>
            <div class="col-sm-5">
                <select id="" class=" form-control" name="CATEGORIA" required>
                    @foreach($categories as $category)
                    @if($category->CATEGORIA == "$turmas->CATEGORIA")
                    <option value="{{$category->CATEGORIA}}" selected>{{$category->CATEGORIA}}</option>
                    @else
                    <option value="{{$category->CATEGORIA}}">{{$category->CATEGORIA}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row ">
            <label for="" class="col-sm-1 col-form-label">ANO</label>
            <div class="col-sm-5">
                <input type="date" value="{{$turmas->ANO}}" name="ANO" id="" class="form-control" placeholder="" required>
            </div>
            <label for="" class="col-sm-1 col-form-label">Idade Mínima</label>
            <div class="col-sm-5">
                <input type="number" value="{{$turmas->TURMA_IDADE_MINIMA}}" name=" TURMA_IDADE_MINIMA" id="" class="form-control" placeholder="" required>
            </div>
        </div>

        <div class="form-group row ">
            <label for="" class="col-sm-1 col-form-label">Turma Extra</label>
            <div class="col-sm-5">
                <select name="TURMA_EXTRA" id="" name="TURMA_EXTRA" class="form-control" required>
                    @if($turmas->TURMA_EXTRA == "SIM")
                    <option value="SIM" selected>SIM</option>
                    <option value="NAO">NÃO</option>
                    @else
                    <option value="SIM">SIM</option>
                    <option value="NAO" selected>NÃO</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm  my-2">
                    <button type="submit" name="botao" value="salvar" class="btn btn-outline-success btn-block" onclick=" return confirmar()">
                        <b>Salvar</b>
                    </button>
                </div>
                <div class="col-sm  my-2">
                    <button type="submit" name="botao" value="excluir" class="btn btn-outline-danger btn-block" onclick=" return confirmar()">
                        <b>Excluir</b>
                    </button>
                </div>
            </div>
        </div>

    </form>
</div>

@endsection
