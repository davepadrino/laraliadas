@extends('layouts.index_layout')
@section('title', 'Recuperar Contraseña')
@section('content')
<div class="login col-md-6 col-lg-4">
<!-- mensaje de edicion de usuario-->
	@if (Session::has('status'))
	    <div class="alert alert-success alert-dismissible" role="alert">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		       {{ Session::get('status') }}
		</div>
	@endif

	<div>
		<h2> Recuperar Contraseña </h2>
	</div>
	<div>
		{!! Form::open(['url' => 'password/email'])!!}
			<table id="form">
				<tr>
					<td colspan="2">
						{!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Escriba cuenta de correo electronico asociada'])!!}
					</td>
				</tr>
				<tr>
					<td>
						{!! link_to('/', "Volver", $attributes = ['id' => 'rec_pass', 'class'=> 'btn btn-danger', 'style' => 'color:white']) !!}
					</td>
					<td>
						{!! Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
					</td>
					
				</tr>
			</table>
			<span>Se le enviará un correo con un enlace para recuperar su contraseña</span>
		{!! Form::close() !!}			
	</div>
</div>
@stop