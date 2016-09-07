@extends('layouts.layout')
@section('title', 'Cursos')
@section('content')
	<h2>Cursos </h2>
	    <div>
			<table  class="row table" >
			    <thead>
					<div class="col-md-3 col-md-3">		    					
					    <th>Nombre del Curso</th>
					    <th >Fecha de Inicio</th>
					    <th >Fecha de Fin</th>
			    	</div>
			    </thead>
			    <tbody>
			        <tr>
		    			<div class="col-md-3 col-md-3">
			        	    <td><a href="#">Curso 1</a></td>
				            <td>xx/xx/xx</td>
				            <td>xx/xx/xx</td>
				        </div>
			        </tr>
			        <tr>
		    			<div class="col-md-3 col-md-3">
			        	    <td><a href="#">Curso 2</a></td>
				            <td>xx/xx/xx</td>
				            <td>xx/xx/xx</td>
				        </div>
			        </tr>
			    </tbody>
		    </table>
		</div>

@stop