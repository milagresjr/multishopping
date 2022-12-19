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
            <div class="col-md-12">
                Lista de Clientes
            </div>
        </div>
        <table class="table table-bordered">
            <theader>
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th width="250">Email</th>
                    <th>Status</th>
                    <th>Ops</th>
                </tr>
            </theader>
            <tbody>
            @foreach($clients as $cli)
                <tr>
                            <td style="vertical-align: middle;">{{ $cli->id }}</td>
                            <td style="vertical-align: middle;">{{ $cli->nome }}</td>
                            <td style="vertical-align: middle;">{{ $cli->email }}</td>
                            <td style="vertical-align: middle;">{{ $cli->status }}</td>
                               <td>
                                   <a href="{{ action('ClientAdminController@show',$cli->id) }}" class="btn btn-primary">Detalhes</a>
                                   @if($cli->status == 'Ativo')
                                      <a href="{{ route('desativar_client',$cli->id) }}" class="btn btn-danger">Desativar</a>
                                    @else
                                       <a href="{{ route('ativar_client',$cli->id) }}" class="btn btn-success">Ativar</a>
                                   @endif
                                   <a href="{{ route('habilitar_plano',$cli->id) }}" class="btn btn-success">Habilitar planos</a>
                            </td>
                        </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
@include('admin.includes.footer-admin')