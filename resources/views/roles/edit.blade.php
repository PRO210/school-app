@extends('layouts.app')

@section('content')

    <h1>Editar o Cargo {{ $role->name }}</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" class="form" method="POST">
                @method('PUT')

                @include('roles._partials.form')
            </form>
        </div>
    </div>
@endsection
