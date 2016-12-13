@extends('layouts.index_layout')
@section('title', 'Resetear Contraseña')
@section('content')
		<div class="login col-xs-8 col-sm-6 col-md-6 col-lg-4">
			<div>
				<h2> Resetear Contraseña </h2>
			</div>
			<div>
				{!! Form::open(['url' => '/password/reset'])!!}
						<table id="form">
							<tr>
								<td>
									{!! Form::hidden('token',$token, null) !!}
									{!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Escriba cuenta de correo electronico asociada'])!!}
								</td>
							</tr>
							<tr>
								<td>
									{!! Form::password('password',['class'=>'form-control', 'placeholder'=>'Escriba nueva contraseña' ])!!}
								</td>
							</tr>
							<tr>
								<td>
									{!! Form::password('password_confirmation',['class'=>'form-control', 'placeholder'=>'Escriba nuevamente su contraseña' ])!!}
								</td>
							</tr>
							<tr>
								<td>
								{!! Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
								</td>
							</tr>
							<tr>
								<td>
								{!! link_to('/', "Ir a inicio de sesión", $attributes = ['class'=> 'btn btn-success', 'style' => 'color:white']) !!}
								</td>
							</tr>
						</table>
					{!! Form::close() !!}			
				</div>
		</div>
@stop