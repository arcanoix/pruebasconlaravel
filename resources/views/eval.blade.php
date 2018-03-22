@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                    <form action="{{ url('enviar') }}" method="POST">
                            @csrf
                <div class="card-header">Materia: 
                        @foreach($pregunta_opcion as $nombre)
                        
                        <strong> {{$nombre->materia}}   </strong></div>
                            @endforeach
                        
                                         @foreach($unidad as $u)
                                        {{ $u->unidad }} -
                                        @endforeach
                                         @foreach($tipo as $t)
                                            {{ $t->tipoeval }}
                                        @endforeach

                <div class="container-fluid bg-info">
                    <div class="">
                       
                            @foreach($pregunta_opcion   as $p)
                                       @foreach($p->preguntas as $key => $pre)
                                         {{$key}}<h2>{{ $pre->pregunta }}</h2>
                                         <input type="text" name="pregunta_[]" value="{{ $pre->id }}">
                                         
                                            @foreach($pre->opcion as  $op)
                                                <div class="form-check">
                                                    
                                                    <input class="form-check-input" type="radio"  name="opcion_[{{ $key }}]" value="{{ $op->id }}"> {{ $op->opcion }}
                                                    @if($op->es_correcta)
                                                        <input type="text" name="correcta_[]" id="" value="{{$op->id}}">
                                                    @endif
                                                    

                                                </div>
                                                
                                            @endforeach
                                            
                                       @endforeach
                            @endforeach
                            <div>
                                
                                <input type="text" name="unidad" value="{{ $u->id }}" style="display:none;">
                                <input type="text" name="tipo" value="{{ $t->id }}" style="display:none;">
                                <input type="text" name="materia" value="{{ $nombre->id }}" style="display:none;">

                                <button type="submit">Enviar</button>
                            </div>
                        
                    </div>
                </div>
            </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection