<?php

namespace App\Http\Controllers;

use App\Models\CategoryLivros;
use App\Models\Promocao;
use Faker\Provider\zh_CN\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\ImagensProduct;
use App\Models\Product;
use App\Models\SubCategory;

class HomeController extends Controller
{
    public function index($auth=0){
        $data = [];

        $categoriaLivros = CategoryLivros::all();
        
        $listaProdutosEle =  DB::select(DB::raw("SELECT * FROM products WHERE categoria_id=14 ORDER BY id DESC LIMIT 8"));
        $listaProdutosEleImg = DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $listaProdutosCas = DB::select(DB::raw("SELECT * FROM products WHERE categoria_id=17 ORDER BY id DESC LIMIT 8"));
        //$listaProdutosCasImg = ImagensProduct::all();
        //$listaProdutosCasImg = DB::table('imagens_product')->select('*')groupBy('product_id')->get();
        $listaProdutosCasImg = DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));
        //$listaProdutosCasImg = DB::query('SELECT * FROM imagens_product GROUP BY product_id');

        $listaProdutosAce = DB::select(DB::raw("SELECT * FROM products WHERE categoria_id=16 ORDER BY id DESC LIMIT 8"));
        $listaProdutosAceImg = DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $listaProdutosMob = DB::select(DB::raw("SELECT * FROM products WHERE categoria_id=15 ORDER BY id DESC LIMIT 8"));
        $listaProdutosMobImg = DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $listaCategorias = Category::limit(1)->get();

        $categoriaHeader = Category::limit(2)->get();

        $quatroCategorias= Category::limit(4)->get();

        $listaSubCategoriasHeader = SubCategory::all();

        $listaImagens = DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $data['listaSubCategoria'] = $listaSubCategoriasHeader;

        $todasCategorias = Category::all();

        $produtosRecentes = DB::select(DB::raw("SELECT * FROM products ORDER BY id DESC LIMIT 4"));

        $listaLivros = DB::select(DB::raw("SELECT * FROM livros ORDER BY id DESC LIMIT 4"));

        $produtosDiversos = DB::select(DB::raw("SELECT * FROM products ORDER BY RAND() ASC LIMIT 4"));


        $data['listaProdutos'] = Product::all();
        $dataAtual = date('Y-m-D');
        $data['listaProdutosPromo'] = DB::select(DB::raw("SELECT * FROM promocoes WHERE data_final > NOW() ORDER BY id DESC LIMIT 4"));/*Promocao::where('data_final','=',$dataAtual)->get();*/

        $data['listaProdutoEle'] = $listaProdutosEle;
        $data['listaProdutoEleImg'] = $listaProdutosEleImg;
        $data['listaProdutoCas'] = $listaProdutosCas;
        $data['listaProdutoCasImg'] = $listaProdutosCasImg;
        $data['listaProdutoAce'] = $listaProdutosAce;
        $data['listaProdutoAceImg'] = $listaProdutosAceImg;
        $data['listaProdutoMob'] = $listaProdutosMob;
        $data['listaProdutoMobImg'] = $listaProdutosMobImg;
        $data['categoriaHeader'] = $categoriaHeader;

        $data['todasCategorias'] = $todasCategorias;
        $data['listaCategoria'] = $listaCategorias;

        $data['quatroCate'] = $quatroCategorias;

        $data['categoriaLivros'] = $categoriaLivros;
        $data['produtosRecentes'] = $produtosRecentes;
        $data['listaImagens'] = $listaImagens;

        $data['listaLivros'] = $listaLivros;

        $data['produtosDiversos'] = $produtosDiversos;

        $data['novasCategorias'] = DB::select(DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        if($auth == 1){
            $data['alert'] = '<script>alert("Faça login ou regista-se para ver o carrinho!")</script>';
        }

        return view("home",$data);
    }
}
