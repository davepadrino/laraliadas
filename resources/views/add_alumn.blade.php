@extends('layouts.layout')
@section('title', 'Agregar Alumno')
@section('content')	
				<div>
					<h2> Agregar Alumnos al curso: {{ $curso->nombre_curso}} </h2>
				</div>
				<div class="row">
					<div id="alumnSearch" class="col-md-6">
						<!-- Validar Errores en el servidor-->
						@include('alerts.request')
						<!-- mensaje de creacion de usuario-->
						@if(Session::has('flash_message'))
						    <div class="alert alert-success alert-dismissible" role="alert">
						    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						       {{ Session::get('flash_message') }}
							</div>
						@endif
						<!-- mensaje de edicion de usuario-->
						@if(Session::has('message'))
						    <div class="alert alert-success alert-dismissible" role="alert">
						    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						       {{ Session::get('message') }}
							</div>
						@endif	
						<div>
							<form >
								<table id="form">
									<tr>
										<td>
											<label for="search">Buscar Alumno</label>
											<div class="input-group">
										      <input type="text" class="form-control" placeholder="Buscar alumno..." name ="search">
										      <span class="input-group-btn">
										        <button class="btn btn-default" type="button">Buscar</button>
										      </span>
										    </div>
										</td>
									</tr>								
								</table>
							</form>
						</div>
						<div id ="addAlumnForm">
							<div>
				           	{!! Form::open(['route'=>'personas.store', 'method'=>'post'])!!}
				           	{!! Form::hidden('course_id', $curso->id) !!}
				                <table id="form">
				                	<tr>
				                        <td>
				                        {!! Form::label('CI')!!}
										{!! Form::text('ci_persona',null,['class'=>'form-control', 'placeholder'=>'Cédula de Identidad', 'required'])!!}
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        {!! Form::label('Nombre y Apellido')!!}
				                         {!! Form::text('nombre_persona',null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        {!! Form::label('Género')!!}
				                        {!! Form::select('genero_persona',array
				                        ('Masculino'=>'Masculino',
				                        'Femenino'=>'Femenino'),null,['class'=>'form-control'])!!}
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        {!! Form::label('Fecha de Nacimiento')!!}
				                        {!! Form::date('fecha_nacimiento_persona',null,['class'=>'form-control'])!!}
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        {!! Form::label('Dirección')!!}
				                        {!! Form::text('direccion_persona',null,['class'=>'form-control', 'placeholder'=>'Dirección'])!!}
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        {!! Form::label('Número Telefónico')!!}
				                        {!! Form::text('numero_telefonico_persona',null,['class'=>'form-control', 'placeholder'=>'04XXYYYYYYY'])!!}
				                        </td>
				                    </tr>				                    
				                    <tr>
				                        <td>
				                        {!! Form::label('Correo Electrónico')!!}
				                        {!! Form::email('email_persona',null,['class'=>'form-control', 'placeholder'=>'usuario@dominio.com'])!!}
				                        </td>
				                    </tr>
				                </table>
				             	<div class="addField">
									{!! Form::submit('Crear y agregar alumno al curso', ['class'=>'btn btn-primary'])!!}	

				             	</div>	
				             	
				            </form>
				            </div>
				            <div class="addField">
					            <!--
					            <button type="button" class="btn btn-primary" ng-click="formCtrl.toggle()"> 
									Crear Nuevo <span class="glyphicon glyphicon-plus"></span>
								</button>
								<button type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-plus"></span>
								</button>
								-->

							</div>
				        </div>
					</div>
					<div id ="alumnList" class="col-md-4">
						<h1 class="text-center">Lista de alumnos inscritos</h1>
					    <div>
					        <table  class="table table-striped table-hover" >
					            <thead>
					            	<th class="text-center"> CI </th>
					                <th class="text-center"> Nombre y Apellido</th>
					                <th class="text-center"> Remover de curso</th>
					            </thead>
					            <tbody>
					            @foreach($alumnos as $alumn)
					                <tr>
						                <td class="text-center">{{ $alumn->ci_persona }}</td>
						                <td class="text-center">{{ $alumn->nombre_persona }}</td>
						                <td class="text-center"><button id ="deleteAlumCourse" class="btn glyphicon glyphicon-remove btn-danger btn-sm" type="button" data-toggle="modal" data-target="#deleteAlumCourse{{$alumn->id}}" data-id="{{ $alumn->id }}"></button></td>				                	
					                </tr>
					            @endforeach
					            </tbody>
					        </table>
					    </div>
					</div>
				<div class="col-md-1">
				</div>
				</div>
			</div>
		</div>
@stop