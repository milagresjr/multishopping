<div style="background-color: #c02027; color:#fff; padding: 15px; width: 100%; text-align: center;">
<h2>Obrigado pelo seu pedido!</h2>
</div>
<p>Olá, {{ Auth::guard('web')->user()->nome }}! </p>
<p>Obrigado por escolher a Multishopping.
O seu pedido foi recebido. Estamos a preparar seu pedido para fazer a entrega.</p>
<br/>
<h3>Resumo do pedido</h3>
@if(isset($pedidos))
    @foreach($pedidos as $pedido)
    <table class="table table-striped" style="margin-top: 10px;">
        <theader>
            <tr>
                <th>Produto</th><th>Quantidade</th><th>Sub total</th>
            </tr>
        </theader>
        <tbody>
        <?php $total = 0; $precoReal = 0; ?>

        @foreach($pedido->pedido_produtos as $pedido_produto)
               <tr>
                        <td style="vertical-align: middle;">{{ $pedido_produto->produto->nome }}</td>
                        <td style="vertical-align: middle;">{{ $pedido_produto->qtd }}</td>
                        <td style="vertical-align: middle;">{{ number_format($pedido_produto->produto->preco*$pedido_produto->qtd,2,',','.') }} Kz</td>
                    </tr>
                    <?php $total = $total + ($pedido_produto->produto->preco*$pedido_produto->qtd) ?>

        @endforeach

        </tbody>
        <tfooter>
            <tr>
                <td colspan="2"><span style="font-weight: bold;">Forma de Pagamento</span></td>
                <td>{{ $pedido->forma_pagamento }} </td>
            </tr>
            <tr>
                <td colspan="2"><span style="font-weight: bold;">TOTAL</span></td>
                <td>{{ number_format($total,2,',','.') }} Kz</td>
            </tr>
        </tfooter>
    </table>
    @endforeach
@endif
