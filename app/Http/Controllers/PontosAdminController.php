<?php

namespace App\Http\Controllers;

use App\Models\Points;
use App\Models\PointTotal;
use Illuminate\Http\Request;

class PontosAdminController extends Controller
{
    public function index()
    {

        $pontos = \DB::select('SELECT clients.nome,clients.email,points_total.id as idPonto,SUM(points_total.ponto_total) as totPontos,
SUM(points_total.total_retirado) as totRetirados FROM clients JOIN points_total ON clients.id=points_total.client_id GROUP BY clients.email');

        //$clients = \DB::select('SELECT * FROM clients');

        return view('admin.pontos-admin',compact('pontos'));
    }

    public function retirarPontos($idPonto)
    {
        $pontos = PointTotal::where(['id' => $idPonto])->get();
        $novoRetirado = $pontos[0]->total_retirado + $pontos[0]->ponto_total;
        PointTotal::where([
            'id' => $idPonto
        ])->update([
            'total_retirado' => $novoRetirado
        ]);

        $update = PointTotal::where([
            'id' => $idPonto
        ])->update([
            'ponto_total' => 0
        ]);
        //dd($idPonto);
        if($update){
        return redirect('/admin/points')->with('success','Pontos retirados com sucesso!');
        }
    }
}
