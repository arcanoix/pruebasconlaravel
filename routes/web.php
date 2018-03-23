<?php
use App\Respondidas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});


Route::get('datos', function(){
    $Materia = App\Materia::all();
    $unidad = App\Unidad::all();
    $tipo = App\TipoE::all();


    return response()->json([
       'Materia' => $Materia,
       'Unidades' => $unidad,
       'Tipo de Evaluacion' => $tipo
        ]);
});

Route::get('eval', function(){

    $materia_unidad = App\Materia::with('unidades')->get();

    $unidad_tipo = App\Unidad::with('tipos')->get();

    return response()->json([
        'materia unidades' => $materia_unidad,
        'unidad tipos' => $unidad_tipo
    ]);


});
// ruta para encontrar la prueba de la materia seleccionada
Route::get('pruebas/{id}/materia', 'PruebasController@index')->name('pruebas');
// ruta para enviar las ids de la unidad y tipo de evaluacion
Route::get('prueba/{id}/{unidad_id}/{tipo_id}','PruebasController@getMate');

Route::post('enviar', 'PruebasController@store');

Route::get('ac', function(){

    $alumnos = App\User::with('actividad')->get();

    $respuesta = App\Respondidas::with('user')->get();


    $actividades = App\Actividad::with('unidad')->get();

    $unidad = App\Unidad::with(['actividad.respondidas.user'])->get();

    //$unidad = App\Respondidas::with(['actividad','unidad'])->get();

    $participadas = App\User::with('respondida.actividad.unidad')->get();

    //return $unidad;

    return view('activities', compact('actividades','alumnos','participadas','unidad'));
});



Route::get('pizarra', function(){

      $alumnos = App\User::with('respondida')->get(); // id = 2, 3
      $actividad = App\Actividad::all(); // id = 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15
      $actividad_respondida = App\Respondidas::all();


      return view('pizarra', compact('alumnos', 'actividad'));
});





    Route::get('pizarra2', function(){
        
      $alumnos = App\User::with('respondida')->get(); // id = 2, 3..
      $actividad = App\Actividad::all(); // id = 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15


      $conteo_alu = count($alumnos) -1;

      for($al=0;$al<=$conteo_alu;$al++){
            $alum[] = $alumnos[$al];
      }


      for($a=0; $a<=4;$a++){
        $act1[] = $actividad[$a];
      }

      for($b=5;$b<=9;$b++){
        $act2[]=$actividad[$b];
      }

      for($c=10;$c<=14;$c++){
        $act3[]=$actividad[$c];
      }



      return view('pizarra2', compact('alum','act1','act2','act3'));
});



Route::get('/pizarra/{id}', function($id){

    
        
    /*$alumnos = App\User::with('respondida.materia')
                            
                            ->get(); // id = 2, 3..*/

                        $alumnos = App\Respondidas::with(['user.respondida','materia']) 
                                                    ->where('materia_id','=',$id)
                                                    //->orderBy('user_id')
                                                    //->groupBy('materia_id')
                                                    //->having('materia_id','=', $id)
                                                    ->select('user_id','materia_id')
                                                    ->distinct()
                                                    ->get();
    

    //return $alumnos;

    $actividad = App\Actividad::all(); // id = 1,2,3,4,5,6,7,8,9,10,11,12,13,14,15


    //$conteo_alu = count($alumnos) -1;
    $conteo_alu = count($alumnos);
    $conteo_act = count($actividad);
    
    

    /** APLICANDO SWITCH */
        //return $restando;
        $restando = 15 - $conteo_act ;
        switch($restando)
        {
            case 1: 
                $act3 = 15 - $restando; //10 //14
                $act2 = 9;
                $act1 = 4;
                //return($act3);
            break;
            case 2:
                $act3 = 15 - $restando; //10 //14
                $act2 = 9;
                $act1 = 4;
            break;
            case 3:
                $act3 = 15 - $restando; //10 //14
                $act2 = 9;
                $act1 = 4;
            break;
            case 4:
                $act3 = 15 - $restando; //10 //14
                $act2 = 9;
                $act1 = 4;
            break;
            case 5:
                $act2 = 15 - $restando; // 9 //5
                $act1 = 4;
                $act3 = 0;
            break;
            case 6:
                $act2 = 15 - $restando; // 9 //5
                $act1 = 4;
                $act3 = 0;
            break;
            case 7:
                $act2 = 15 - $restando; // 9 //5
                $act1 = 4;
                $act3 = 0;
            break;
            case 8:
                $act2 = 15 - $restando; // 9 //5
                $act1 = 4;
                $act3 = 0;
            break;
            case 9:
                $act2 = 15 - $restando; // 9 //5
                $act1 = 4;
                $act3 = 0;
            break;
            case 10:
                $act2 = 15 - $restando; // 9 //5
                $act1 = 4;
                $act3 = 0;
            break;
            case 11:
               
                    $res = $restando - 7;
                    $act1 = $res;
                    $act2 = 0;
                    $act3 = 0;
                
            break;
            case 12:
              
                    $res = $restando - 9;
                    $act1 = $res;
                    $act2 = 0;
                    $act3 = 0;
                
            break;
            case 13:
               
                    $res = $restando - 11;
                    $act1 = $res;
                    $act2 = 0;
                    $act3 = 0;
                
            break;
            case 14:
               
                    $res = $restando - 13;
                    $act1 = $res;
                    $act2 = 0;
                    $act3 = 0;
                
            break;
            default:
                $act3 = 14; //10 //14
                $act2 = 9;
                $act1 = 4;
        }

        //dd($act3);
           
        
          /* return response()->json([
                'actividad' => $conteo_act,
                'restando' => $restando,
                'act1' => $act1,
                'act2' => $act2,
                'act3' => $act3,
                'consulta' => $actividad
           ]);
    */
    //return $alum;

    

            for($a=0; $a<=$act1;$a++){
                $ac1[] = $actividad[$a];
            }
           
           if($act2>0){
            
                for($b=5;$b<=$act2;$b++){
                    $ac2[]=$actividad[$b];
                  
                }

           }else{
             $ac2[]=0;
           }
           
           if($act3 > 0)
           {
            //dd($actividad);
                for($c=10;$c<=$act3;$c++)
                     {
                      $ac3[]=$actividad[$c];
                      
                    }

           }else{
                $ac3[]=0;
           }
          
          

    if($conteo_alu <= 0){
        $alum=0;
        return view('pizarra3', compact('alum','ac1','ac2','ac3','act1','act2','act3'));
    }else{

        for($al=0;$al<$conteo_alu;$al++)
            {
                $alum[] = $alumnos[$al]['user'];

            }

    }
    
    //dd($alum);
        //return $alum->respondida;

    return view('pizarra3', compact('alum','ac1','ac2','ac3','act1','act2','act3'));
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

