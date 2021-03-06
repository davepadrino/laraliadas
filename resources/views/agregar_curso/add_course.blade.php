@extends('layouts.layout')
@section('title', 'Agregar Curso')
@section('content')
		<div class="row">
			<div class="col-md-10 col-lg-10">
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
								{!! Form::label('Fecha de Inicio')!!}
								<div class="input-group input-append date datePicker">
				                    {!! Form::date('startDate',Carbon\Carbon::parse(\Carbon\Carbon::now())->format('d/m/Y'),['class'=>'form-control', 'id'=>'startDate'] )!!} 
				                 	<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                				</div>
							</td>
						</tr>
						<tr>
							<td>
								{!! Form::label('Fecha de Fin')!!}
								<div class="input-group input-append date datePicker">
				                    {!! Form::date('endDate', null,['class'=>'form-control', 'id'=>'startDate'] )!!}
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
		</div>
    <script type="text/javascript" src="{{ URL::asset('js/agregar_curso/add_course.js') }}"></script>
@stop