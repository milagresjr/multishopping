@extends("layouts.app")

@section("conteudo")
 <div class="container">
     <h2 style="text-align: center; margin: 20px;">Perguntas Frequentes</h2>
    <div class="panel-group" id="acordian">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <label for="entreg" style="font-weight: normal;"
                           data-target="#collapseone" data-toggle="collapse" data-parent="#acordian"
                            >Como criar uma conta?</label>
                </h4>
            </div>
            <div id="collapseone" class="panel-collapse collapse in">
                <div class="panel-body">
                    <p>
                        O registo no site é o primeiro passo para efectuar um pedido. Basta fazê-lo uma vez
                        . Apartir daí todo processo de compra é mais rápido e lhe permite acompanhar todos os estados
                        dos seus pedidos. Para criar uma conta basta clicar em <<Registar>> preenche o formulário
                        com o seu email, telefone, uma palavra-passe econfirme em REGISTAR.
                    </p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <label for="trans" style="font-weight: normal;"
                           data-target="#collapsetwo" data-toggle="collapse" data-parent="#acordian"
                            >Quais as formas de pagamento aceita a Multishopping?</label>
                </h4>
            </div>
            <div id="collapsetwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <p style="text-align: justify;">
                        Pagamento por transferência bancária / Pagamento no momento da entrega do produto.
                    </p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <label for="trans" style="font-weight: normal;"
                           data-target="#collapsetree" data-toggle="collapse" data-parent="#acordian"
                            >Quais são as condições para trocar ou devolver artigo?</label>
                </h4>
            </div>
            <div id="collapsetree" class="panel-collapse collapse">
                <div class="panel-body">
                    <p style="text-align: justify;">
                        O Cliente dispõe de um prazo de 2 dias para resolver o contrato sem pagamento de indemnização e sem necessidade de indicar o motivo, prazo que se conta a partir do dia da recepção da encomenda pelo Cliente. Para tal deverá solicitar o número de devolução e as devidas instruções através do endereço de e-mail MultiShopping.ms@gma­il.co.ao ou através do serviço de Apoio ao Cliente (Chat) ou através da linha telefónica de apoio +244 951772431.

                    </p>
                        <p>Encontrarás todos os detalhes da política de devoluções no menu "Termos e condições".</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <label for="trans" style="font-weight: normal;"
                           data-target="#collapsefour" data-toggle="collapse" data-parent="#acordian"
                            >Fazem entrega em todo país?</label>
                </h4>
            </div>
            <div id="collapsefour" class="panel-collapse collapse">
                <div class="panel-body">
                    <p style="text-align: justify;">
                        Não. Entregamos apenas na província de Luanda.
                        Porém, em curto prazo faremos as transações para o país todo.
                    </p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <label for="trans" style="font-weight: normal;"
                           data-target="#collapsefive" data-toggle="collapse" data-parent="#acordian"
                            >Como fico a saber de todas as novidades do website??</label>
                </h4>
            </div>
            <div id="collapsefive" class="panel-collapse collapse">
                <div class="panel-body">
                    <p style="text-align: justify;">
                        Para saber de todas novidades do site você precisa subscrever a nossa
                        newsletter ou registar-se no site.
                    </p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <label for="trans" style="font-weight: normal;"
                           data-target="#collapsesix" data-toggle="collapse" data-parent="#acordian"
                            >Fazem entrega em todo país?</label>
                </h4>
            </div>
            <div id="collapsesix" class="panel-collapse collapse">
                <div class="panel-body">
                    <p style="text-align: justify;">
                        Não. Entregamos apenas na província de Luanda.
                        Porém, em curto prazo faremos as transações para o país todo.
                    </p>
                </div>
            </div>
        </div>

    </div>

 </div>
@endsection