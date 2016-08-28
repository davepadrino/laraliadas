@extends('layouts.index_layout')
@section('title', 'Recuperar Contraseña')
@section('content')
		<div class="login col-xs-8 col-sm-6 col-md-6 col-lg-4">
			<div>
				<h2> Recuperar Contraseña </h2>
			</div>
			<div>
				<form name = "passRecover" action="../index.html">
					<table id="form">
						<tr>
							<td>
								<input type="email" class="form-control" placeholder="Escriba Cuenta de correo electronico" required>
							</td>
						</tr>
						<tr>
							<td>
								<button type="submit" class="btn btn-primary"> Ingresar </button>
							</td>
						</tr>
					</table>
					<span>Se le enviará un correo con una contraseña temporal</span>
				</form>
			</div>
		</div>
@stop