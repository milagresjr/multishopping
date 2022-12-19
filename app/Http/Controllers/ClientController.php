<?php

namespace App\Http\Controllers;

session_start();

use App\Mail\EmailResetPassword;
use App\Models\Category;
use App\Models\CategoryLivros;
use App\Models\Client;
use App\Models\DadosBancarios;
use App\Models\Download;
use App\Models\Evaluation;
use App\Models\Pedido;
use App\Models\Points;
use App\Models\PointTotal;
use App\Models\ResetPassword;
use App\Models\SubCategory;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ClientController extends Controller
{
    public function cadastrar(Request $request){
        if($request->password == $request->confirm_password){
        //$client = new Client();

        $nome = $request->name;
        $email_tel = $request->email_tel;
        //$client->telefone = $request->input("phone","");
        $status = "Ativo";
        $senha = $request->password;
        $senhacripto = \Hash::make($senha);
        $email = NULL;
        $telefone = NULL;

        if(is_numeric($email_tel))
        {
            $telefone = $email_tel;
        }else{
            if(filter_var($email_tel ,FILTER_VALIDATE_EMAIL))
            {
                $email = $email_tel;
            }else{
                $_SESSION['cad_error'] = 'Email inválido, por favor ponha um email válido';
                return back();
            }
            }

        $insert = Client::create([
            'nome' => $nome,
            'email' => $email,
            'telefone' => $telefone,
            'senha' => $senhacripto,
            'status' => $status
        ]);
        if($insert){
            //return response()->json(['success' => 'Cliente Cadastrado!']);
            //return redirect()->route("home");
            session(['email_tel' => $email_tel]);
            session(['senha' => $senha]);

            return redirect()->route("login-cliente");
        }

        }else{
            $_SESSION['cad_error'] = 'As senhas não correspondem!';
            return back();
            //dd("Erro ao Cadastrar!");
        }
    }

    public function logar(Request $request){
        //dd('Ola, Minhas gatinhas');
        //if($request->isMethod("POST")){
            $email_tel = session('email_tel');//$request->input("email");
            $senha = session('senha');;//$request->input("senha");
            $credencias1 = ['email'=>$email_tel, 'password'=>$senha];
            $credencias2 = ['telefone'=>$email_tel, 'password'=>$senha];

            if(Auth::guard('web')->attempt($credencias1) || Auth::guard('web')->attempt($credencias2)){
                //dd("Usuario Logado :)");
                //return redirect()->route("home");
                return back();
            }else{
                //dd("Usuário Não logado: ".$email." - ".$senha);
                $_SESSION['acesso_neg'] = 'Acesso Negado! :(';
                return back();
            }
        //}

    }

    public function logout(Request $request){
        Auth::guard('web')->logout();

        return redirect()->route("home");
    }

    public function avaliar(Request $request)
    {
        $texto = $request->input('message');
        $idProduto = $request->input('product_id');
        $idCliente = Auth::guard('web')->user()->id;
        $estrelas = $request->input('estrelas');

        $insert = Evaluation::create([
            'client_id' => $idCliente,
            'product_id' => $idProduto,
            'texto' => $texto,
            'estrelas' => $estrelas
        ]);

        if($insert){
            return redirect()->route('product-details',$idProduto)->with('success','Obrigado! Avalição feita com sucesso!');
        }

    }

    public function myaccount()
    {
        if(!Auth::guard('web')->user()){
            return redirect()->route('home');
        }else{
            $data = [];

            $categoriaLivros = CategoryLivros::all();

            $listaCategorias = Category::limit(1)->get();

            $listaSubCategoriasHeader = SubCategory::all();

            $data['listaSubCategoria'] = $listaSubCategoriasHeader;

            $todasCategorias = Category::all();
            $categoriaHeader = Category::limit(2)->get();

            $data['todasCategorias'] = $todasCategorias;
            $data['listaCategoria'] = $listaCategorias;
            $data['categoriaHeader'] = $categoriaHeader;
            $data['categoriaLivros'] = $categoriaLivros;

            $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

            return view('client-view',$data);
        }
    }

    public function mypedidos()
    {
        if(!Auth::guard('web')->user()){
            return redirect()->route('home');
        }else{
            $data = [];

            $categoriaLivros = CategoryLivros::all();

            $listaCategorias = Category::limit(1)->get();

            $listaSubCategoriasHeader = SubCategory::all();

            $data['listaSubCategoria'] = $listaSubCategoriasHeader;

            $todasCategorias = Category::all();
            $categoriaHeader = Category::limit(2)->get();

            $data['todasCategorias'] = $todasCategorias;
            $data['listaCategoria'] = $listaCategorias;
            $data['categoriaHeader'] = $categoriaHeader;
            $data['categoriaLivros'] = $categoriaLivros;

            $pedidos = Pedido::where([
                'client_id' => Auth::guard('web')->user()->id
            ])->get();

            $listaImagem = \DB::select(\DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

            $data['pedidos'] = $pedidos;
            $data['listaImagem'] = $listaImagem;
            $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

            return view('client-pedidos',$data);
        }
    }

    public function detailsPedidos($idPedido)
    {
        if(!Auth::guard('web')->user()){
            return redirect()->route('home');
        }else{
            $data = [];

            $categoriaLivros = CategoryLivros::all();

            $listaCategorias = Category::limit(1)->get();

            $listaSubCategoriasHeader = SubCategory::all();

            $data['listaSubCategoria'] = $listaSubCategoriasHeader;

            $todasCategorias = Category::all();
            $categoriaHeader = Category::limit(2)->get();

            $data['todasCategorias'] = $todasCategorias;
            $data['listaCategoria'] = $listaCategorias;
            $data['categoriaHeader'] = $categoriaHeader;
            $data['categoriaLivros'] = $categoriaLivros;

            $pedidos = Pedido::where([
                'id' => $idPedido,
                'client_id' => Auth::guard('web')->user()->id
            ])->get();

            $listaImagem = \DB::select(\DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

            $data['pedidos'] = $pedidos;
            $data['listaImagem'] = $listaImagem;
            $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

            return view('client-details-pedidos',$data);
        }
    }

    public function mydownloads()
    {
        if(!Auth::guard('web')->user()){
            return redirect()->route('home');
        }else{
            $data = [];

            $categoriaLivros = CategoryLivros::all();

            $listaCategorias = Category::limit(1)->get();

            $listaSubCategoriasHeader = SubCategory::all();

            $data['listaSubCategoria'] = $listaSubCategoriasHeader;

            $todasCategorias = Category::all();
            $categoriaHeader = Category::limit(2)->get();

            $data['todasCategorias'] = $todasCategorias;
            $data['listaCategoria'] = $listaCategorias;
            $data['categoriaHeader'] = $categoriaHeader;
            $data['categoriaLivros'] = $categoriaLivros;

            $downloads = Download::where([
                'client_id' => Auth::guard('web')->user()->id
            ])->orderby('id','desc')->get();

            $listaLivros = \DB::select(\DB::raw("SELECT * FROM livros"));

            $data['downloads'] = $downloads;
            $data['listaLivros'] = $listaLivros;
            $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

            return view('client-downloads',$data);
        }
    }

    public function mydados()
    {
        $dados = [];
        $categoriaLivros = CategoryLivros::all();

        $listaCategorias = Category::limit(1)->get();

        $listaSubCategoriasHeader = SubCategory::all();

        $data['listaSubCategoria'] = $listaSubCategoriasHeader;

        $todasCategorias = Category::all();
        $categoriaHeader = Category::limit(2)->get();

        $data['todasCategorias'] = $todasCategorias;
        $data['listaCategoria'] = $listaCategorias;
        $data['categoriaHeader'] = $categoriaHeader;
        $data['categoriaLivros'] = $categoriaLivros;
        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));
        return view('client-dados',$data);
    }

    public function mypontos()
    {
        $dados = [];
        $categoriaLivros = CategoryLivros::all();

        $listaCategorias = Category::limit(1)->get();

        $listaSubCategoriasHeader = SubCategory::all();

        $data['listaSubCategoria'] = $listaSubCategoriasHeader;

        $todasCategorias = Category::all();
        $categoriaHeader = Category::limit(2)->get();

        $idClient = Auth::guard('web')->user()->id;

        $pontos = Points::where('client_id',$idClient)->get();
        $pontosTotal = PointTotal::where('client_id',$idClient)->get();

        $data['todasCategorias'] = $todasCategorias;
        $data['listaCategoria'] = $listaCategorias;
        $data['categoriaHeader'] = $categoriaHeader;
        $data['categoriaLivros'] = $categoriaLivros;
        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        $data['pontos'] = $pontos;
        $data['pontosTotal'] = $pontosTotal;

        return view('client-pontos',$data);
    }

    public function storeDados(Request $request)
    {
        $this->middleware('VerifyCsrfToken');

        $nome = $request->input('nome');
        //$senhaAtual = $request->input('senha_atual');
        $senhaNova = $request->input('senha_nova');
        $conf_senhaNova = $request->input('senha_nova2');
        $idCli = Auth::guard('web')->user()->id;

        if($senhaNova != '')
        {
                if($senhaNova == $conf_senhaNova)
                {
                    \DB::update('update clients set nome=?,senha=? where id=?',[
                        $nome,\Hash::make($senhaNova),$idCli
                    ]);
                    $update = \DB::update('update clients set nome=? where id=?',[
                        $nome,$idCli
                    ]);
                    if($update)
                        return redirect()->route('mydados')->with('success','Dados alterado com sucesso!');
                }else{
                    return redirect()->route('mydados')->with('danger','ERRO: As senhas não correspondem!');
                }
        }else{
            $update = \DB::update('update clients set nome=? where id=?',[
                $nome,$idCli
            ]);
            if($update)
            return redirect()->route('mydados')->with('success','Dados alterado com sucesso!');
        }
    }

    public function levantarPontos()
    {
        $pontos = Points::all();

        $data['pontos'] = $pontos;
        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view('levantar-pontos',$data);
    }

    public function registarDadosBancarios(Request $request)
    {
        $banco = $request->only('banco');

        //dd($banco);

        $numeroConta = $request->input('numero_conta');
        $iban = $request->input('iban');

        $idCli = Auth::guard('web')->user()->id;

        $inserir = DadosBancarios::create([
            'client_id' => $idCli,
            'banco' => $banco['banco'],
            'numero_conta' => $numeroConta,
            'iban' => $iban
        ]);

        if($inserir){
            return redirect()->route('levantar_pontos')->with('success','Dados bancários enviados com sucesso!');
        }
    }

    public function sendEmailResetPassStore(Request $request)
    {
        $email = $request->input('email');
        $gerarCodigo = function(){
            $a = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
            $b = array();
            for($i=0; $i<=6; $i++){
                $r = rand(0, sizeof($a) -1);
                $b[$i] = $a[$r];
            }
            $cod = join("",$b);

            return $cod;
        };

        $cod = $gerarCodigo();

        ResetPassword::create([
            'codigo' => $cod,
            'email' => $email
        ]);
        //$email =  "sebastianeurico19@gmail.com";
        Mail::to($email)->send(new EmailResetPassword($cod));

        return view('recuperar-senha2')->with('success','Foi lhe enviado um codigo');
    }

    public function alterarSenhaVeriCod(Request $request)
    {
        $cod = $request->input('codigo');
        $novaSenha = $request->input('nova_senha');

        $verificaCod = ResetPassword::where('codigo',$cod)->get();

        if(count($verificaCod) > 0){
            $altera = \DB::update('update clients set senha=? where email=?',[
                \Hash::make($novaSenha),$verificaCod[0]->email
            ]);
            if($altera){
                return redirect()->route('recupera_senha3')->with('success','Senha alterada com sucesso! Agora ja podes fazer o login');
            }
        }else{
            return redirect()->route('recupera_senha3')->with('danger','Código incorreto. Não foi possivel alterar a senha!');
        }
    }

    public function formaEnvioCod(Request $request)
    {
        $formaEnvio = $request->input('formaEnvCod');
        //dd($formaEnvio);
        $nome = Auth::guard('web')->user()->nome;
        $email = Auth::guard('web')->user()->email;
        $dataAtual = date('d-M-Y');
        $notifi = "O cliente ".$nome." com o email ".$email.", solicitou o levanto dos seus pontos.\nEnviar o código por ".$formaEnvio.".";
        $inserir = Notifications::create([
            'notificacao' => $notifi,
            'statu' => 'N/vista'
        ]);
        if($inserir){
            return view('forma-envio-cod',compact('formaEnvio'));
        }
    }
}
