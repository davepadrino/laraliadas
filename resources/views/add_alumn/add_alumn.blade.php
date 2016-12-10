@extends('layouts.layout')
@section('title', 'Agregar Alumno')
@section('content')	
		@if($curso->tipo_curso == 'Emprendedoras en Cadena' )
			<a href="/cursos/emprendedoras-en-cadena">Volver {{ $curso->tipo_curso}}</a>
			<div>
				<h2> Agregar Alumnos al curso: 
					<a href="/cursos/emprendedoras-en-cadena/{{ $curso->id }}">{{ $curso->nombre_curso}} </a>
				</h2>
			</div>
		@elseif ($curso->tipo_curso == 'Escuela Taller')
			<a href="/cursos/escuela-taller">Volver {{ $curso->tipo_curso}}</a>
			<div>
				<h2> Agregar Alumnos al curso: 
					<a href="/cursos/escuela-taller/{{ $curso->id }}">{{ $curso->nombre_curso}} </a>
				</h2>
			</div>
		@else
			<a href="/cursos/mujeres-hacedoras">Volver {{ $curso->tipo_curso}}</a>	
			<div>
				<h2> Agregar Alumnos al curso: 
					<a href="/cursos/mujeres-hacedoras/{{ $curso->id }}">{{ $curso->nombre_curso}} </a>
				</h2>
			</div>			
		@endif
		
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
				<!-- mensaje de error de usuario-->
				@if(Session::has('error_message'))
				    <div class="alert alert-danger alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				       {{ Session::get('error_message') }}
					</div>
				@endif							
		<div class="row">
			<div id="alumnSearch" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
				<div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<table id="form">
							<tr>
								<td>
									<h2 class="text-center">Buscar alumno</h2>
									<div class="input-group">
									<input type="text" id="searchAlumn" name="searchAlumn" class="form-control" placeholder="Buscar CI...">
								    </div>
								    <table class="table">
								    	<thead>
								    		<th class="text-center">CI</th>
								    		<th class="text-center">Agregar</th>
								    	</thead>
								    	<tbody>
								    		<tr id="addToCourse" class="text-center">
								    		</tr>
								    	</tbody>
								    </table>
								</td>
							</tr>								
						</table>
				</div>
				<div id ="addAlumnForm">
					<div>
		           	
		           	<h2 class="text-center">Crear alumno</h2>
		           	{!! Form::open(['route'=>'personas.store', 'method'=>'post'])!!}
		           	<!-- {!! Form::hidden('course_id', $curso->id) !!} -->
		           	<input type="hidden" id="course_id" name = "course_id" value="{{ $curso->id }}">
		                <table id="form">
		                	<tr>
		                        <td>
		                        {!! Form::label('CI')!!}
								{!! Form::text('ci_persona',null,['class'=>'form-control', 'placeholder'=>'Cédula de Identidad', 'required'])!!}
		                        </td>
		                    </tr>
		                    <tr>
		                        <td>
		                        {!! Form::label('Nombre y Apellido')!!}
		                         {!! Form::text('nombre_persona',null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
		                        </td>
		                    </tr>
		                    <tr>
		                        <td>
		                        {!! Form::label('Género')!!}
		                        {!! Form::select('genero_persona',array
		                        ('Masculino'=>'Masculino',
		                        'Femenino'=>'Femenino'),null,['class'=>'form-control'])!!}
		                        </td>
		                    </tr>
		                    <tr>
			                    <td>
			                        {!! Form::label('Fecha de Nacimiento')!!}
			                        <div class="input-group input-append date datePicker">
			                       		{!! Form::date('fecha_nacimiento_persona',null,['class'=>'form-control'])!!}
			                        	<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            						</div>
		                        </td>
		                    </tr>
		                    <tr>
		                        <td>
		                        {!! Form::label('Dirección')!!}
		                        {!! Form::text('direccion_persona',null,['class'=>'form-control', 'placeholder'=>'Dirección'])!!}
		                        </td>
		                    </tr>
		                    <tr>
		                        <td>
		                        {!! Form::label('Número Telefónico')!!}
		                        {!! Form::text('numero_telefonico_persona',null,['class'=>'form-control', 'placeholder'=>'04XXYYYYYYY'])!!}
		                        </td>
		                    </tr>				                    
		                    <tr>
		                        <td>
		                        {!! Form::label('Correo Electrónico')!!}
		                        {!! Form::email('email_persona',null,['class'=>'form-control', 'placeholder'=>'usuario@dominio.com'])!!}
		                        </td>
		                    </tr>
		                </table>
		             	<div class="addField">
							{!! Form::submit('Crear y agregar alumno al curso', ['class'=>'btn btn-primary'])!!}	

		             	</div>	
		             	
		            {!! Form::close() !!}
		            </div>
		        </div>
			</div>
			<div id ="alumnList" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<h1 class="text-center">Lista de alumnos inscritos</h1>
			    <div>
			        <table  class="table table-striped table-hover" >
			            <thead>
			            	<th class="text-center"> CI </th>
			                <th class="text-center"> Nombre y Apellido</th>
			                <th class="text-center"> Remover de curso</th>
			            </thead>
			            <tbody>
			            @foreach($alumnos as $alumn)
			                <tr>
				                <td class="text-center">{{ $alumn->ci_persona }}</td>
				                <td class="text-center">{{ $alumn->nombre_persona }}</td>
				                <td class="text-center"><button id ="deleteAlumCourse" class="btn glyphicon glyphicon-remove btn-danger btn-sm" type="button" data-toggle="modal" data-target="#deleteAlumCourse{{$alumn->id}}" data-id="{{ $alumn->id }}"></button></td>				                	
			                </tr>
			            @endforeach
			            </tbody>
			        </table>
			    </div>
			    {!! $alumnos->render() !!}
			</div>
		<div class="col-md-1">
		</div>
		</div>
	</div>
</div>
@foreach($alumnos as $alumn)
	<input type="hidden" id="person_id" name = "person_id" value="{{ $alumn->id }}">
	<div id="deleteAlumCourse{{$alumn->id}}" class="modal fade" tabindex="-1" role="dialog">
	    <div class="modal-dialog" role="document">
		    <div class="modal-content">
	             <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Remover Usuario: {{ $alumn-> nombre_persona }}</h4>
			    </div>
			    {!! Form::open(['route'=> ['personas',$alumn->id], 'method'=>'delete'])!!}
			        <div class="modal-body">
				        ¿Desea eliminar el Usuario?<br>
				        <strong>Observación: </strong>Se eliminará al usuario del Curso mas no de la base de Datos
				    </div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<a href="{{ route('personaDelCurso', ['curso'=>$curso->id,'alumno'=>$alumn->id]) }}" class="btn btn-danger">Eliminar</a>        
					</div>
				{!! Form::close() !!}
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	
@endforeach

<script>
$(document).ready(function(){
	var instance;
	$('#searchAlumn').autocomplete({
		source: "{!! URL::route('getAlumno') !!}",
		autoFocus: true,
		select:function(e, ui){
			var ci = ui.item.value; 
			instance = ui.item.value;
 			var url = '{{ route("addAlumno", [$curso->id, ":id"]) }}';
			url = url.replace(':id', ui.item.value);
			var enlace = "<a href='"+url+"' class='btn btn-success glyphicon glyphicon-plus'></a>";
			$('#addToCourse > #ci').remove();
	        $('#addToCourse > #btn').remove();	        	
	        $('#addToCourse').append("<td id='ci'>"+ci+"</td>");
	        $('#addToCourse').append("<td id='btn'>"+enlace+"</td>");
			}
	});

	$('#searchAlumn').keyup(function()
	{
		var url = '{{ route("addAlumno", [$curso->id, ":id"]) }}';
		url = url.replace(':id', $(this).val());
	    if( !$(this).val() ) {
	        $('#addToCourse > #ci').remove();
	        $('#addToCourse > #btn').remove();
	    }
	    	//console.log("instance/CI "+instance);
	    	//console.log("valor de search field "+$(this).val());

	});
	
	$('.datePicker')
	        .datepicker({
	            format: 'dd/mm/yyyy'
	  	});

});
</script>

@stop
