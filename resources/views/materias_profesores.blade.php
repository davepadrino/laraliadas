@extends('layouts.layout')
@section('title', 'Agregar Profesor-Materia')
@section('content')
@if($current_curso->tipo_curso == 'Emprendedoras en Cadena' )
		<h2><a href="/cursos/emprendedoras-en-cadena">{{ $current_curso->tipo_curso }}</a>: {{ $current_curso->nombre_curso }} </h2>
@elseif ($current_curso->tipo_curso == 'Escuela Taller')
	<h2><a href="/cursos/escuela-taller">{{ $current_curso->tipo_curso }}</a>: {{ $current_curso->nombre_curso }} </h2>	
@else
	<h2><a href="/cursos/mujeres-hacedoras">{{ $current_curso->tipo_curso }}</a>: {{ $current_curso->nombre_curso }} </h2>
@endif

<div class="row">
	<div id="matProfSearch" class="col-md-6">
		<div>
			<table id="form">
				<tr>
					<td>
						<h2 class="text-center">Buscar Profesor</h2>
						<div class="input-group">
							<input type="text" id="searchProf" name="searchProf" class="form-control" placeholder="Buscar Profesor por nombre...">
					    </div>

					</td>
				</tr>		
				<tr>
					<td>
						<h2 class="text-center">Buscar Materia</h2>
						<div class="input-group">
							<input type="text" id="searchMat" name="searchMat" class="form-control" placeholder="Buscar Materia por nombre...">
					    </div>
					</td>
				</tr>
			</table>
			<table class="table">
		    	<thead> 		
		    		<th class="text-center">Profesor</th>
		    		<th class="text-center">Materia</th>
		    		<th class="text-center">Agregar</th>
		    	</thead>
		    	<tbody>
				{!! Form::open(['route'=>'addProfMat', 'method'=>'post'])!!}
		    		<tr id="PMToCourse" class="text-center">
		    		<!--
		    			<td id='profName'></td>
		    			<td id='matName'></td>
		    			<td id='btn2'></td>
		    		-->
		    			{!! Form::hidden('course_id',$current_curso->id,['id' => 'course_id', 'class'=>'form-control'])!!}
			    		<td>
			    			{!! Form::text('profName',null,['id' => 'profName', 'class'=>'form-control', 'readonly'])!!}
			    		</td>
			    		<td>
			    			{!! Form::text('matName',null,['id' => 'matName', 'class'=>'form-control', 'readonly'])!!}
			    		</td>
			    		<td id='btn2'>
			    			<button type="submit" class="btn btn-primary glyphicon glyphicon-plus"></button>
			    		</td>
		    		</tr>
		    	{!! Form::close() !!}
		    	</tbody>
		    </table>
		</div>
	</div>

	<div id ="profMatList" class="col-md-6">
		<h1 class="text-center">Lista de Profesores-Materias en el curso</h1>
	    <div>
	        <table  class="table table-striped table-hover" >
	            <thead>
	            	<th class="text-center"> Profesor </th>
	                <th class="text-center"> Materia</th>
	                <th class="text-center"> Remover de curso</th>
	            </thead>
	            <tbody>
					@foreach($results as $res)
		            <tbody>
		                <td class="text-center">{{ $res['profesor']['nombre_profesor'] }}</td>
		                <td class="text-center"> {{ $res['materia']['nombre_materia'] }}</td>
		                <td class="text-center"><button class="btn glyphicon glyphicon-remove btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modalDeleteProfMat" ></button></td>
		            </tbody>
					@endforeach 
	            </tbody>
	        </table>
	    </div>
	</div>
<script>
$(document).ready(function(){
	var prof_instance;
	var mat_instance;
	$('#searchMat').prop('disabled', true);

	$('#searchProf').autocomplete(
	{
		source: '{!! URL::route('getProf') !!}',
		autoFocus: true,
		select:function(e, ui){
			var prof = ui.item.value; 
			prof_instance = ui.item.value;
			/*
			$('#PMToCourse > #profName').remove();
	        $('#PMToCourse > #matName').remove();	        	
	        $('#PMToCourse > #btn2').remove();	        	
	        $('#PMToCourse').append("<td id='profName'>"+prof+"</td>");
			*/
			$('#searchMat').prop('disabled', false);
			$('#profName').val(prof_instance);
	        console.log(prof_instance);
		}
	});

		
	$('#searchMat').autocomplete(
	{
		source: '{!! URL::route('getMat') !!}',
		autoFocus: true,
		select:function(e, ui){
			var mat = ui.item.value; 
			mat_instance = ui.item.value;
			var url = '{{ route("addProfMat", [$current_curso->id, ":id1", ":id2"]) }}';
			url = url.replace(':id1', prof_instance);
			url = url.replace(':id2', mat_instance);
			var enlace = "<a href='"+url+"' class='btn btn-success glyphicon glyphicon-plus'></a>";
			//$('#PMToCourse > #profName').remove();
			/*
	        $('#PMToCourse > #matName').remove();	        	
	        $('#PMToCourse > #btn2').remove();	        	
	        //$('#PMToCourse').append("<td id='profName'>"+prof+"</td>");
	        $('#PMToCourse').append("<td id='matName'>"+mat+"</td>");
	        $('#PMToCourse').append("<td id='btn2'>"+enlace+"</td>");
	        */
	        $('#matName').val(mat_instance);
	        console.log(mat_instance);
	        console.log(url);
		}
	});	

});

</script>


@stop