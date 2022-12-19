<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Pedido;
use App\Models\Points;
use App\Models\PointTotal;
use Illuminate\Http\Request;

class PedidoAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::latest()->get();

        $clients = Client::all();

        return view('admin.pedidos-admin',compact('pedidos','clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function cancelarPedido(Request $request)
    {
        $this->middleware('VerifyCsrfToken');


        $idPedido = $request->input('pedido_id');

        $cancelPedido = Pedido::where([
            'id' => $idPedido
        ])->update([
            'status' => 'CA' //Cancela pedido
        ]);

        if($cancelPedido)
        {
            return redirect('admin/pedidos')->with('success','Pedido cancelado com sucesso!');
        }
    }

    public function finalizarPedido(Request $request)
    {
        $total = 0;

        $this->middleware('VerifyCsrfToken');


        $idPedido = $request->input('pedido_id');

        $finalizarPedido = Pedido::where([
            'id' => $idPedido
        ])->update([
            'status' => 'FI' //Finalizado pedido
        ]);

        if($finalizarPedido)
        {
            $perc = 0;
            $pedidos = Pedido::where('id',$idPedido)->get();
            foreach($pedidos as $pedido)
            {
                foreach($pedido->pedido_produtos as $pedido_produto)
                {
                    $total = $total + $pedido_produto->valores;
                }
                $perc = ($total*3)/100;

                Points::create([
                    'pedido_id' => $pedido->id,
                    'client_id' => $pedido->client_id,
                    'pontos' => $perc
                ]);
                $verificaPonto = PointTotal::where('client_id',$pedido->client_id)->get();
                if(count($verificaPonto) > 0){
                    $perc = $perc + $verificaPonto[0]->ponto_total;
                    PointTotal::where([
                        'client_id' => $pedido->client_id
                    ])->update([
                        'ponto_total' => $perc
                    ]);
                }else{
                    PointTotal::create([
                        'client_id' => $pedido->client_id,
                        'ponto_total' => $perc,
                        'total_retirado' => 0
                    ]);
                }
            }
            return redirect('admin/pedidos')->with('success','Pedido finalizado com sucesso!');
        }
    }

    public function detailsPedidos($idPedido)
    {
        $data = [];

        $pedidos = Pedido::where([
            'id' => $idPedido
        ])->get();

        $listaImagem = \DB::select(\DB::raw("SELECT * FROM imagens_product GROUP BY product_id"));

        $listaCliente = Client::all();

        $data['pedidos'] = $pedidos;
        $data['listaImagem'] = $listaImagem;
        $data['listaCliente'] = $listaCliente;

        return view('admin.pedido-admin-details',$data);
    }
}
