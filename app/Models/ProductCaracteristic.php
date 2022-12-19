<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCaracteristic extends Model
{
    protected $table = 'product_caracteristics';
    protected $fillable = ['product_id','caracteristic_id','valor'];
}
