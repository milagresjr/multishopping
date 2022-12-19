@extends("layouts.app")

@section("conteudo")
    <div class="container">
        <h2 style="text-align: center; margin: 20px;">Recuperação de Senha</h2>

        <div class="container">
        <p style="font-size: 13pt; margin-bottom: 10px;">Esqueceu sua senha? Digite seu endereço de e-mail. Você receberá um código por e-mail para criar uma nova senha.</p>
        </div>
        <form action="{{ route('send_mail_reset_pass_store') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Email*</label>
                    <input type="email" name="email" class="form-control" required=""/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <input type="submit" value="REDEFINIR SENHA" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    </div>
@endsection