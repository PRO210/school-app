@extends('layouts.app')

@section('content')

    <h3 class="m-2">Cadastrar Novo Plano</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf

                @include('plans._partials.form')

            </form>
        </div>
    </div>

@endsection
