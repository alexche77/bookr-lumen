<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;
    protected $table = 'users';
   protected $fillable = ['username','email','password','api_token','nombre','apellido','edad'];
   protected $hidden = [
   'password','remember_token','api_token'
   ];
   protected $hashable = ['password'];
   /*
   * Obtenemos los libros del user
   *
   */
   public function libros()
   {
       return $this->hasMany('App\Libros','uploader');
   }
}
