<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Usuario extends Model implements  authenticatable
{
    //protected $guard = "user";
    protected $table = "users";
    protected $fillable = [
        'id','name','email','password','permissao'
    ];

    public function getAuthIdentifierName(){
        return $this->getKeyName();
    }
    public function getAuthIdentifier(){
        return $this->{$this->getAuthIdentifierName()};
    }
    public function getAuthPassword(){
        return $this->password;
    }
    public function getRememberToken(){

    }
    public function setRememberToken($value){

    }
    public function getRememberTokenName(){

    }

}
