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
                @if(session('danger'))
                    <div class="alert alert-danger">
                        <strong>{{ session('danger') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                Detalhes do Cliente
            </div>


        </div>
        <div>

            <h2>{{ $client[0]->nome }}</h2>
            <h4>{{ $client[0]->email }}</h4>

            <table class="table table-striped table-bordered" style="margin-top: 50px;">
                <tr>
                    <th>Total de Pedidos Finalizados</th>
                    <td>{{ count($pedidos_fi) }}</td>
                </tr>
                <tr>
                    <th>Total de Pedidos Aguardando pagamento</th>
                    <td>{{ count($pedidos_ap) }}</td>
                </tr>
                <tr>
                    <th>Total de Pedidos Cancelados</th>
                    <td>{{ count($pedidos_ca) }}</td>
                </tr>
                <tr>
                    <th>Total de Pontos Acumulados</th>
                    <td>{{ number_format($pontos[0]->ponto_total,2,',','.') }} Kzs</td>
                </tr>
                <tr>
                    <th>Total de Pontos Levantados</th>
                    <td>{{ number_format($pontos[0]->ponto_retirado,2,',','.') }} Kzs</td>
                </tr>
                <tr>
                    <th>Total de Livros Baixados Grátis</th>
                    <td>{{ count($downloads_gratis) }}</td>
                </tr>
                <tr>
                    <th>Total de Livros Baixados em Plano</th>
                    <td>{{ count($downloads_pagos) }}</td>
                </tr>
            </table>

        </div>

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