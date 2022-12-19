@extends("layouts.app")

@section("titulo")
    Carrinho
@endsection

@section("style")
    <style>
        #tabela{
           
        }
    </style>
@endsection

@section("conteudo")
        <div class="container" style="margin-top: 50px;">
    @forelse($pedidos as $pedido)

        @if(Session::has('mensagem-sucesso'))
            <div class="alert alert-success">
                <strong>{{ Session::get('mensagem-sucesso') }}</strong>
            </div>
        @endif
        @if(Session::has('mensagem-falha'))
                <div class="alert alert-danger">
                    <strong>{{ Session::get('mensagem-falha') }}</strong>
                </div>
        @endif

        <p>Pedido: <b>#{{ $pedido->id }}</b></p>
        <p>Criado em: <b>{{ date_format($pedido->created_at,'d/M/Y') }}</b></p>
    <table id="tabela-desktop" class="table table-striped">
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php $total = 0; ?>
            @foreach($pedido->pedido_produtos as $pedido_produto)
                @foreach($listaImagem as $img)
                    @if($pedido_produto->produto->id == $img->product_id)
                     <tr>
                         <td style="vertical-align: middle;"><img src="{{ asset('uploads/'.$img->imagem) }}" style="width: 60px; height: 60px;"></td>
                         <td style="vertical-align: middle;">{{ $pedido_produto->produto->nome }}</td>
                         <td style="vertical-align: middle;">{{ number_format($pedido_produto->produto->preco*$pedido_produto->qtd,2,',','.') }} Kz</td>
                         <td style="vertical-align: middle;">
                             <a href="#" onclick="carrinhoRemoverProduto({{$pedido->id}}, {{$pedido_produto->produto->id}}, 1)"><img src="{{ asset('images/Minus_32px.png') }}"></a>
                              {{ $pedido_produto->qtd }}
                             <a href="#" onclick="carrinhoAdcionarProduto({{ $pedido_produto->produto->id }})"><img src="{{ asset('images/Plus_32px.png') }}"></a>
                         </td>
                         <td style="vertical-align: middle;"><a href="#" class="btn btn-sm btn-danger" onclick="carrinhoRemoverProduto(
                             {{ $pedido->id }}, {{ $pedido_produto->produto->id }}, 0)"> <i class="fa fa-times"></i> Remover</a></td>
                     </tr>
                <?php $total = $total + ($pedido_produto->produto->preco*$pedido_produto->qtd) ?>
                    @endif
                @endforeach
            @endforeach
            </tbody>
            <tfooter>
            <tr>
                <td colspan="5">
                    Total: <span style="font-weight: bold;"><?php ?>{{ number_format($total,2,',','.') }} kz</span>
                </td>
            </tr>
        </tfooter>
    </table>

    <table id="tabela-mobile" class="table table-bordered">
            <tr><th>Imagem</th></tr>
            <tr><th>Nome</th></tr>
            <tr><th>Preço</th></tr>
            <tr><th>Quantidade</th></tr>
        
            <?php $total = 0; ?>
            @foreach($pedido->pedido_produtos as $pedido_produto)
                @foreach($listaImagem as $img)
                    @if($pedido_produto->produto->id == $img->product_id)
                     <tr><td style="vertical-align: middle;"><img src="{{ asset('uploads/'.$img->imagem) }}" style="width: 60px; height: 60px;"></td></tr>
                     <tr><td style="vertical-align: middle;">{{ $pedido_produto->produto->nome }}</td></tr>
                     <tr><td style="vertical-align: middle;">{{ number_format($pedido_produto->produto->preco*$pedido_produto->qtd,2,',','.') }} Kz</td></tr>
                     <tr><td style="vertical-align: middle;">
                             <a href="#" onclick="carrinhoRemoverProduto({{$pedido->id}}, {{$pedido_produto->produto->id}}, 1)"><img src="{{ asset('images/Minus_32px.png') }}"></a>
                              {{ $pedido_produto->qtd }}
                             <a href="#" onclick="carrinhoAdcionarProduto({{ $pedido_produto->produto->id }})"><img src="{{ asset('images/Plus_32px.png') }}"></a>
                         </td></tr>
                     <tr><td style="vertical-align: middle;" class="last-line"><a href="#" class="btn btn-sm btn-danger" onclick="carrinhoRemoverProduto(
                             {{ $pedido->id }}, {{ $pedido_produto->produto->id }}, 0)"> <i class="fa fa-times"></i> Remover</a></td>
                     </tr>
                <?php $total = $total + ($pedido_produto->produto->preco*$pedido_produto->qtd) ?>
                    @endif
                @endforeach
            @endforeach
    </table>

                    <a href="{{ route('checkout_cart') }}" class="botao">Finalizar Compra</a>

            @empty
                                 <h2>Carrinho Vazio</h2>
                                 <h1>Nenhum produto no seu carrinho!</h1>



    @endforelse

        </div>


        <form id="form-remover-produto" method="POST" action="{{ route('delete_cart') }}">
            @csrf
            {{ method_field('DELETE') }}
            <input type="hidden" name="pedido_id"/>
            <input type="hidden" name="product_id"/>
            <input type="hidden" name="item"/>
        </form>
        <form id="form-adcionar-produto" method="POST" action="{{ route('add_cart') }}">
            @csrf
            <input type="hidden" name="id"/>
        </form>

        <script type="text/javascript">
            function carrinhoRemoverProduto(idpedido, idproduto, item)
            {
                 $('#form-remover-produto input[name="pedido_id"]').val(idpedido);
                 $('#form-remover-produto input[name="product_id"]').val(idproduto);
                 $('#form-remover-produto input[name="item"]').val(item);
                 $('#form-remover-produto').submit();
                //alert(idpedido+' - '+idproduto);
            }

            function carrinhoAdcionarProduto(idproduto)
            {
                $('#form-adcionar-produto input[name="id"]').val(idproduto);
                $('#form-adcionar-produto').submit();
            }


            function removeProduto(p_idpedido,p_idproduto,p_item)
            {
                $.ajax({
                    url: "{{ route('delete_cart') }}",
                    method: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}",
                        pedido_id: p_idpedido,
                        product_id: p_idproduto,
                        item: p_item
                    }
                }).always(function(){
                    location.reload();
                });
            }

        </script>

@endsection