<?php

use App\Http\Controllers\LivroLeitorController;
use App\Models\Leitor;
use Carbon\Carbon;

$dataAtual = Carbon::now()->format('m-d');

$leitores = Leitor::whereRaw("DATE_FORMAT(data_aniversario, '%m-%d') = ?", [$dataAtual])->get();

foreach ($leitores as $leitor) {
    $quantidadeLivros = LivroLeitorController::countLivrosLidos($leitor);

    $this->enviarEmail($leitor, $quantidadeLivros);
}

function enviarEmail($leitor, $quantidadeLivros)
{
    $corpo = "Olá {$leitor},\n\n";
    $corpo .= "Parabéns pelo seu aniversário! Esperamos que você tenha um dia maravilhoso.\n\n";
    $corpo .= "Esse tempo conosco você já leu {$quantidadeLivros} livros";
}

