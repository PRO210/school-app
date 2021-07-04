@extends('layouts.app')

@section('content')
    <h1>Detalhes da permissão <b>{{ $permission->name }}</b></h1>

    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permission->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $permission->description }}
                </li>
            </ul>
            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR A PERMISSÃO : <b>{{ $permission->name }}</b></button>
            </form>
        </div>
    </div>
@endsection
