$(document).ready(function(){
	$(function() {
	    $('.modal_user').on("show.bs.modal", function (e) {
			var modal = $(this);
	        modal.find('.modal-body #name').val($(e.relatedTarget).data('name'));	
	        modal.find('.modal-body #email').val($(e.relatedTarget).data('email'));	
	        modal.find('.modal-body #password').val($(e.relatedTarget).data('password'));	
	        modal.find('.modal-body #rol').val($(e.relatedTarget).data('rol'));	         
	    });
	});
});