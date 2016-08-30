@extends('layouts.admin_layout')
@section('content')			
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				@if(Session::has('flash_message'))
				    <div class="alert alert-success alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					       {{ Session::get('flash_message') }}
					</div>

				@endif
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
						<!-- <form ng-submit="formCtrl.submitForm()"> -->
						{!! Form::open(['route'=>'admin.store', 'method'=>'post'])!!}
							<table id="form">
									<tr>
				                        <td>
											{!! Form::label('Nombre')!!}
											{!! Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre','ng-model'=>'formCtrl.form.name'])!!}
				                        </td>
				                    </tr>		                    
				                   	<tr>
				                        <td>
				                        	{!! Form::label('Email')!!}
											{!! Form::text('email',null,['class'=>'form-control', 'placeholder'=>'correo@dominio.com' ,'ng-model'=>'formCtrl.form.email'])!!}
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	{!! Form::label('Contraseña')!!}
											{!! Form::password('password',['class'=>'form-control', 'placeholder'=>'*******' ,'ng-model'=>'formCtrl.form.psw'])!!}				
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                        	{!! Form::label('Rol')!!}
				                        	{!! Form::select('rol',
												array(
												'Especialista Docente' => 'Especialista Docente', 
												'Coordinadora' => 'Coordinadora',
												'Administrador' => 'Administrador'), null, ['class'=>'form-control','placeholder'=>'seleccione']
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
						                <th>Nombre de Usuario</th>
						                <th>Correo Electrónico</th>
						                <th>Rol</th>
						                <th>Editar</th>
						                <th>Eliminar</th>
						            </thead>
									@foreach($users as $user)
						            <tbody>
						                <!--
						                <tr ng-repeat="brand in listCtrl.brands">
						                    <td ng-bind="brand.username"></td>
						                    <td ng-bind="brand.email"></td>
						                    <td ng-bind="brand.role"></td>
						                    <td class="text-right"><button class="btn glyphicon glyphicon-pencil btn-primary btn-sm "></button></td>
						                    <td class="text-right"><button class="btn glyphicon glyphicon-remove btn-danger btn-sm " ng-click="listCtrl.removeBrand($index)"></button></td>
						                </tr>
						                -->
						                <td>{{ $user->name }}</td>
						                <td>{{ $user->email}}</td>
						                <td>{{ $user->rol}}</td>

						                <td class="text-right"><button id ="edit" class="btn glyphicon glyphicon-pencil btn-primary btn-sm" type="button" data-toggle="modal" data-target="#modalUser{{$user->id}}" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}"  data-password="{{ $user->password }}"  data-rol="{{ $user->rol }}"></button></td>
					                
						                <td class="text-right"><button class="btn glyphicon glyphicon-remove btn-danger btn-sm" type="button" data-toggle="modal" data-target="#modalDeleteUser{{$user->id}}" ></button></td>
						            </tbody>
									@endforeach 
						        </table>
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

												{!! Form::label('Email')!!}
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

									      	<!--
									      	<p id="userName"></p>
									      	<p id="userEmail"></p>
									      	<p id="userPassword"></p>
									      	<p id="userRol"></p>
											-->
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
			</div>
			<script>
				$(function() {
				    $('.modal_user').on("show.bs.modal", function (e) {
						var modal = $(this);
				        /*
						var name = $("#edit").data('name');
						var email = $("#edit").data('email');
						var password = $("#edit").data('password');
						var rol = $("#edit").data('rol');
				        $("#userName").html($(e.relatedTarget).data('name'));
				        $("#userEmail").html($(e.relatedTarget).data('email'));
				        $("#userPassword").html($(e.relatedTarget).data('password'));
				        $("#userRol").html($(e.relatedTarget).data('rol'));
						*/
				        modal.find('.modal-body #name').val($(e.relatedTarget).data('name'));	
				        modal.find('.modal-body #email').val($(e.relatedTarget).data('email'));	
				        modal.find('.modal-body #password').val($(e.relatedTarget).data('password'));	
				        modal.find('.modal-body #rol').val($(e.relatedTarget).data('rol'));	

				         /*
				          var button = $(event.relatedTarget) // Button that triggered the modal
						  var recipient = button.data('whatever') // Extract info from data-* attributes
						  modal.find('.modal-title').text('New message to ' + recipient)
						  modal.find('.modal-body input').val(recipient)
						  */		         
				    });
				});
			</script>
@stop