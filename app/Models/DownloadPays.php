<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadPays extends Model
{
    protected $table = 'download_pays';
    protected $fillable = ['client_id','livro_id','plano','data_limite','statu'];
}
