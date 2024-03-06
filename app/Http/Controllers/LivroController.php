<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Leitor;
use App\Models\Livro;
use App\Http\Controllers\LivroLeitorController;
use App\Models\LivroLeitor;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livro = Livro::where('deleted', 0)->get();

        return response()->json(['success' => true, 'data' => $livro]);
    }

    public function show(int $id)
    {
        $livro = Livro::find($id);

        if (!$livro) {
            return response()->json(['success' => false, 'message' => 'Livro não encontrado'], 404);
        }

        return response()->json(['success' => true, 'data' => $livro]);
    }

    public function store(Request $request)
    {
        $leitor = Leitor::find($request->input('leitor_id'));

        if (!$leitor) {
            return response()->json(['success' => false, 'message' => 'Leitor não encontrado'], 404);
        }

        $livro = new Livro();

        $livro->nome = $request->input('nome');
        $livro->genero = $request->input('genero');
        $livro->autor = $request->input('autor');
        $livro->ano = $request->input('ano');
        $livro->paginas = $request->input('paginas');
        $livro->idioma = $request->input('idioma');
        $livro->edicao = $request->input('edicao');
        $livro->editora_nome = $request->input('editora_nome');
        $livro->editora_codigo = $request->input('editora_codigo');
        $livro->editora_telefone = $request->input('editora_telefone');
        $livro->isbn = $request->input('isbn');

        $livro->save();

        LivroLeitorController::store($request->input('leitor_id'), $livro->id);

        return response()->json(['success' => true, 'message' => 'Livro criado com sucesso', 'data' => $livro], 201);
    }

    public function update(Request $request, $leitorId, $livroId)
    {
        $livroLeitor = LivroLeitor::where('leitor_id', $leitorId)
            ->where('livro_id', $livroId)
            ->first();

        if (!$livroLeitor) {
            return response()->json(['success' => false, 'message' => 'Registro não encontrado'], 404);
        }

        $livro = Livro::find($livroId);

        $livro->nome = $request->input('nome');
        $livro->genero = $request->input('genero');
        $livro->autor = $request->input('autor');
        $livro->ano = $request->input('ano');
        $livro->paginas = $request->input('paginas');
        $livro->idioma = $request->input('idioma');
        $livro->edicao = $request->input('edicao');
        $livro->editora_nome = $request->input('editora_nome');
        $livro->editora_codigo = $request->input('editora_codigo');
        $livro->editora_telefone = $request->input('editora_telefone');
        $livro->isbn = $request->input('isbn');

        $livro->save();

        return response()->json(['success' => true, 'message' => 'Livro atualizado com sucesso', 'data' => $livro]);
    }

    public function destroy(int $id)
    {
        $livro = Livro::find($id);

        if (!$livro) {
            return response()->json(['success' => false, 'message' => 'Livro não encontrado'], 404);
        }

        $livro->deleted = 1;
        $livro->save();

        return response()->json(['success' => true, 'message' => 'Livro marcado como excluído com sucesso']);
    }
}
