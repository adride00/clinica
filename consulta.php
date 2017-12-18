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
$query = "SELECT a.id_producto, a.codigo, a.descripcion, s.existencia FROM articulo as a JOIN stock as s ON a.id_producto = s.id_producto";
///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['articulos']))
{
	$q=$conexion->real_escape_string($_POST['articulos']);
	$query="SELECT a.id_producto, a.codigo, a.descripcion, s.existencia FROM articulo as a JOIN stock as s ON a.id_producto = s.id_producto WHERE 
		
		codigo LIKE '%".$q."%' OR
		descripcion LIKE '%".$q."%'";
}

$buscarA=$conexion->query($query);
if ($buscarA->num_rows > 0)
{
	$tabla.= 
	'<table class="table" id="ini">
		<tr class="bg-primary">
			
			<td>Codigo</td>
			<td>Descripcion</td>
			<td>Existencia</td>
			<td>Cantidad</td>
			<td>Agregar</td>
		</tr>';

	while($filaA= $buscarA->fetch_assoc())
	{
		$tabla.=
		'<div id="resultado"></div>
		<tbody>
		<tr id="'.$filaA["id_producto"].'">
			
			<td id="code">'.$filaA['codigo'].'</td>
			<td id="desc">'.$filaA['descripcion'].'</td>
			<td>'.$filaA['existencia'].'</td>
			<td id="cant"><input id="'.$filaA['codigo'].'" class="'.$filaA["id_producto"].'" type="text" size="5px"></td>
			<div></div>
			<td><button class="btn-success btn btn-info btn-md" id="'.$filaA["id_producto"].'"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
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
