<?php 
	$mysqli = new mysqli('localhost','root','adride','dbclinic');

	if ($mysqli ->connect_errno) {
		echo "no se puede";
	}

	include 'conectar.php';
	$codigo = $_POST['codigo'];
	$descripcion = $_POST['descripcion'];
	$cantidad = $_POST['cantidad'];






	$cadena = "INSERT INTO carrito(codigo,descripcion,cantidad) VALUES "; 

	for ($i=0; $i < count($codigo); $i++) { 
		$cadena.="('".$base[$i]."','".$descripcion[$i]."','".$cantidad[$i]."'),";
	}

	$cadena_final = substr($cadena, 0, -1);
	$cadena_final.=";";

	if ($mysqli->query($cadena_final)): 
	
		echo json_encode(array('error'=> false));
	else:
		echo json_encode(array('error'=> true));	
	endif;

	mysqli->close();
	
 ?>