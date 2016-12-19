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

	//Filtrar elementos en las búsquedas
    $("#filter").keyup(function(){
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(), count = 0;
        // Loop through the comment list
        $(".currentMatches").each(function(){
 			console.log($(this).text());
            // If the list item does not contain the text phrase fade it out
            //if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).fadeOut();
            // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).show();
            }
        });
    });
});

		/* Validación de passwords*/
$(document).ready(function(){
		$('#newPass1').keyup(function(){
			if (($('#newPass1').val()).length > 5) {
				$('#lengthMessage').text("");
			} else {
				$('#lengthMessage').text("Contraseña tiene menos de 6 caracteres");
				$('#recuperar_contraseña').prop('disabled', true);
			}
		});

		$('#newPass2').keyup(function(){
			if($('#newPass2').val() == $('#newPass1').val() 
			  || $('#newPass2').val() == "") {
				$('#confirmMessage').text("Correcto");
				$('#recuperar_contraseña').prop('disabled', false);
			} else {
				$('#confirmMessage').text("Las contraseñas no coinciden");
				$('#confirmMessage').css("font-weight","Bold");
				$('#recuperar_contraseña').prop('disabled', true);
			}
		});
}); 



