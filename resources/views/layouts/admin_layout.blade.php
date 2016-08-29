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
	<script src="../example.js"></script>

	<link rel="stylesheet" href="//cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="//mgcrea.github.io/angular-strap/styles/libs.min.css">
    <link rel="stylesheet" href="//mgcrea.github.io/angular-strap/styles/docs.min.css">
    <link rel="stylesheet" href="style.css" />
    <script src="//cdn.jsdelivr.net/angularjs/1.5.5/angular-sanitize.min.js" data-semver="1.5.5"></script>
    <script src="//mgcrea.github.io/angular-strap/dist/angular-strap.js" data-semver="v2.3.8"></script>
    <script src="//mgcrea.github.io/angular-strap/dist/angular-strap.tpl.js" data-semver="v2.3.8"></script>
    <script src="//mgcrea.github.io/angular-strap/docs/angular-strap.docs.tpl.js" data-semver="v2.3.8"></script>

</head>
<body>
	<header>
		<div id="menu-fijo" class="row">
			<div class="logo col-md-3 col-md-3">
				<div>
					<a href="principal.html">
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
				<li><a id ="element" href="../index.html"><span class="glyphicon glyphicon-off"></span> Cerrar Sesión</a></li>	
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

<script>
 var app = angular.module('myApp', ['ngAnimate', 'ngSanitize', 'mgcrea.ngStrap'])



angular.bootstrap(document, ['myApp']);
</script>
<script type="text/javascript" src="{{ URL::asset('js/aliadas.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>

