<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagensCategory extends Model
{
    protected $table = "imagens_categoria";
    protected $fillable = ['imagem','categoria_id'];
}
