<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/aliadas.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::asset('css/responsive.css') }}"/> 
	<title>Aliadas en Cadena - @yield('title')</title>
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

		@yield('content')

		<div class="col-xs-2 col-sm-3 col-md-3 col-lg-4">
		</div>
	</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script type="text/javascript" src="{{ URL::asset('js/aliadas.js') }}"></script>


</body>
</html>

