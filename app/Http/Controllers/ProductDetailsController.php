<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryLivros;
use App\Models\Client;
use App\Models\Evaluation;
use App\Models\ImagensProduct;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailsController extends Controller
{
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

        $productEspe = Product::where('id',$id)->get();

        $listaCategorias = Category::limit(1)->get();
        $categoriaHeader = Category::limit(2)->get();
        $listaSubCategorias = SubCategory::all();
        $todasCategorias = Category::all();

        $clientes = Client::all();

        $listaAvaliacao = Evaluation::where('product_id',$id)->get();
        $listaCarac = \DB::select('SELECT * FROM caracteristics');
        $listaProdutoCarac = \DB::select('SELECT * FROM product_caracteristics');

        $imgProduct = ImagensProduct::where('product_id',$id)->get();
        foreach($productEspe as $prodCate){
            $cateProd = $prodCate->subcategoria_id;
            $productRelacionados = Product::limit(4)->where('subcategoria_id',$cateProd)->where('id','<>',$id)->get();
            foreach($productRelacionados as $prodRela){
            $imgProductRela = DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));
            $data['imgProductRela'] = $imgProductRela;
            }
            $data['productRelacionados'] = $productRelacionados;
        }
        $data['categoriaHeader'] = $categoriaHeader;

        $data['todasCategorias'] = $todasCategorias;
        $data['listaCategoria'] = $listaCategorias;
        $data['listaSubCategoria'] = $listaSubCategorias;
        $data['productEspe'] = $productEspe;
        $data['imgProduct'] = $imgProduct;
        $data['listaAvaliacao'] = $listaAvaliacao;
        $data['clientes'] = $clientes;
        $data['listaCarac'] = $listaCarac;
        $data['listaProdutoCarac'] = $listaProdutoCarac;
        $data['novasCategorias'] = \DB::select(DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view("product_details",$data);
    }
}
