<!DOCTYPE html>
<html>
<head>
	<title>Aliadas en Cadena - Agregar Alumnos</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/aliadas.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
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

			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<div>
					<h2> Administrar Usuarios </h2>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div ng-controller="FormController as formCtrl">
							<div>
								<h3> Crear Usuario</h3>
							</div>
						<!-- <form ng-submit="formCtrl.submitForm()"> -->
						<form action="store" method="POST">
							<table id="form">
									<tr>
				                        <td>
				                        	<label for="name">Nombre</label>
				                            <input type="text" class="form-control" name="name" placeholder="Nombre" ng-model="formCtrl.form.username" required>
				                        </td>
				                    </tr>		                    
				                   	<tr>
				                        <td>
				                            <label for="Email">Email</label>
				                            <input type="email" class="form-control" name="email" placeholder="correo@dominio.com" ng-model="formCtrl.form.email">
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <label for="password">Contraseña</label>
				                            <input type="password" class="form-control" name="password" placeholder="********" ng-model="formCtrl.form.psw">
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
				                            <label for="role">Tipo de Usuario</label>
				                            <select class="form-control" name="role" ng-model="formCtrl.form.role">
				                            	<option value="" disabled selected="selected">Seleccione...</option>
												<option value="Especialista Docente">Especialista Docente</option>
												<option value="Coordinadora">Coordinadora</option>		
				                            </select>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td>
								            <div class="addField">
								             	<input class="btn btn-success" type="Submit" value="Crear Usuario" />
								            </div>
				                        </td>
				                    </tr>				                    
				            </table>
						</form>
				        </div>
						
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div>
						    <div ng-controller="ListController as listCtrl">
						        <h1>Usuarios</h1>
						        <table  class="table table-striped table-hover" >
						            <thead>
						                <th>Nombre de Usuario</th>
						                <th>Correo Electrónico</th>
						                <th>Rol</th>
						                <th>Editar</th>
						                <th>Eliminar</th>
						            </thead>
						            <tbody>
						                <tr ng-repeat="brand in listCtrl.brands">
						                    <td ng-bind="brand.username"></td>
						                    <td ng-bind="brand.email"></td>
						                    <td ng-bind="brand.role"></td>
						                    <td class="text-right"><button class="btn glyphicon glyphicon-pencil btn-primary btn-sm "></button></td>
						                    <td class="text-right"><button class="btn glyphicon glyphicon-remove btn-danger btn-sm " ng-click="listCtrl.removeBrand($index)"></button></td>
						                </tr>
						            </tbody>
						        </table>
						    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
			</div>
		</div>
	</div>

<script>
 var app = angular.module('myApp', ['ngAnimate', 'ngSanitize', 'mgcrea.ngStrap'])



angular.bootstrap(document, ['myApp']);
</script>
<script type="text/javascript" src="{{ URL::asset('js/aliadas.js') }}"></script>

</body>
</html>

