@extends('layouts.app')

@section('title', 'Livros')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Livros</h1>
        <a href="{{ route('livros.create') }}"
           class="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
            Novo livro
        </a>
    </div>

    <div class="overflow-x-auto rounded bg-white shadow">
        <table class="min-w-full text-left">
            <thead class="bg-gray-50 text-sm uppercase text-gray-600">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Título</th>
                    <th class="px-4 py-3">Ano</th>
                    <th class="px-4 py-3">ISBN</th>
                    <th class="px-4 py-3">Autor</th>
                    <th class="px-4 py-3 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($livros as $livro)
                    <tr>
                        <td class="px-4 py-3">{{ $livro->id }}</td>
                        <td class="px-4 py-3">{{ $livro->titulo }}</td>
                        <td class="px-4 py-3">{{ $livro->ano_publicacao }}</td>
                        <td class="px-4 py-3">{{ $livro->isbn }}</td>
                        <td class="px-4 py-3">{{ $livro->autor->nome ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('livros.edit', $livro) }}"
                                   class="rounded bg-yellow-500 px-3 py-1 text-sm text-white hover:bg-yellow-600">
                                    Editar
                                </a>
                                <form action="{{ route('livros.destroy', $livro) }}" method="POST"
                                      onsubmit="return confirm('Deseja realmente excluir este livro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="rounded bg-red-600 px-3 py-1 text-sm text-white hover:bg-red-700">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            Nenhum livro cadastrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
