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
			<h3>Fecha de Inicio: {{ Carbon\Carbon::parse($current_curso-> incio_curso )->format('d/m/Y')}}</h3>
			<h3>Fecha de Fin: {{ Carbon\Carbon::parse($current_curso-> fin_curso)->format('d/m/Y') }}</h3>
		</div>
		<div class="col-md-6">
			<h3>Estado: {{$current_curso-> estado_curso}}</h3>
			<h3>Observaciones: {{$current_curso-> descripcion_curso}}</h3>			
		</div>
	</div>
	<div>
		<table id="notasTable" class="table califications">
			    <thead >
					<th class="text-center">CI</th>
					@foreach($materias as $materia)
					<th class="text-center">{{ $materia->nombre_materia }} </th>
					@endforeach
					<th class="text-center">Final</th>
			    </thead>
			    <tbody >
			    @foreach($alumnos as $alumno)
					<tr>
						<td class="text-center" >
							<a href="/getAlumnosView?buscar={{$alumno->ci_persona}}">
								{{ $alumno->ci_persona }}
							</a>
						</td>
						@foreach($materias as $materia)
							@foreach($recordsArray as $record)
								@if($record->persona_id == $alumno->id && $record->materia_id == $materia->id)
								<td class="text-center">
									<a href="#" data-target="#editNote{{$alumno->id}}-{{$materia->id}}" data-toggle="modal">
										{{ $record->calificacion }}
									</a>
								</td>
								@endif
							@endforeach
						@endforeach
						@foreach($courseArray as $course)
							@if($course->persona_id == $alumno->id)
							<td class="text-center">
								<a href="#" data-target="#editNoteC{{$alumno->id}}-{{$current_curso->id}}" data-toggle="modal">
									{{ $course->nota_final }}
								</a>
							</td>
							@endif
						@endforeach
					</tr>	    	
				@endforeach
			    </tbody>
		</table>
		<button id="downloadPDF" class="btn btn-info" onClick ="$('#notasTable').tableExport({type:'excel', tableName:'hola'});" type="button">Descargar</button>
	</div>
	@foreach($alumnos as $alumno)
		@foreach($materias as $materia)
			@foreach($recordsArray as $record)
				@if($record->persona_id == $alumno->id && $record->materia_id == $materia->id)
				<div id="editNote{{$alumno->id}}-{{$materia->id}}" class="modal fade" tabindex="-1" role="dialog">
				    <div class="modal-dialog modal-sm" role="document">
					    <div class="modal-content">
				             <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title">Editar relación: {{ $alumno-> nombre_persona }}-{{ $materia-> nombre_materia }}</h4>
						    </div>    
						    {!! Form::model([$materia,$alumno], array('route' => array('califMateria', $materia->id,$alumno->id, 'method'=>'put')))!!}
						        <div class="modal-body">
							        Información<br>
							        {!! Form::label('Nota')!!}
									{!! Form::text('nota_materia',$record->calificacion,['class'=>'form-control', 'placeholder'=>'Nota'])!!}
							        {!! Form::label('Asistencia')!!}
									{!! Form::text('asistencia',$record->asistencia,['class'=>'form-control', 'placeholder'=>'Asistencia'])!!}
							    </div>
							    <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
							        <button type="submit" class="btn btn-primary">Guardar</a>       
								</div>
							{!! Form::close() !!}
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->	
				@endif
			@endforeach
		@endforeach
	@endforeach	
	@foreach($alumnos as $alumno)
		@foreach($courseArray as $course)
			@if($course->persona_id == $alumno->id)
			<div id="editNoteC{{$alumno->id}}-{{$current_curso->id}}" class="modal fade" tabindex="-1" role="dialog">
			    <div class="modal-dialog modal-sm" role="document">
				    <div class="modal-content">
			             <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title">Calificación final de {{ $alumno-> nombre_persona }} en el curso {{ $current_curso-> nombre_curso }}</h4>
					    </div>
					    {!! Form::model([$current_curso,$alumno], array('route' => array('califCurso', $current_curso->id,$alumno->id, 'method'=>'put')))!!}
					        <div class="modal-body">
						        {!! Form::label('Nota Final')!!}
								{!! Form::text('nota_final',$course->nota_final,['class'=>'form-control', 'placeholder'=>'Nota Final'])!!}
						        {!! Form::label('Asistencia Final del Curso')!!}
								{!! Form::text('asistencia',$course->asistencia,['class'=>'form-control', 'placeholder'=>'Asistencia Final'])!!}
						    </div>
						    <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Guardar</a>
							</div>
						{!! Form::close() !!}
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->	
			@endif
		@endforeach
	@endforeach

@stop