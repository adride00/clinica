$(document).ready(function(){ //si el documento se carga hacer las siguientes instrucciones 

	$('#formulario').validate({ //dentro de los parentesis de coloca el nombre del formulario a afectar con el script
	    rules: { //inician las reglas de jquery.validate
	      
	      fecha:{
	      	required: true,
	      },

	      region: "required",

	      sibasi: "required",

	      cod_estab: { 
			number: true,
			minlength: 4,
	        required: true
	        
	      },

	      nom_estab: "required",

	      num: { 
	        number: true,
	        required: true 
	      },

	      codigo: { 
			number: true,
			minlength: 8,
	        required: true
	        
	      },

	      descripcion: "required",

	      um:"required",

	      nivel: "required",

	      consumo: {
	        required: true,
			number: true
	      },

	      f_existencia: {
	      	required: true,
	      	number:true
	      },

	      d_cubiertos: {
	      	required: true,
	      	number:true
	      },

	      saldo: {
	      	required: true,
	      	number: true
	      },

	      total_ingresos: {
	      	required: true,
	      	number: true
	      },

	      a_existencia: {
	      	required: true,
	      	number: true
	      }

	    },

	    messages:{

	    	fecha:{
	      		required: "Por favor Ingrese una fecha",
	     	 },

	      	region: "Por favor ingrese la Región",

	      	sibasi: "Ingrese la localización del SIBASI",

	      	cod_estab: { 
				number: "Este campo solamente admite números",
				minlength: "El codigo debe tener al menos 4 caracteres",
	        	required: "Por favor ingrese el codigo de establecimiento"	        
	      	},

	     	nom_estab: "Por favor ingrese el nombre del establecimiento",

	    	num:{
	    		required: "Por favor ingrese el número de producto",
	    		number: "Este campo solamente admite números"
	    	},
	    	codigo:{
	    		required: "Por favor ingrese el código del producto",
	    		minlength: "El codigo debe tener al menos 8 caracteres",
	    		number: "Este campo solamente admite números"
	    	},
	    	descripcion: "Por favor ingrese la descripcion del producto",

	    	um: "Por favor Seleccione una unidad de medida",

	    	nivel: "Seleccione un nivel de uso",

	    	consumo: {
	    		required: "Por favor ingrese el consumo del producto",
	    		number: "Este campo solamente admite números"
	    	},

	    	f_existencia: {
	      		required: "Por favor ingrese la existencia en farmacia del producto",
	    		number: "Este campo solamente admite números"
	     	 },

	      	d_cubiertos: {
	      		required: "Por favor ingrese los días cubiertos",
	    		number: "Este campo solamente admite números"
	      	},

	      	saldo: {
	      		required: "Por favor ingrese el saldo del mes anterior",
	    		number: "Este campo solamente admite números"
	      	},

	     	 total_ingresos: {
	     	 	required: "Por favor ingrese el total de ingresos del mes",
	    		number: "Este campo solamente admite números"
	     	 },

	     	 a_existencia: {
	      		required: "Por favor ingrese la existencia en almacén del producto",
	    		number: "Este campo solamente admite números"
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

$('#fecha').on('keydown', function (event) {
    if (event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39) {
        // ignorando tecla espacio y las de desplazamiento
    } else {
        // validar la fecha
        inputval = $(this).val();
        var string = inputval.replace(/[^0-9]/g, "");
        var bloque1 = string.substring(0,2);
        var bloque2 = string.substring(2,4);
        var bloque3 = string.substring(4,7);
        var string = (bloque1  + "-" + bloque2 + "-" + bloque3);
        $(this).val(string);
    }
});

 });