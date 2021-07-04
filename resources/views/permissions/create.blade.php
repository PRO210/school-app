@extends('layouts.app')


@section('content')
    <h3>Cadastrar Nova Permissão</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">
                @include('permissions._partials.form')
            </form>
        </div>
    </div>
@endsection
