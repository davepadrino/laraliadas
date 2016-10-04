@extends('layouts.layout')
@section('title', 'Agregar Curso')
@section('content')
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			</div>

			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<div>
					<h2> Crear Curso </h2>
				</div>
					@if(Session::has('date_validator'))
		    			<div class="alert alert-warning alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				       {{ Session::get('date_validator') }}
						</div>
					@endif
				{!! Form::open(['route'=>'cursos.store', 'method'=>'post'])!!}
					<table id="form">
						<tr>
							<td>
							{!! Form::label('Nombre de Curso')!!}
							{!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre', 'required'])!!}
							</td>
						</tr>
						<tr>
							<td>
							{!! Form::label('Tipos de Curso')!!}
							{!! Form::select('tipo_curso',
								array(
								'Emprendedoras en Cadena' => 'Emprendedoras en Cadena',
								'Escuela Taller' => 'Escuela Taller',
								'Mujeres Hacedoras' => 'Mujeres Hacedoras'), null, ['class'=>'form-control', 'id'=>'tipo_curso']
                        	)!!}

						</tr>
						<tr>
							<td>
							{!! Form::label('Estado de Curso')!!}
							{!! Form::select('state',
								array(
								'Sin iniciar' => 'Sin iniciar',
								'En curso' => 'En curso',
								'Finalizado' => 'Finalizado'), null, ['class'=>'form-control', 'id'=>'state']
                        	)!!}
							</td>
						</tr>						
						<tr>
							<td>
<<<<<<< HEAD
								{!! Form::label('Fecha de Inicio')!!}
								<div class="input-group input-append date" id="datePicker">
				                    {!! Form::date('startDate',\Carbon\Carbon::now(),['class'=>'form-control', 'id'=>'startDate','type'=> 'text'] )!!} 
				                 	<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
							</td>
=======
							{!! Form::label('Fecha de Inicio')!!}
							<div class="input-group date datePicker" >
								{!! Form::date('startDate', ' ',['class'=>'form-control', 'id'=>'startDate'] )!!}
			                    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
			                </div>
				        </td>
>>>>>>> 0304ce85fa97cffb98ecaf450166812541acee9b
						</tr>
						<tr>
							<td>
								{!! Form::label('Fecha de Fin')!!}
								<div class="input-group input-append date" id="datePicker">
				                    {!! Form::date('endDate', null,['class'=>'form-control', 'id'=>'startDate', 'type' => 'text'] )!!}
				                 	<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
							</td>
						</tr>
						<tr>
							<td>
							{!! Form::label('Sede')!!}					
							{!! Form::select('sede_id',
								$data, 
								 null, ['class'=>'form-control', 'id'=>'sede_id']
                        	)!!}		
							</td>
						</tr>
						<tr>
							<td>
							{!! Form::label('Observaciones de Curso')!!}
							<textarea class="form-control" name="descriptionCourse" placeholder="Describe brevemente el curso...">
							</textarea>

							</td>
						</tr>						
						<tr>
							<td>
							{!! Form::submit('Agregar Curso', ['class'=>'btn btn-primary'])!!}	
							</td>
						</tr>

					</table>
				</form>

			</div>

			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			</div>
		</div>
<script>
	$(document).ready(function() {
<<<<<<< HEAD
	    $('#datePicker')
=======
	    $('.datePicker')

>>>>>>> 0304ce85fa97cffb98ecaf450166812541acee9b
	        .datepicker({
	            format: 'dd/mm/yyyy'
	    })
	});
</script>
@stop