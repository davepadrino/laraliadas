$(document).ready(function(){
	$('#buscar').autocomplete({
		source: '{!! URL::route('getAlumnosIndex') !!}'
	});

});
