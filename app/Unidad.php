<?php

namespace App;

use App\TipoE;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    //
    protected $table = 'unidades';

    protected $fillable = ['unidad'];

    public function tipos(){
        return $this->BelongsToMany(TipoE::class,'unidad_tipo_pivot');
    }

    public function actividad(){
    	return $this->belongsToMany('App\Actividad','actividades_unidades');
    }
}
