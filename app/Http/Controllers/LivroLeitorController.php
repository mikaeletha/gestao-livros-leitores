<?php

namespace App\Http\Controllers;

use App\Models\Leitor;
use App\Models\LivroLeitor;
use Illuminate\Http\Request;

class LivroLeitorController extends Controller
{
    public function index()
    {
        // $livrosLeitores = LivroLeitor::with('livro', 'leitor')->get();

        $livrosLeitores = LivroLeitor::with(['livro', 'leitor'])
            ->whereHas('livro', function ($query) {
                $query->where('deleted', '=', '0');
            })
            ->whereHas('leitor', function ($query) {
                $query->where('deleted', '=', '0');
            })
            ->get();

        return response()->json(['success' => true, 'data' => $livrosLeitores]);
    }

    public function show(int $leitorId)
    {
        $leitor = Leitor::where('id', $leitorId)->where('deleted', '=', '0')->first();
        
        if (!$leitor) {
            return response()->json(['success' => false, 'message' => 'Leitor não encontrado ou deletado.']);
        }

        $livrosLeitor = LivroLeitor::with(['livro', 'leitor'])
            ->where('leitor_id', $leitorId)
            ->whereHas('livro', function ($query) {
                $query->where('deleted', '=', '0');
            })
            ->get();

        return response()->json(['success' => true, 'data' => $livrosLeitor]);
    }

    public static function store($leitor_id, $livro_id)
    {
        $livroLeitor = new LivroLeitor();

        $livroLeitor->leitor_id = $leitor_id;
        $livroLeitor->livro_id = $livro_id;

        $livroLeitor->save();
    }

    public function countLivrosLidos($leitor_id)
    {
        $quantidadeLivros = LivroLeitor::where('leitor_id', $leitor_id)->count();

        return $quantidadeLivros;
    }
}
