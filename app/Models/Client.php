<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Foundation\Auth\User;

class Client extends Model implements Authenticatable
{
    protected $guard = "web";
    protected $table = "clients";
    protected $fillable = ['id','nome','email','telefone','senha','status'];

    public function getAuthIdentifierName(){
        return $this->getKeyName();
    }
    public function getAuthIdentifier(){
        return $this->{$this->getAuthIdentifierName()};
    }
    public function getAuthPassword(){
        return $this->senha;
    }
    public function getRememberToken(){

    }
    public function setRememberToken($value){

    }
    public function getRememberTokenName(){

    }

}
















