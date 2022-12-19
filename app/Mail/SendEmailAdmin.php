<?php

namespace App\Mail;

use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class SendEmailAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $idPedidos;

    public function __construct($idPedido)
    {
        $this->idPedidos = $idPedido;
    }

    public function build()
    {
        $idCli = Auth::guard('web')->user()->id;

        //$pedidos = \DB::select(\DB::raw("SELECT * FROM pedidos WHERE client_id = ".$idCli." ORDER BY id DESC LIMIT 1"));
        $pedidos = Pedido::where('client_id',$idCli)->orderBy('id','desc')->limit(1)->get();
        $data['pedidos'] = $pedidos;

        return $this->subject('Pedido Concluido')
            ->with('pedidos',$pedidos)
            ->view('mail.send-mail-admin');
    }
}
