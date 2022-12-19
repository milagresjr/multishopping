@extends("layouts.app")

@section("titulo")
    Nossa Comunidade
@endsection

@section("conteudo")
    <style>
        h1{text-align: center;}
        .main{margin-top: 20px;}
        p{font-size: 13pt; margin-top: 15px;}
        a{margin-top: 10px;}
        ol li{font-size: 13pt;}
        ul{list-style: none;}
        ul li{font-size: 13pt;}
    </style>

    <div class="clearfix"></div>
    <div class="container main">

        <h1>{{ $plano }}</h1>
        <p>Olá <strong>{{ Auth::guard('web')->user()->nome }}!</strong>, Assinaste o {{ $plano }}
        . Para que o seu plano esteja ativo, faça o pagamento do valor nas coordenadas bancárias abaixo e envie o seu comprovativo no nosso e-mail ou WhatsApp.</p>
       <!-- <p>Por favor, envie o seu comprovativo de depósito ou de transferência bancária no nosso
            whatsApp. Após 2 minutos, ativaremos o plano e poderás voltar a baixar e desfrutar de mais de 1.500 livros
            que temos para si.</p> -->
        <div class="panel-group" id="acordian" style="margin-top: 15px;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title" style="color:#c02720; font-weight: 600;">
                        Coordenadas bancárias
                    </h4>
                </div>
                <div id="collapseone" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <table class="table">
                            <tr><td><strong>Banco</strong></td><td>BAI</td></tr>
                            <tr><td><strong>Entidade</strong></td><td>Salomão Albino Tchissende</td></tr>
                            <tr><td><strong>Número da conta</strong></td><td>162918130.10.001</td></tr>
                            <tr><td><strong>IBAN</strong></td><td>0600.4000.0062.9181.3010.180</td></tr>
                        </table>
                        <hr/>
                        <table class="table" style="">
                            <tr><td><strong>Banco</strong></td><td>BFA</td></tr>
                            <tr><td><strong>Entidade</strong></td><td>Ndongala Divengele</td></tr>
                            <tr><td><strong>IBAN</strong></td><td>AO06005500001207274610142</td></tr>
                        </table>
                        <hr/>
                        <table class="table" style="">
                            <tr><td><strong>Banco</strong></td><td>ATLÂNTICO</td></tr>
                            <tr><td><strong>Entidade</strong></td><td>Mizael Luciano Nhanga</td></tr>
                            <tr><td><strong>IBAN</strong></td><td>AO06004000006291813010180</td></tr>

                        </table>
                    </div>
                </div>
        </div>

    </div>
</div>
@endsection
