<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>{{ $title ?? '' }}</title>

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
    <link rel="stylesheet" href="{{ asset('css/css2.css') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href='{{ url('bootstrap-4/css/bootstrap.min.css') }}'>

    <script src='{{ url('js/jquery-3.5.1.js') }}' type="text/javascript"></script>
    <script src='{{ url('bootstrap-4/js/popper.min.js') }}' type="text/javascript"></script>
    <script src='{{ url('bootstrap-4/js/bootstrap.min.js') }}' type="text/javascript"></script>

    <script src='{{ url('js/confirmar.js') }}' type="text/javascript"></script>

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        @include('layouts.navigation')

        @if (session('message') || session('error') || $errors->any())
            @include('includes.alert_tailwind')
        @endif


        <!-- Page Heading -->
        {{-- <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header ?? '' }}
            </div>

        </header> --}}

        <!-- Page Content -->
        <main>
            {{-- {{ $slot ?? '' }} --}}

        </main>
        <div>
            @yield('content')
        </div>

        <div style="margin-bottom: 60px;">
            <input type="hidden" id="usuario" value="{{ Auth::user()->name }}">
        </div>

    </div>
</body>

</html>
