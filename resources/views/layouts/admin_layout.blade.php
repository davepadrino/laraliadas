<!DOCTYPE html>
<html>
<head>
	<title>Aliadas en Cadena - Agregar Alumnos</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/aliadas.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/responsive.css') }}"
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.js"></script>
	<script src="https://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-2.0.0.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
	<header>
		<div id="menu-fijo" class="row">
			<div class="logo col-md-3 col-md-3">
				<div>
					<a href="#">
						<img src="{{ URL::asset('img/logo.jpg') }}" alt="Logo" /> 
					</a>
				</div>
			</div>
			<div class="col-md-5 col-md-5">	</div>
			<div class="col-md-4 col-md-4">
				<div class="control-top">Hola, Administrador</div>
			</div>	
		</div>	
		<div class="menu-bar">
			<a href="#" class="bt-menu">
				<span class="glyphicon glyphicon-menu-hamburger"></span>Menu
			</a>
		</div>
		<nav>
			<ul>
				<li><a href="/admin"><span class="glyphicon  glyphicon-new-window"></span>
				Administrar Usuarios </a></li>	
				<li><a href="/sedes"><span class="glyphicon  glyphicon-new-window"></span>
				Administrar Sedes </a></li>		
				<div class="control-top">			
					<li><a href="/logout"><span class="glyphicon glyphicon-off"></span> Cerrar Sesión</a></li>	
				</div>
			</ul>
		</nav>
	</header>
	<div id="manage_users">	
		<div class="row">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			</div>
				@yield('content')
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			</div>
		</div>
	</div>
<script type="text/javascript" src="{{ URL::asset('js/aliadas.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>