$(obtener_registros());

function obtener_registros(articulos)
{
	$.ajax({
		url : 'consultaUser.php',
		type : 'POST',
		dataType : 'html',
		data : { articulos: articulos },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
