$("#codigo_articulo").onkeyup(funtion(){
	var codigo = $(#codigo_articulo).val();
	var datos = new FormData();
	datos.append("codigo_articulo", codigo);

	$.ajax({
		url: "clinica/forms/ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		succes:function(respuesta){
			console.log(respuesta);
		} 
	});
});