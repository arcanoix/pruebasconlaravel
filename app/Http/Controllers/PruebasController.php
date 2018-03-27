<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materia;
use App\Unidad;
use App\Pregunta;
use App\TipoE;
use App\Opcion;
use App\Respuesta;

use Illuminate\Support\Facades\Auth;

class PruebasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
      $materia_unidad = Materia::where('id','=', $id)->get();
      $unidad_tipo = Unidad::with('tipos')->get();

        return view('pruebas', compact('unidad_tipo','materia_unidad'));
    }

    public function getMate($id, $unidad_id, $tipo_id)
    {
        // (['materia'=> $id, 'unidad' => $unidad_id, 'tipo' => $tipo_id]);

       $pregunta_opcion = Materia::with(['preguntas.opcion'])->where('id', $id)->get();
       $unidad = Unidad::where('id','=', $unidad_id)->get();
       $tipo = TipoE::where('id','=',$tipo_id)->get();
     
             
            return view('eval', compact('pregunta_opcion','opciones','unidad','tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $unidad = Unidad::where('id','=',$request->input('unidad'))->get();
        
        $materia = Materia::where('id','=', $request->input('materia'))->get();

        $tipo = TipoE::where('id','=', $request->input('tipo'))->get();

        $alumno = Auth::id();

        $preguntas_id = $request->input('pregunta_');

        $respondida_alumno = $request->input('opcion_');

        $respuesta_correcta = $request->input('correcta_');

       /* foreach($respondida_alumno as $r){
            $respuesta_id = intVal($r);
            $correcta_find = Opcion::where('id', '=', $respuesta_id)->get();

            foreach($correcta_find as $c){

                if($c->es_correcta == 1){
                    $correcto[] = 'es correcto';
                    $falso[] = '';
                }else{
                    $falso[] = 'falso';
                    $correcto[] = '';
                }
            }
        }*/
        
        $unidades = intVal($request->input('unidad'));
        $tipos = intVal($request->input('tipo'));
        $materias = intVal($request->input('unidad'));
       

        $nuevo = new Respuesta();

        $result_array = array_intersect_assoc($respondida_alumno, $respuesta_correcta);

        $count_point = count($result_array);

       
                $nuevo->alumno_id = 2;
                $nuevo->unidad_id = $unidades;
                $nuevo->tipo_id =  $tipos;
                $nuevo->materia_id = $materias;
                $nuevo->points = $count_point * 2;
                $respondida = implode(', ', $respondida_alumno);
                $correcta = implode(', ', $respuesta_correcta);
                $pregunta = implode(', ', $preguntas_id);
                $nuevo->respondidas_id = $respondida;
                $nuevo->correcta_id = $correcta;
                $nuevo->pregunta_id = $pregunta;

       // return response()->json($nuevo);
         
        $nuevo->save();
        return 'se a guardado el registro';
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
