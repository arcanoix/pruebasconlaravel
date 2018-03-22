<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Respuesta;
use App\Actividad;
use App\Respondidas;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function respuesta(){
        return $this->hasMany(Respuesta::class);
    }

    public function actividad(){
        return $this->belongsToMany(Actividad::class,'actividad_alumno');
    }

    public function respondida(){
        return $this->hasMany(Respondidas::class, 'user_id');
    }
}
