@extends('layouts.layout')
@section('title', 'Profesores')
@section('content')
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
					<h2> Administrar Profesores </h2>
				</div>
				<div class="row">
					<div id = "addProfs" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div>
							<div>
								<h3> Crear Profesor</h3>
							</div>
						{!! Form::open(['route'=>'profesores.store', 'method'=>'post'])!!}
							<table id="form">
									<tr>
				                        <td>
											{!! Form::label('Nombre')!!}
											{!! Form::text('nombre_profesor',null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
				                        </td>
				                    </tr>		                    
				                   	<tr>
				                        <td>
				                        	{!! Form::label('Cédula de Identidad')!!}
											{!! Form::text('ci_profesor',null,['class'=>'form-control', 'required'])!!}
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	{!! Form::label('Número de Teléfono')!!}
											{!! Form::text('numero_telefonico_profesor',null,['class'=>'form-control', 'placeholder'=>'04141234567'])!!}				
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	{!! Form::label('Correo electrónico')!!}
											{!! Form::email('email_profesor',null,['class'=>'form-control', 'placeholder'=>'correo@dominio.com'])!!}
				                        </td>
				                    </tr>			                    
				                    <tr>
				                        <td>
								            <div class="addField">
											{!! Form::submit('Crear Profesor', ['class'=>'btn btn-success'])!!}
								            </div>
				                        </td>
				                    </tr>				                    
				            </table>
						{!! Form::close() !!}
				        </div>
						
					</div>
					<div id = "showProfs" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						 <div>
						    <h1>Profesores</h1>
						        <table class="table table-striped table-hover" >
						            <thead>
						                <th class="text-center">Nombre</th>
						                <th class="text-center">Correo Electrónico</th>
						                <th class="text-center">Ver/Editar</th>
						                <th class="text-center">Eliminar</th>
						            </thead>
									@foreach($profs as $prof)
						            <tbody>
						                <td class="text-center">{{ $prof->nombre_profesor }}</td>
						                <td class="text-center"> {{ $prof->email_profesor }}</td>

						                <td class="text-center"><button id ="edit" class="btn glyphicon glyphicon-pencil btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalProf{{$prof->id}}" data-id="{{ $prof->id }}" ></button></td>
					                
						                <td class="text-center"><button class="btn glyphicon glyphicon-remove btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modalDeleteProf{{$prof->id}}" ></button></td>
						            </tbody>
									@endforeach 
						        </table>
						        {!! $profs->render() !!}
								@foreach($profs as $prof)
								<div id="modalProf{{$prof->id}}" class="modal fade" tabindex="-1" role="dialog">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title">Editar Usuario: {{ $prof-> nombre_profesor }}</h4>
									      </div>
									      <div class="modal-body">
									      {!! Form::model($prof,['route'=> ['profesores.update',$prof->id], 'method'=>'put'])!!}
												{!! Form::label('Cédula de Identidad')!!}
												{!! Form::text('ci_profesor',$prof->ci_profesor,['class'=>'form-control'])!!}

									      		{!! Form::label('Nombre')!!}
												{!! Form::text('nombre_profesor',$prof->nombre_profesor,['class'=>'form-control'])!!}

												{!! Form::label('Correo Electrónico')!!}
												{!! Form::text('email_profesor',$prof->email_profesor,['class'=>'form-control', 'id'=>'email_profesor'])!!}

					                        	{!! Form::label('Número de Teléfono')!!}	
												{!! Form::text('telef_profesor',$prof->numero_telefonico_profesor,['class'=>'form-control'])!!}											
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									        {!! Form::submit('Editar', ['class'=>'btn btn-primary'])!!}
									        
									      </div>
									     {!! Form::close() !!}
									    </div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->	
								@endforeach	

								@foreach($profs as $prof)
								<div id="modalDeleteProf{{$prof->id}}" class="modal fade" tabindex="-1" role="dialog">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title">Eliminar Profesor: {{ $prof-> nombre_profesor }}</h4>
									      </div>
									      {!! Form::open(['route'=> ['profesores.update',$prof->id], 'method'=>'delete'])!!}
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
								@endforeach							
						    </div>
					</div>
				</div>	
@stop