@extends('layouts.app')


@section('content')
    <h1>Cadastrar Novo Cargo</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" class="form" method="POST">
                @include('roles._partials.form')
            </form>
        </div>
    </div>
@endsection
