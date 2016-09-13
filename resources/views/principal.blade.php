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
						@if ( $curso->tipo_curso  == 'Emprendedoras en Cadena')
			        		<td class="text-center"><a href="{{ route('emprendedoras', $curso->id) }}">{{ $curso->nombre_curso }}</a></td>
						@elseif ( $curso->tipo_curso  == 'Escuela Taller')
			        		<td class="text-center"><a href="{{ route('esctaller', $curso->id ) }}">{{ $curso->nombre_curso }}</a></td>
						@else
			        		<td class="text-center"><a href="{{ route('hacedoras', $curso->id ) }}">{{ $curso->nombre_curso }}</a></td>
						@endif
							<!--
			        	    <td><a href="#">{{ $curso->nombre_curso }}</a></td>
			        	    -->
				            <td>{{ $curso->tipo_curso }}</td>
				           	<td>{{ $curso->sede->nombre_sede }}</td>
				            <td>{{ $curso->incio_curso }}</td>
				            <td>{{ $curso->fin_curso }}</td>
			        </tr>
			    @endforeach
			    </tbody>
		    </table>
		    {!! $cursos->render() !!}
@stop