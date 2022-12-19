@extends("layouts.app")

@section("titulo")
    Chechout
@endsection

@section("conteudo")
    <style>
        .input{ height: 40px;}
    </style>

    <div class="clearfix"></div>
    <div class="container">
        <div class="row">
            <ol class="breadcrumb" style="margin-top: 40px;">
                <li>Carrinho</li>
                <li>Informação</li>
                <li>Pagamento</li>
                <li class="active">Finalizar</li>
            </ol>
        </div>
        <div class="col-md-7 col-lg-7 col-sm-12 contact-form" style="padding-left: 0px; padding-right: 0px; background-color: transparent;">
            <div class="" >
                <h4 class="white-w3ls"><span style="color: #000;">Compra</span> <span style="color: #000;">finalizada</span></h4>
                 @if(isset($formaPag) && $formaPag == "Pagamento por transferencia")

                    @else
                       <h3><i class="fa fa-money"></i> Pagamento na Entrega do Produto</h3>
                       <p>Obrigado por comprar na Multishopping, seu pedido foi recebido</p>
                   @endif
                <table class="table" style="">
                    <tr><th colspan="2">Para fazer o pagamento por ATM usa as seguinte:</th></tr>
                    <tr><td><strong>Banco</strong></td><td>BAI</td></tr>
                    <tr><td><strong>Entidade</strong></td><td>Salomão Albino Tchissende</td></tr>
                    <tr><td><strong>Número da conta</strong></td><td>162918130.10.001</td></tr>
                    <tr><td><strong>IBAN</strong></td><td>0600.4000.0062.9181.3010.180</td></tr>
                </table>
                <hr/>
                <table class="table" style="">
                    <tr><td><strong>Banco</strong></td><td>BFA</td></tr>
                    <tr><td><strong>Entidade</strong></td><td>Ndongala Divengele</td></tr>
                    <tr><td><strong>IBAN</strong></td><td>AO06005500001207274610142</td></tr>
                </table>
                <hr/>
                <table class="table" style="">
                    <tr><td><strong>Banco</strong></td><td>ATLÂNTICO</td></tr>
                    <tr><td><strong>Entidade</strong></td><td>Mizael Luciano Nhanga</td></tr>
                    <tr><td><strong>IBAN</strong></td><td>AO06004000006291813010180</td></tr>

                </table>
                <hr/>
                <table>
                     <tr><td><strong>Valido até</strong></td><td>{{ date('d/m/Y') }}</td></tr>
                </table>
                    <p style="margin-bottom: 20px;">Acompanhe o andamento do seu pedido pelo nosso whatsapp +244 951772431</p>
                    <a href="{{ route('home') }}" class="botao mt-5" style="margin-top: 15px;">Ir a página inicial</a>
            </div>


        </div>
        <div class="col-md-5 col-sm-12" style="background: #f7f7f7; border: 1px solid #000; margin-top: 90px; padding: 15px;">
            <h2 style="border-bottom: 1px solid gray; padding-bottom: 20px;">Seu pedido</h2>
            <table class="table table-striped" style="margin-top: 5px;">
                <theader>
                    <tr>
                        <th>Produto</th><th>Qtd</th><th>Sub total</th>
                    </tr>
                </theader>
                <tbody>
                <?php $total = 0; $precoReal = 0; ?>
                @foreach($pedidos as $pedido)
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
                @endforeach
                </tbody>
                <tfooter>
                    <td colspan="2"><span style="font-weight: bold;">TOTAL</span></td>
                    <td>{{ number_format($total,2,',','.') }} Kz</td>
                </tfooter>
            </table>
        </div>


    </div>
    </div>

<!--
    <div class="modal fade bs-example-modal-sm" id="modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    #if($total < 4999)
                        <h4>Você ganhou +  #number_format(($total*3)/100,2,',','.') kzs em ponto.</h4>
                        <p>Podes levantar a qualquer momento quando exceder a 4.999,00kzs.</p>
                    #else
                        <h4>Você ganhou +  #number_format(($total*3)/100,2,',','.') }}kzs em ponto.</h4>
                        <p>Podes levantar a qualquer momento.</p>
                    #endif
                </div>
            </div>
        </div>
    </div>
-->


@endsection
