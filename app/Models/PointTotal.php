<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointTotal extends Model
{
    protected $table = 'points_total';
    protected $fillable = ['id','client_id','ponto_total'];
}
