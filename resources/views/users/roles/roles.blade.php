@extends('layouts.app')

@section('content')

    <div class=" container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="active">Users</a></li>
        </ol>
    </div>

    <h3>
        Cargos do usuário <strong>{{ $user->name }}</strong>
        <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-outline-success">ADD NOVO CARGO</a>

    </h3>



    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('users.role.detach', [$user->id, $role->id]) }}"
                                    class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif
        </div>
    </div>
@stop
