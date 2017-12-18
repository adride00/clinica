$(document).ready(function() {

	$('#formulario').validate({
		rules: {
			fecha_solicitud:{
				required: true
			}
		},
		messages:{
			fecha_solicitud:{
				required: "Por favor ingrese una fecha"
			}
		},

		highlight: function(element) { //cambia de color a los controles de los input
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
			},
			success: function(element) { // si esta lleno cambia estado y color de los controles
				element
				.text('OK!').addClass('has-success')
				.closest('.form-group').removeClass('has-error').addClass('has-success');
			}
});
});