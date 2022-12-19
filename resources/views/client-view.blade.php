@extends("layouts.app")

@section("titulo")
    Minha Conta
@endsection

@section("conteudo")

   <div class="container">
       <h2 style="text-align: center; text-transform: uppercase; margin-top: 20px;">Minha Conta</h2>
       <p>Olá <b>{{ Auth::guard('web')->user()->nome }}</b>, apartir do painel da sua conta vai poder gerenciar, sua conta alterar
       sua senha e outros detalhes da conta</p>
       <table class="table table-bordered" style="margin-top: 20px;">
           <tr>
               <td style="text-align: center;"><a href="{{ route('mypedidos') }}" class="btn btn-light" style=" width: 100%; height: 40px;">Meus Pedidos</a></td>
               <td style="text-align: center;"><a href="{{ route('mydados') }}" class="btn btn-light" style=" width: 100%; height: 40px;">Meus Dados</a></td>
           </tr>
           <tr>
               <td style="text-align: center;"><a href="{{ route('mypontos') }}" class="btn btn-light" style=" width: 100%; height: 40px;">Meus Pontos</a></td>
               <td style="text-align: center;"><a href="{{ route('mydownloads') }}" class="btn btn-light" style=" width: 100%; height: 40px;">Meus Downloads</a></td>
           </tr>
       </table>
   </div>

@endsection