@extends('layouts.app')

@section('title', 'Autores')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Autores</h1>
        <a href="{{ route('autores.create') }}"
           class="rounded bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700">
            Novo autor
        </a>
    </div>

    <div class="overflow-x-auto rounded bg-white shadow">
        <table class="min-w-full text-left">
            <thead class="bg-gray-50 text-sm uppercase text-gray-600">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Nome</th>
                    <th class="px-4 py-3">Nacionalidade</th>
                    <th class="px-4 py-3 text-right">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse ($autores as $autor)
                    <tr>
                        <td class="px-4 py-3">{{ $autor->id }}</td>
                        <td class="px-4 py-3">{{ $autor->nome }}</td>
                        <td class="px-4 py-3">{{ $autor->nacionalidade }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('autores.edit', $autor) }}"
                                   class="rounded bg-yellow-500 px-3 py-1 text-sm text-white hover:bg-yellow-600">
                                    Editar
                                </a>
                                <form action="{{ route('autores.destroy', $autor) }}" method="POST"
                                      onsubmit="return confirm('Deseja realmente excluir este autor?')">
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
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                            Nenhum autor cadastrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
