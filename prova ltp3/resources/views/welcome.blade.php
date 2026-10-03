@extends('layouts.app')

@section('title', 'Início')

@section('content')
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold mb-2">Sistema de Biblioteca</h1>
        <p class="text-gray-600">Cadastro de autores e livros.</p>
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <div class="rounded bg-white p-6 shadow">
            <h2 class="text-xl font-semibold mb-2">Autores</h2>
            <p class="text-gray-600 mb-4">Gerencie os autores cadastrados.</p>
            @if (Route::has('autores.index'))
                <a href="{{ route('autores.index') }}"
                   class="inline-block rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                    Acessar
                </a>
            @else
                <span class="text-sm text-red-600">Rotas de autores ainda não criadas (Etapa 4).</span>
            @endif
        </div>

        <div class="rounded bg-white p-6 shadow">
            <h2 class="text-xl font-semibold mb-2">Livros</h2>
            <p class="text-gray-600 mb-4">Gerencie os livros cadastrados.</p>
            @if (Route::has('livros.index'))
                <a href="{{ route('livros.index') }}"
                   class="inline-block rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
                    Acessar
                </a>
            @else
                <span class="text-sm text-red-600">Rotas de livros ainda não criadas (Etapa 4).</span>
            @endif
        </div>
    </div>
@endsection
