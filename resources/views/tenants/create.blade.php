@extends('layouts.app')

@section('content')

    <h1>Cadastrar Novo Tenant</h1>

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tenants.store') }}" class="form" method="POST" enctype="multipart/form-data">
                @csrf

                @include('tenants.form')
            </form>
        </div>
    </div>

@stop
