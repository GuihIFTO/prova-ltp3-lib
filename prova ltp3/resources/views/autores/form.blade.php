<div class="mb-4">
    <label for="nome" class="mb-1 block font-medium">Nome</label>
    <input id="nome" name="nome" value="{{ old('nome', $autor->nome ?? '') }}" class="w-full rounded border px-3 py-2" required>
    @error('nome')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
</div>
<div>
    <label for="nacionalidade" class="mb-1 block font-medium">Nacionalidade</label>
    <input id="nacionalidade" name="nacionalidade" value="{{ old('nacionalidade', $autor->nacionalidade ?? '') }}" class="w-full rounded border px-3 py-2" required>
    @error('nacionalidade')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
</div>
