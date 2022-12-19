<?php

namespace App\Http\Controllers;

use App\Models\CategoryLivros;
use Illuminate\Http\Request;

class CategoryLivroAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = \DB::select('SELECT * FROM category_livros ORDER BY id DESC');

        return view('admin.category-livro-admin',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-categoria-livro-admin');
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

        $insert = CategoryLivros::create([
            'nome' => $nome
        ]);

        if($insert){
            return redirect('admin/categories/livros/create')->with('success','Categoria cadastrada com sucesso!');
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
        $categoria = CategoryLivros::where('id',$id)->get();

        return view('admin.edit-categoria-livro-admin',compact('categoria'));
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

        $update = \DB::update('update category_livros set nome=? where id=?',[
            $nome,$id
        ]);

        if($update)
        {
            $ret = redirect('admin/categories/livros/')->with('success','Categoria alterada com sucesso!');
        }else{
            $ret = redirect('admin/categories/livros/edit/',$id)->with('danger','Categoria não alterada!');
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
        //
    }
}
