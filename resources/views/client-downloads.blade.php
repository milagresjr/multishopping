@extends("layouts.app")

@section("titulo")
    Minha Conta
@endsection


@section("conteudo")

    <div class="container">
        <h2 style="text-align: center; text-transform: uppercase; margin-top: 20px;">Meus Downloads</h2>

        @if(session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        @if(isset($downloads) && count($downloads) > 0)
        <table class="table table-striped" style="margin-top: 20px;">
            <theader>
                <tr>
                    <th style="text-transform: uppercase;">Download</th>
                    <th style="text-transform: uppercase;">Data do download</th>
                    <th style="text-transform: uppercase;">Livro</th>
                    <th style="text-transform: uppercase;">Titulo</th>
                    <th style="text-transform: uppercase;">Autor(a)</th>
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
                                    <img src="{{ asset('uploads/capas_de_livros/'.$livro->imagem_capa) }}" alt="" style="width: 60px; height: 60px;"/>
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
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
          <h3 style="margin-top: 20px; color: gray;">Nenhum download feito ate ao momento! :(</h3>
        @endif


    </div>

@endsection