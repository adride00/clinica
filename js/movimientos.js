$(document).ready(function(){ //si el documento se carga hacer las siguientes instrucciones

	$('#formulario').validate({ //dentro de los parentesis de coloca el nombre del formulario a afectar con el script
	    rules: { //inician las reglas de jquery.validate
	      numPed: { //nombre del campo a evaluar
	        number: true,
	        required: true // es un campo requerido ! de null
	      },

	      eco: {
	        required: true
	      },

				cantidad: {
	        number: true
	        
	      },

	    },

	    messages:{
	    	numPed:{
	    		required: "Por favor ingrese el número de Documento",
	    		number: "Este campo solamente admite números"
	    	},
	    	eco:{
	    		required: "Por favor ingrese el ECOSF"
	    	},

				cantidad: {
	        number: "Los campos de Cantidad solamente admiten números",
	        
	      },

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
