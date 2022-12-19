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
                Gestão dos Pontos
            </div>
            <div class="col-md-6 text-right">
            </div>
        </div>
        <table id="tabela" class="table table-bordered" style="margin-top: 20px;">
            <theader>
                <tr>
                    <th style="text-transform: uppercase;">Cliente</th>
                    <th style="text-transform: uppercase;">Email</th>
                    <th style="text-transform: uppercase;">Total de pontos Acumulados</th>
                    <th style="text-transform: uppercase;">Total de pontos Retirados</th>
                    <th>Opcs</th>
                </tr>
            </theader>
            <tbody>

            @foreach($pontos as $ponto)
                <tr>
                    <td>{{ $ponto->nome }}</td>
                    <td>{{ $ponto->email }}</td>
                    <td>{{ number_format($ponto->totPontos,2,',','.') }} Kzs</td>
                    <td>{{ number_format($ponto->totRetirados,2,',','.') }} Kzs</td>
                    <td>
                        @if($ponto->totPontos < 4999)
                        @else
                        <a href="{{ route('retirar_pontos',$ponto->idPonto) }}" class="btn btn-success">Retirar Pontos</a>
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