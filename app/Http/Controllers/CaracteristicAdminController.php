<?php

namespace App\Http\Controllers;

use App\Models\Caracteristcs;
use Illuminate\Http\Request;

class CaracteristicAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caracteristics = \DB::select('SELECT * FROM caracteristics ORDER BY id DESC');

        return view('admin.caracteristics-admin',compact('caracteristics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-caracteristica-admin');
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

        $insert = Caracteristcs::create([
            'nome' => $nome
        ]);

        if($insert){
            return redirect('admin/caracteristics/create')->with('success','Caracteristica cadastrada com sucesso!');
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
        $caracteristica = Caracteristcs::where('id',$id)->get();

        return view('admin.edit-caracteristica-admin',compact('caracteristica'));
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

        $update = \DB::update('update caracteristics set nome=? where id=?',[
            $nome,$id
        ]);

        if($update)
        {
            $ret = redirect('admin/caracteristics/')->with('success','Categoria alterado com sucesso!');
        }else{
            $ret = redirect('admin/caracteristics/edit/',$id)->with('danger','Categoria não alterada!');
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
        $deleteCaracteristica = \DB::delete('delete from caracteristics where id=?',[$id]);
        if($deleteCaracteristica)
        {
            return redirect('admin/caracteristics')->with('success','Caracteristica excluída com sucesso!');
        }
    }
}
