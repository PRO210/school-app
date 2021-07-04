@extends('layouts.app')


@section('content')
    <h1>Editar a categoria {{ $category->name }}</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('categories._partials.form')
            </form>
        </div>
    </div>
@endsection
