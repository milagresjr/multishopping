<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = \DB::select('SELECT * FROM sub_categories ORDER BY id DESC');

        $categoria = Category::all();

        return view('admin.sub-category-admin',compact('subcategories','categoria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = \DB::select('select * from categories order by nome asc');
        return view('admin.create-sub-categoria-admin',compact('categorias'));
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
        $categoria = $request->input('categoria');

        $insert = SubCategory::create([
            'nome' => $nome,
            'categoria_id' => $categoria
        ]);

        if($insert){
            return redirect('admin/subcategories/create')->with('success','Sub-categoria cadastrada com sucesso!');
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
        $categorias = \DB::select('select * from categories');
        $subcategoria = SubCategory::where('id',$id)->get();
        $categoriaEspe = Category::where('id',$subcategoria[0]->categoria_id)->get();
        return view('admin.edit-sub-categoria-admin',compact('categorias','subcategoria','categoriaEspe'));
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
        $categoria = $request->input('categoria');

        $update = \DB::update('update sub_categories set nome=?,categoria_id=? where id=?',[
            $nome,$categoria,$id
        ]);

        if($update)
        {
            $ret = redirect('admin/subcategories/')->with('success','Sub-Categoria alterado com sucesso!');
        }else{
            $ret = redirect('admin/subcategories/edit/',$id)->with('danger','Sub-Categoria não alterado!');
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
        $deleteSubCategory = \DB::delete('delete from sub_categories where id=?',[$id]);
        if($deleteSubCategory)
        {
            return redirect('admin/subcategories')->with('success','Sub Categoria excluída com sucesso!');
        }
    }
}
