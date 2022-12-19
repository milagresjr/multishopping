@extends("layouts.app")

@section("titulo")
    Minha Conta
@endsection


@section("conteudo")
    <style>
        ul li{list-style: none; margin-top: 7px;}
        ul li label{font-weight: normal;}
        button{ background-color: #c02720; color: #fff; margin-top: 15px;}
    </style>
    <div class="container">
        <h2 style="text-align: center; text-transform: uppercase; margin-top: 20px;">Levantar Pontos</h2>

        @if(session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <?php $total =0; ?>
        @if(isset($pontos) && count($pontos) > 0)
            @foreach($pontos as $ponto)
                <?php $total = $total + $ponto->pontos ?>
            @endforeach
            <div class="container">
                <p style="margin-top: 15px; margin-bottom: 20px;" class="lead">
                    Conforme prometemos, os teus pontos são convertidos em dinheiro!

                    Para levantar os teus pontos, selecione abaixo dentre as opções( vias de comunicações)
                    mais seguras para receber o código que lhe permita efectuar o levantamento sem cartão à qualquer ATM.

                    O código tem duração de 24horas, e por favor, não partilhe o seu código com terceiros, o mesmo é exclusivamente secreto para si.
                </p>
                <p>

                <form action="{{ route('forma_envio_cod') }}" method="post">
                    @csrf
                    <h4>Por onde pretende receber o código?</h4>
                    <ul>
                    <li><input checked type="radio" name="formaEnvCod" value="Whastapp" id="whats"/> <label for="whats">Pelo whatsApp</label></li>
                    <li><input type="radio" name="formaEnvCod" value="Email" id="email"/> <label for="email">Pelo Email</label></li>
                    <li><input type="radio" name="formaEnvCod" value="SMS de Texto Normal" id="sms"/> <label for="sms">Por sms de texto normal</label></li>
                    </ul>
                    <button type="submit" class="btn">SEGUINTE</button>
                </form>

                </p>
            </div>

        @else
            <h3 style="margin-top: 20px; color: gray;">Nenhum ponto feito ate ao momento! :(</h3>
        @endif

    </div>

@endsection