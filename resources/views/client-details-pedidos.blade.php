@extends("layouts.app")

@section("titulo")
    Minha Conta
@endsection

@section("style")
    <style>
        .listaEndereco{list-style: none; margin-left: 10px;}
        .listaEndereco li{font-size: 15pt; color: gray;}
    </style>
@endsection

@section("conteudo")
    @foreach($pedidos as $pedido)
    <div class="container">
        <h2 style="text-align: center; text-transform: uppercase; margin-top: 20px;">Detalhes do Pedido #{{ $pedido->id }}</h2>

        <p style="margin: 20px; font-size: 14pt; color: gray">O pedido <b>#{{ $pedido->id }}</b> foi realizado em <b>{{ date_format($pedido->created_at,'d-m-Y') }}</b> e actualmente está <b>
                @if($pedido->status == 'RE')
                    No carrinho
                @endif
                @if($pedido->status == 'AP')
                    Aguardando pagamento
                @endif
                @if($pedido->status == 'PA')
                    Pago
                @endif
                @if($pedido->status == 'CA')
                    Cancelado
                @endif
                    @if($pedido->status == 'FI')
                        Finalizado
                    @endif
            </b></p>

        <div class="col-md-6 col-sm-12" style="background: #f7f7f7;  margin-top: 40px; padding: 15px;">
            <h2 style="border-bottom: 1px solid gray; padding-bottom: 20px;">Pedido</h2>
            <table class="table table-striped" style="margin-top: 5px;">
                <theader>
                    <tr>
                        <th>Produto</th><th>Qtd</th><th>Sub total</th>
                    </tr>
                </theader>
                <tbody>
                <?php $total = 0; $precoReal = 0; ?>

                    @foreach($pedido->pedido_produtos as $pedido_produto)
                        @foreach($listaImagem as $img)
                            @if($pedido_produto->produto->id == $img->product_id)
                                <tr>
                                    <td style="vertical-align: middle;"><img src="{{ asset('uploads/'.$img->imagem) }}" alt="" style="width: 50px;"/>{{ $pedido_produto->produto->nome }}</td>
                                    <td style="vertical-align: middle;">{{ $pedido_produto->qtd }}</td>
                                    <td style="vertical-align: middle;">{{ number_format($pedido_produto->produto->preco*$pedido_produto->qtd,2,',','.') }} Kz</td>
                                </tr>
                                <?php $total = $total + ($pedido_produto->produto->preco*$pedido_produto->qtd) ?>
                            @endif
                        @endforeach
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
        </div>

        <div class="col-md-6 col-sm-12" style="margin-top: 40px; padding: 15px;">
            <h2 style="border-bottom: 1px solid gray; padding-bottom: 20px; color: gray;">Endereço de Faturamento</h2>
            <ul class="listaEndereco">
                <li><em><i class="fa fa-user-o"></i> {{ Auth::guard('web')->user()->nome }}</em></li>
                <li><em><i class="fa fa-envelope-o"></i> {{ Auth::guard('web')->user()->email }}</em></li>
                <li><em><i class="fa fa-phone"></i> {{ $pedido->telefone }}</em></li>
                <li><em><i class="fa fa-map-marker"></i> {{ $pedido->provincia }}</em></li>
                <li><em><i class="fa fa-map-marker"></i> {{ $pedido->endereco }}</em></li>
                <li> <em><i class="fa fa-map-marker"></i> {{ $pedido->local_referenca }}</em></li>
            </ul>
        </div>
        @endforeach
    </div>

    </div>

@endsection