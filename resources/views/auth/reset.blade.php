@extends('layouts.index_layout')
@section('title', 'Resetear Contraseña')
@section('content')
		<div class="login col-xs-8 col-sm-6 col-md-6 col-lg-4">
			<div>
				<h2> Resetear Contraseña </h2>
			</div>
			<div>
				{!! Form::open(['url' => 'password/reset'])!!}
						<table id="form">
							<tr>
								<td>
									{!! Form::hidden('token',$token, null) !!}
									{!! Form::email('email',null,['class'=>'form-control', 'placeholder'=>'Escriba cuenta de correo electronico asociada'])!!}
								</td>
							</tr>
							<tr>
								<td>
									{!! Form::label('Indique nueva contraseña')!!}
									{!! Form::password('password',['class'=>'form-control', 'id'=> 'newPass1', 'name' => 'newPass1'])!!}
									<!-- {!! Form::password('password',['class'=>'form-control', 'id'=> 'newPass1', 'name' => 'newPass1'])!!} -->
									<span id="lengthMessage">  </span>
								</td>
							</tr>
							<tr>
								<td>
									{!! Form::label('Indique nuevamente contraseña')!!}
									<!-- {!! Form::password('password',['class'=>'form-control', 'id'=> 'newPass2', 'name' => 'newPass2'])!!} -->
									{!! 
									Form::password('password_confirmation',['class'=>'form-control', 'id'=> 'newPass2', 'name' => 'newPass2' ])!!}
									<span id="confirmMessage">  </span>
								</td>
							</tr>
							<tr>
								<td>
								{!! Form::submit('Enviar', ['class'=>'btn btn-primary'])!!}
								</td>
							</tr>
						</table>
					{!! Form::close() !!}			
				</div>
		</div>
@stop