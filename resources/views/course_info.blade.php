@extends('layouts.layout')
@section('title', 'Cursos')
@section('content')
	<h2>{{ $tipo_curso }}: {{ $current_curso->nombre_curso }} </h2>
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
					<th class="text-center">materia1 / asistencia</th>
					<th class="text-center">materia2 / asistencia</th>
					<th class="text-center">materia3 / asistencia</th>
					<th class="text-center">materia4 / asistencia</th>

			    </thead>
			    <tbody>
					<tr>
						<td class="text-center">
							<a href="#">cedula 1</a>
						</td>
						<td class="text-center">
							calificacion 1 / asistencia 1
						</td>
					</tr>
					<tr>
						<td class="text-center">
							<a href="#">cedula 2</a>
						</td>
						<td class="text-center">
							califiacacion 2 / asistencia 2
						</td>

					</tr>
			    	
			    </tbody>
		</table>
	</div>
			
@stop