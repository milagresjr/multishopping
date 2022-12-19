<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryLivros;
use App\Models\ImagensCategory;
use App\Models\ImagensProduct;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return view('product');
    }
    public function showCategory($id)
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

        if($id != 0){
            $listaProdutos = Product::where('categoria_id',$id)->latest()->paginate(12);
           // foreach($listaProdutos as $prod){
            //$idProd = $prod->id;
            //$listaImagem = ImagensProduct::where('product_id',$idProd)->limit(1)->get();
            $listaImagem = \DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));
            $data['listaImagem'] = $listaImagem;

            $CategoriasEspe = Category::where('id',$id)->get();

            $subCategoriaEspe = SubCategory::where('categoria_id',$id)->get();

            $data['CategoriasEspe'] = $CategoriasEspe;

            $data['subCategoriaEspe'] = $subCategoriaEspe;

            $ultimosLancamentos = Product::where('categoria_id',$id)->orderby('id','desc')->limit(4)->get();// DB::select(DB::raw("SELECT * FROM products WHERE categoria_id ORDER BY id DESC LIMIT 4"));
            $data['ultimosLancamentos'] = $ultimosLancamentos;


            $maisProcurados = Product::where('categoria_id',$id)->limit(4)->get();// DB::select(DB::raw("SELECT * FROM products WHERE categoria_id ORDER BY id DESC LIMIT 4"));
            $data['maisProcurados'] = $maisProcurados;
           // }
        }else{
            $listaProdutos = Product::latest()->paginate(12);
            $listaImagem = \DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));
            $data['listaImagem'] = $listaImagem;
            $ultimosLancamentos = DB::select(DB::raw("SELECT * FROM products ORDER BY id DESC LIMIT 4"));
            $data['ultimosLancamentos'] = $ultimosLancamentos;
            //$CategoriasEspe = ['nome' => 'Todas'];
        }

        $listaSubCategorias = SubCategory::all();
        $cateTitles = Category::where('id',$id)->get();
        $categoriaHeader = Category::limit(2)->get();
        $todasCategorias = Category::all();
        $imagensCategoria = ImagensCategory::where('categoria_id',$id)->get();


        $data['todasCategorias'] = $todasCategorias;
        $data['listaCategoria'] = $listaCategorias;
        $data['listaSubCategoria'] = $listaSubCategorias;
        $data['listaProduto'] = $listaProdutos;
        $data['cateTitle'] = $cateTitles;

        $data['categoriaHeader'] = $categoriaHeader;
        $data['imagensCategoria'] = $imagensCategoria;
        $data['novasCategorias'] = \DB::select(DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view("product",$data);
    }

    public function showSubCategory($id,$idSub)
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


        $ultimosLancamentos = Product::where('subcategoria_id',$idSub)->orderby('id','desc')->limit(4)->get();// DB::select(DB::raw("SELECT * FROM products WHERE categoria_id ORDER BY id DESC LIMIT 4"));
        $data['ultimosLancamentos'] = $ultimosLancamentos;


        $maisProcurados = Product::where('subcategoria_id',$idSub)->limit(4)->get();// DB::select(DB::raw("SELECT * FROM products WHERE categoria_id ORDER BY id DESC LIMIT 4"));
        $data['maisProcurados'] = $maisProcurados;

        $listaCategorias = Category::all();

        $CategoriasEspe = Category::where('id',$id)->get();

        $SubCategoriasEspe = SubCategory::where('id',$idSub)->get();
        $subCateProdutos = Product::where('categoria_id',$id)->get();

        $listaImagem = \DB::select(DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $listaSubCategoriaProd = Product::where('subcategoria_id',$idSub)->latest()->paginate(12);

        //$listaProdutos = Product::limit(9)->where('categoria_id',$id)->get();
        $listaSubCategorias = SubCategory::all();

        $cateTitles = Category::where('id',$id)->get();

        $subCategoriaEspe = SubCategory::where('categoria_id',$id)->get();

        $data['subCategoriaEspe'] = $subCategoriaEspe;

        $categoriaHeader = Category::limit(2)->get();
        $todasCategorias = Category::all();

        $imagensCategoria = ImagensCategory::where('categoria_id',$id)->get();


        $data['todasCategorias'] = $todasCategorias;
        $data['listaCategoria'] = $listaCategorias;
        $data['listaSubCategoria'] = $listaSubCategorias;
        //$data['listaProduto'] = $listaProdutos;
        $data['cateTitle'] = $cateTitles;
        $data['CategoriasEspe'] = $CategoriasEspe;
        $data['categoriaHeader'] = $categoriaHeader;
        $data['SubCategoriasEspe'] = $SubCategoriasEspe;
        $data['subCateProdutos'] = $subCateProdutos;

        $data['listaSubCategoriaProd'] = $listaSubCategoriaProd;

        $data['listaImagem'] = $listaImagem;

        $data['imagensCategoria'] = $imagensCategoria;

        $data['novasCategorias'] = \DB::select(DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view("product",$data);
        //return "Produtos: {$id} e {$idSub}";
    }

    public function showSubCategoryAll()
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

        $listaImagem = ImagensProduct::all();


        //$listaProdutos = Product::limit(9)->where('categoria_id',$id)->get();
        $listaSubCategorias = SubCategory::all();


        $categoriaHeader = Category::limit(2)->get();
        $todasCategorias = Category::all();


        $data['todasCategorias'] = $todasCategorias;
        $data['listaCategoria'] = $listaCategorias;
        $data['listaSubCategoria'] = $listaSubCategorias;
        //$data['listaProduto'] = $listaProdutos;

        $data['listaImagem'] = $listaImagem;
        $data['novasCategorias'] = \DB::select(DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view("product",$data);
        //return "Produtos: {$id} e {$idSub}";
    }
}
