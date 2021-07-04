@extends('layouts.app')


@section('content')
    <h3 class="m-2">Editar o Perfil {{ $profile->name }}</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
                @method('PUT')
                @include('profiles._partials.form')
            </form>
        </div>
    </div>
@endsection
