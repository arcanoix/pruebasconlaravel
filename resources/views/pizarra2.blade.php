@extends('layouts.app')


@section('content')

  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <h2>Pizarra con array PARTE II</h2>
      </div>


        <div class="col-md-6">

                <h1>Unidad 1</h1>
                        <table class="table table-bordered">
                          <tbody>

                            <th>Alumnos</th>

                            @foreach($act1 as $act)
                                <th>{{ $act->name }}</th>
                            @endforeach

                            @foreach($alum as $alu)
                              <tr>
                                  <td>{{ $alu->name }}</td>
                                      @for($k=0;$k<=4;$k++)

                                        <td >
                                          <i class="<?php echo ($alu->respondida[$k]['status']==1) ? 'si fa fa-check-square-o' : 'no fa fa-minus-square-o'; ?>"></i>

                                        </td>


                                      @endfor
                              </tr>
                            @endforeach


                          </tbody>
                        </table>

        </div>

          <div class="row">
            <div class="col-md-6">

                    <h1>Unidad 2</h1>
                            <table class="table table-bordered">
                              <tbody>

                                <th>Alumnos</th>

                                @foreach($act2 as $act)
                                    <th>{{ $act->name }}</th>
                                @endforeach

                                @foreach($alum as $alu)
                                  <tr>
                                        <td>{{ $alu->name }}</td>
                                    @for($k=5;$k<=9;$k++)
                                      <td >
                                        <i class="<?php echo ($alu->respondida[$k]['status']==1) ? 'si fa fa-check-square-o' : 'no fa fa-minus-square-o'; ?>"></i>

                                      </td>
                                    @endfor
                                  </tr>
                                @endforeach


                              </tbody>
                            </table>

            </div>



          </div>

          <div class="row">

                        <div class="col-md-6">

                                <h1>Unidad 3</h1>
                                        <table class="table table-bordered">
                                          <tbody>

                                            <th>Alumnos</th>
                                                @foreach($act3 as $act)
                                                    <th><i class="glyphicon glyphicon-ok"></i>{{ $act->name }}</th>
                                                @endforeach

                                                @foreach($alum as $alu)
                                                  <tr>
                                                        <td>{{ $alu->name }}</td>
                                                    @for($k=10;$k<=14;$k++)
                                                      <td >
                                                        <i class="<?php echo ($alu->respondida[$k]['status']==1) ? 'si fa fa-check-square-o' : 'no fa fa-minus-square-o'; ?>"></i>

                                                      </td>
                                                    @endfor
                                                  </tr>
                                              @endforeach
                                          </tbody>
                                        </table>

                        </div>
          </div>



    </div>

  </div>


@stop
