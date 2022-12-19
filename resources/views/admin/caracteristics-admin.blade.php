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
                Lista de Caracteristicas dos Produtos
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ action('CaracteristicAdminController@create') }}" class="btn btn-primary float-right w-25">Nova caracteristica</a>
            </div>
        </div>
        <table class="table table-bordered">
            <theader>
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th width="340">Ops</th>
                </tr>
            </theader>
            <tbody>
            @foreach($caracteristics as $cara)
                <tr>
                    <td style="vertical-align: middle;">{{ $cara->id }}</td>
                    <td style="vertical-align: middle;">{{ $cara->nome }}</td>
                    <td>
                        <form action="{{ action('CaracteristicAdminController@destroy',$cara->id) }}" method="post">
                            <a href="{{ action('CaracteristicAdminController@edit',$cara->id) }}" class="btn btn-success">Alterar</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluír</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
@include('admin.includes.footer-admin')