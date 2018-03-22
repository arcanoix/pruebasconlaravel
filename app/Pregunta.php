<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    protected $table = 'preguntas';

    protected $fillable = ['pregunta','is_active'];

    public function materia(){
        return $this->belongsToMany(Materia::class,'materia_pregunta_pivot');
    }

    public function opcion(){
        return $this->hasMany(Opcion::class);
    }
}
