@extends('layouts.app')

@section('content')

<h3 class="m-4">Editar o plano {{ $plan->name }}</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('plans._partials.form')
            </form>
        </div>
    </div>
@endsection
