<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Mail\SendEmailAdmin;
use App\Models\Category;
use App\Models\CategoryLivros;
use App\Models\ImagensProduct;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Points;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CarrinhoController extends Controller
{
    function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
       // dd('TESTANDO');
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
            'status' => 'RE',
            'client_id' => Auth::guard('web')->user()->id
        ])->get();

        $listaImagem = \DB::select(\DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $data['pedidos'] = $pedidos;
        $data['listaImagem'] = $listaImagem;
        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view('cart',$data);
    }

    public function addCarrinho(Request $request)
    {
        $this->middleware('VerifyCsrfToken');

        $idProduto = $request->input('id');

        $produto = Product::find($idProduto);

        if(empty($produto->id))
        {
            $request->session()->flash('mensagem-falha','Produto não encontrado!');
            return redirect()->route('view_cart');
        }

        $idCliente = Auth::guard('web')->user()->id;

        $idPedido = Pedido::consultaId([
            'client_id' => $idCliente,
            'status' => 'RE' //Reservado
        ]);

        if(empty($idPedido))
        {
            $pedido_novo = Pedido::create([
                'client_id' => $idCliente,
                'status' => 'RE'
            ]);


            $idPedido = $pedido_novo->id;
        }

        PedidoProduto::create([
            'pedido_id' => $idPedido,
            'product_id' => $idProduto,
            'valor' => $produto->preco,
            'status' => 'RE'
        ]);

        $request->session()->flash('mensagem-sucesso','Produto adcionado ao carrinho com sucesso!');
        return redirect()->route('view_cart');

    }

    public function comprarDireito(Request $request)
    {
        $this->middleware('VerifyCsrfToken');

        $idProduto = $request->input('id');

        $produto = Product::find($idProduto);

        if(empty($produto->id))
        {
            $request->session()->flash('mensagem-falha','Produto não encontrado!');
            return redirect()->route('view_cart');
        }

        $idCliente = Auth::guard('web')->user()->id;

        $idPedido = Pedido::consultaId([
            'client_id' => $idCliente,
            'status' => 'RE' //Reservado
        ]);

        if(empty($idPedido))
        {
            $pedido_novo = Pedido::create([
                'client_id' => $idCliente,
                'status' => 'RE'
            ]);


            $idPedido = $pedido_novo->id;
        }

        PedidoProduto::create([
            'pedido_id' => $idPedido,
            'product_id' => $idProduto,
            'valor' => $produto->preco,
            'status' => 'RE'
        ]);

        return redirect()->route('checkout_cart');

    }

    public function excluirCarrinho(Request $request)
    {
        $this->middleware('VerifyCsrfToken');

        $idPedido = $request->input('pedido_id');
        $idProduto = $request->input('product_id');
        $remove_apenas_item = (boolean)$request->input('item');

        $idCliente = Auth::guard('web')->user()->id;

        $idPedido = Pedido::consultaId([
            'id' => $idPedido,
            'client_id' => $idCliente,
            'status' => 'RE'
        ]);

        if(empty($idPedido))
        {
            $request->session()->flash('mensagem-falha','Pedido não encontrado');
            return redirect()->route('view_cart');
        }

        $where_produto = [
            'pedido_id' => $idPedido,
            'product_id' =>$idProduto
        ];

        $produto = PedidoProduto::where($where_produto)->orderBy('id','desc')->first();
        if(empty($produto->id))
        {
            $request->session()->flash('mensagem-falha','Produto não encontrado no carrinho');
            return redirect()->route('view_cart');
        }

        if($remove_apenas_item){
            $where_produto['id'] = $produto->id;
        }

        PedidoProduto::where($where_produto)->delete();

        $check_pedido = PedidoProduto::where([
            'pedido_id' => $produto->pedido_id
        ])->exists();

        if(!$check_pedido){
            Pedido::where([
                'id' => $produto->pedido_id
            ])->delete();
        }

        $request->session()->flash('mensagem-sucesso','Produto removido do carrinho com sucesso!');
        return redirect()->route('view_cart');

    }

    public function concluir(Request $request)
    {
        $this->middleware('VerifyCsrfToken');
        $idPedido = $request->input('pedido_id');
        $idCliente = Auth::guard('web')->user()->id;

        $check_pedido = Pedido::where([
            'id' => $idPedido,
            'client_id' => $idCliente,
            'status' => 'RE'
        ])->exists();

        if(!$check_pedido){
            $request->session()->flash('mensagem-falha','Pedido não encontrado!');
            return redirect()->route('view_cart');
        }

        $check_produtos = PedidoProduto::where([
            'pedido_id' => $idPedido
        ])->exists();
        if(!$check_produtos){
            $request->session()->flash('mensagem-falha','Produtos do pedido não encontrados!');
            return redirect()->route('view_cart');
        }

        PedidoProduto::where([
            'pedido_id' => $idPedido
        ])->update([
            'status' => 'AP' //Aguardando pagamento
        ]);

        Pedido::where([
            'id' => $idPedido
        ])->update([
            'status' => 'AP' //Aguardando pagamento
        ]);

        $request->session()->flash('mensagem-sucesso','Compra concluida com sucesso!');
        return redirect()->route('view_cart');
    }

    public function checkout()
    {
        $data = [];

        $categoriaLivros = CategoryLivros::all();

        $listaCategorias = Category::limit(1)->get();

        $listaSubCategoriasHeader = SubCategory::all();

        $pubs = \DB::select('SELECT * FROM pub_livros ORDER BY id DESC LIMIT 1');

        $data['listaSubCategoria'] = $listaSubCategoriasHeader;

        $todasCategorias = Category::all();
        $categoriaHeader = Category::limit(2)->get();

        $data['todasCategorias'] = $todasCategorias;
        $data['listaCategoria'] = $listaCategorias;
        $data['categoriaHeader'] = $categoriaHeader;
        $data['categoriaLivros'] = $categoriaLivros;
        $data['pubs'] = $pubs;

        $pedidos = Pedido::where([
            'status' => 'RE',
            'client_id' => Auth::guard('web')->user()->id
        ])->get();

        $listaImagem = \DB::select(\DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $data['pedidos'] = $pedidos;
        $data['listaImagem'] = $listaImagem;
        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view('checkout',$data);
    }

    public function payment(Request $request)
    {
        $data = [];

        $categoriaLivros = CategoryLivros::all();

        $listaCategorias = Category::limit(1)->get();

        $listaSubCategoriasHeader = SubCategory::all();

        $pubs = \DB::select('SELECT * FROM pub_livros ORDER BY id DESC LIMIT 1');

        $data['listaSubCategoria'] = $listaSubCategoriasHeader;

        $todasCategorias = Category::all();
        $categoriaHeader = Category::limit(2)->get();

        $data['todasCategorias'] = $todasCategorias;
        $data['listaCategoria'] = $listaCategorias;
        $data['categoriaHeader'] = $categoriaHeader;
        $data['categoriaLivros'] = $categoriaLivros;
        $data['pubs'] = $pubs;

        $provincia = $request->input('provincia','');
        $endereco = $request->input('endereco','');
        $empresa = $request->input('local_referenca','');
        $infoPedido = $request->input('info_pedido','');
        $local_refereca = $request->input('local_referenca','');
        $telefone = $request->input('telefone','');

        $update = \DB::update('update pedidos set telefone=?,nome_empresa=?,provincia=?,endereco=?,local_referenca=?,informacao_pedido=?',
        [$telefone,$empresa,$provincia,$endereco,$local_refereca,$infoPedido]);

        if($update)
        {
            $pedidos = Pedido::where([
                'status' => 'RE',
                'client_id' => Auth::guard('web')->user()->id
            ])->get();

            $listaImagem = \DB::select(\DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

            $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));
            $data['pedidos'] = $pedidos;
            $data['listaImagem'] = $listaImagem;

            return view('payment',compact('endereco','pedidos','listaImagem'));
        }else{
            dd("Dados nao alterados");
        }

    }

    public function finish($idPedido,$formaPag)
    {
        $data = [];

        $categoriaLivros = CategoryLivros::all();

        $listaCategorias = Category::limit(1)->get();

        $listaSubCategoriasHeader = SubCategory::all();

        $pubs = \DB::select('SELECT * FROM pub_livros ORDER BY id DESC LIMIT 1');

        $data['listaSubCategoria'] = $listaSubCategoriasHeader;

        $todasCategorias = Category::all();
        $categoriaHeader = Category::limit(2)->get();

        $data['todasCategorias'] = $todasCategorias;
        $data['listaCategoria'] = $listaCategorias;
        $data['categoriaHeader'] = $categoriaHeader;
        $data['categoriaLivros'] = $categoriaLivros;
        $data['pubs'] = $pubs;

        $this->middleware('VerifyCsrfToken');
        //$idPedido = $request->input('pedido_id');
        //$idCliente = Auth::guard('web')->user()->id;

        $pedidos = Pedido::where([
            'status' => 'RE',
            'client_id' => Auth::guard('web')->user()->id
        ])->get();

        $listaImagem = \DB::select(\DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));
        $data['pedidos'] = $pedidos;
        $data['listaImagem'] = $listaImagem;


        PedidoProduto::where([
            'pedido_id' => $idPedido
        ])->update([
            'status' => 'AP' //Aguardando pagamento
        ]);

        Pedido::where([
            'id' => $idPedido
        ])->update([
            'status' => 'AP', //Aguardando pagamento
            'forma_pagamento' => $formaPag
        ]);

        return view('finish',compact('formaPag','pedidos','listaImagem'))->with('success','Compra realizada com sucesso! O seu pedido');
    }

    public function cancelarPedido(Request $request)
    {
        $this->middleware('VerifyCsrfToken');


        $idPedido = $request->input('pedido_id');

        $cancelPedido = Pedido::where([
            'id' => $idPedido
        ])->update([
            'status' => 'CA' //Cancela pedido
        ]);

        if($cancelPedido)
        {
            return redirect()->route('mypedidos')->with('success','Pedido cancelado com sucesso!');
        }

    }

    public function sendEmail(Request $request){
        $idPedido = $request->input('pedido_id');
        $emailCliente = Auth::guard('web')->user()->email;
        Mail::to("multisocial.geral@gmail.com")->send(new SendEmailAdmin($idPedido));
        Mail::to($emailCliente)->send(new SendEmail($idPedido));

        $formaPag = $request->input('forma_pag');

        return redirect()->route('finish_cart',['idPedido'=>$idPedido, 'formaPag'=> $formaPag]);
    }
}
