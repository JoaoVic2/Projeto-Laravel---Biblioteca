<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    // Define a tabela associada ao modelo como 'livros'
    protected $table = 'livros';

    // Permite a atribuição em massa para os campos especificados
    protected $fillable = [
        'titulo', // Campo para o título do livro
        'autor',  // Campo para o autor do livro
        'descricao', // Campo para a descrição do livro
    ];

    // Define que o modelo usará timestamps (created_at e updated_at)
    public $timestamps = true;
}
