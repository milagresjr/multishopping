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
                Lista de Categorias
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ action('CategoryAdminController@create') }}" class="btn btn-primary float-right w-25">Nova categoria</a>
            </div>
        </div>
        <table id="tabela" class="table table-bordered">
            <theader>
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th width="340">Ops</th>
                </tr>
            </theader>
            <tbody>
            @foreach($categories as $cat)
                <tr>
                    <td style="vertical-align: middle;">{{ $cat->id }}</td>
                    <td style="vertical-align: middle;">{{ $cat->nome }}</td>
                    <td>
                        <form action="{{ action('CategoryAdminController@destroy',$cat->id) }}" method="post">
                        <a href="{{ route('add_image_cat',$cat->id) }}" class="btn btn-primary">Add Imagem</a>
                        <a href="{{ action('CategoryAdminController@edit',$cat->id) }}" class="btn btn-success">Alterar</a>
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