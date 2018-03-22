<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Respondidas;

class Actividad extends Model
{
    //

    protected $table = 'actividad';



    public function alumno(){
    	return $this->belongsToMany('App\User', 'actividad_alumno','user_id');
    }

    public function respondidas(){
    	return $this->hasMany(Respondidas::class);
    }

    public function unidad(){
    	return $this->belongsToMany('App\Unidad','actividades_unidades');
    }
}
