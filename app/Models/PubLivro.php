<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PubLivro extends Model
{
    protected $fillable = ['tema','pensamento_dia','autor','conteudo'];
}
