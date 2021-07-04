@extends('layouts.app')
{{-- https://tailwindcomponents.com/components --}}
@section('content')

    <div class="bg-grey-light p-3 rounded font-sans w-full " style="background-color:#e9ecef">

        <ul class="flex text-blue-600 text-sm lg:text-base">
            <li class="inline-flex items-center ">
                <a href="{{ route('dashboard') }}" class="">Dashboard</a>
                <svg class="h-5 w-auto text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </li>
            <li class="inline-flex items-center">
                <a href="{{ route('turmas.index') }}">Turmas</a>
                <svg class="h-5 w-auto text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </li>
        </ul>
    </div>

    <div class='shadow-md rounded px-4 pt-4 pb-8 mb-4 flex flex-col m-4 '>

        <form class="w-full" action="{{ route('turmas.store') }}" method="POST">
            @csrf

            <div class="md:flex md:items-center mb-6 ">

                <div class="md:w-2/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Necessidades Especiais
                    </label>
                </div>
                <div class="md:w-4/6">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" type="text" value="" name="TURMA" placeholder="Nome da Turma" dois>
                </div>
                <div class="md:w-2/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        Único
                    </label>
                </div>
                <div class="md:w-4/6">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-password" type="text" placeholder="A ,B , C  ou ÚNICO" name="UNICO" dois>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6 ">
                <div class="md:w-2/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline">
                        Turno
                    </label>
                </div>
                <div class="md:w-4/6">
                    <select name="TURNO" id=""
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        @foreach ($turnos as $turno)
                            <option value="{{ $turno->TURNO }}" selected>{{ $turno->TURNO }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:w-2/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline">
                        Categoria
                    </label>
                </div>
                <div class="md:w-4/6">
                    <select name="CATEGORIA"
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        @foreach ($categories as $category)
                            <option value="{{ $category->CATEGORIA }}" selected>{{ $category->CATEGORIA }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="md:flex md:items-center mb-6 ">
                <div class="md:w-2/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline">
                        ANO
                    </label>
                </div>
                <div class="md:w-4/6">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline" type="date" placeholder="" name="ANO" dois>
                </div>
                <div class="md:w-2/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline">
                        Idade Mínima
                    </label>
                </div>
                <div class="md:w-4/6">
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline" type="number" min="0" step="1" max="100" placeholder="" name="TURMA_IDADE_MINIMA" dois>
                </div>
            </div>
            <div class="md:flex  md:items-center mb-6 ">
                <div class="md:w-2/6">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline">
                        Turma Extra
                    </label>
                </div>
                <div class="md:w-4/6">
                    <select name="TURMA_EXTRA" id="" dois
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full  text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        <option value="NAO">NÃO</option>
                        <option value="SIM">SIM</option>
                    </select>
                </div>
                <div class="md:w-full">
                </div>
            </div>
    </div>

    <div class="mx-8">
        <button type="submit" class="shadow w-full block  border-green-600 border-2 rounded-sm focus:outline-none focus:border-green-600 px-4 py-2
                                                         text-green-600 hover:bg-green-600 hover:text-white font-bold" onclick="return confirmar()">
            Salvar
        </button>
    </div>
    {{-- <div class="xs: bg-blue-700  sm:bg-gray-900  md:bg-red-600 h-6 mx-8"></div> --}}

    </form>

@stop
