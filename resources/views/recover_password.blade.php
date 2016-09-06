@extends('layouts.index_layout')
@section('title', 'Recuperar Contraseña')
@section('content')
		<div class="login col-xs-8 col-sm-6 col-md-6 col-lg-4">
			<div>
				<h2> Recuperar Contraseña </h2>
			</div>
			<div>
			{!! Form::open(['route'=>'index', 'method'=>'post'])!!}
				<!-- <form name = "passRecover" action="../index.html"> -->
					<table id="form">
						<tr>
							<td>
							{!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Escriba cuenta de correo electronico asociada'])!!}
								<!-- <input type="email" class="form-control" placeholder="Escriba cuenta de correo electronico asociada" required> -->
							</td>
						</tr>
						<tr>
							<td>
							{!! Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
							</td>
						</tr>
						<tr>
							<td>
							{!! link_to('/', "Volver", $attributes = ['id' => 'rec_pass', 'class'=> 'btn btn-danger', 'style' => 'color:white']) !!}
							</td>
						</tr>
					</table>
					<span>Se le enviará un correo con una contraseña temporal</span>
				</form>
			</div>
		</div>
@stop