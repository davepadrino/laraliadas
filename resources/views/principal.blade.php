@extends('layouts.layout')
@section('title', 'Principal')
@section('content')
	<h2>Cursos Actuales</h2>
	    <div>
			<table class="row table" >
			    <thead>
					<div class="col-md-3">		    					
					    <th>Nombre del Curso</th>
					    <th>Tipo del Curso</th>
					    <th>Sede</th>
					    <th >Fecha de Inicio</th>
					    <th >Fecha de Fin</th>
			    	</div>
			    </thead>
			    <tbody>
			    @foreach($cursos as $curso)
			        <tr>
		    			<div class="col-md-3">
			        	    <td><a href="#">{{ $curso->nombre_curso }}</a></td>
				            <td>{{ $curso->tipo_curso }}</td>
				           	<td>{{ $curso->sede_course }}</td>
				            <td>{{ $curso->incio_curso }}</td>
				            <td>{{ $curso->fin_curso }}</td>
				        </div>
			        </tr>
			    @endforeach
			    </tbody>
		    </table>
		</div>

@stop