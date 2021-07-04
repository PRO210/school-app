@extends('layouts.app')

@section('content')

    <h3>Cadastrar Novo Perfil</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.store') }}" class="form" method="POST">
                @include('profiles._partials.form')
            </form>
        </div>
    </div>

@endsection
