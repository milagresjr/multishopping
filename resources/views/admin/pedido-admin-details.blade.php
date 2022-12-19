@include('admin.includes.header-admin')
<!-- main content start-->
<div id="page-wrapper" style="margin-bottom: 20px;">
    <div class="main-page">

        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        @foreach($pedidos as $pedido)
            <div class="container">
                <h2 style="text-align: center; text-transform: uppercase; margin-top: 20px;">Detalhes do Pedido #{{ $pedido->id }}</h2>

                <p style="margin: 20px; font-size: 14pt; color: gray">O pedido <b>#{{ $pedido->id }}</b> foi realizado em <b>{{ date_format($pedido->created_at,'d-m-Y') }}</b> e actualmente esta <b>
                        @if($pedido->status == 'RE')
                            Reservado
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
                                        <td style="vertical-align: middle;">{{ number_format($pedido_produto->produto->preco*$pedido_produto->qtd,2,',','.') }}</td>
                                    </tr>
                                    <?php $total = $total + ($pedido_produto->produto->preco*$pedido_produto->qtd) ?>
                                @endif
                            @endforeach
                        @endforeach

                        </tbody>
                        <tfooter>
                            <tr>
                                <td colspan="2"><span style="font-weight: bold;">Forma de Pagamento</span></td>
                                <td>{{ $pedido->forma_pagamento }} Kz</td>
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
                    <ul class="listaEndereco" style="list-style: none;">
                     @foreach($listaCliente  as $cli)
                         @if($pedido->client_id == $cli->id)
                        <li><em><i class="fa fa-user"></i> {{ $cli->nome }}</em></li>
                        <li><em><i class="fa fa-envelope-o"></i> {{ $cli->email }}</em></li>
                        <li><em><i class="fa fa-phone"></i> {{ $pedido->telefone }}</em></li>
                        <li><em><i class="fa fa-map-marker"></i> {{ $pedido->provincia }}</em></li>
                        <li><em><i class="fa fa-map-marker"></i> {{ $pedido->endereco }}</em></li>
                        <li> <em><i class="fa fa-map-marker"></i> {{ $pedido->local_referenca }}</em></li>
                        @endif
                     @endforeach
                    </ul>
                </div>
                @endforeach

    </div>
  </div>
</div>
@include('admin.includes.footer-admin')