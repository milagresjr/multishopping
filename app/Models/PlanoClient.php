<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanoClient extends Model
{
    protected $table = 'plano_client';
    protected $fillable = ['client_id','plano','data_limite','statu'];
}
