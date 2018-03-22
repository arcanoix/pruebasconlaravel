@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                @foreach($materia_unidad as $m)
                    
               
                <div class="card-header">Materia: <strong>{{ $m->materia }}</strong></div>

                <div class="card-body">
                   @foreach($unidad_tipo as $ut)
                        <li>{{ $ut->unidad }}</li>
                        @foreach($ut->tipos as $tipo)
                            <a href="{{ url('prueba', [$m->id, $ut->id, $tipo->id]) }}"><ol>{{ $tipo->tipoeval }}</ol></a>
                            <!-- url para enviar parametros del id de la unidad, id de la materia y id del tipo    -->
                        @endforeach
                   @endforeach
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection