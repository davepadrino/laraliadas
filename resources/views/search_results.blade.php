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
		<h2>{{ $result->nombre_persona}}</h2>
	</div>
	<div class="col-md-6">
		<br>
		<dl>
			<dt>Cédula</dt>
			<dd>
				{{$result->ci_persona}}
			</dd>
			<br>

		    <dt>Género</dt>
		    <dd>
		    	{{ $result->genero_persona }}
		    </dd>
		    <br>
		    <dt>Fecha de Nacimiento</dt>
		    <dd>
		    	{{ Carbon\Carbon::parse($result->fecha_nacimiento_persona )->format('d/m/Y') }}
		    </dd>
		    <br>

		    <dt> Dirección </dt>
		    <dd>
		    	{{ $result-> direccion_persona }}
		    </dd>
		    <br>

		    <dt>Número telefónico</dt>
		    <dd>
		        {{ $result->numero_telefonico_persona }}
		    </dd>
		    <br>

		    <dt>Correo electrónico</dt>
		    <dd>
		        {{ $result->email_persona }}
		    </dd>
		    <br>
	    </dl>
    </div>
    <div class="col-md-6">
		<table class="table">

		    <thead>
			    <th>Cursos</th>
			    <th>Nota</th>
		    </thead>
		    <tbody>
		    <tr>
		       	<td>
		       	@foreach( $result->cursos as $curso)
				    @if($curso->tipo_curso == 'Emprendedoras en Cadena' )
		       			<li><a href="{{ route('emprendedoras', [$curso->id]) }}">{{ $curso->nombre_curso }}</a></li>
					@elseif ($curso->tipo_curso == 'Escuela Taller')
						<li><a href="{{ route('esctaller', [$curso->id]) }}">{{ $curso->nombre_curso }}</a></li>			
					@else
						<li><a href="{{ route('hacedoras', [$curso->id]) }}">{{ $curso->nombre_curso }}</a></li>			
					@endif
		       	@endforeach
		       	</td>
		       	<td>
		       		<p> 0 </p>
		       	</td>      

		        
		    </tr>
		    </tbody>
		    </table>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

<button type="button" class="btn btn-primary btn-lg"  type="button" data-toggle="modal" data-target="#modalEditPerson">
	<span class="glyphicon glyphicon-pencil"></span>
</button>

<button type="button" class="btn btn-danger btn-lg"  type="button" data-toggle="modal" data-target="#modalRemovePerson">
	<span class="glyphicon glyphicon-remove"></span>
</button>
</div>

<!--
<table class="table">

    <thead>
	    <th>Cursos</th>
	    <th>Nota</th>
	    <th>Editar</th>
	    <th>Eliminar</th>
    </thead>
    <tbody>
    <tr>
       	<td>
       	@foreach( $result->cursos as $curso)
		    @if($curso->tipo_curso == 'Emprendedoras en Cadena' )
       			<li><a href="{{ route('emprendedoras', [$curso->id]) }}">{{ $curso->nombre_curso }}</a></li>
			@elseif ($curso->tipo_curso == 'Escuela Taller')
				<li><a href="{{ route('esctaller', [$curso->id]) }}">{{ $curso->nombre_curso }}</a></li>			
			@else
				<li><a href="{{ route('hacedoras', [$curso->id]) }}">{{ $curso->nombre_curso }}</a></li>			
			@endif
       	@endforeach
       	</td>
       	<td>
       		<p> 0 </p>      
        <td>
        	<button type="button" class="btn btn-primary"  type="button" data-toggle="modal" data-target="#modalEditPerson">
        		<span class="glyphicon glyphicon-pencil"></span>
        	</button>
        </td>        
        <td>
        	<button type="button" class="btn btn-danger"  type="button" data-toggle="modal" data-target="#modalRemovePerson">
        		<span class="glyphicon glyphicon-remove"></span>
        	</button>
        </td>
    </tr>
    </tbody>
    </table>
    -->
    <div id="modalEditPerson" class="modal fade" tabindex="-1" role="dialog">
	    <div class="modal-dialog" role="document">
	  		<div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Editar Alumno: {{ $result-> nombre_persona }}</h4>
			    </div>
			     	<div class="modal-body">
					{!! Form::model($result,['route'=> ['personas.update',$result->id], 'method'=>'put'])!!}
						{!! Form::label('Cédula de Identidad')!!}
						{!! Form::text('ci_persona',$result->ci_persona,['class'=>'form-control', 'readonly'])!!}

			      		{!! Form::label('Nombre y Apellido')!!}
						{!! Form::text('nombre_persona',$result->nombre_persona,['class'=>'form-control'])!!}

						{!! Form::label('Fecha de Nacimiento')!!}
						<div class="input-group input-append date datePicker">
						{!! Form::text('fecha_nacimiento_persona',Carbon\Carbon::parse($result->fecha_nacimiento_persona)->format('d/m/Y') ,['class'=>'form-control'])!!}
							<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                		</div>

						{!! Form::label('Género')!!}
						{!! Form::select('genero_persona',array
				                        ('Masculino'=>'Masculino',
				                        'Femenino'=>'Femenino'),$result->genero_persona,
				        ['class'=>'form-control'])!!}

						{!! Form::label('Número Telefónico')!!}
						{!! Form::text('numero_telefonico_persona',$result->numero_telefonico_persona,['class'=>'form-control'])!!}

						{!! Form::label('Correo Electrónico')!!}
						{!! Form::text('email_persona',$result->email_persona,['class'=>'form-control'])!!}

                        {!! Form::label('Dirección')!!}
						{!! Form::text('direccion_persona',$result->direccion_persona,['class'=>'form-control'])!!}
                    	</div>
			    	<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				        {!! Form::submit('Editar', ['class'=>'btn btn-primary'])!!}
			    	</div>
			     	{!! Form::close() !!}
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	
<div id="modalRemovePerson" class="modal fade" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
         <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Remover Usuario: {{ $result-> nombre_persona }}</h4>
	    </div>
	    {!! Form::open(['route'=> ['personas',$result->id], 'method'=>'delete'])!!}
	        <div class="modal-body">
		        ¿Desea eliminar el alumno: {{ $result->nombre_persona }}?<br>
		        <strong>Observación: </strong>Se eliminará al alumno de la base de Datos
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<a href="{{ route('delete-alumn', ['alumno'=>$result->id]) }}" class="btn btn-danger">Eliminar</a>        
			</div>
		{!! Form::close() !!}
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->	
<script>
	$(document).ready(function() {
			$('.datePicker')
	        .datepicker({
	            format: 'dd/mm/yyyy'
	    	})
	});
</script>
@stop