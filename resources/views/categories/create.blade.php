@extends('layouts.app')

@section('content')
    <h1>Cadastrar Nova Categoria</h1>

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" class="form" method="POST">
                @csrf

                @include('categories._partials.form')
            </form>
        </div>
    </div>
@endsection
