<?php

namespace App;

use App\Unidad;
use Illuminate\Database\Eloquent\Model;

class TipoE extends Model
{
    //
    protected $table = 'tipoeval';

    protected $fillable = ['tipoeval'];

    public function unidades()
    {
        return $this->BelongsToMany(Unidad::class,'unidad_tipo_pivot');
    }
}
