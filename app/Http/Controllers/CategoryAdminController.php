<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImagensCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \DB::select('SELECT * FROM categories ORDER BY id DESC');

        return view('admin.category-admin',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-categoria-admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome = $request->input('nome');

        $insert = Category::create([
            'nome' => $nome
        ]);

        if($insert){

            $lastCategory = \DB::select('SELECT * FROM categories ORDER BY id DESC LIMIT 1');

            ImagensCategory::create([
                'imagem' => 'imagem_inicial.jpg',
                'categoria_id' => $lastCategory[0]->id
            ]);

            return redirect('admin/categories/create')->with('success','Categoria cadastrada com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categoria = Category::where('id',$id)->get();

        return view('admin.edit-categoria-admin',compact('categoria'));
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
        $nome = $request->input('nome');

        $update = \DB::update('update categories set nome=? where id=?',[
            $nome,$id
        ]);

        if($update)
        {
            $ret = redirect('admin/categories/')->with('success','Categoria alterado com sucesso!');
        }else{
            $ret = redirect('admin/categories/edit/',$id)->with('danger','Categoria não alterado!');
        }
        return $ret;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$produtos = Product::where('categoria_id',$id)->get();
        foreach($produtos as $prod){
            \DB::delete('delete from imagens_product where product_id=?',[$prod->id]);
        }*/

        //$deleteProduct = \DB::delete('delete from products where categoria_id=?',[$id]);

        $deleteCategory = \DB::delete('delete from categories where id=?',[$id]);
        if($deleteCategory)
        {
            return redirect('admin/categories')->with('success','Categoria excluída com sucesso!');
        }
        //return redirect('admin/categories');
    }

    public function addImage($id)
    {
        $categoria = Category::where('id',$id)->get();

        $imagemCategoria = ImagensCategory::where('categoria_id',$id)->get();

        return view('admin.add-image-category-admin',compact('categoria','imagemCategoria'));
    }

    public function addImageStore($id, Request $request)
    {
        $image = $request->file('imagem');
        $image->store('uploads/categorias');
        $file = \DB::update('update imagens_categoria set imagem=? where categoria_id=?',[
            $image->store(''),
            $id
        ]);

        if($file){
            return redirect()->route('add_image_cat',$id)->with('success','Imagem adcionada com sucesso!');
        }
    }
}
