@extends('layouts.app')

@section('title', 'Editar autor')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Editar autor</h1>
    <form method="POST" action="{{ route('autores.update', $autor) }}" class="max-w-xl rounded bg-white p-6 shadow">
        @csrf
        @method('PUT')
        @include('autores.form')
        <div class="mt-6 flex gap-3">
            <button class="rounded bg-indigo-600 px-4 py-2 text-white">Atualizar</button>
            <a href="{{ route('autores.index') }}" class="rounded border px-4 py-2">Voltar</a>
        </div>
    </form>
@endsection
