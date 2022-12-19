<?php

namespace App\Http\Controllers;

use App\Models\PubLivro;
use Illuminate\Http\Request;

class PubsLivroAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-frase-dia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $frase = $request->input('frase');
        $autor = $request->input('autor');
        $tema = $request->input('tema');
        $conteudo = $request->input('conteudo');

        $inserir = PubLivro::create([
            'tema' => $tema,
            'pensamento_dia' => $frase,
            'autor' => $autor,
            'conteudo' => $conteudo
        ]);
        if($inserir)
        {
            return redirect()->action('PubsLivroAdminController@create')->with('success','Frase do dia cadastrada com sucesso!');
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
}
