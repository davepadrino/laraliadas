@extends('layouts.index_layout')
@section('title', 'Inicio')
@section('content')
		<div class="login col-xs-8 col-sm-6 col-md-6 col-lg-4">
			<div>
				<h2> Iniciar sesión </h2>
				<h3> Por favor, indique:
			</div>
			<form action="views/principal.html">
				<table id="form">
					<tr>
						<td>
							<input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
						</td>
					</tr>

					<tr>
						<td>
							<input type="password" class="form-control" id= "pass1" name="pass1" placeholder="Contraseña" required>
						</td>
					</tr>
					<tr>
						<td>
							<a id = "rec_pass" href="views/recover_password.html"> Recuperar Contraseña </a>
						</td>
					</tr>
					<tr>
						<td>
							<button type="submit" class="btn btn-primary"> Ingresar </button>
						</td>
					</tr>
				</table>
			</form>
		</div>
@stop