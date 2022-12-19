<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DadosBancarios extends Model
{
    protected $fillable = ['client_id','banco','numero_conta','iban'];
}
