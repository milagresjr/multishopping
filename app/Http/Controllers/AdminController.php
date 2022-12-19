<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Livros;
use App\Models\Pedido;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $data = [];

        $data['totalProdutos'] = Product::all();
        $data['totalClientes'] = Client::all();
        $data['totalCategorias'] = Category::all();
        $data['totalPedidosFi'] = Pedido::where('status','FI')->get();
        $data['totalPedidosNaoFi'] = Pedido::where('status','<>','FI')->get();
        $data['totalLivros'] = Livros::all();
        $data['clientesRecentes'] = Client::latest()->limit(5)->get();

        return view("admin.home-admin",$data);
    }

    public function logar(Request $request)
    {
        if ($request->isMethod("POST")) {
            $email = $request->input("email");
            $password = $request->input("senha");

            $credencias = ['email' => $email, 'password' => $password];

            if (Auth::attempt($credencias)) {
                //dd("ADMIN Logado :) ");
                return redirect()->route("index-admin");
            } else {
                //dd('Epha..'.$email.'=='.$password);
                session(['email_tel' => $email]);
                session(['senha' => $password]);

                return redirect()->route("login-cliente");
                //dd("ADMIN Não logado");
            }
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
