@extends('layouts.layout')
@section('title', 'Editar Usuario')
@section('content')
<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			</div>

			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<!-- mensaje de edicion de usuario-->
				@if(Session::has('message'))
				    <div class="alert alert-success alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					       {{ Session::get('message') }}
					</div>
				@endif
				@if(Session::has('error-message'))
				    <div class="alert alert-danger alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					       {{ Session::get('error-message') }}
					</div>
				@endif	
				@if(Session::has('error-message2'))
				    <div class="alert alert-danger alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					       {{ Session::get('error-message2') }}
					</div>
				@endif			
				<div>
					<h3> Editar Mi Usuario</h3>
				</div>
				<div class="row">
					<div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
					<div class=" col-xs-6 col-sm-6 col-md-6 col-lg-6">
					{!! Form::model($username,['route'=> ['update.update',$username->id], 'method'=>'put'])!!}
							<table id="form">
								<tr>
				                    <td>
				                    {!! Form::label('Nombre')!!}
									{!! Form::text('name',null,['class'=>'form-control', 'value'=>'$username->name'])!!}
				                    </td>
				                </tr>
								<tr>
				                    <td>
				                    {!! Form::label('Correo Electrónico')!!}
									{!! Form::text('email',null,['class'=>'form-control', 'readonly'])!!}
				                    </td>
				                </tr>				                
								<tr>
									<td>
										{!! Form::label('Contraseña')!!}
										{!! Form::password('password',['class'=>'form-control', 'required'])!!}
									</td>
								</tr>
								<tr>
									<td>
										{!! Form::label('Indique nueva contraseña')!!}
										{!! Form::password('password',['class'=>'form-control', 'id'=> 'newPass1', 'name' => 'newPass1'])!!}
									</td>
								</tr>
								<tr>
									<td>
									{!! Form::label('Indique nuevamente contraseña')!!}
									{!! Form::password('password',['class'=>'form-control', 'id'=> 'newPass2', 'name' => 'newPass2'])!!}
										<span id="confirmMessage">  </span>
									</td>
								</tr>
								<tr>
									<td>
									{!! Form::submit('Editar Usuario', ['class'=>'btn btn-primary'])!!}
									</td>
								</tr>
							</table>
							{!! Form::close() !!}
					</div>
					<div class=" col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
				</div>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			</div>
		</div>
@stop