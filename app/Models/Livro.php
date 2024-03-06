<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';
    protected $fillable = [
                            'nome', 
                            'genero', 
                            'autor', 
                            'ano', 
                            'paginas', 
                            'idioma', 
                            'edicao', 
                            'editora_nome', 
                            'editora_codigo', 
                            'editora_telefone', 
                            'isbn', 
                            'deleted'
                        ];
    public $timestamps = false;

    public function leitores()
    {
        return $this->belongsTo(LivroLeitor::class);
    }
}
