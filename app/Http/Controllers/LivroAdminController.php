<?php

namespace App\Http\Controllers;

use App\Models\CategoryLivros;
use App\Models\Livros;
use Illuminate\Http\Request;
use Mockery\CountValidator\Exception;

class LivroAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = \DB::select('SELECT * FROM livros');

        return view('admin.livros-admin',compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = \DB::select('select * from category_livros');
        return view('admin.create-livro-admin',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cadPDF = NULL;
        $cadEpub = NULL;
        $titulo = $request->input('titulo');
        $autor = $request->input('autor');
        $categoria = $request->input('categoria');
        $descricao = $request->input('descricao');
        $image = $request->file('imagem_capa');
        $livroPDF = $request->file('livro_pdf');
        $livroEpub = $request->file('livro_epub');
        
        $image->store('capas_de_livros');
        if($livroPDF != NULL){
            $novoNomePdf = $request->file('livro_pdf')->getClientOriginalName();
            $livroPDF->storeAs('livros_em_pdf',$novoNomePdf);
            $cadPDF = $livroPDF->storeAs('',$novoNomePdf);
        }
        if($livroEpub != NULL){
            $novoNomeEpub = $request->file('livro_epub')->getClientOriginalName();
            $livroEpub->storeAs('livros_em_epub',$novoNomeEpub);
            $cadEpub = $livroEpub->storeAs('',$novoNomeEpub);
        }

        //dd($cadEpub);

        $insert = Livros::create([
            'category_id' => $categoria,
            'titulo' => $titulo,
            'autor' => $autor,
            'descricao' => $descricao,
            'imagem_capa' => $image->store(''),
            'file_pdf' => $cadPDF,
            'file_epub' => $cadEpub
        ]);


        if($insert)
        {

                return redirect('admin/livros/create')->with('success','Livro cadastrado com sucesso!');

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
        $livro = Livros::where('id',$id)->get();
        $categorias = \DB::select('select * from category_livros');
        $categoriaEspe = CategoryLivros::where('id',$livro[0]->category_id)->get();
        return view('admin.edit-livro-admin',compact('categorias','livro','categoriaEspe'));
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
        $titulo = $request->input('titulo');
        $autor = $request->input('autor');
        $categoria = $request->input('categoria');
        $descricao = $request->input('descricao');

        try{
        $update = \DB::update('update livros set category_id=?,titulo=?,autor=?,descricao=? where id=?',[
            $categoria,
            $titulo,
            $autor,
            $descricao,
            $id
        ]);

            $ret = redirect('admin/livros/')->with('success','Livro alterado com sucesso!');
        }catch (Exception $ex){
            $ret = redirect('admin/livros/edit/',$id)->with('danger','Livro não alterado!');
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

            $deleteLivro = \DB::delete('delete from livros where id=?',[$id]);
             if($deleteLivro){
                 return redirect('admin/livros')->with('success','Livro excluído com sucesso!');
             }

    }
}
