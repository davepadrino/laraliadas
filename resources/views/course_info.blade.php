@extends('layouts.layout')
@section('title', 'Cursos')
@section('content')
    @if($tipo_curso == 'Emprendedoras en Cadena' )
			<h2><a href="/cursos/emprendedoras-en-cadena">{{ $tipo_curso }}</a>: {{ $current_curso->nombre_curso }} </h2>
	@elseif ($tipo_curso == 'Escuela - Taller')
		<h2><a href="/cursos/escuela-taller">{{ $tipo_curso }}</a>: {{ $current_curso->nombre_curso }} </h2>	
	@else
		<h2><a href="/cursos/mujeres-hacedoras">{{ $tipo_curso }}</a>: {{ $current_curso->nombre_curso }} </h2>
	@endif
	<div class="row">
		<div class="col-md-6">
			<h3>Fecha de Inicio: {{$current_curso-> incio_curso}}</h3>
			<h3>Fecha de Fin: {{$current_curso-> fin_curso}}</h3>
		</div>
		<div class="col-md-6">
			<h3>Estado: {{$current_curso-> estado_curso}}</h3>
			<h3>Observaciones: {{$current_curso-> descripcion_curso}}</h3>			
		</div>
	</div>
	<div>
		<table class="table" >
			    <thead >
					<th class="text-center">CI</th>
					@foreach($materias as $materia)
					<th class="text-center">{{ $materia->nombre_materia }} / asistencia</th>
					@endforeach
			    </thead>
			    <tbody>
			    @foreach($alumnos as $alumno)
					<tr>
						<td class="text-center">
							<a href="/getAlumnosView?buscar={{$alumno->ci_persona}}">{{ $alumno->ci_persona }}</a>

						</td>
						<td class="text-center">
							calificacion 1 / asistencia 1
						</td>
					</tr>	    	
				@endforeach
			    </tbody>
		</table>
	</div>
			
@stop