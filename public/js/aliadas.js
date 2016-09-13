			/* Principal*/
$(document).ready(function(){

	var contador=1;

	// Mostrar y ocultar menú
	$('.menu-bar').click(function(){
		if(contador == 1){
			$('nav').animate({
				left:'0'
			});
			contador = 0;
		}else{
			$('nav').animate({
				left:'-100%'
			});
			contador = 1;
		}
	});

		//Mostrar y ocultar sub-menu
	$('#sm1').click(function(){
		//$(this).children('.children').slideToggle();
		$('#childrenSM1').slideToggle();
	});

	//Mostrar y ocultar sub-menu
	$('#sm2').click(function(){
		//$(this).children('.children').slideToggle();
		$('#childrenSM2').slideToggle();
	});

	


});
		/* Validación de passwords*/
$(document).ready(function(){
		$('#newPass2').keyup(function(){
			if($('#newPass2').val() == $('#newPass1').val() || $('#newPass2').val() == ""){
				$('#confirmMessage').text("");
			}else{
				$('#confirmMessage').text("Las contraseñas no coinciden");
				$('#confirmMessage').css("font-weight","Bold");
			}
			
		});
}); 



