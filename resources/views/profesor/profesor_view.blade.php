@extends('layouts.layout')
@section('title', 'Resultado de Búsqueda')
@section('content')	
<!-- mensaje de edicion de usuario-->
@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       {{ Session::get('message') }}
	</div>
@endif
@if(Session::has('Delmessage'))
    <div class="alert alert-success alert-dismissible" role="alert">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       {{ Session::get('Delmessage') }}
	</div>
@endif

<div class="container well">
	<div class= "page-header">
		<h2>{{ $inforPersonal->nombre_profesor}}</h2>
	</div>
	<div class="col-md-6">
		<br>
		<dl>
			<dt>Cédula</dt>
			<dd>
				{{$inforPersonal->ci_profesor}}
			</dd>
			<br>
		    <dt>Número telefónico</dt>
		    <dd>
		        {{ $inforPersonal->numero_telefonico_profesor }}
		    </dd>
		    <br>
		    <dt>Correo electrónico</dt>
		    <dd>
		        {{ $inforPersonal->email_profesor }}
		    </dd>
		    <br>
	    </dl>
    </div>
    <div class="col-md-6">
		<table class="table">
		    <thead>
			    <th>Curso</th>
			    <th>Materia</th>

		    </thead>
		    <tbody>
		    @foreach($cursosDados as $cursoDado)
		    	@foreach($nombreCursos as $nombreCurso)
		    		@foreach($nombreMaterias as $nombreMateria)
		    			@if($cursoDado -> curso_id == $nombreCurso->id && $cursoDado -> materia_id == $nombreMateria->id)
				    <tr>
				       	<td>
							{{ $nombreCurso->nombre_curso }}
				       	</td>
				       	<td>
							{{ $nombreMateria->nombre_materia }}
						</td>
				    </tr>
				    	@endif
		    		@endforeach 
		    	@endforeach
		    @endforeach  
		    </tbody>
		</table>

    </div>

	<button type="button" class="btn btn-primary btn-lg"  type="button" data-toggle="modal" data-target="#modalEditPerson">
		<span class="glyphicon glyphicon-pencil"></span>
	</button>

	<button type="button" class="btn btn-danger btn-lg"  type="button" data-toggle="modal" data-target="#modalRemovePerson">
		<span class="glyphicon glyphicon-remove"></span>
	</button>
</div>


	<script type="text/javascript" src="{{ URL::asset('js/profesor/profesor.js') }}"></script>

@stop