@extends('layouts.app')

@section('title', 'Novo autor')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Novo autor</h1>
    <form method="POST" action="{{ route('autores.store') }}" class="max-w-xl rounded bg-white p-6 shadow">
        @csrf
        @include('autores.form')
        <div class="mt-6 flex gap-3">
            <button class="rounded bg-indigo-600 px-4 py-2 text-white">Salvar</button>
            <a href="{{ route('autores.index') }}" class="rounded border px-4 py-2">Voltar</a>
        </div>
    </form>
@endsection
