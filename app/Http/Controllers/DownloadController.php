<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\DownloadPays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function download($idLivro, $plano)
    {
        //$this->middleware('VerifyCsrfToken');

        $idCliente = Auth::guard('web')->user()->id;

        //$qtdDownloads = Download::where('client_id',$idCliente)->get();

        if($plano == 1){
            #PLANO 1
            $qtdDownloads = \DB::select(\DB::raw("SELECT * FROM download_pays WHERE client_id = $idCliente AND statu = 'Ativo'"));
            if(count($qtdDownloads) > 2){
                \DB::update('UPDATE download_pays SET statu=? WHERE client_id=?',['Inativo',$idCliente]);
                \DB::update('UPDATE plano_client SET statu=? WHERE client_id=?',['Inativo',$idCliente]);
            }else{
                if(count($qtdDownloads) == 0){
                    $dataJuntada = strtotime(date('d-m-Y',(strtotime('+1 months',strtotime(date('d-m-Y'))))));
                    $dataLimite = date('Y-m-d',$dataJuntada);
                }else if(count($qtdDownloads) > 0){$dataLimite = $qtdDownloads[0]->data_limite;}
                DownloadPays::create(['client_id'=>$idCliente,'livro_id'=>$idLivro,'plano'=>$plano,'data_limite'=>$dataLimite,'statu'=>'Ativo']);
            }
        }else if($plano == 2){
            #PLANO 2
            $qtdDownloads = \DB::select(\DB::raw("SELECT * FROM download_pays WHERE client_id = $idCliente AND statu = 'Ativo'"));
            if(count($qtdDownloads) > 6){
                \DB::update('UPDATE download_pays SET statu=? WHERE client_id=?',['Inativo',$idCliente]);
                \DB::update('UPDATE plano_client SET statu=? WHERE client_id=?',['Inativo',$idCliente]);
            }else{
                if(count($qtdDownloads) == 0){
                    $dataJuntada = strtotime(date('d-m-Y',(strtotime('+1 months',strtotime(date('d-m-Y'))))));
                    $dataLimite = date('Y-m-d',$dataJuntada);
                }else if(count($qtdDownloads) > 0){$dataLimite = $qtdDownloads[0]->data_limite;}
                DownloadPays::create(['client_id'=>$idCliente,'livro_id'=>$idLivro,'plano'=>$plano,'data_limite'=>$dataLimite,'statu'=>'Ativo']);
            }
        }else if($plano == 3){
            #PLANO 3
            $qtdDownloads = \DB::select(\DB::raw("SELECT * FROM download_pays WHERE client_id = $idCliente AND statu = 'Ativo'"));
            if(count($qtdDownloads) > 15){
                \DB::update('UPDATE download_pays SET statu=? WHERE client_id=?',['Inativo',$idCliente]);
                \DB::update('UPDATE plano_client SET statu=? WHERE client_id=?',['Inativo',$idCliente]);
            }else{
                if(count($qtdDownloads) == 0){
                    $dataJuntada = strtotime(date('d-m-Y',(strtotime('+1 months',strtotime(date('d-m-Y'))))));
                    $dataLimite = date('Y-m-d',$dataJuntada);
                }else if(count($qtdDownloads) > 0){$dataLimite = $qtdDownloads[0]->data_limite;}
                DownloadPays::create(['client_id'=>$idCliente,'livro_id'=>$idLivro,'plano'=>$plano,'data_limite'=>$dataLimite,'statu'=>'Ativo']);
            }
        }else if($plano == 4){
            $qtdDownloads = \DB::select(\DB::raw("SELECT * FROM download_pays WHERE client_id = $idCliente AND statu = 'Ativo'"));
            #PLANO 4
            if(count($qtdDownloads) > 30){
                \DB::update('UPDATE download_pays SET statu=? WHERE client_id=?',['Inativo',$idCliente]);
                \DB::update('UPDATE plano_client SET statu=? WHERE client_id=?',['Inativo',$idCliente]);
            }else{
                if(count($qtdDownloads) == 0){
                    $dataJuntada = strtotime(date('d-m-Y',(strtotime('+1 months',strtotime(date('d-m-Y'))))));
                    $dataLimite = date('Y-m-d',$dataJuntada);
                }else if(count($qtdDownloads) > 0){$dataLimite = $qtdDownloads[0]->data_limite;}
                DownloadPays::create(['client_id'=>$idCliente,'livro_id'=>$idLivro,'plano'=>$plano,'data_limite'=>$dataLimite,'statu'=>'Ativo']);
            }
        }else{

        }
            return redirect()->route('book_details',$idLivro);
    }

    public function downloadGratis($idLivro)
    {
        $idCliente = Auth::guard('web')->user()->id;
        $insert = Download::create([
            'client_id' => $idCliente,
            'livro_id'=> $idLivro
        ]);

        if($insert)
        {
            return redirect()->route('book_details',$idLivro);
        }
    }
}
