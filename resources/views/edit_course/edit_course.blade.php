@extends('layouts.layout')
@section('title','Editar Curso')
@section('content')
		<h2>Editar Curso</h2>
		<table id="form">
			<tr>
				<td>
					<label for="courseName">Nombre del Curso</label>
					<input type="text" name="courseName" value="Curso X">
				</td>
			</tr>
			<tr>
				<td>
					<label for="courseType">Tipo de Curso</label>
	    			<input type="text" name="courseType" value="Tipo X" readonly>
				</td>
			</tr>
			<tr>
				<td>
					<label for="startDate">Fecha de inicio</label>
	    			<input type="date" name="startDate">
				</td>
			</tr>
			<tr>
				<td>
					<label for="endDate">Fecha de fin</label>
	    			<input type="date" name="endDate" >
				</td>
			</tr>
		</table>
	    <div class="row">
	    	<div class="col-md-1"></div>
	    	<div class="col-md-10">
				<table class="row table" >
				    <thead>
						<div class="col-md-3">		    					
						    <th>Nombre</th>
						    <th>Apellido</th>
						    <th>Nota</th>
						    <th>Editar</th>
				    	</div>
				    </thead>
				    <tbody>
				        <tr>
			    			<div class="col-md-3">
				        	    <td>Nombre 1</td>
					            <td>Apellido 1</td>
					            <td><input type="text" placeholder="Nota"></td>
					           	<td>
					            	<button type="button" class="btn btn-primary">
					            		<span class="glyphicon glyphicon-pencil"></span>
					            	</button>
					            </td>

					        </div>
				        </tr>
				        <tr>
			    			<div class="col-md-3">
				        	    <td>Nombre 2</td>
					            <td>Apellido 2</td>
					            <td><input type="text" placeholder="Nota"></td>
					            <td>
					            	<button type="button" class="btn btn-primary">
					            		<span class="glyphicon glyphicon-pencil"></span>
					            	</button>
					            </td>
					        </div>
				        </tr>
				    </tbody>
			    </table>
		   	</div>
		    <div class="col-md-1"></div>
		</div>
@stop