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

        <div class="container">
                <p style="margin-top: 15px; margin-bottom: 20px;" class="lead">
                    Escolheu {{ $formaEnvio }} como via de comunicação para lhe enviarmos o seu código
                    para levantamento dos seus pontos.

                    Aguarde que vamos enviar o seu código de levantamento sem cartão.
                </p>
                <p>
            </div>

    </div>

@endsection