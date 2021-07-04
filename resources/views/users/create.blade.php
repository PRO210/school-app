@extends('layouts.app')

@section('content')

    <h1>Cadastrar Novo Usuário</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.store') }}" class="form" method="POST">
                @csrf
                @include('users.form')
            </form>
        </div>
    </div>

@endsection


