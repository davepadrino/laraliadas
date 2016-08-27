@extends('layouts.layout')
@section('content')
	<h2>Cursos Actuales</h2>
	    <div>
			<table class="row table" >
			    <thead>
					<div class="col-md-3">		    					
					    <th>Nombre del Curso</th>
					    <th>Tipo del Curso</th>
					    <th >Fecha de Inicio</th>
					    <th >Fecha de Fin</th>
			    	</div>
			    </thead>
			    <tbody>
			        <tr>
		    			<div class="col-md-3">
			        	    <td><a href="edit_course.html">Curso 1</a></td>
				            <td>Tipo 1</td>
				            <td>xx/xx/xx</td>
				            <td>xx/xx/xx</td>
				        </div>
			        </tr>
			        <tr>
		    			<div class="col-md-4">
			        	    <td><a href="edit_course.html">Curso 2</a></td>
				            <td>Tipo 2</td>
				            <td>xx/xx/xx</td>
				            <td>xx/xx/xx</td>
				        </div>
			        </tr>
			    </tbody>
		    </table>
		</div>

@stop