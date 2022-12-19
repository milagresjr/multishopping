<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $tables = 'notifications';
    protected $fillable = ['notificacao','statu'];
}
