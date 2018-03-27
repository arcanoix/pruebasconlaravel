<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Respuesta extends Model
{
    //
    protected $table = 'alumno_respuesta';

    protected $fillable = [
        'alumno_id', 
        'unidad_id', 
        'tipo_id', 
        'materia_id', 
        'pregunta_id', 
        'respondidas_id',
         'correcta_id',
         'points'
        ];

    public $timestamps = false;


   
}
