<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/aliadas.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/responsive.css') }}"/> 

	<title>Aliadas en Cadena - Ingreso</title>
</head>
<body id ="registro">
<div class="index">
	<div class="title-container row">
		<div class="title col-lg-12">
		</div>
	</div>

	<div class="row login-title">
		<div class="col-xs-2 col-sm-3 col-md-3 col-lg-4">
		</div>

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

		<div class="col-xs-2 col-sm-3 col-md-3 col-lg-4">
		</div>
	</div>
</div>
</body>
</html>

