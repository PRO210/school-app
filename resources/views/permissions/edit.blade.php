@extends('layouts.app')

@section('content')
    <h3>Editar a Permissão {{ $permission->name }}</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @method('PUT')
                @include('permissions._partials.form')
            </form>
        </div>
    </div>
@endsection
