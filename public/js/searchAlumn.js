$(document).ready(function(){
	$('#buscar').autocomplete({
		source: '{!! URL::route('getAlumnosIndex') !!}',
		minlength:1,
		autoFocus: true,
		select:function(e, ui){
			alert(ui);
		}
	});

});