<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Aluno' }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href='{{ url('bootstrap-4/css/bootstrap.min.css') }}'>

    <script src='{{ url('js/jquery-3.5.1.js') }}' type="text/javascript"></script>
    <script src='{{ url('bootstrap-4/js/popper.min.js') }}' type="text/javascript"></script>
    <script src='{{ url('bootstrap-4/js/bootstrap.min.js') }}' type="text/javascript"></script>

    <link rel="stylesheet" href='{{ url('css/alunos/create.css') }}'>

    <!-- jQuery -->
    <script src='{{ url('js/alunos/maskedInput.js') }}' type="text/javascript"></script>
    <script src='{{ url('js/alunos/create.js') }}' type="text/javascript"></script>

</head>

<body>

    @include('layouts.navigation')

    @include('includes.alerts')

    <div class="content">

        @yield('content')

    </div>

</body>

</html>
