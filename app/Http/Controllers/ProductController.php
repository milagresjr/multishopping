<?php

namespace App\Http\Controllers;

use App\Models\Caracteristcs;
use App\Models\Category;
use App\Models\CategoryLivros;
use App\Models\ImagensCategory;
use App\Models\ImagensProduct;
use App\Models\Product;
use App\Models\ProductCaracteristic;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("product");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /*
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

        $listaCategorias = Category::all();
        $CategoriasEspe = Category::where('id',$id)->get();
        $listaProdutos = Product::limit(9)->where('categoria_id',$id)->get();
        $listaSubCategorias = SubCategory::all();
        $cateTitles = Category::where('id',$id)->get();
        $categoriaHeader = Category::limit(3)->get();

        $imagensCategoria = ImagensCategory::where('categoria_id',$id)->get();

        $data['listaCategoria'] = $listaCategorias;
        $data['listaSubCategoria'] = $listaSubCategorias;
        $data['listaProduto'] = $listaProdutos;
        $data['cateTitle'] = $cateTitles;
        $data['CategoriasEspe'] = $CategoriasEspe;
        $data['categoriaHeader'] = $categoriaHeader;
        $data['imagensCategoria'] = $imagensCategoria;
        $data['novasCategorias'] = \DB::select(DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));
        return view("product",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addCarrinho($idProduto = 0, Request $request)
    {
        $prod = Product::find($idProduto);

        /*Add ao Carrinho */
        /*if(!isset($_SESSION['itens'][$prod])){
            $_SESSION['itens'][$prod] = 1;
        }else{
            $_SESSION['itens'][$prod] += 1;
        }*/
        if($prod)
        {
            $carrinho = session('cart',[]);


            /*if(array_key_exists($carrinho,$prod)){
                return view("cart");
            }*/
            array_push($carrinho, $prod);

            //count($carrinho, $prod);

            session(['cart' => $carrinho]);

        }

        return redirect()->route("home");
    }

    public function viewCarrinho(Request $request)
    {
        $data = [];

        $carrinho = session('cart',[]);

        $listaImagem = DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $data['carrinho'] = $carrinho;
        $data['listaImagem'] = $listaImagem;

        return view("cart",$data);
    }

    public function excluirCarrinho($indice,Request $request)
    {
        $carrinho = session('cart',[]);

        if(isset($carrinho[$indice]))
        {
            unset($carrinho[$indice]);
        }
        session(['cart' => $carrinho]);
        return redirect()->route("view_cart");
    }

    public function search(Request $request)
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

        $search = $request->input("search");

        $produtos = DB::select(DB::raw("SELECT * FROM products WHERE nome LIKE '$search%'"));

        $imagem = DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $listaLivros = DB::select(DB::raw("SELECT * FROM livros WHERE titulo LIKE '$search%'"));

        $data['listaLivros'] = $listaLivros;

        /* HEADER */
        $listaCategorias = Category::all();
        $listaSubCategorias = SubCategory::all();
        $categoriaHeader = Category::limit(2)->get();

        $data['listaCategoria'] = $listaCategorias;
        $data['listaSubCategoria'] = $listaSubCategorias;

        $data['categoriaHeader'] = $categoriaHeader;
        /* END HEADER */

        $data["productSearch"] = $produtos;
        $data["imagensProduct"] = $imagem;
        $data['novasCategorias'] = \DB::select(DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view("search",$data);
    }
}
