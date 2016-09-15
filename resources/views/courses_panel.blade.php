@extends('layouts.layout')
@section('title', 'Cursos')
@section('content')
	<h2>{{ $nombre }} </h2>
	<!-- Validar Errores en el servidor-->
	@include('alerts.request')
	<!-- mensaje de creacion de usuario-->
	@if(Session::has('flash_message'))
	    <div class="alert alert-success alert-dismissible" role="alert">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       {{ Session::get('flash_message') }}
		</div>
	@endif
	<!-- mensaje de edicion de usuario-->
	@if(Session::has('message'))
	    <div class="alert alert-success alert-dismissible" role="alert">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       {{ Session::get('message') }}
		</div>
	@endif
			<table class="table" >
			    <thead >
					    <th class="text-center">Nombre del Curso</th>
					    <th class="text-center">Sede</th>
					    <th class="text-center">Estado</th>
					    <th class="text-center">Fecha de Inicio/Fin</th>
					    <th class="text-center">Editar Información</th>
					    <th class="text-center">Agregar Profesor-Materia</th>
					    <th class="text-center">Agregar Alumnos</th>
					    <th class="text-center">Eliminar Curso</th>
			    </thead>
			    <tbody>
			    @foreach($cursos as $curso)
			        <tr>
				        @if ( $nombre  == 'Emprendedoras en Cadena')
			        		<td class="text-center"><a href="{{ route('emprendedoras', $curso->id) }}">{{ $curso->nombre_curso }}</a></td>

						@elseif ( $nombre  == 'Escuela - Taller')
			        		<td class="text-center"><a href="{{ route('esctaller', $curso->id ) }}">{{ $curso->nombre_curso }}</a></td>
						@else
			        		<td class="text-center"><a href="{{ route('hacedoras', $curso->id ) }}">{{ $curso->nombre_curso }}</a></td>
						@endif

				        <td class="text-center">{{ $curso->sede->nombre_sede }}</td>
				        <td class="text-center">{{ $curso->estado_curso}}</td>
				        <td class="text-center"> {{ $curso->incio_curso }} / {{ $curso->fin_curso }}</td>

				        <td class="text-center"><button id ="editCourse" class="btn glyphicon glyphicon-pencil btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalCourse{{$curso->id}}" data-id="{{ $curso->id }}" ></button></td>

				        <td class="text-center">
					        <a id ="addProfMateria" class="btn glyphicon glyphicon-education btn-success btn-sm" type="button" href="{{ route('prof-materia', $curso->id) }}">				        	
					        </a>
				        </td>

				        <td class="text-center">
				       		<a id ="addAlumn" class="btn glyphicon glyphicon-user btn-success btn-sm" type="button" href="{{ route('personas', $curso->id) }}"></a>
				        </td>
				        
				        <td class="text-center"><button id ="deleteCourse" class="btn glyphicon glyphicon-remove btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modalDelCourse{{$curso->id}}" data-id="{{ $curso->id }}"></button></td>
			        </tr>
			    @endforeach
			    </tbody>
		    </table>
		    {!! $cursos->render() !!} 
		    <!-- Para editar cursos -->
		    @foreach($cursos as $curso)
				<div id="modalCourse{{$curso->id}}" class="modal fade" tabindex="-1" role="dialog">
				    <div class="modal-dialog" role="document">
				  		<div class="modal-content">
						    <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title">Editar Usuario: {{ $curso-> name }}</h4>
						    </div>
						     	<div class="modal-body">
								{!! Form::model($curso,['route'=> ['cursos.update',$curso->id], 'method'=>'put'])!!}
						      		{!! Form::label('Nombre')!!}
									{!! Form::text('nombre_curso',$curso->nombre_curso,['class'=>'form-control'])!!}

									{!! Form::label('Fecha de inicio')!!}
									{!! Form::date('incio_curso',$curso->inicio_curso,['class'=>'form-control', 'id'=>'incio_curso'])!!}

									{!! Form::label('Fecha de fin')!!}
									{!! Form::date('fin_curso',$curso->fin_curso,['class'=>'form-control', 'id'=>'fin_curso'])!!}

									{!! Form::label('Estado de Curso')!!}
									{!! Form::select('state',
										array(
										'Sin iniciar' => 'Sin iniciar',
										'En curso' => 'En curso',
										'Finalizado' => 'Finalizado'), $curso->estado_curso, ['class'=>'form-control', 'id'=>'state']
		                        	)!!}

									{!! Form::label('Tipos de Curso')!!}
									{!! Form::text('tipo_curso',
									$curso->tipo_curso, ['class'=>'form-control', 'id'=>'type','readonly']
                        			)!!}

			                        {!! Form::label('Sede')!!}					
									{!! Form::text('sede_id',
										$curso->sede->nombre_sede, ['class'=>'form-control', 'id'=>'sede_id','readonly']
			                        )!!}

			                        {!! Form::label('Observaciones')!!}					
									<textarea class="form-control" name="descriptionCourse">
							</textarea>
  	                        	</div>
						    	<div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							        {!! Form::submit('Editar', ['class'=>'btn btn-primary'])!!}
						    	</div>
						     	{!! Form::close() !!}
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->	
			@endforeach
	
			@foreach($cursos as $curso)
			<div id="modalDelCourse{{$curso->id}}" class="modal fade" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
				    <div class="modal-content">
			            <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title">Eliminar Usuario: {{ $curso-> nombre_curso }}</h4>
					    </div>
					    {!! Form::open(['route'=> ['cursos.update',$curso->id], 'method'=>'delete'])!!}
					        <div class="modal-body">
						        ¿Desea eliminar el Curso?
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						        {!! Form::submit('Eliminar', ['class'=>'btn btn btn-danger'])!!}       
							</div>
						{!! Form::close() !!}
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->	
			@endforeach
@stop