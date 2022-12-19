<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $fillable = [
        'pedido_id',
        'product_id',
        'valor',
        'status'
    ];
    public function produto()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
}
