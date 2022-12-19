@extends("layouts.app")

@section("conteudo")
    <div class="container">
        <h2 style="text-align: center; margin: 20px;">Inserir Codigo Recebido!</h2>

        <div class="container">
            <p style="font-size: 13pt; margin-bottom: 10px; color: green; font-weight: 700;">
               <i class="fa fa-check"></i>  O código de redefinição de senha foi enviado.
            </p>
            <p style="font-size: 13pt; margin-bottom: 10px;">
                Um código de redefinição de senha foi enviada para o endereço de e-mail da sua conta, mas pode levar alguns minutos para aparecer na sua caixa de entrada.
                Aguarde pelo menos 10 minutos antes de tentar novamente ou verifique sua caixa de spam.
            </p>
        </div>
        <form action="{{ route('alterar_senha_veri_cod') }}" method="post">
            @csrf
              <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="">Código*</label>
                        <input type="text" name="codigo" class="form-control" placeholder=""  required=""/>
                    </div>
              </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Nova Senha*</label>
                    <input type="password" name="nova_senha" class="form-control" placeholder="" required=""/>
                </div>
            </div>

            <div class="from-row">
                <div class="form-group col-md-12">
                    <input type="submit" value="REDEFINIR SENHA" class="btn btn-primary"/>
                </div>
            </div>

        </form>
    </div>
@endsection