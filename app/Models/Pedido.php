<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['client_id','status','telefone','provincia','nome_empresa','endereco','local_referencia','informacao_pedido'];

    public function pedido_produtos()
    {
        return $this->hasMany('App\Models\PedidoProduto')
            ->select(\DB::raw('product_id, sum(desconto) as descontos, sum(valor) as valores, count(1) as qtd'))
            ->groupBy('product_id')->orderBy('product_id','desc');
    }

    public function pedido_produtos_itens()
    {
        return $this->hasMany('App\Models\PedidoProduto');
    }

    public static function consultaId($where)
    {
        $pedido = self::where($where)->first(['id']);

        return !empty($pedido->id) ? $pedido->id : null;
    }
}
