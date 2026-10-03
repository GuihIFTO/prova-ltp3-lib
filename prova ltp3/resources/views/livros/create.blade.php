@extends('layouts.app')

@section('title', 'Novo livro')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Novo livro</h1>
    <form method="POST" action="{{ route('livros.store') }}" class="max-w-xl rounded bg-white p-6 shadow">
        @csrf
        @include('livros.form')
        <div class="mt-6 flex gap-3">
            <button class="rounded bg-indigo-600 px-4 py-2 text-white">Salvar</button>
            <a href="{{ route('livros.index') }}" class="rounded border px-4 py-2">Voltar</a>
        </div>
    </form>
@endsection
