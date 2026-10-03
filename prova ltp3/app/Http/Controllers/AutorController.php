<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AutorController extends Controller
{
    public function index(): View
    {
        return view('autores.index', ['autores' => Autor::all()]);
    }

    public function create(): View
    {
        return view('autores.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'nacionalidade' => ['required', 'string', 'max:100'],
        ]);

        Autor::create($dados);

        return redirect()->route('autores.index')->with('success', 'Autor cadastrado com sucesso.');
    }

    public function edit(Autor $autor): View
    {
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, Autor $autor): RedirectResponse
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'nacionalidade' => ['required', 'string', 'max:100'],
        ]);

        $autor->update($dados);

        return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso.');
    }

    public function destroy(Autor $autor): RedirectResponse
    {
        if ($autor->livros()->exists()) {
            return redirect()->route('autores.index')
                ->with('error', 'Não é possível excluir um autor que possui livros cadastrados.');
        }

        $autor->delete();

        return redirect()->route('autores.index')->with('success', 'Autor excluído com sucesso.');
    }
}
