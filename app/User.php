<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'acceso',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function esAdmin(){

        if($this->acceso=='admin'){

            return true;
        }

            return false;
    }

    public function esOper(){

        if($this->acceso=='admin' or $this->acceso=='operaciones'){

            return true;
        }

            return false;
    }

    public function esVentas(){

        if($this->acceso=='admin' or $this->acceso=='operaciones' or $this->acceso=='ventas'){

            return true;
        }

            return false;
    }
}
