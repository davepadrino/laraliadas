@extends('layouts.index_layout')
@section('title', 'Inicio')
@section('content')
@include('alerts.request')
		<div class="login col-xs-8 col-sm-6 col-md-6 col-lg-4">
			<div>
				<h2> Iniciar sesión </h2>
				<h3> Por favor, indique:
			</div>
				@if(Session::has('message-error'))
				    <div class="alert alert-warning alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					       {{ Session::get('message-error') }}
					</div>
				@endif
				@if(Session::has('message-error2'))
				    <div class="alert alert-warning alert-dismissible" role="alert">
				    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					       {{ Session::get('message-error2') }}
					</div>
				@endif
			{!! Form::open(['route'=>'store', 'method'=>'post'])!!}
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<table id="form">
					<tr>
						<td>
						{!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Correo electrónico'])!!}
						</td>
					</tr>

					<tr>
						<td>
						{!! Form::password('password',['class'=>'form-control', 'placeholder'=>'Contraseña'])!!}
						</td>
					</tr>
					<tr>
						<td>
						{!! link_to('/recuperar-contraseña', $title = "Recuperar Contraseña", $attributes = ['id' => 'rec_pass']) !!}
									
						</td>
					</tr>
					<tr>
						<td>
						{!! Form::submit('Ingresar', ['class'=>'btn btn-primary'])!!}
						</td>
					</tr>
				</table>
			
			{!! Form::close() !!}
		</div>
@stop