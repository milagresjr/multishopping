@include('admin.includes.header-admin')
<!-- main content start-->
<div id="page-wrapper">
    <div class="main-page">

        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        <strong>{{ session('success') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                Pedidos
            </div>
            <div class="col-md-6 text-right">
             </div>
        </div>
        <table id="tabela" class="table table-bordered" style="margin-top: 20px;">
            <theader>
                <tr>
                    <th style="text-transform: uppercase;">Pedido</th>
                    <th style="text-transform: uppercase;">Data do pedido</th>
                    <th style="text-transform: uppercase;">Status</th>
                    <th style="text-transform: uppercase;">Forma de Pagamento</th>
                    <th style="text-transform: uppercase;">Total a pagar</th>
                    <th style="text-transform: uppercase;">Cliente</th>
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
                        </b>
                    </td>
                    <td>{{ $pedido->forma_pagamento }}</td>
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
                        @foreach($clients as $cli)
                            @if($pedido->client_id == $cli->id)
                                {{ $cli->nome }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @if($pedido->status == 'AP' || $pedido->status == 'RE')
                            <form action="{{ route('cancelar_pedido_admin') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $pedido->id }}" name="pedido_id"/>
                                <a href="{{ route('details_pedido_admin',$pedido->id) }}" class="btn btn-primary">Detalhes</a>
                                <button type="submit" class="btn btn-danger">Cancelar</button>
                            </form>
                            <form action="{{ route('finalizar_pedido_admin') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $pedido->id }}" name="pedido_id"/>
                                <button type="submit" class="btn btn-success">Finalizar</button>
                            </form>
                        @else
                            <a href="{{ route('details_pedido_admin',$pedido->id) }}" class="btn btn-primary">Detalhes</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

<script>
    $(document).ready( function () {
        $('#tabela').dataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponivel",
                "infoFiltered": "(filtrado de _MAX_ registros no total)"
            }
        });
    } );
</script>
@include('admin.includes.footer-admin')