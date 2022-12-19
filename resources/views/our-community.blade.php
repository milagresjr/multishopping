@extends("layouts.app")

@section("titulo")
    Nossa Comunidade
@endsection

@section("conteudo")
    <style>
        h1{text-align: center;}
        .main{margin-top: 20px;}
        p{font-size: 13pt;}
        a{margin-top: 10px;}
        .plano{border: 2px solid #c02720; padding: 10px; margin-top: 10px; border-radius: 31px;text-align: center; padding-bottom:20px;}
        .plano h2{text-align: center;}
        .plano p{text-align: center;}
        .plano a {margin: auto;}
    </style>

    <div class="clearfix"></div>
    <div class="container main">

    <h1>Planos MS</h1>
    <!--<p>Ópha :( <strong> #Auth::guard('web')->user()->nome }}!</strong></p> -->
    <p class="lead">
        Olá, prezado(a)!
        Para continuar à baixar mais de 1.500 livros digitais, faça à sua subscrição num dos nossos planos.
        E semanalmente disponibilizamos ebook especial para os assinantes.
    </p>

      <div class="row">
          <div class="col-md-6">
              <div class="plano">
              <h2>Plano MS-Premium (500,00 Kzs)</h2>
                  <p style="margin-bottom:15px;">Baixe até 4 livros e receba 2 ebooks grátis em um mês por apenas 500,00 Kzs</p>
                  <a href="{{ route('community_package','Plano MS-Premium') }}" class="botao" style="background-color:#c02720;">Assinar Agora</a>
              </div>
          </div>
          <div class="col-md-6">
              <div class="plano">
              <h2>Plano MS-PrÓ (1000,00 Kzs)</h2>
                  <p style="margin-bottom:15px;">Baixe até 11 livros e receba 4 ebooks grátis em um mês por apenas 1000,00 Kzs</p>
                  <a href="{{ route('community_package','Plano MS-PrO') }}" class="botao" style="background-color:#c02720;">Assinar Agora</a>
              </div>
          </div>
          <div class="col-md-6">
              <div class="plano">
              <h2>Plano MS-PrÓ Mais (2000,00 Kzs)</h2>
                  <p style="margin-bottom:15px;">Baixe até 22 livros e receba 6 ebooks grátis em um mês por apenas 2000,00 Kzs</p>
                  <a href="{{ route('community_package','Plano MS-PrO Mais') }}" class="botao" style="background-color:#c02720;">Assinar Agora</a>
          </div>
              </div>
          <div class="col-md-6">
              <div class="plano">
              <h2>Plano MS-Ultimate (3000,00 Kzs)</h2>
                  <p style="margin-bottom:15px;">Baixe até 35 livros e receba 8 ebooks grátis em um mês por apenas 3000,00 Kzs</p>
                  <a href="{{ route('community_package','Plano MS-Ultimate') }}" class="botao" style="background-color:#c02720;">Assinar Agora</a>
          </div>
              </div>
      </div>

    </div>

@endsection
