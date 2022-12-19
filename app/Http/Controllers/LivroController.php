<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryLivros;
use App\Models\Livros;
use App\Models\PubLivro;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function showLivroCat($idCat)
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

        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));
        if($idCat != 0){
            $CategoriasEspe = CategoryLivros::where('id',$idCat)->get();
            $Categorias = CategoryLivros::all();
            $listaLivros = Livros::where('category_id',$idCat)->paginate(12);

            $data['listaLivros'] = $listaLivros;
            $data['CategoriasEspe'] = $CategoriasEspe;
            $data['Categorias'] = $Categorias;

            return view("books",$data);
        }else{
            //$CategoriasEspe = CategoryLivros::where('id',$idCat)->get();
            $Categorias = CategoryLivros::all();
            $listaLivros = Livros::paginate(12);

            $data['listaLivros'] = $listaLivros;
            //$data['CategoriasEspe'] = $CategoriasEspe;
            $data['Categorias'] = $Categorias;

            return view("books",$data);
        }

    }

    public function showAllLivro()
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

        $Categorias = CategoryLivros::all();
        $listaLivros = Livros::paginate(12);

        $data['listaLivros'] = $listaLivros;
        $data['Categorias'] = $Categorias;
        $data['pubs'] = $pubs;

        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));
        return view("books",$data);
    }

    public function showBook($idLivro)
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

        $Categorias = CategoryLivros::all();
        $listaLivros = Livros::where('id',$idLivro)->paginate(12);
        $cate = $listaLivros[0]->category_id;
        $livrosRelacionados = \DB::select(\DB::raw("SELECT * FROM livros WHERE category_id = $cate AND id <> $idLivro ORDER BY id DESC LIMIT 4")); //Livros::limit(4)->where('category_id',$listaLivros[0]->category_id)->get();

        $data['listaLivros'] = $listaLivros;
        $data['Categorias'] = $Categorias;
        $data['livrosRelacionados'] = $livrosRelacionados;
        $data['pubs'] = $pubs;

        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));
        return view("book_details",$data);
    }
}
