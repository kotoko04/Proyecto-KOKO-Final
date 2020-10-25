<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name', 'quienessomos' ,  'direccion', 'telefono','username',  'email', 'password', 'facebook', 'twitter', 'instagram', 'rol'
    ];

    public function role(){
        return $this->hasOne(Rol::class,'id','rol');
    }


}
