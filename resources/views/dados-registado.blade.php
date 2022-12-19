@extends("layouts.app")

@section("titulo")
    Minha Conta
@endsection


@section("conteudo")

    <div class="container">
        <h2 style="text-align: center; text-transform: uppercase; margin-top: 20px;">Levantar Pontos</h2>

        @if(session('success'))
            <div class="alert alert-success">
                <strong>{{ session('success') }}</strong>
            </div>
        @endif
        <?php $total =0; ?>
        <div class="container">
                <p style="margin-top: 20px; margin-bottom: 20px;" class="lead">
                    rios.
                </p>
        </div>

    </div>

@endsection