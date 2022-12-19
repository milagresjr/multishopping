<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagensProduct extends Model
{
    protected $table = "imagens_product";
    protected $fillable = ['imagem','product_id'];
}
