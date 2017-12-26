<?php 
	include("conectar.php");
	$d = $_POST['descripcion'];
	$c = $_POST['cantidad'];
	$cod = $_POST['clase'];
	
	
	
	$sql = "DELETE FROM carrito WHERE id_carrito = '$cod'";

	$consulta = mysqli_query($link,$sql);

	echo 1;
	
 ?>