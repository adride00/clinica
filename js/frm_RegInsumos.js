$(document).ready(function(){ //si el documento se carga hacer las siguientes instrucciones 

	$('#formulario').validate({ //dentro de los parentesis de coloca el nombre del formulario a afectar con el script
	    rules: { //inician las reglas de jquery.validate
	      num: { //nombre del campo a evaluar 
	        number: true,
	        required: true // es un campo requerido ! de null
	      },

	      codigo: { 
			number: true,
			minlength: 8,
	        required: true
	        
	      },

	      stock_actual: { 
			number: true,
	        required: true
	        
	      },

	      util: { 
			number: true,
	        required: true
	        
	      },

	      vencida: { 
			number: true,
	        required: true
	        
	      },

	      deteriorada: { 
			number: true,
	        required: true
	        
	      },

	      obsoleta: { 
			number: true,
	        required: true
	        
	      },

	      

	      codigo_articulo: { 
			number: true,
	        required: true
	        
	      },

	      cantidad: { 
			number: true,
	        required: true
	        
	      },

	      fecha_entrada: "required",

	      fecha_vencimiento: "required",

	      descripcion: "required",

	      nombre: "required",

	      nombreE: "required",

	      telefono: "required",

	      direccion: "required",

	      encargado: "required",

	      usuario: "required",

	      clave: "required",

	      um:"required",

	      tipo_articulo: "required",

	      dia: "required",

	      consumo: {
	        required: true,
			number: true
	      }
	    },
	    messages:{
	    	num:{
	    		required: "Por favor ingrese el número de producto",
	    		number: "Este campo solamente admite números"
	    	},
	    	codigo:{
	    		required: "Por favor ingrese el código del producto",
	    		minlength: "El codigo debe tener al menos 8 caracteres",
	    		number: "Este campo solamente admite números"
	    	},

	    	util:{
	    		required: "Por favor ingrese el código del producto",
	    		number: "Este campo solamente admite números"
	    	},

	    	vencida:{
	    		required: "Por favor ingrese el código del producto",
	    		number: "Este campo solamente admite números"
	    	},

	    	deteriorada:{
	    		required: "Por favor ingrese el código del producto",
	    		number: "Este campo solamente admite números"
	    	},

	    	stock_actual:{
	    		required: "Por favor ingrese stock del producto",
	    		number: "Este campo solamente admite números"
	    	},

	    	obsoleta:{
	    		required: "Por favor ingrese el código del producto",
	    		number: "Este campo solamente admite números"
	    	},

	    	cantidad:{
	    		required: "Por favor ingrese la cantidad del producto",
	    		
	    		number: "Este campo solamente admite números"
	    	},
	    	codigo_articulo:{
	    		required: "Por favor ingrese el código del producto",
	    		
	    		number: "Este campo solamente admite números"
	    	},

	    	fecha_vencimiento: "Debe colocar una fecha",

	    	fecha_entrada: "Debe colocar una fecha",

	    	descripcion: "Por favor ingrese la descripcion del producto",

	    	nombre: "El campo nombre es requerido",

	    	nombreE: "El campo nombre es requerido",

	    	usuario: "El campo usuario es requerido",

	    	clave: "Es obligatorio ingresar una contraseña",

	    	um: "Por favor Seleccione una opción",

	    	telefono: "Debe ingresar un numero telefonico",

	    	encargado: "Debe ingresar nombre del encargado",

	    	direccion: "Debe ingresar direccion",

	    	tipo_articulo: "Por favor Seleccione una opción",

	    	dia: "Seleccione un dia del mes",

	    	consumo: {
	    		required: "Por favor ingrese el consumo diario del producto",
	    		number: "Este campo solamente admite números"
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