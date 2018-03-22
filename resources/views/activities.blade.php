@extends('layouts.app')

@section('content')
	

  <div class="container">

		<div class="row">
			


<h1>Forma manual</h1>
				<table class="table table-responsive">

						<thead>
						  <th>Alumno</th>
						  <th>Ac1</th>
						  <th>Ac2</th>
						  <th>Ac3</th>
						  <th>Ac4</th>
						  <th>Ac5</th>
						</thead>

						<tbody>
						  <tr>
						        <td>Alumno1 </td>
						        
						          <td>1</td>
						          <td>1</td>
						          <td>0</td>
						          <td>0</td>
						          <td>1</td>
						          
						      </tr>
						      <tr>
						        <td>Alumno2 </td>
						        
						         <td>1</td>
						          <td>1</td>
						          <td>0</td>
						          <td>1</td>
						          <td>1</td>
						          
						      </tr>
						      <tr>
						        <td>Alumno3 </td>
						        
						         <td>0</td>
						          <td>0</td>
						          <td>1</td>
						          <td>0</td>
						          <td>1</td>
						      </tr>
						    
						</tbody>

						</table>




<h1>Forma BD</h1>

						<table class="table table-responsive">

								<thead>

								  <th>Alumno</th>
								  @foreach($actividades as $act)
										 

										  <th>{{ $act->name }}</th>

										 
								 @endforeach
								</thead>

								<tbody>

									@foreach($participadas as $key => $a)
										
										<tr>
											   <td>{{ $a->name }}</td>
												  
												@foreach($a->respondida as $a => $res)
											
														  <td>{{ $res->status }}</td>
												         
												@endforeach
												   
											  </tr>
										
									@endforeach		   
											     
								    
								</tbody>

						</table>





<h1>Forma BD separada</h1>

						<table class="table table-responsive">

								<thead>
									@foreach($unidad as $u)
										<th>{{ $u->unidad }}</th>
									@endforeach
								</thead>

								<tbody>
						
					
								
											     
								    
											
								</tbody>

						</table>








						<h1>Forma BD separada por unidad</h1>

						<table class="table table-responsive">

								<thead>

								</thead>

								<tbody>
						
					
								@foreach($unidad as $u)

									<tr>
										<td>{{ $u->unidad }}</td>

										<tr>
											<td>Alumno</td>
												@foreach($u->actividad as $act)

												<td>{{ $act->name }}</td>

												@endforeach
										</tr>


								@foreach($participadas as $part)
										<tr>
											<td>{{ $part->name }}</td>

											@foreach($part->respondida as $res)
												<td>{{ $res->status }}</td>
											@endforeach
										</tr>

									</tr>
								@endforeach	

										<br>

								@endforeach
											     
								    
											
								</tbody>

						</table>


		</div>

  </div>

					



@endsection