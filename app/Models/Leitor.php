<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    use HasFactory;

    protected $table = 'leitores';
    protected $fillable = [
                            'nome',
                            'email',
                            'telefone',
                            'endereco',
                            'data_aniversario',
                            'deleted'
                        ];
    public $timestamps = false;

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}
