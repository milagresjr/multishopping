<?php

namespace App\Mail;

use App\Models\ResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $cod;

    public function __construct($cod)
    {
      $this->cod = $cod;
    }

    public function build()
    {
        $codigos = \DB::select(\DB::raw("SELECT * FROM reset_passwords ORDER BY id DESC LIMIT 1"));
        $codigo = $codigos[0]->codigo;

        return $this->subject('Pedido de Recuperação de Senha em Multishopping')
            ->with('codigo',$codigo)
            ->view('mail.email_reset_view');
    }
}
