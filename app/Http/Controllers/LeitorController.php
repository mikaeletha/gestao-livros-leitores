<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeitorRequest;
use App\Models\Leitor;
use App\Models\LivroLeitor;
use Illuminate\Http\Request;

class LeitorController extends Controller
{
    public function index()
    {
        // $leitores = Leitor::all();
        $leitores = Leitor::where('deleted', 0)->get();

        return response()->json(['success' => true, 'data' => $leitores]);
    }

    public function show(int $id)
    {
        $leitor = Leitor::find($id);

        if (!$leitor) {
            return response()->json(['success' => false, 'message' => 'Leitor não encontrado'], 404);
        }

        return response()->json(['success' => true, 'data' => $leitor]);
    }

    public function store(LeitorRequest $request)
    {
        $leitor = new Leitor();

        $leitor->nome = $request->input('nome');
        $leitor->email = $request->input('email');
        $leitor->telefone = $request->input('telefone');
        $leitor->endereco = $request->input('endereco');
        $leitor->data_aniversario = $request->input('data_aniversario');

        $leitor->save();

        return response()->json(['success' => true, 'message' => 'Leitor criado com sucesso', 'data' => $leitor], 201);
    }

    public function update(LeitorRequest $request, $id)
    {
        $leitor = Leitor::find($id);

        if (!$leitor) {
            return response()->json(['success' => false, 'message' => 'Leitor não encontrado'], 404);
        }

        $leitor->nome = $request->input('nome');
        $leitor->email = $request->input('email');
        $leitor->telefone = $request->input('telefone');
        $leitor->endereco = $request->input('endereco');
        $leitor->data_aniversario = $request->input('data_aniversario');
        
        $leitor->save();

        return response()->json(['success' => true, 'message' => 'Leitor atualizado com sucesso', 'data' => $leitor]);
    }

    public function destroy(int $id)
    {
        $leitor = Leitor::find($id);

        if (!$leitor) {
            return response()->json(['success' => false, 'message' => 'Leitor não encontrado'], 404);
        }

        $leitor->deleted = 1;
        $leitor->save();

        LivroLeitor::where('leitor_id', $id)->update(['deleted' => 1]);

        return response()->json(['success' => true, 'message' => 'Leitor marcado como excluído com sucesso']);
    }
}
