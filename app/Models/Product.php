<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = ['id','nome','preco','descricao','quantidade','categoria_id','subcategoria_id'];
}
