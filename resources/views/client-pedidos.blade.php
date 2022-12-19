@extends("layouts.app")

@section("titulo")
    Minha Conta
@endsection


@section("conteudo")

    <div class="container">
        <h2 style="text-align: center; text-transform: uppercase; margin-top: 20px;">Meus Pedidos</h2>

        @if(session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        @if(isset($pedidos) && count($pedidos) > 0)
        <table class="table table-striped" style="margin-top: 20px;">
            <theader>
                <tr>
                    <th style="text-transform: uppercase;">Pedido</th>
                    <th style="text-transform: uppercase;">Data do pedido</th>
                    <th style="text-transform: uppercase;">Status</th>
                    <th style="text-transform: uppercase;">Finalização</th>
                    <th style="text-transform: uppercase;">Total a pagar</th>
                    <th style="text-transform: uppercase;">Opcs</th>
                </tr>
            </theader>
            <tbody>

            @foreach($pedidos as $pedido)
                <tr>
                <td><b>#{{ $pedido->id }}</b></td>
                <td>{{ date_format($pedido->created_at,'d-M-Y') }}</td>
                <td>
                    <b>
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
                    Concluido
                    @endif
                    </b>
                </td>
                <td>
                    @if($pedido->status == 'FI')
                        Finalizado
                    @else
                        Não Finalizado
                    @endif

                </td>
                    <td>
                        <?php $total = 0; $itens=0 ?>
                        @foreach($pedido->pedido_produtos as $pedido_produto)
                            <?php
                            $total = $total + $pedido_produto->valores;
                            $itens ++;
                            ?>
                        @endforeach
                       <b>{{ number_format($total,2,',','.' ) }} Kz</b> <span>de {{ $itens }} itens</span>
                    </td>
                <td>
                    @if($pedido->status == 'AP' || $pedido->status == 'RE')
                    <form action="{{ route('cancelar_pedido') }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $pedido->id }}" name="pedido_id"/>
                    <a href="{{ route('details_pedido',$pedido->id) }}" class="btn btn-primary">Detalhes</a>
                    <button type="submit" class="btn btn-danger">Cancelar pedido</button>
                    </form>
                    @else
                       <a href="{{ route('details_pedido',$pedido->id) }}" class="btn btn-primary">Detalhes</a>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <h3 style="margin-top: 20px; color: gray;">Nenhum pedido feito ate ao momento! :(</h3>
        @endif
    </div>

@endsection