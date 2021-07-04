@extends('layouts.app')

@section('content')

    <h1>Detalhes da produto <b>{{ $tenant->name }}</b></h1>

    <div class="card">
        <div class="card-body">
            <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->title }}" style="max-width: 90px;">
            <ul>
                {{-- <li>
                    <strong>Plano: </strong> {{ $tenant->plan->name }}
                </li> --}}
                <li>
                    <strong>Nome: </strong> {{ $tenant->name }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $tenant->url }}
                </li>
                <li>
                    <strong>E-mail: </strong> {{ $tenant->email }}
                </li>
                <li>
                    <strong>CNPJ: </strong> {{ $tenant->cnpj }}
                </li>
                <li>
                    <strong>Ativo: </strong> {{ $tenant->active == 'Y' ? 'SIM' : 'NÃO' }}
                </li>
            </ul>

            <hr>
            <h3>Assinatura</h3>
            <ul>
                <li>
                    <strong>Data Assinatura: </strong> {{ $tenant->subscription }}
                </li>
                <li>
                    <strong>Data Expira: </strong> {{ $tenant->expires_at }}
                </li>
                <li>
                    <strong>Identificador: </strong> {{ $tenant->subscription_id }}
                </li>
                <li>
                    <strong>Ativo? </strong> {{ $tenant->subscription_active ? 'SIM' : 'NÃO' }}
                </li>
                <li>
                    <strong>Cancelou? </strong> {{ $tenant->subscription_suspended ? 'SIM' : 'NÃO' }}
                </li>
            </ul>

            <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" class="form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR O SERVIÇO {{ $tenant->name }}</button>
            </form>

        </div>
    </div>

@stop
