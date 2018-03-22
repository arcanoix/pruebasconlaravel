@extends('layouts.app')


@section('content')

  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <h2>Pizarra con array</h2>
      </div>


        <div class="col-md-6">

          <table class="table table-bordered">
            <thead>
              <th>Alumnos</th>

              @foreach($actividad as $act)
                  <th>{{ $act->name }}</th>
              @endforeach
            </thead>
            <tbody>

                        @foreach($alumnos as $alu)
                          <tr>
                                <td>{{ $alu->name }}</td>
                          @foreach($alu->respondida as $var)
                              <td>
                                {{ $var->status }}
                              </td>
                          @endforeach
                          </tr>

                      @endforeach




            </tbody>
          </table>

        </div>


    </div>

  </div>


@stop
