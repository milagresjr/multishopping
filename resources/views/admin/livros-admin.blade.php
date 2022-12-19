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
                Lista de Livros Digitais
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ action('LivroAdminController@create') }}" class="btn btn-primary float-right w-25">Novo</a>
            </div>
        </div>
        <table id="tabela" class="table table-bordered">
            <theader>
                <tr>
                    <th>Codigo</th>
                    <th>Capa</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Opcs</th>
                </tr>
            </theader>
            <tbody>
            @foreach($livros as $liv)
                <tr>
                    <td style="vertical-align: middle;">{{ $liv->id }}</td>
                    <td style="vertical-align: middle;"><img src="{{ asset('uploads/capas_de_livros/'.$liv->imagem_capa) }}" alt="" style="width: 60px; height: 60px;"/></td>
                    <td style="vertical-align: middle;">{{ $liv->titulo }}</td>
                    <td style="vertical-align: middle;">{{ $liv->autor }}</td>
                    <td style="vertical-align: middle; text-align: left;">
                        <form action="{{ action('LivroAdminController@destroy',$liv->id) }}" method="post">
                            <a href="{{ action('LivroAdminController@edit',$liv->id) }}" class="btn btn-success">Alterar</a>
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