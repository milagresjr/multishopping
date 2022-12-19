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
                <a href="{{ action('SubCategoryAdminController@create') }}" class="btn btn-primary float-right w-25">Nova Sub-categoria</a>
            </div>
        </div>
        <table id="tabela" class="table table-bordered">
            <theader>
                <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th width="300">Ops</th>
                </tr>
            </theader>
            <tbody>
            @foreach($subcategories as $subcat)
                <tr>
                    <td style="vertical-align: middle;">{{ $subcat->id }}</td>
                    <td style="vertical-align: middle;">{{ $subcat->nome }}</td>
                    @foreach($categoria as $cat)
                    @if($subcat->categoria_id == $cat->id)
                    <td style="vertical-align: middle;">{{ $cat->nome }}</td>
                    @endif
                    @endforeach
                    <td>
                        <form action="{{ action('SubCategoryAdminController@destroy',$subcat->id) }}" method="post">
                            <a href="{{ action('SubCategoryAdminController@edit',$subcat->id) }}" class="btn btn-success">Alterar</a>
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