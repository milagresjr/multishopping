@include('admin.includes.header-admin')

<?php

    $notificacoes = \App\Models\Notifications::latest()->get();

?>

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
                Notificações
            </div>
        </div>
        <table id="tabela" class="table table-striped table-bordered">
            <theader>
                <tr>
                    <th>Codigo</th>
                    <th width="400">Notificação</th>
                    <th>Status</th>
                    <th>Data</th>
                </tr>
            </theader>
            <tbody>
            @foreach($notificacoes as $noti)
                <tr>
                    <td style="vertical-align: middle;">
                        @if($noti->statu == "N/vista")
                            <b>{{ $noti->id }}</b>
                        @else
                            {{ $noti->id }}
                        @endif
                    </td>
                    <td style="vertical-align: middle;">
                        @if($noti->statu == "N/vista")
                            <b>{{$noti->notificacao}}</b>
                        @else
                            {{$noti->notificacao}}
                        @endif
                    </td>
                    <td style="vertical-align: middle;">
                    @if($noti->statu == "N/vista")
                    <b>N/Lida</b>
                    @else
                    Lida
                    @endif
                    </td>
                    <td style="vertical-align: middle;">
                        @if($noti->statu == "N/vista")
                            <b>{{ date_format($noti->created_at,'d-M-Y') }}</b>
                        @else
                            {{ date_format($noti->created_at,'d-M-Y') }}
                        @endif
                    </td>
                    @if($noti->statu == "N/vista")
                    <td style="vertical-align: middle;"><a href="{{ route('marcar_lida',$noti->id) }}" class="btn btn-primary">Marcar como lida</a></td>
                    @else
                    @endif
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