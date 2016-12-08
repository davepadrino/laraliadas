@extends('layouts.layout')
@section('title', 'Principal')
@section('content')
<div class="row">
	<div class="col-md-4">
		<h2>Cursos Actuales</h2>
	</div>
	<div class="col-md-5 filterSpace">
    	<fieldset>
       		<input type="text" class="text-input" id="filter" placeholder="Filtrar cursos.." />
    	</fieldset>
	</div>
</div>
<table class="table" id="tablaprincipal">
    <thead>
		    <th>Nombre del Curso </p></th>
		    <th>Tipo del Curso</th>
		    <th>Sede</th>
		    <th>Fecha de Inicio</th>
		    <th>Fecha de Fin</th>
    </thead>
    <tbody>
    @foreach($cursos as $curso)
        <tr class = "currentMatches">
			@if ( $curso->tipo_curso  == 'Emprendedoras en Cadena')
        		<td class="text-center"><a href="{{ route('emprendedoras', $curso->id) }}">{{ $curso->nombre_curso }}</a></td>
			@elseif ( $curso->tipo_curso  == 'Escuela Taller')
        		<td class="text-center"><a href="{{ route('esctaller', $curso->id ) }}">{{ $curso->nombre_curso }}</a></td>
			@else
        		<td class="text-center"><a href="{{ route('hacedoras', $curso->id ) }}">{{ $curso->nombre_curso }}</a></td>
			@endif
	            <td>{{ $curso->tipo_curso }}</td>
	           	<td>{{ $curso->sede->nombre_sede }}</td>
	            <td>{{ Carbon\Carbon::parse($curso->incio_curso )->format('d/m/Y') }}</td>
	            <td>{{ Carbon\Carbon::parse($curso->fin_curso)->format('d/m/Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $cursos->render() !!}
@stop

