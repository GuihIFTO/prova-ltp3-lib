<div class="mb-4">
    <label for="titulo" class="mb-1 block font-medium">Título</label>
    <input id="titulo" name="titulo" value="{{ old('titulo', $livro->titulo ?? '') }}" class="w-full rounded border px-3 py-2" required>
    @error('titulo')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
</div>
<div class="mb-4">
    <label for="ano_publicacao" class="mb-1 block font-medium">Ano de publicação</label>
    <input id="ano_publicacao" name="ano_publicacao" type="number" value="{{ old('ano_publicacao', $livro->ano_publicacao ?? '') }}" class="w-full rounded border px-3 py-2" required>
    @error('ano_publicacao')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
</div>
<div class="mb-4">
    <label for="isbn" class="mb-1 block font-medium">ISBN</label>
    <input id="isbn" name="isbn" value="{{ old('isbn', $livro->isbn ?? '') }}" class="w-full rounded border px-3 py-2" required>
    @error('isbn')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
</div>
<div>
    <label for="autor_id" class="mb-1 block font-medium">Autor</label>
    <select id="autor_id" name="autor_id" class="w-full rounded border px-3 py-2" required>
        <option value="">Selecione um autor</option>
        @foreach ($autores as $autor)
            <option value="{{ $autor->id }}" @selected(old('autor_id', $livro->autor_id ?? '') == $autor->id)>{{ $autor->nome }}</option>
        @endforeach
    </select>
    @error('autor_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
</div>
