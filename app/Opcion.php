<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opcion extends Model
{
    //
    protected $table = 'opciones';


    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}
