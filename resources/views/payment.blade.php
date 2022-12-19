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
                <li><a href="{{ route('view_cart')}}">Carrinho</a></li>
                <li><a href="{{ route('checkout_cart') }}">Informação</a></li>
                <li class="active">Pagamento</li>
                <li>Finalizar</li>
            </ol>
        </div>
        <div class="col-md-7 col-lg-7 col-sm-12 contact-form" style="background: transparent;">
            <div class="">
                <h4 class="white-w3ls"><span style="color: #000;">Forma de</span> <span style="color: #000;">pagamento</span></h4>

                <div>
                    <table class="table table-bordered">
                        <tr>
                            <td>Contacto</td>
                            <td>{{ Auth::guard('web')->user()->email }}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Enviar Para</td>
                            <td>{{ $endereco }}</td>
                            <td><a href="{{ route('checkout_cart') }}">Alterar</a></td>
                        </tr>
                    </table>
                </div>

                   <form id="form-forma_pag" action="{{ route('send_mail') }}" method="post">
                        @csrf
                       <input type="hidden" name="pedido_id" value="{{ $pedidos[0]->id }}"/>
                <div class="panel-group" id="acordian">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <input type="radio" checked name="forma_pag" value="Pagamento por transferencia" id="trans" data-target="#collapsetwo" data-toggle="collapse" data-parent="#acordian">
                                    <label for="trans" style="font-weight: normal;">Transferência bancária</label>
                            </h4>
                        </div>
                        <div id="collapsetwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p style="text-align: justify;">
                                    Efectue o seu pagamento por transferência bancária ou depósito directo na nossa conta.
                                    Por favor indique seu nome e da encomenda como referência da transferência ou depósito.
                                    A sua encomenda não será enviada até a confirmação do montante na nossa conta. Antes de qualquer
                                    transferência confirmar junto ao atendimento a disponibilidade do produto ou tempo de entrega.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                       <div>
                           Att: <span style="color:#c02720; font-weight:700;">Pagar 50% do valor total antes da entrega do pedido!</span>
                       </div>
             </form>
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
                <!--
                <tr>
                    <form action="#">
                        <td colspan="2">
                            <input type="text" class="form-control input-lg"  placeholder="Tem um cupon de desconto?"/>
                        </td>
                        <td>
                            <input type="submit" name="btnCupon" value="Enviar" class="btn btn-success btn-lg"/>
                        </td>
                    </form>
                </tr> -->
                </tbody>
                <tfooter>
                    <td colspan="2"><span style="font-weight: bold;">TOTAL</span></td>
                    <td>{{ number_format($total,2,',','.') }} Kz</td>
                </tfooter>

            </table>
                <a href="#" onclick="ativarFormPag()" class="botao" style="margin-top: 8px;">Finalizar Compra</a>
        </div>


    </div>
    </div>

    <script type="text/javascript">
        function ativarFormPag(){
            $('#form-forma_pag').submit();
        }
    </script>
@endsection
