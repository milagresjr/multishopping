<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    protected $fillable = ['id','titulo','autor','descricao','imagem_capa','category_id','file_pdf','file_epub'];
}
