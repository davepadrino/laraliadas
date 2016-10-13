@extends('layouts.admin_layout')
@section('content')		
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
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
					<h2> Administrar Usuarios </h2>
				</div>
				<div class="row">
					<div id = "addUsers" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div>
							<div>
								<h3> Crear Usuario</h3>
							</div>
						{!! Form::open(['route'=>'admin.store', 'method'=>'post'])!!}
							<table id="form">
									<tr>
				                        <td>
											{!! Form::label('Nombre')!!}
											{!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre'])!!}
				                        </td>
				                    </tr>		                    
				                   	<tr>
				                        <td>
				                        	{!! Form::label('Correo Electrónico')!!}
											{!! Form::text('email',null,['class'=>'form-control', 'placeholder'=>'correo@dominio.com'])!!}
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	{!! Form::label('Contraseña')!!}
											{!! Form::password('password',['class'=>'form-control', 'placeholder'=>'*******'])!!}				
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	{!! Form::label('Rol')!!}
				                        	{!! Form::select('rol',
												array(
												'Especialista Docente' => 'Especialista Docente', 
												'Coordinadora' => 'Coordinadora'), null, ['class'=>'form-control','placeholder'=>'seleccione']
				                        	)!!}
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
								            <div class="addField">
											{!! Form::submit('Crear Usuario', ['class'=>'btn btn-success'])!!}
								            </div>
				                        </td>
				                    </tr>				                    
				            </table>
						{!! Form::close() !!}
				        </div>
						
					</div>
					<div id = "showUsers" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div>
						    <h1>Usuarios</h1>
					        <table class="table table-striped table-hover" >
					            <thead>
					                <th>Nombre</th>
					                <th>Correo Electrónico</th>
					                <th>Rol</th>
					                <th>Sede</th>
					                <th>Editar</th>
					                <th>Eliminar</th>
					            </thead>
								@foreach($users as $user)
					            <tbody>
					                <td>{{ $user->name }}</td>
					                <td>{{ $user->email }}</td>
					                <td>{{ $user->rol }}</td>
					                <td>{{ $user->sede->nombre_sede }}</td>

					                <td class="text-right"><button id ="edit" class="btn glyphicon glyphicon-pencil btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalUser{{$user->id}}" data-id="{{ $user->id }}" ></button></td>
				                
					                <td class="text-right"><button class="btn glyphicon glyphicon-remove btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modalDeleteUser{{$user->id}}" ></button></td>
					            </tbody>
								@endforeach 
					        </table>
					        {!! $users->render() !!}
							@foreach($users as $user)
							<div id="modalUser{{$user->id}}" class="modal fade" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title">Editar Usuario: {{ $user-> name }}</h4>
								      </div>
								      <div class="modal-body">
								      {!! Form::model($user,['route'=> ['admin.update',$user->id], 'method'=>'put'])!!}

								      		{!! Form::label('Nombre')!!}
											{!! Form::text('name',$user->name,['class'=>'form-control'])!!}

											{!! Form::label('Correo Electrónico')!!}
											{!! Form::text('email',null,['class'=>'form-control', 'id'=>'email' ,'readonly'=>'true'])!!}

											{!! Form::label('Contraseña')!!}
											{!! Form::password('password',['class'=>'form-control', 'id'=>'password'])!!}

											{!! Form::label('Rol')!!}
			                        		{!! Form::select('rol',
											array(
											'Especialista Docente' => 'Especialista Docente', 
											'Coordinadora' => 'Coordinadora',
											'Administrador' => 'Administrador'), null, ['class'=>'form-control', 'id'=>'rol']
			                        	)!!}
				                        	{!! Form::label('Sede')!!}					
											{!! Form::select('sede_id',
												$data, 
												 null, ['class'=>'form-control', 'id'=>'sede_id']
				                        	)!!}
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

								@foreach($users as $user)
								<div id="modalDeleteUser{{$user->id}}" class="modal fade" tabindex="-1" role="dialog">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title">Eliminar Usuario: {{ $user-> name }}</h4>
									      </div>
									      {!! Form::open(['route'=> ['admin.update',$user->id], 'method'=>'delete'])!!}
									      <div class="modal-body">
									      ¿Desea eliminar el Usuario?
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

			<script>
				$(function() {
				    $('.modal_user').on("show.bs.modal", function (e) {
						var modal = $(this);
				        modal.find('.modal-body #name').val($(e.relatedTarget).data('name'));	
				        modal.find('.modal-body #email').val($(e.relatedTarget).data('email'));	
				        modal.find('.modal-body #password').val($(e.relatedTarget).data('password'));	
				        modal.find('.modal-body #rol').val($(e.relatedTarget).data('rol'));	         
				    });
				});
			</script>
@stop