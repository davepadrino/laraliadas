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
							{!! Form::select('type',
								array(
								'Emprendedoras en Cadena' => 'Emprendedoras en Cadena',
								'Escuela Taller' => 'Escuela Taller',
								'Mujeres Hacedoras' => 'Mujeres Hacedoras'), null, ['class'=>'form-control', 'id'=>'type']
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
							{!! Form::date('startDate', \Carbon\Carbon::now(),['class'=>'form-control', 'id'=>'startDate'] )!!}
							</td>
						</tr>
						<tr>
							<td>
							{!! Form::label('Fecha de Fin')!!}
							{!! Form::date('endDate', null,['class'=>'form-control', 'id'=>'startDate'] )!!}
							</td>
						</tr>
						<tr>
							<td>
							{!! Form::label('Sede')!!}					
							{!! Form::select('sede_course',
								$data, 
								 null, ['class'=>'form-control', 'id'=>'sede_course']
                        	)!!}		
							</td>
						</tr>
						<tr>
							<td>
							{!! Form::label('Descripción de Curso')!!}
							<textarea rows="4" cols="50" class="form-control" name="descriptionCourse" placeholder="Describe brevemente el curso...">
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
@stop