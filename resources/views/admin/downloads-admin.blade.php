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
                Lista de Clientes
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ action('ProductAdminController@create') }}" class="btn btn-primary float-right w-25">Novo</a>
            </div>
        </div>
        <table class="table table-striped" style="margin-top: 20px;">
            <theader>
                <tr>
                    <th style="text-transform: uppercase;">Download</th>
                    <th style="text-transform: uppercase;">Data do download</th>
                    <th style="text-transform: uppercase;">Livro</th>
                    <th style="text-transform: uppercase;">Titulo</th>
                    <th style="text-transform: uppercase;">Autor</th>
                    <th style="text-transform: uppercase;">Cliente</th>
                </tr>
            </theader>
            <tbody>

            @foreach($downloads as $download)
                <tr>
                    <td style="vertical-align: middle;"><b>#{{ $download->id }}</b></td>
                    <td style="vertical-align: middle;">{{ date_format($download->created_at,'d-M-Y') }}</td>
                    <td style="vertical-align: middle;">
                        @foreach($listaLivros as $livro)
                            @if( $download->livro_id == $livro->id)
                                <img src="{{ asset('uploads/livros/'.$livro->imagem_capa) }}" alt="" style="width: 60px; height: 60px;"/>
                            @endif
                        @endforeach
                    </td>
                    <td style="vertical-align: middle;">
                        @foreach($listaLivros as $livro)
                            @if( $download->livro_id == $livro->id)
                                {{ $livro->titulo }}
                            @endif
                        @endforeach
                    </td>
                    <td style="vertical-align: middle;">
                        @foreach($listaLivros as $livro)
                            @if( $download->livro_id == $livro->id)
                                {{ $livro->autor }}
                            @endif
                        @endforeach
                    </td>
                    <td style="vertical-align: middle;">
                        @foreach($clients as $cli)
                            @if( $download->client_id == $cli->id)
                                {{ $cli->nome }}
                            @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
@include('admin.includes.footer-admin')