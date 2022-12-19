@extends("layouts.app")

@section("titulo")
    Minha Conta
@endsection


@section("conteudo")

    <div class="container">
        <h2 style="text-align: center; text-transform: uppercase; margin-top: 20px;">Meus Pontos</h2>

        @if(session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <?php $total =0; ?>
        @if(isset($pontos))
            @foreach($pontos as $ponto)
                <?php $total = $total + $ponto->pontos ?>
            @endforeach
            @empty($pontos)
            <p style="margin-top: 15px;">Parabéns <b>{{ Auth::guard('web')->user()->nome }}</b>, acumulaste até ao momento <b>{{ number_format($total,2,',','.') }}</b> pontos.
            Poderás levantar o dinheiro quando exceder <b>5.000,00</b> pontos.</p>
            @endempty

        <table class="table table-striped" style="margin-top: 15px;">
            <theader>
                <th>Pedido</th>
                <th>Data de finalização da compra</th>
                <th>Ponto acumulado</th>
            </theader>
            <tbody>
            <script> $('#nenhum').hide(); </script>
            @forelse($pontos as $ponto)
            <tr>
            <td>#{{ $ponto->pedido_id }}</td>
            <td>{{ date_format($ponto->created_at,'d-M-Y') }}</td>
            <td>{{ number_format($ponto->pontos,2,',','.') }} Kz</td>
            </tr>
            </tbody>
            @empty

            @endforelse
            <tfooter>
                <th colspan="2">PONTOS ATIVO TOTAL</th>
                @if(isset($pontosTotal) && count($pontosTotal) > 0)
                <th>{{ number_format($pontosTotal[0]->ponto_total,2,',','.') }} Kz</th>
                @else
                    <th>00 Kz</th>
                @endif
            </tfooter>

        </table>
         @if(isset($pontosTotal) && count($pontosTotal) > 0)
                        @if($pontosTotal[0]->ponto_total >= 5000)
                            <a href="{{ route('levantar_pontos') }}" style="float: right;" class="botao">Levantar Pontos</a>
                        @endif

             @else
                        <div class="nenhum">
                            <h3 style="margin-top: 20px; color: gray;">Nenhum ponto feito até ao momento! :(</h3>
                            <h5 style="margin-top: 5px; color:gray;">Faça uma compra, para poderes acumular pontos a sua conta.</h5>
                        </div>
         @endif

       @endif
    </div>

@endsection