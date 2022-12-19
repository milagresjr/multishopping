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
                Habilitar Plano de livros
            </div>

        </div>

        <div>
            <table class="table table-striped table-bordered">
                <tr>
                <th>Plano Mensal de 500kzs</th>
                <th>Plano Mensal de 1000kzs</th>
                <th>Plano Mensal de 2000kzs</th>
                <th>Plano Mensal de 3000kzs</th>
                </tr>
                <tr>
                    <td><a href="{{ route('ativar_plano',['idCliente'=>$idCliente, 'plano'=>1]) }}" class="btn btn-success">Ativar Plano</a></td>
                    <td><a href="{{ route('ativar_plano',['idCliente'=>$idCliente, 'plano'=>2]) }}" class="btn btn-success">Ativar Plano</a></td>
                    <td><a href="{{ route('ativar_plano',['idCliente'=>$idCliente, 'plano'=>3]) }}" class="btn btn-success">Ativar Plano</a></td>
                    <td><a href="{{ route('ativar_plano',['idCliente'=>$idCliente, 'plano'=>4]) }}" class="btn btn-success">Ativar Plano</a></td>
                </tr>
            </table>
        </div>

    </div>
</div>
@include('admin.includes.footer-admin')