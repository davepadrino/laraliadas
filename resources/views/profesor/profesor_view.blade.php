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

	<button type="button" class="btn btn-primary btn-lg"  type="button" data-toggle="modal" data-target="#modalEditProf">
		<span class="glyphicon glyphicon-pencil"></span>
	</button>

	<button type="button" class="btn btn-danger btn-lg"  type="button" data-toggle="modal" data-target="#modalRemoveProf">
		<span class="glyphicon glyphicon-remove"></span>
	</button>

	<div id="modalEditProf" class="modal fade" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Editar Usuario: {{ $inforPersonal-> nombre_profesor }}</h4>
		      </div>
		      <div class="modal-body">
		      {!! Form::model($inforPersonal,['route'=> ['profesores.update',$inforPersonal->id], 'method'=>'put'])!!}
					{!! Form::label('Cédula de Identidad')!!}
					{!! Form::text('ci_profesor',$inforPersonal->ci_profesor,['class'=>'form-control'])!!}

		      		{!! Form::label('Nombre')!!}
					{!! Form::text('nombre_profesor',$inforPersonal->nombre_profesor,['class'=>'form-control'])!!}

					{!! Form::label('Correo Electrónico')!!}
					{!! Form::text('email_profesor',$inforPersonal->email_profesor,['class'=>'form-control', 'id'=>'email_profesor'])!!}

                	{!! Form::label('Número de Teléfono')!!}	
					{!! Form::text('numero_telefonico_profesor',$inforPersonal->numero_telefonico_profesor,['class'=>'form-control'])!!}											
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		        {!! Form::submit('Editar', ['class'=>'btn btn-primary'])!!}
		        
		      </div>
		     {!! Form::close() !!}
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	



	<div id="modalRemoveProf" class="modal fade" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Eliminar Profesor: {{ $inforPersonal-> nombre_profesor }}</h4>
		      </div>
		      {!! Form::open(['route'=> ['profesores.destroy',$inforPersonal->id], 'method'=>'delete'])!!}
		      <div class="modal-body">
		      ¿Desea eliminar el Profesor?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		        {!! Form::submit('Eliminar', ['class'=>'btn btn btn-danger'])!!}
		        
		      </div>
		     {!! Form::close() !!}
		    </div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	


</div>


	<script type="text/javascript" src="{{ URL::asset('js/profesor/profesor.js') }}"></script>

@stop