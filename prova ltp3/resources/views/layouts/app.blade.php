<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Biblioteca') - {{ config('app.name', 'Biblioteca') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">
    <nav class="bg-indigo-700 text-white shadow">
        <div class="max-w-5xl mx-auto px-4 py-3 flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-xl font-bold">Biblioteca</a>
            <div class="flex gap-4">
                {{-- Links só aparecem depois que as rotas forem criadas (Etapa 4) --}}
                @if (Route::has('autores.index'))
                    <a href="{{ route('autores.index') }}" class="hover:underline">Autores</a>
                @endif
                @if (Route::has('livros.index'))
                    <a href="{{ route('livros.index') }}" class="hover:underline">Livros</a>
                @endif
            </div>
        </div>
    </nav>

    <main class="max-w-5xl w-full mx-auto px-4 py-8 flex-1">
        @if (session('success'))
            <div class="mb-6 rounded border border-green-300 bg-green-100 px-4 py-3 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 rounded border border-red-300 bg-red-100 px-4 py-3 text-red-800">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="text-center text-sm text-gray-500 py-4">
        Prova Prática LTP3 - CRUD Biblioteca
    </footer>
</body>
</html>
