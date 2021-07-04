@extends('layouts.app')


@section('content')
    <h1>Editar o usuário {{ $user->name }}</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('users.form')
            </form>
        </div>
    </div>
@endsection
