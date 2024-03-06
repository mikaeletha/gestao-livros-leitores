<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LivroLeitor extends Model
{
    use HasFactory;

    protected $table = 'livros_leitores';
    protected $fillable = [
                            'livro_id', 
                            'leitor_id', 
                            'deleted'
                        ];
    public $timestamps = false;

    public function leitor()
    {
        return $this->belongsTo(Leitor::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
