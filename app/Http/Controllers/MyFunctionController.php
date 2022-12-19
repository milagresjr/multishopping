<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryLivros;
use App\Models\Newsletter;
use App\Models\Notifications;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyFunctionController extends Controller
{
    public function faq()
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

        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view("faq",$data);
    }
    public function contacts()
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

        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view("contact",$data);
    }
    public function politicaPrivacidade()
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

        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view("politica-privacidade",$data);
    }

    public function recuperarSenha()
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

        $data['novasCategorias'] = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));

        return view("recuperar-senha",$data);
    }

    public function recuperaSenhaStore(Request $request)
    {
        $email = $request->input('email');
        $cod = $gerarCodigo = function(){
            $a = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890");
            $b = array();
            for($i=0; $i<=6; $i++){
                $r = rand(0, sizeof($a) -1);
                $b[$i] = $a[$r];
            }
            $cod = join("",$b);

            return $cod;
        };

        $gerarCodigo();

        return redirect()->route('send_email_reset_pass',['cod'=>$cod,'email'=>$email]);
    }

    public function ourCommunity()
    {
        return view('our-community');
    }

    public function communityPackage($plano)
    {
        $nome = Auth::guard('web')->user()->nome;
        $email = Auth::guard('web')->user()->email;
        $notifi = "O cliente ".$nome." com o email ".$email.", assinou o ".$plano.".";
        $inserir = Notifications::create([
            'notificacao' => $notifi,
            'statu' => 'N/vista'
        ]);
        if($inserir){
            return view('community-package',compact('plano'));
        }
    }

    public function newsletterStore(Request $request)
    {
        $email = $request->input('email');

        $verificaMail = Newsletter::where('email',$email)->get();
        if(count($verificaMail) > 0)
        {
            return redirect()->route('home');
        }else{
            $inserir = Newsletter::create([
                'email' => $email
            ]);
            if($inserir)
            {
                return redirect()->route('home');
            }
        }
    }

}
