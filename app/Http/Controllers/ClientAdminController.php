<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Download;
use App\Models\DownloadPays;
use App\Models\Pedido;
use App\Models\PlanoClient;
use App\Models\PointTotal;
use Illuminate\Http\Request;

class ClientAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = \DB::select('SELECT * FROM clients');

        return view('admin.client-admin',compact('clients'));
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
        $data = [];
        $data['client'] = Client::where('id',$id)->get();
        $data['pontos'] = PointTotal::where('client_id',$id)->get();
        $data['pedidos_fi'] = Pedido::where(['client_id'=>$id,'status'=>'FI'])->get();
        $data['pedidos_ap'] = Pedido::where(['client_id'=>$id,'status'=>'AP'])->get();
        $data['pedidos_ca'] = Pedido::where(['client_id'=>$id,'status'=>'CA'])->get();
        $data['downloads_gratis'] = Download::where('client_id',$id)->get();
        $data['downloads_pagos'] = DownloadPays::where('client_id',$id)->get();
        return view('admin.client-admin-details',$data);
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

    public function ativar($id)
    {
        $newStatus = "Ativo";
        $update = \DB::update('update clients set status=? where id=?',[$newStatus,$id]);
        if($update)
        {
            return redirect('admin/clients')->with('success','Status alterado com sucesso');
        }else{
            return redirect('admin/clients')->with('danger','Status não alterado');
        }
    }

    public function desativar($id)
    {
        $newStatus = "Inativo";
        $update = \DB::update('update clients set status=? where id=?',[$newStatus,$id]);
        if($update)
        {
            return redirect('admin/clients')->with('success','Status alterado com sucesso');
        }else{
            return redirect('admin/clients')->with('danger','Status não alterado');
        }
    }

    public function habilitarPlano($id)
    {
        $data = [];
        $data['idCliente'] = $id;
        return view('admin.client-habilitar-plano',$data);
    }

    public function habilitarPlanoStore($idCliente,$plano)
    {
        $dataJuntada = strtotime(date('d-m-Y',(strtotime('+1 months',strtotime(date('d-m-Y'))))));
        $dataLimite = date('Y-m-d',$dataJuntada);
        //dd(date('d-m-Y',$dataLimite));

        $verificaExistente = \DB::select(\DB::raw("SELECT * FROM plano_client WHERE client_id = $idCliente AND statu = 'Ativo'"));

        if(count($verificaExistente) > 0){
            return redirect()->route('habilitar_plano',$idCliente)->with('danger','O cliente já possui um plano em andamento!');
        }

        $inserir = PlanoClient::create([
            'client_id' => $idCliente,
            'plano' => $plano,
            'data_limite' => $dataLimite,
            'statu' => 'Ativo'
        ]);


        if($inserir){
            return redirect()->route('habilitar_plano',$idCliente)->with('success','Plano ativado com sucesso!');
        }
    }
}
