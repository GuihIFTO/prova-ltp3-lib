<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LivroController extends Controller
{
    public function index(): View
    {
        return view('livros.index', ['livros' => Livro::with('autor')->get()]);
    }

    public function create(): View
    {
        return view('livros.create', ['autores' => Autor::orderBy('nome')->get()]);
    }

    public function store(Request $request): RedirectResponse
    {
        $dados = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'ano_publicacao' => ['required', 'integer', 'digits:4'],
            'isbn' => ['required', 'string', 'max:20', 'unique:livros,isbn'],
            'autor_id' => ['required', 'exists:autores,id'],
        ]);

        Livro::create($dados);

        return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso.');
    }

    public function edit(Livro $livro): View
    {
        return view('livros.edit', [
            'livro' => $livro,
            'autores' => Autor::orderBy('nome')->get(),
        ]);
    }

    public function update(Request $request, Livro $livro): RedirectResponse
    {
        $dados = $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'ano_publicacao' => ['required', 'integer', 'digits:4'],
            'isbn' => ['required', 'string', 'max:20', 'unique:livros,isbn,' . $livro->id],
            'autor_id' => ['required', 'exists:autores,id'],
        ]);

        $livro->update($dados);

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso.');
    }

    public function destroy(Livro $livro): RedirectResponse
    {
        $livro->delete();

        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso.');
    }
}
