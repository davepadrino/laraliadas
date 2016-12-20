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
	<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/jQuery-ui.css') }}"/> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Datepicker -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript" src="{{ URL::asset('js/datepicker.js') }}"></script>

	<title>Aliadas en Cadena - @yield('title') </title>
</head>
<body>
	<header>
		<div id="menu-fijo" class="row">
			<div class="logo col-md-3 col-md-3">
				<div>
					<a href="/principal">
						<img src="{{ URL::asset('img/logo.jpg') }}" alt="Logo" /> 
					</a>
				</div>
			</div>
			<div class="col-md-5 col-md-5">	
			{!! Form::open(['route'=> ['getAlumnosView'], 'method'=>'GET'])!!}
			    <div class="input-group">
			    {!! Form::text('buscar',null,['class'=>'form-control', 'placeholder'=>'Buscar', 'id'=>'buscar'])!!}
			      <span class="input-group-btn">
			      {!! Form::submit('Buscar', ['class'=>'btn btn-default'])!!}
			      </span>
			    </div>
			{!! Form::close() !!}  
			</div>
			<div class="col-md-4 col-md-4">
				<div class="control-top">Hola, {!! Auth::user()->name !!}</div>
			</div>	
		</div>	
		<div class="menu-bar">
			<a href="#" class="bt-menu">
				<span class="glyphicon glyphicon-menu-hamburger"></span>Menu
			</a>
		</div>
		<nav>
			<ul>
				<li><a href="/principal"><span class="glyphicon glyphicon-glyphicon glyphicon-home"></span> Inicio </a></li>
				<li><a href="/cursos/create"><span class="glyphicon  glyphicon-new-window"></span>
				Agregar curso </a></li>		
				<li><a href="/profesores"><span class="glyphicon glyphicon-education"></span>
				Profesores </a></li>
				@if (Auth::user()->rol === "Coordinadora") 	
				<li><a href="/materias"><span class="glyphicon glyphicon-book"></span>
				Materias </a></li>
				@endif

				<li id ="sm1" class="submenu">
					<a href="#">
						<span class="glyphicon glyphicon-grain"> Asistencia / Notas
						<span class="caret"></span>
					</a>
					<ul id="childrenSM1" class="children">
						<li><a href="/cursos/emprendedoras-en-cadena">Emprendedoras en Cadena</a></li>
						<li><a href="/cursos/escuela-taller">Escuela - Taller</a></li>
						<li><a href="/cursos/mujeres-hacedoras">Mujeres Hacedoras</a></li>
					</ul>
					</span>
				</li>
				<div class="control-top">
					<ul>
						<li><a href="/editar-usuario"><span class="glyphicon glyphicon-user"></span> Editar usuario</a></li>
						<li><a href="/logout"><span class="glyphicon glyphicon-off"></span> Cerrar sesión</a></li>
					</ul>
				</div>
			</ul>
		</nav>
	</header>
	<div id="principal">
		<div class="row">
			<div class="col-sm-1">
	    	</div>
		@yield('content')
			<div class="col-sm-1">
	    	</div>
	    </div>
	</div>

	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/aliadas.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery-ui.js') }}"></script>	
	<script type="text/javascript" src="{{ URL::asset('js/tableExport.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.base64.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jspdf/libs/sprintf.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jspdf/jspdf.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/jspdf/libs/base64.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/datepicker.js') }}"></script>

	

<script>
$(document).ready(function(){
	$('#buscar').autocomplete({
		source: '{!! URL::route('getAlumnosIndex') !!}'
	});
	console.log($('#buscar').val())
});
</script>	

</body>
</html>