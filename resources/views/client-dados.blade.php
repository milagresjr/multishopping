@extends("layouts.app")

@section("titulo")
    Minha Conta
@endsection


@section("conteudo")

    <div class="container">
        <h2 style="text-align: center; text-transform: uppercase; margin-top: 20px; margin-bottom: 15px;">Detalhes da conta</h2>

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
        <h4>{{ \Hash::check('0000',Auth::guard('web')->user()->nome) }}</h4>
        <form action="{{ route('alterar_dados_cliente') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Nome</label>
                    <input type="text" id="" name="nome" value="{{ Auth::guard('web')->user()->nome }}" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Email</label>
                    <input type="text" id="" name="email" value="{{ Auth::guard('web')->user()->email }}" class="form-control">
                </div>
            </div>
            <div class="container" style="margin-bottom: 20px;"><h4 style="color: gray;"><em>Alteração de senha</em></h4></div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Nova senha (Deixe em branco para não alterar)</label>
                    <input type="text" id="dropzone" name="senha_nova" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Confirmar Nova senha</label>
                    <input type="text" id="" name="senha_nova2" class="form-control">
                </div>
            </div>
            <div class="container"><button type="submit" class="btn btn-primary">Salvar Alterações</button></div>
        </form>
    </div>

@endsection