<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'dbclinic';
$usuario = 'root';
$contraseña = 'adride';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT * FROM carrito";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['articulos']))
{
	$q=$conexion->real_escape_string($_POST['articulos']);
	$query="SELECT * FROM carrito WHERE 
		
		codigo LIKE '%".$q."%' OR
		descripcion LIKE '%".$q."%'";
}

$buscarA=$conexion->query($query);
if ($buscarA->num_rows > 0)
{
	$tabla.= 
	'<table class="table" id="myTable">
	<thead>
		<tr class="bg-primary">
			
			<td>Codigo</td>
			<td>Descripcion</td>
			<td>Cantidad</td>
			<td>Borrar</td>
			</thead>
		</tr>';

	while($filaA= $buscarA->fetch_assoc())
	{
		$tabla.=
		'
		
		<tr class="envio" id='.$filaA["id_carrito"].'>
			
			<td id="code" name="codigo[]"">'.$filaA['codigo'].'</td>
			<td id="desc" name="descripcion[]">'.$filaA['descripcion'].'</td>
			<td id="cant" name="cantidad[]">'.$filaA['cantidad'].'</td>
			
			<td><button class="btn-success btn btn-info btn-md" id='.$filaA["id_carrito"].'><i class="fa fa-trash" aria-hidden="true"></i>
</button></td>
		 </tr>
		 
		';
		
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}

echo $tabla;
?>
