<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/aliadas.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/responsive.css') }}"/> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<title>Aliadas en Cadena - @yield('title') </title>
</head>
<body>
	<header>
		<div id="menu-fijo" class="row">
			<div class="logo col-md-3 col-md-3">
				<div>
					<a href="principal">
						<img src="{{ URL::asset('img/logo.jpg') }}" alt="Logo" /> 
					</a>
				</div>
			</div>
			<div class="col-md-5 col-md-5">	
			    <div class="input-group">
			      <input type="text" class="form-control" placeholder="Buscar alumno...">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button">Buscar</button>
			      </span>
			    </div>
			</div>
			<div class="col-md-4 col-md-4">
				<div class="control-top">Hola, Usuario</div>
			</div>	
		</div>	
		<div class="menu-bar">
			<a href="#" class="bt-menu">
				<span class="glyphicon glyphicon-menu-hamburger"></span>Menu
			</a>
		</div>
		<nav>
			<ul>
				<li><a href="principal"><span class="glyphicon glyphicon-glyphicon glyphicon-home"></span> Inicio </a></li>
				<li><a href="agregar-curso"><span class="glyphicon  glyphicon-new-window"></span>
				Agregar Curso </a></li>		
				<li id ="sm1" class="submenu">
					<a href="#">
						<span class="glyphicon glyphicon-grain"> Asistencia / Notas
						<span class="caret"></span>
					</a>
					<ul id="childrenSM1" class="children">
						<li><a href="#">Mujeres Emprendedoras</a></li>
						<li><a href="#">Escuela - Taller</a></li>
						<li><a href="#">Mujeres Hacedoras</a></li>
					</ul>
					</span>
				</li>
				<div class="control-top">
					<ul>
						<li><a href="manage_users.html"><span class="glyphicon glyphicon-user"></span> Editar Usuarios</a></li>
						<li id ="sm2" class="submenu">
							<a href="#">
								<span class="glyphicon glyphicon-cog"> Configuración
								<span class="caret"></span></span>	
							</a>
							<ul id="childrenSM2" class="children">	
								<li><a href="edit_user.html"><span class="glyphicon glyphicon-pencil"></span> Editar Usuario</a></li>			
								<li><a href="../index.html"><span class="glyphicon glyphicon-off"></span> Cerrar Sesión</a></li>	
							</ul>	
						</li>
					</ul>
				</div>
			</ul>
		</nav>
	</header>
	<div id="principal">
		@yield('content')
	</div>

	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ URL::asset('js/aliadas.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>	

</body>
</html>

