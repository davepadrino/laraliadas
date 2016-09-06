@extends('layouts.layout')
@section('title', 'Principal')
@section('content')
	<h2>Cursos Actuales</h2>
			<table class="table" >
			    <thead>
					    <th>Nombre del Curso</th>
					    <th>Tipo del Curso</th>
					    <th>Sede</th>
					    <th >Fecha de Inicio</th>
					    <th >Fecha de Fin</th>
			    </thead>
			    <tbody>
			    @foreach($cursos as $curso)
			        <tr>
			        	    <td><a href="#">{{ $curso->nombre_curso }}</a></td>
				            <td>{{ $curso->tipo_curso }}</td>
				           	<td>{{ $curso->sede->nombre_sede }}</td>
				            <td>{{ $curso->incio_curso }}</td>
				            <td>{{ $curso->fin_curso }}</td>
			        </tr>
			    @endforeach
			    </tbody>
		    </table>
	

@stop