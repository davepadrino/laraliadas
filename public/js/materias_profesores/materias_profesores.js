$(document).ready(function() {
	var prof_instance;
	var mat_instance;
	var uri_get_prof = decodeURI("{!!URL::route('getProf')!!}");
	console.log(uri_get_prof);
	$('#searchMat').prop('disabled', true);

	$('#searchProf').autocomplete(
	{

		// source: uri_get_prof,
		source: encodeURI("{!!URL::route('getProf')!!}"),
		autoFocus: true,
		select:function(e, ui){
			var prof = ui.item.value; 
			prof_instance = ui.item.value;
			$('#searchMat').prop('disabled', false);
			$('#profName').val(prof_instance);
	        console.log(prof_instance);
		}
	});

		
	$('#searchMat').autocomplete(
	{
		source: "{!! URL::route('getMat') !!}",
		autoFocus: true,
		select:function(e, ui){
			var mat = ui.item.value; 
			mat_instance = ui.item.value;
			var url = '{{ route("addProfMat", [$current_curso->id, ":id1", ":id2"]) }}';
			url = url.replace(':id1', prof_instance);
			url = url.replace(':id2', mat_instance);
			var enlace = "<a href='"+url+"' class='btn btn-success glyphicon glyphicon-plus'></a>";
	        $('#matName').val(mat_instance);
	        console.log(mat_instance);
	        console.log(url);
		}
	});	

});
