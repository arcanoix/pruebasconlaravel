@extends('layouts.app')


@section('content')

  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <h2>Pizarra con array PARTE III</h2>
      </div>


      {{-- dd($alum <=0) --}}

  @if($alum <= 0)
      <div class="col-md-6">
            <h1>No existe actividades asignadas a alumnos registrados en esta materia</h1>
      </div>
  @else
                    <div class="row">
                            <div class="col-md-12">
                          
                                        <h1>Unidad 1</h1>
                                                <table class="table table-bordered">
                                                  @if(count($ac1) > 0)
                                                  
                                                    <tbody>

                                                      <th>Alumnos</th>
                                                    
                                                      @foreach($ac1 as $key=>$act)
                                                          <th>{{ $act->name}}</th>
                                                        
                                                      @endforeach
                                                    
                                                      @foreach($alum as $alu)
                                                        <tr>
                                                        <!-- 0 a 4 -->
                                                            <td>{{ $alu->name }}</td>
                                                                @for($k=0;$k<=$act1;$k++)                     
                                                                  <td >
                                                                  <i class="<?php echo ( $alu->respondida[$k]['status'] == 2 ? 'fas fa-ban' : ($alu->respondida[$k]['status'] == 1 ? 'fas fa-check' : 'fas fa-minus')  ); ?>">{{ $alu->respondida[$k]['status'] }}</i>
                                                                  </td>
                                                                @endfor
                                                        </tr>
                                                      @endforeach
                                                    </tbody>
                                                  @endif
                                                </table>
                                  </div>
                    


                              <div class="col-md-12">
                          
                                   <h1>Unidad 2</h1>
                                  <table class="table table-bordered">
                                        @if(count($ac2) > 0)
                                        
                                          <tbody>

                                            <th>Alumnos</th>
                                          
                                            @foreach($ac2 as $key=>$act)
                                                <th>{{ $act->name}}</th>
                                                
                                            @endforeach
                                          
                                            @foreach($alum as $alu)
                                                
                                              <tr>
                                                  <td>{{ $alu->name }}</td>
                                                  <!-- 5 a 9 -->
                                                      @for($k=5;$k <= $act2;$k++)                     
                                                        <td >
                                                        <i class="<?php echo ( $alu->respondida[$k]['status'] == 2 ? 'fas fa-ban' : ($alu->respondida[$k]['status'] == 1 ? 'fas fa-check' : 'fas fa-minus')  ); ?>">{{ $alu->respondida[$k]['status'] }}</i>
                                                        </td>
                                                      @endfor
                                              </tr>
                                            @endforeach
                                          </tbody>
                                        @endif
                                  </table>
                              </div>
           
                              <div class="col-md-12">
                              
                                   <h1>Unidad 3</h1>
                                  <table class="table table-bordered">
                                 
                                        @if(count($ac3) > 1)
                                       
                                          <tbody>
                               
                                            <th>Alumnos</th>
                                            
                                            @foreach($ac3 as $key=>$act)
                                                <th>{{ $act->name}}</th>
                                               
                                            @endforeach
                                           
                                            @foreach($alum as $alu)
                                          
                                              <tr>
                                                  <td>{{ $alu->name }}</td>
                                                  <!-- 10 a  14 -->
                                                      @for($k=10;$k <= $act3;$k++)                     
                                                        <td >
                                                        <i class="<?php echo ( $alu->respondida[$k]['status'] == 2 ? 'fas fa-ban' : ($alu->respondida[$k]['status'] == 1 ? 'fas fa-check' : 'fas fa-minus')  ); ?>">{{ $alu->respondida[$k]['status'] }}</i>
                                                        </td>
                                                      @endfor
                                              </tr>
                                            @endforeach

                                          </tbody>

                                        @endif
                                  </table>
                              </div>
             </div>
                

         
         
         
@endif


    </div>

  </div>


@stop
