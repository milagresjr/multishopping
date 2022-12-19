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
                    <li><a href="{{ route('view_cart')  }}">Carrinho</a></li>
                    <li class="active">Informação</li>
                    <li class="active">Pagamento</li>
                    <li class="active">Finalizar</li>
                </ol>
            </div>
        <div class="col-md-7 col-lg-7 col-sm-12" style="background: transparent;">
            <div class="">
                <h4 class="white-w3ls"><span style="color: #000;">Detalhes de</span> <span style="color: #000;">faturamento</span></h4>
                <form action="{{ route('payment_cart') }}" method="post" id="form-check">
                    @csrf
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{ Auth::guard('web')->user()->nome }}" readonly required="">
                     </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{ Auth::guard('web')->user()->email }}" required="">
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="{{ Auth::guard('web')->user()->telefone }}" required="">
                    </div>
                    <div class="form-group">
                        <label>Nome da Empresa (Opcional)</label>
                        <input type="text" class="form-control" name="nome_empresa" style="color: #000;">
                    </div>
                    <div class="form-group">
                        <label>Provincia* (Não fazemos entrega fora de Luanda)</label>
                        <input type="text" class="form-control" name="provincia" required="" style="color: #000;">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label>Endereço*</label>
                        <input type="text" class="form-control" name="endereco" required="" style="color: #000;">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label>Local de Referência</label>
                        <input type="text" class="form-control" name="local_referenca" required="" style="color: #000;">
                        <span></span>
                    </div>
                    <div class="form-group">
                        <label>Informações do pedido (Caso tenha alguma dúvida)</label>
                        <textarea name="info_pedido" class="form-control" style="color: #000;"></textarea>
                        <span></span>
                    </div>
                    <button type="submit" class="btn btn-md btn-danger" value="Prosseguir">Prosseguir</button>
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
                        <td style="vertical-align: middle;">{{ number_format($pedido_produto->produto->preco*$pedido_produto->qtd,2,',','.') }} Kz</td>
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

@endsection
