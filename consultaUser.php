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
//$query="SELECT * FROM articulo WHERE tipo = 'medicamento'";
$query = "SELECT nombre, usuario FROM usuario";
///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['articulos']))
{
	$q=$conexion->real_escape_string($_POST['articulos']);
	$query="SELECT nombre, usuario FROM usuario WHERE 
		
		nombre LIKE '%".$q."%' OR
		usuario LIKE '%".$q."%'";
}

$buscarA=$conexion->query($query);
if ($buscarA->num_rows > 0)
{
	$tabla.= 
	'<table class="table" id="ini">
		<tr class="bg-primary">
			
			<td>Nombre</td>
			<td>Usuario</td>
			
			<td>Acciones</td>
		</tr>';

	while($filaA= $buscarA->fetch_assoc())
	{
		$tabla.=
		'<div id="resultado"></div>
		<tbody>
		<tr id="">
			
			<td id="code">'.$filaA['nombre'].'</td>
			<td id="desc">'.$filaA['usuario'].'</td>
			
			
		 </tr>
		 </tbody>
		';
		
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}

echo $tabla;
?>
