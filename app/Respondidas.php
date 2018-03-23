<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respondidas extends Model
{
    //

    protected $table = 'actividad_respondida';

    protected $fillable = ['user_id','status','actividad_id','materia_id','archivo'];



    public function actividad()
    {
    	return $this->belongsTo(Actividad::class);
    }



    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function unidad()
    {
    	return $this->belongsTo(Unidad::class);
    }

    public function materia(){
        return $this->hasMany(Materia::class,'id','materia_id');
    }

   



}
