<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    //

    public function unidades(){
        return $this->BelongsToMany('App\Unidad', 'materia_unidad_pivot');
    }

    public function preguntas(){
        return $this->belongsToMany(Pregunta::class,'materia_pregunta_pivot');
    }

    
}
